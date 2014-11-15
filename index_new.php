<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: Homepage
 */

get_header('new'); ?>


<div id="content" class="narrowcolumn">
<?php // OPEN our loop
	if (have_posts()) { ?>

<?php
	$postCount = 0;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts( 'paged=$page&post_per_page=-1&cat=' . get_query_var('cat') );
	while (have_posts()) { the_post(); 
		if( $postcount == 0 ) { 
		//GETS LATEST OR STICKY POST
	?>
	        
    <div id="lead" class="clearfloat">
    <img src="<?php bloginfo('template_url'); ?>/images/TapeTopLeft.png" alt="" class="TapeTopLeft" />
	<img src="<?php bloginfo('template_url'); ?>/images/TapeTopRight.png" alt="" class="TapeTopRight" />
    <img src="<?php bloginfo('template_url'); ?>/images/TapeBotLeft.png" alt="" class="TapeBotLeft" />
    <img src="<?php bloginfo('template_url'); ?>/images/TapeBotRight.png" alt="" class="TapeBotRight" />

	<div id="leadLeft">		 
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=128&amp;h=128&amp;src='); ?></a>
	
    <p class="home_meta">Posted By: <?php the_author() ?><br />
	On <?php the_time('n/d/y'); ?>  </p> 
    <p>Categories: <?php the_category(', ') ?></p>
    
     <?php the_tags('Tags:', ', ', '<br />'); ?> 
    </div><!-- end leadLeft -->
    
    
	<div id="lead-text">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    
   	<?php the_excerpt(); ?>
    <hr />
    <div id="leadLinks">    
	<a href="<?php the_title(); ?>">Read More</a>     
       <?php $customField = get_post_custom_values("topic");
if (isset($customField[0])) { echo ' | <a href="http://forums.louisvillehardcore.com/viewtopic.php?f=1&t='.$customField[0].'">Comments On Forums</a>';} ?>
        </div><!-- end leadLinks -->
        
	</div><!-- end lead-text -->
    <div class="clear"></div>
			</div><!--END LEAD/STICKY POST-->
            
		<div id="more-posts">
		<h3><?php _e('Recent Posts','LHXC Default'); ?></h3>
		<?php
		}
		elseif( $postcount > 0 && $postcount <= 4 ) { 
		//GETS NEXT FOUR EXCERPTS
		?>
			
		<div class="clearfloat recent-excerpts">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=105&amp;h=85&amp;src='); ?></a>

<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <!-- <span class="commentcount">(<?php comments_popup_link('0', '1', '%'); ?>)</span>--></h4>
			<?php the_excerpt(); ?>
            <p class="home_meta">Posted: <?php the_time('n/d/y'); ?> | <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Read More</a></p>

		</div>
						
<?php //GETS NEXT HEADLINES
		}
		else { 
			ob_start();
			echo '<li><a href="'; 
			the_permalink();
			echo '">';
			the_title();
			echo '</a></li>';
			$links[] = ob_get_contents();
			ob_end_clean();			
		}
		$postcount ++;
		}
	}
	else {
?>

<?php } ?>
	
	
<?php 
	if(count($links)): ?>

	 <h3><?php _e('Older Posts','LHXC Default'); ?></h3>
	 <ul class="headlines"><?php echo join("\n", $links); ?></ul>
			
	<?php endif; ?>
	</div><!--END RECENT/OLDER POSTS-->
	
    
    
	<div id="featured-cats"> 
	<h3><?php _e('Featured Categories','LHXC Default'); ?></h3>

		<?php
        $display_categories = get_option('LHXC_cats');
        foreach ($display_categories as $category) { 
        $showposts = get_option('LHXC_featured_posts');	
        query_posts("showposts=$showposts&cat=$category");
        ?>

<h5><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?>&raquo;</a></h5>

        <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li class="clearfloat"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><br />
        <p class="home_meta"><?php the_time('n/d/y'); ?>  </p></li>
        <?php endwhile; ?>
        </ul>
	<?php } ?>
    
</div><!--END FEATURED CATS-->

<div class="clear"></div>

