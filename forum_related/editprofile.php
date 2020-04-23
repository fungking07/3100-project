<!DOCTYPE html>
<html>
<head>
  	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
  	<meta name="viewport" content="device-width, initial-scale = 1">
  	<title>Forum skeleton</title>
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/post.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="../css/profile.css">
	  <style type="text/css">
	</style>
	</head>
	<body>
	<form action="storeprofile.php">
		<div style="background-color: #e1f5f7">
		<div class="space1"></div>
		<?php
			session_start();
			include("../navbar.php");
			$uid = $_SESSION['user_id'];
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$conn = new mysqli($servername, $username, $password, 'AcadMap');

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$commentsql = "SELECT * FROM user_profile WHERE user_id=$uid";
			$commentResult = mysqli_query($conn,$commentsql);
			$Commentinfo = mysqli_fetch_array($commentResult);

			$usersql = "SELECT * FROM user WHERE user_id=$uid";
			$userResult = mysqli_query($conn,$usersql);
			$userinfo = mysqli_fetch_array($userResult);

			$name = $Commentinfo['username'];
			$edu_lv = $Commentinfo['education_level'];
			$email = $userinfo['email_address'];
			$inst = $Commentinfo['institute'];
			$major = $Commentinfo['major'];
			$prof = $Commentinfo['personal_description'];
			$cardname = $Commentinfo['cardname'];
			$cardnumber = $Commentinfo['cardnumber'];
			$exmth = $Commentinfo['expire_mth'];
			$exyr = $Commentinfo['expire_yr'];
			$cvv = $Commentinfo['cvv'];
			//plz make the name unique!! thx so much!!!! @@@@@@@@
			echo "<div class='top1'><div class='circle1'></div>
				<div class='username1'><input type='text' name='uname' id='name' value='$name' placeholder='username'></div>
				</div>";

		?>

		<div class="content1">
			<button class="consult1" type="button" onclick="" disabled>Match A Consult</button>
			<div class="rank1">
				Consultation Rating
			</div>

			<?php
				// Create connection
				$conn = new mysqli($servername, $username, $password, 'AcadMap');

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$starsql = "SELECT AVG(score) AS maxs FROM consultation_comment WHERE user_id=$uid";
				$starResult = mysqli_query($conn,$starsql);
				$starinfo = mysqli_fetch_array($starResult);
				if($starinfo['maxs']>4){
					echo '<div class="ratings11"></div>
					<div class="ratings11 ratings2"></div>
					<div class="ratings11 ratings3"></div>
					<div class="ratings11 ratings4"></div>
					<div class="ratings11 ratings5"></div>';
				}
				else if($starinfo['maxs']>3){
					echo '<div class="ratings11"></div>
					<div class="ratings11 ratings2"></div>
					<div class="ratings11 ratings3"></div>
					<div class="ratings11 ratings4"></div>
					<div class="rating11 rating5"></div>';
				}
				else if($starinfo['maxs']>2){
					echo '<div class="ratings11"></div>
					<div class="ratings11 ratings2"></div>
					<div class="ratings11 ratings3"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating5"></div>';
				}
				else if($starinfo['maxs']>1){
					echo '<div class="ratings11"></div>
					<div class="ratings11 ratings2"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating5"></div>';
				}
				else if($starinfo['maxs']>0){
					echo '<div class="ratings11"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating5"></div>';
				}
				else{
					echo '<div class="rating11"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating4"></div>
					<div class="rating11 rating5"></div>';
				}
			?>

		<div class="bac-info1">Background Information</div>

			<div class="status1" >Education:<div class="education1">
				<select name = "edu_lv" class='inputbox'>
				<option style="display: none;" value =""></option>
				<option value ="High Schoool" <?php if($edu_lv == 'High Schoool'){echo("selected");}?>>High Schoool</option>
				<option value ="Undergraduate" <?php if($edu_lv == 'Undergraduate'){echo("selected");}?>>Undergraduate</option>
				<option value ="Master" <?php if($edu_lv == 'Master'){echo("selected");}?>>Master</option>
				<option value ="Post Graduate" <?php if($edu_lv == 'Post Graduate'){echo("selected");}?>>Post Graduate</option>
			</select>
			</div></div>
			<div class="email2" >Email-Address: <div class="email1">
				<?php echo "<input type=\"text\" value='$email' placeholder=\"Your email\" name='email' class=\"inputbox\">";?>
			</div></div>

			<div class="major2" >Major:<div class="major1">
				<select name = "major" class='inputbox'>
				<?php echo "<option style=\"display: none;\" >$major</option>";?>
				<option value ="Arts" <?php if($major == 'Arts'){echo("selected");}?>>Arts</option>
				<option value ="Business" <?php if($major == 'Business'){echo("selected");}?>>Business</option>
				<option value ="Education" <?php if($major == 'Education'){echo("selected");}?>>Education</option>
				<option value ="Engineering" <?php if($major == 'Engineering'){echo("selected");}?>>Engineering</option>
				<option value ="Law" <?php if($major == 'Law'){echo("selected");}?>>Law</option>
				<option value ="Medicine" <?php if($major == 'Medicine'){echo("selected");}?>>Medicine</option>
				<option value ="Science" <?php if($major == 'Science'){echo("selected");}?>>Science</option>
				<option value ="Social Sciennce" <?php if($major == 'Social Sciennce'){echo("selected");}?>>Social Science</option>
				</select>
			</div></div>

			<div class="major2" >Name on Card:<div class="major1">
				<?php echo "<input type=\"text\" class=\"inputbox\" name=\"cardname\" value='$cardname' placeholder=\"Name\">";?>
			</div></div>

			<div class="major2" >Credit card number:<div class="major1">
				<?php echo "<input type=\"text\" class=\"inputbox\" name=\"cardnumber\" value='$cardnumber' placeholder=\"XXXXXXXXXXXXXXXX\">";?>
			</div></div>

			<div class="major2" >Exp Month:<div class="major1">
				<?php echo "<input type=\"text\" class=\"inputbox\" name=\"exmth\" value='$exmth' placeholder=\"MM\">";?>
			</div></div>

			<div class="major2" >Exp Year:<div class="major1">
				<?php echo "<input type=\"text\" class=\"inputbox\" name=\"exyr\" value='$exyr' placeholder=\"YYYY\">";?>
			</div></div>

			<div class="major2" >CVV:<div class="major1">
			<?php echo "<input type=\"password\" class=\"inputbox\" name=\"cvv\" value='$cvv' placeholder=\"000\">";?>
			</div></div>

			<div class="user_status1" >Institute:<div class="user_status2">
				<?php echo "<input type=\"text\" name=\"inst\" value='$inst' placeholder=\"Your education institute\" id='inst' class=\"inputbox\">";?>
			</div></div>

			<div class="des1">Description</div>
			<?php echo "<textarea rows=\"3\" cols=\"10\" name=\"prof\" placeholder=\"Type your description, e.g. majors, habits...\" class=\"description1\" id='prof'>".$prof."</textarea>";?>

			<div class="con1">
				Your Consultation
			</div>

			<?php
				$sql = "SELECT * FROM consultation_comment WHERE user_id=$uid";
				$Result = mysqli_query($conn,$sql);
				$col = mysqli_num_rows($Result);
				for ($x = 0; $x < $col; $x++) {
					$info = mysqli_fetch_array($Result);
					if($info['score']==0){
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div></div>
						</div>
					  </div>';
					}
					else if($info['score']==1){
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star_s"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div></div>
						</div>
					  </div>';
					}
					else if($info['score']==2){
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div></div>
						</div>
					  </div>';
					}
					else if($info['score']==3){
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div></div>
						</div>
					  </div>';
					}
					else if($info['score']==4){
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star1"></div>
							</div></div>
						</div>
					  </div>';
					}
					else{
						echo '<div class="consultation_content1">
						<div style="margin:10px"><div style="padding:10px">
							<div class="text1">'.$info['comments'].'</div>
							<div class="day1">'.$info['comment_date'].'<br>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
								<div class="star_s"></div>
							</div></div>
						</div>
					  </div>';
					}
				}
				if($col==0){
					echo '<div style="height:10px"></div><div style="margin-left:100px">There is no consultation yet.</div>';
				}
			?>

				<input class="consult1" type="submit" value="Confirm">
			<div class="space1"></div>
		</div>
		</form>
	</body>
</html>
