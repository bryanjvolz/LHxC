<?php
$cache_file = __DIR__ . '/cache/history-recent-edits.html';
$cache_time = 3600; // 1 hour in seconds

// Check if the cached file exists and is not expired
if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_time) {
    // If so, output the cached file and exit
    readfile($cache_file);
    exit;
}

// If the cache is invalid, start output buffering
ob_start();

// Function to parse .env file
if (!function_exists('parseEnv')) {
    function parseEnv($filePath) {
        $env = [];
        if (file_exists($filePath)) {
            $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                // Remove surrounding quotes
                if (substr($value, 0, 1) == '"' && substr($value, -1) == '"') {
                    $value = substr($value, 1, -1);
                }
                $env[$name] = $value;
            }
        }
        return $env;
    }
}

$env = parseEnv(__DIR__ . '/../.env');

$db_host = isset($env['DB_HOST']) ? $env['DB_HOST'] : '';
$db_name = isset($env['DB_NAME']) ? $env['DB_NAME'] : '';
$db_user = isset($env['DB_USER']) ? $env['DB_USER'] : '';
$db_password = isset($env['DB_PASSWORD']) ? $env['DB_PASSWORD'] : '';
$db_port = isset($env['DB_PORT']) ? $env['DB_PORT'] : '3306';

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

if (!function_exists('parse_wiki_links')) {
    function parse_wiki_links($text) {
        $pattern = '/\[\[([^\]]+)\]\]/';
        $replacement = '<a href="https://history.louisvillehardcore.com/index.php?title=$1" target="_blank">$1</a>';
        return preg_replace($pattern, $replacement, $text);
    }
}

if ($mysqli->connect_error) {
    echo "<p>Failed to connect to the history database: " . $mysqli->connect_error . "</p>";
} else {
    $query = "SELECT rc_title, rc_timestamp, actor_name, comment_text FROM recentchanges JOIN actor ON rc_actor = actor_id JOIN comment ON rc_comment_id = comment_id ORDER BY rc_timestamp DESC LIMIT 20";
    $result = $mysqli->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<a href="https://history.louisvillehardcore.com/index.php/' . $row['rc_title'] . '">' . str_replace('_', ' ', $row['rc_title']) . '</a>';
                echo ' by ' . $row['actor_name'];
                echo ' at ' . date('F j, Y g:i A', strtotime($row['rc_timestamp']));
                echo ' <em>' . parse_wiki_links($row['comment_text']) . '</em>';
                echo '</li>';
            }
            echo '</ul>';
            $result->free();
        } else {
            echo "<p>No recent edits found.</p>";
        }
    } else {
        echo "<p>Error executing query: " . $mysqli->error . "</p>";
    }
    $mysqli->close();
}

// Get the content from the output buffer
$content = ob_get_contents();
ob_end_clean();

// Save the content to the cache file
file_put_contents($cache_file, $content);

// Output the content
echo $content;

?>