<?php foreach($postinfo as $key => $post){?>
  <div id="post_id" class="containers" onclick="pagetrans()">
    <p><h1><?php echo $post["post_title"];?></h1></p>
    <p>By <strong> <?php echo $post["author_name"];?> </strong> at <?php echo $post["post_date"];?> <?php echo "Like : " . $post["like_number"]; //echo " VIEWS : " . $post["view_number"];?></p>
    <a href="post.php?post_id=<?= $post['post_id'] ?>" class="btn btn-success">Read More</a>
    <a href="edit_post.php?post_id=<?= $post['post_id'] ?>" class="btn btn-warning">Edit</a>
  </div>
<?php }?>
