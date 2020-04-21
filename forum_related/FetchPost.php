<?php foreach($postinfo as $key => $post){?>
  <div id="post_id" class="containers" onclick="pagetrans()">
    <h4><?php echo "post_id:" . $post["post_id"]; ?></h4>
    <p><h1><?php echo $post["post_title"];?></h1></p>
    <p>By &lt; <?php echo $post["author_name"];?> &gt; at &lt;<?php echo $post["post_date"];?>&gt;<?php echo "Like : " . $post["like_number"]; echo " VIEWS : " . $post["view_number"];?></p><hr>
    <a href="forum.php" class="btn btn-success">Read More</a>
  </div>
<?php }?>
