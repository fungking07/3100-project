<!-- 
PROGRAM error.php - call error to display
PROGRAMMER: Tso Sze Long 
CALLING SEQUENCE: 
- forum.php -> add_post.php -> error.php -> add_post.php
- login.php -> error.php -> login.php
- login.php -> register.php -> error.php -> register.php
 -->
<?php
if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
