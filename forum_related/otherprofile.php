<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			a{
				text-decoration: none;
				color:black;
			}
			*{
				margin:0;
				padding:0;
			}
			.circle{
				width:120px;
				height:120px;
				border-radius: 60px;
				border-style: solid;
				border-color: black;
				margin:30px auto;
			}
			.username{
				width:120px;
				height:50px;
				margin:35px auto 0px;
				text-align: center;
				font-size: 27px;
			}
			.consult{
				display:inline-block;
				width: 100px;
				height:30px;
				margin-left:35%;
				font-size:20px;
				border-radius: 10px;
				border-style: solid;
			}
			.match{
				margin-left:15%;
				display:inline-block;
				width: 200px;
				height:30px;
				font-size:20px;
				border-radius: 10px;
				border-style: solid;
			}
			.rank{
				margin-left:20%;
				margin-top:25px;
				font-size: 27px;
			}
			.rating1{
				display:inline-block;
				margin-top:15px;
				margin-left:25%;
				width:57px;
				height:50px;
				background-image: url(assets/8.png);
			}
			.rating{
				display:inline-block;
				margin-top:15px;
				margin-left:7%;
				width:57px;
				height:50px;
				background-image: url(assets/8.png);
			}
			.status{
				display:inline-block;
				margin-left:20%;
				margin-top:20px;
				background-color: #bfa;
				width:30%;
				height: 40px;
				border-style: solid;
				border-color: gray;
				text-align:center;
				font-size:27px;
			}
			.email{
				display:inline-block;
				margin-top:20px;
				background-color: #bfa;
				width:30%;
				height: 40px;
				border-style: solid;
				border-color: gray;
				text-align:center;
				font-size:27px;
			}
			a:hover{
				background-color: skyblue;
			}
			.des{
				margin-left:20%;
				font-size: 27px;
				margin-top:20px;
			}
			.description{
				width:61%;
				height:120px;
				margin-left:20%;
				margin-top:20px;
				font-size: 27px;
			}
			.con{
				margin-left:20%;
				font-size: 27px;
				margin-top:20px;
			}
			.consultation_content1{
				display:inline-block;
				margin-left:20%;
				margin-top:20px;
				width:28%;
				height:200px;
				background-color: #e6e6fa;
			}
			.text{
				width:100%;
				height:50%;
				background-color: #e6e6fa;
				font-size: 27px;
				border-style: none;
			}
			.day{
				/* position:absolute; */
				display:inline-block;
				width:100%;
				height:50%;
				background-color: #e6e6fa;
				font-size: 20px;
			}
			.consultee{
				font-size: 20px;
				float:right;
			}
			.star{
				display:inline-block;
				background-image: url(assets/1.png);
				width:37px;
				height:37px;
			}
			.consultation_content2{
				display:inline-block;
				margin-left:5%;
				margin-top:20px;
				width:28%;
				height:200px;
				background-color: #e6e6fa;
			}
		</style>
	</head>
	<body>
		<div class="circle">
		</div>
		<div class="username">
			username
		</div>
		<button class="consult" type="button">Consult</button>
		<button class="match" type="button">Match to consult</button>
		<div class="rank">
			Consultation Rating
		</div>
		<div class="rating1" >
		</div>
		<div class="rating" >
		</div>
		<div class="rating" >
		</div>
		<div class="rating" >
		</div>
		<div class="rating" >
		</div>
		<a class="status" href="#">Status</a><a class="email" href="#">Email-Address</a>
		<div class="des">
			Description
		</div>
		<textarea rows="3" cols="10" class="description">
		</textarea>
		<div class="con">
			Your Consultation
		</div>
		
		<div class="consultation_content1">
			<textarea class="text"></textarea>
			<div class="day">
				03/28/2020
				<div class="consultee">
					<input type="checkbox" name="consultee"  />consultee <br>
					<input type="checkbox" name="consultee"  />consultor
				</div>
				<br>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
			    </div>
			</div>
		</div>
		<div class="consultation_content2">
			<textarea class="text"></textarea>
			<div class="day">
				03/28/2020
				<div class="consultee">
					<input type="checkbox" name="consultee"  />consultee <br>
					<input type="checkbox" name="consultee"  />consultor
				</div>
				<br>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
				</div>
				<div class="star">
			    </div>
			</div>
		</div>
	</body>
</html>
