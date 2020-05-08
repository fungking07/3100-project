<!-- 
PROGRAM myprofile - display person background information
				  - record user credit card information for transaction
				  - allow user to match a consulter according to their preference
				  - display person to view the comment of his/her previous consultation as a consulter
				  - allow user edit and update their personal information
PROGRAMMER: Chung Tsz Ting 115511028
CALLING SEQUENCE: 
-'My Profile' button in navigation bar -> myprofile.php -> editprofile.php -> myprofile.php
-'My Profile' button in navigation bar -> myprofile.php -> 'match to consult' button -> match.php -> othersprofile.php
Where 'My Profile' button in navigation bar
 -->
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="device-width, initial-scale = 1">
  <title>profile</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/post.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/profile.css">
	</head>
	<body>

		<div style="background-color: #e1f5f7">
		<div class="space1"></div>
		
		<?php
			session_start();
			if(isset($_SESSION['signed_in']) == false){
				echo "<script> 
				window.location.href='/403.php';
				</script>";
			}
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

			echo "<div class='top1'><div class='circle1'></div>
				<div class='username1'>".$Commentinfo['username']."</div>
				<div class='institute1'>".$Commentinfo['institute']."</div>
				</div>";

		?>

		<div class="content1">
			<button class="consult1" type="button" onclick="window.location.href='match_form.php'">Match A Consult</button>
			<div class="rank1">
				Consultation Rating
			</div>

			<?php
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

			<div class="bac-info1">
					Background Information
				</div>
				<?php
					$sql = "SELECT * FROM user WHERE user_id=$uid";
					$Result = mysqli_query($conn,$sql);
					$info = mysqli_fetch_array($Result);

					echo '<div class="status1" >
							Education:<div class="education1">'.$Commentinfo['education_level'].'</div>
						</div>
						<div class="email2" >Email-Address: 
							<div class="email1">'.$info['email_address'].'</div>
						</div>
						<div class="major2" >Major:
							<div class="major1">'.$Commentinfo['major'].'</div>
						</div>
						<div class="user_status1">Institute:
							<div class="user_status2">'.$Commentinfo['institute'].'</div>
						</div>';
				?>

			<div class="des1">Description</div>
			<div rows="3" cols="10" class="description1">
			<?php
					echo $Commentinfo['personal_description'];
			?>
			</div>
			
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
			<form action='editprofile.php'>
				<button class="consult1" type="button" onclick="window.location.href='editprofile.php'">Edit</button>
			</form>
			<div class="space1"></div>
		</div>
	</body>
</html>
