<!--
PROGRAM error.php
PROGRAMMER: Tso Sze Long Angus 1155109296
CALLING SEQUENCE:
- all login_related pages
purpose:output error message to user
DATA STRUCTURE:
array error : string array for storing error message
 -->

<?php
//if there is error
if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php /*promt error */ echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