<h4>Latest Forum Posts</h4>
<?php
    // How Many Topics you want to display?
    $topicnumber = 5;
    // Change this to your phpBB path
    $urlPath = "http://forums.louisvillehardcore.com/";

    $table_topics = $table_prefix. "topics";
    $table_forums = $table_prefix. "forums";
    $table_posts = $table_prefix. "posts";
    $table_users = $table_prefix. "users";
    $link = mysql_connect("$dbhost", "$dbuser", "$dbpasswd") or die("Could not connect");
    mysql_select_db("$dbname") or die("Could not select database");
 
    $query = "SELECT t.topic_id, t.topic_title, t.topic_last_post_id, t.forum_id, p.post_id, p.poster_id, p.post_time, u.user_id, u.username
    FROM $table_topics t, $table_forums f, $table_posts p, $table_users u
    WHERE t.topic_id = p.topic_id AND
    f.forum_id = t.forum_id AND
    t.forum_id != 12 AND
	t.forum_id != 11 AND
	t.forum_id != 5 AND
    t.topic_status <> 2 AND
    p.post_id = t.topic_last_post_id AND
    p.poster_id = u.user_id
    ORDER BY p.post_id DESC LIMIT $topicnumber";
    $result = mysql_query($query) or die("Query failed");									
 
    print "<table cellpadding='3' cellSpacing='2' width='640'>";
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
 
    echo  "<tr valign='top'><td><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><font color=\"#FFCC00\"><b><a href=\"$urlPath/viewtopic.php?f=$row[forum_id]&t=$row[topic_id]&p=$row[post_id]#p$row[post_id]\" TARGET=\"_blank\">" .
    $row["topic_title"] .
    "</a></td></font></b><td><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><font color=\"#C0C0C0\"> by: <a href=\"$urlPath/memberlist.php?mode=viewprofile&u=$row[user_id]\" TARGET=\"_blank\">" .
    $row["username"] .
    "</td></tr></font>";
    }
    print "</table>";
    mysql_free_result($result);
    mysql_close($link);
    ?>
<hr style="visibility:visible; height:2px; color:#AAA; width:100%; margin:10px 0; clear:both;" />

<?php
    // set feed URL
    $feedURL = 'http://gdata.youtube.com/feeds/api/users/flexyournoggin/uploads';
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
	
	// Decide how many video results you want to show
	$display = 3;
	$counter = 0;
    ?>
      <h3>Recent Louisville Hardcore video Uploads</h3>
    <?php
    // iterate over entries in feed
    foreach ($sxml->entry as $entry) {
      // get nodes in media: namespace for media information
      $media = $entry->children('http://search.yahoo.com/mrss/');
      
      // get video player URL
      $attrs = $media->group->player->attributes();
      $watch = $attrs['url']; 
      
      // get video thumbnail
      $attrs = $media->group->thumbnail[0]->attributes();
      $thumbnail = $attrs['url']; 
            
      // get <yt:duration> node for video length
      $yt = $media->children('http://gdata.youtube.com/schemas/2007');
      $attrs = $yt->duration->attributes();
      $length = $attrs['seconds']; 
      
      // get <yt:stats> node for viewer statistics
      $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
      $attrs = $yt->statistics->attributes();
      $viewCount = $attrs['viewCount']; 
      
      // get <gd:rating> node for video ratings
      $gd = $entry->children('http://schemas.google.com/g/2005'); 
      if ($gd->rating) {
        $attrs = $gd->rating->attributes();
        $rating = $attrs['average']; 
      } else {
        $rating = 0; 
      } 
      ?>
      <div class="item">
      <p><span class="recent_video_thumbnail">
            <a href="<?php echo $watch; ?>"><img src="<?php echo $thumbnail;?>" /></a>
            <br/>click to view
          </span> 
          
        <span class="recent_video_title">
          <a href="<?php echo $watch; ?>"><?php echo $media->group->title; ?></a>
        </span>
        </p>
        <p><?php echo $media->group->description; ?></p>
        <p>
          <span class="attr">By:</span> <?php echo $entry->author->name; ?> <br/>
          <span class="attr">Duration:</span> <?php printf('%0.2f', $length/60); ?> 
          min. <br/>
          <span class="attr">Views:</span> <?php echo $viewCount; ?> <br/>
          <span class="attr">Rating:</span> <?php echo $rating; ?> 
        </p>
      </div>      
    <?php
   // Increase the counter by one.
  $counter++;
  // Check to display all the items we want to.
  if($counter == $display)
  {
    // Yes. End the loop.
    break;
  }
  // No. Continue.
}
    ?>
	<hr />
</div><!--END CONTENT-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
