<div id="Debug" style="
		visibility:hidden;
        display:none;
        position: absolute;
        top: 0px;
        right:px;
        padding: 5px;
        background:orange;
        font: bold 16px/18px Courier;
        color:gray;
        ">
    
<?
$postID =($post->ID);
echo "Post ID: ".$postID."<br />";
$parent_id=($post->post_parent);
echo "Parent ID: " .$parent_id. "<br />";
$Section = get_section();
echo "Section ID: ".$Section."<br />";
$Slug =($post->post_name);
echo "Post Name(Slug): ".$Slug. "<br />";
$Category_id = $cat ;
echo "Post Category: ".$Category_id. "<br />";
?>
</div>
