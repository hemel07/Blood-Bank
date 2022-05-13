<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$blood_group =$_POST['blood_group'];
		$district = $_POST['district'];
		$phone_number = $_POST['phone_number'];
		$email = $_POST['email'];
		//$blood

		if(!empty($user_name) && !empty($password) && !empty($blood_group) && !empty($district) && !empty($phone_number) && !empty($email))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,blood_group,district,phone_number,email) values ('$user_id','$user_name','$password','$blood_group','$district','$phone_number','$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			//die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<? echo '<link href="signup.css"  media="" >' ?> 
  <meta charset="UTF-8">
  <meta Name="viewport" content="width=device-width",initial-scale="1.0">
  <link href="signup.css" rel="stylesheet" type="text/css">
</head>

<body>

	<style type="text/css">
	
	#text{

		height: 30px;
		border-radius: 50px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 310px;
		color: white;
		background-color: #8ADA17 ;
		border: none;
	}

	#box{
		
		background-color:#E6A536 ;
		margin: auto;
		width: 300px;
		padding: 40px;
		border-radius: 20px;
	}
	#click{
		padding: 10px;
		width: 50px;
		color: white;
		background-color: #E92155;
		border: none;
	}

	</style>
	<div class="logo">
        <p style="font-size: 30px; color: white;">BLOOD BANK</p><br><br><br><br>
      </div>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			
			<span class="details">Username</span>
			<input id="text" type="text" name="user_name"><br><br>
			<span class="details">password</span>
			<input id="text" type="password" name="password"><br><br>
			<span class="details">blood Group</span>
			<input id="text" type="text" name="blood_group"><br><br>
			<span class="details">District</span>
			<input id="text" type="text" name="district"><br><br>
			<span class="details">Number</span>
			<input id="phone_number" name="phone_number" type="tel"><br><br>
			<span class="details">Email</span>
			<input id="text" name="email" type="text"><br><br>
			
			<input id="button" type="submit" value="Signup"><br><br>

			<a id="click" href="login.php">Click to Login</a><br><br>
		</form>
	</div>
	
</body>
</html>