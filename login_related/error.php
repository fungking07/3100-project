<!-- 
PROGRAM forum.php - forum  
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE: 
- forum.php
- navbar.php -> forum.php
Where filter button is for sorting by date, likes and filter by category.
Where Add Post button is for accessing add post.
 -->
<?php
if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
