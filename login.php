<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
</head>

<body background="hrt.jpg" >
<div class="logo">
        <p style="font-size: 35px; color: white;">BLOOD BANK</p><br><br><br><br><br><br>
      </div>
	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 310px;
		color: white;
		background-color: #8ADA17;
		border: none;
	}

	#box{

		background-color: #E6A536;
		margin: auto;
		width: 300px;
		padding: 20px;
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

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<span class="details">Username</span>
			<input id="text" type="text" name="user_name"><br><br>
			<span class="details">password</span>
			<input id="text" type="password" name="password"><br><br>
			
			<input id="button" type="submit" value="Login"><br><br>

			<a id="click" href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>