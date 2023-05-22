<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>about US</title>
	<link rel="stylesheet"  href="aboutusstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Indie+Flower|Montserrat|Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="container">
		<div class="nav">
			<div class="logo"> <a style="text-decoration:none" href="index.php">Blood Bank</a></div>
		<div>
			<span>Product</span>
			<span class="active">About Us</span>
			<span>Contact Us</span>
		</div>
		</div>
		<div class="about-us">
			<div class="who-we-are">
				<h3>Who we are</h3>
				<span>We are a team who developed this project. We will keep updating this website to help people.</span>
			</div>
			<div class="cards">
				<div class="card">
					<div class="card-img card-img1"></div>
					<div class="card-body">
						<h3>Hemel Sarker Shuvo</h3>
						<span>Developer</span>
						<p>This is a dream project for me. My dream was to develop a website that could help people manage blood and reduce the hassle. I will keep updating this website further and make it as efficient as possible for the user. </p>
					</div>
					</div>
			
			
			<div class="card">
					<div class="card-img card-img2"></div>
					<card class="card-body">
						<h3>Sadik Ittesaf Abir </h3>
						<span>Developer</span>
						<p>This is a dream project for me. My dream was to develop a website that could help people manage blood and reduce the hassle. I will keep updating this website further and make it as efficient as possible for the user. </p>
					</card>
				</div>
			
		</div>

		<div class="card">
					<div class="card-img card-img3"></div>
					<card class="card-body">
						<h3>Mohammad Fahim </h3>
						<span>Developer</span>
						<p>This is a dream project for me. My dream was to develop a website that could help people manage blood and reduce the hassle. I will keep updating this website further and make it as efficient as possible for the user. </p>
					</card>
				</div>
			
		</div>

	<div class="social-media">
				<i class="fa fa-github" style="font-size:24px"></i>
			<i class="fa fa-linkedin" style="font-size:24px"></i>
		<i class="fa fa-twitter" style="font-size:24px"></i>
		<a  href="https://www.facebook.com/hemel.sarker.shuvo"	target="_blank"><i class="fa fa-facebook" style="font-size:24px"></i></a>
			</div>
	</div>


</body>
</html>