<!-- 
PROGRAM FetchPost.php - output all post
PROGRAMMER: Lam King Fung 1155108968 Tso Sze Long Angus 1155109296
CALLING SEQUENCE: 
- post.php -> FetchPost.php -> post.php
Where Read More button is for accessing to specific post.
 -->
<?php foreach($postinfo as $key => $post){?>
  <div id="post_id" class="containers" onclick="pagetrans()">
    <p><h1><?php echo $post["post_title"];?></h1></p>
    <p>By <strong> <?php echo $post["author_name"];?> </strong> at <?php echo $post["post_date"];?> <?php echo "Like : " . $post["like_number"]; //echo " VIEWS : " . $post["view_number"];?></p>
    <a href="post.php?post_id=<?= $post['post_id'] ?>" class="btn btn-success">Read More</a>
  </div>
<?php }?>
