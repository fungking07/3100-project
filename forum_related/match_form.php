<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="device-width, initial-scale = 1">
<title>chats</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/chat_msg.css">
<link rel="stylesheet" href="../css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add_post</title>
		<link rel="stylesheet" href="../css/add_post.css">

	</head>
	<body >
		<div class="share">
			Share your experience
		</div>
    <form action ="match.php" method = "post">
      <p style="margin-left:330px; margin-bottom:1px;">Your Desired Weighting:</p>
      <p style="margin-left:330px; margin-top:40px;">Preference 1:</p>
		    <div class="major">
			       <select  name = "p1">
				           <option style="display: none;" value ="">Preference</option>
				           <option value ="1.2">1</option>
				           <option value ="1.1">2</option>
				           <option value ="1.0">3</option>
			       </select>
         </div>
         <p style="margin-left:330px; margin-top:40px;">Preference 2:</p>
         <div class="major">
			       <select  name = "p2">
				           <option style="display: none;" value ="">Preference</option>
				           <option value ="1.2">1</option>
				           <option value ="1.1">2</option>
				           <option value ="1.0">3</option>
			       </select>
         </div>
         <p style="margin-left:330px; margin-top:40px;">Preference 3:</p>
         <div class="major">
			       <select  name = "p3">
				           <option style="display: none;" value ="">Preference</option>
				           <option value ="1.2">1</option>
				           <option value ="1.1">2</option>
				           <option value ="1.0">3</option>
			       </select>
         </div>

         <p style="margin-left:330px; margin-top:40px;">Desire Faculty and Education Level of Your Consulter</p>
         <div class="major">
			<select name = "Faculty" >
				<option style="display: none;" value ="">Faculty</option>
				<option value ="Arts">Arts</option>
				<option value ="Business">Business</option>
				<option value ="Education">Education</option>
				<option value ="Engineering">Engineering</option>
				<option value ="Law">Law</option>
				<option value ="Medicine">Medicine</option>
				<option value ="Science">Science</option>
				<option value ="Social Sciennce">Social Science</option>
			</select>
		</div>
		<div class="major">
			<select name = "education">
				<option style="display: none;" value ="">Education</option>
				<option value ="High Schoool">High Schoool</option>
				<option value ="Undergraduate">Undergraduate</option>
				<option value ="Master">Master</option>
				<option value ="Post Graduate">Post Graduate</option>
			</select>
		</div>

     <input class="submit" type="submit" name="submit">
   </form>
	</body>
</html>
