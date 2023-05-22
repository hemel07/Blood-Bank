<?php 
session_start();
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  
?>

<!DOCTYPE html>
<html>

<head>
<title>BLOOD BANK </title>
<? echo ‘<link href="style.css"  media="" >’ ?> 

  <meta charset="UTF-8">
  <meta Name="viewport" content="width=device-width",initial-scale="1.0">
  <link href="style.css" rel="stylesheet" type="text/css">
 
</head>

<body>
<nav>
      <div class="logo">
        <p style="font-size: 30px; color: white;">BLOOD BANK</p>
      </div>
      <ul >
       <li><a href="index.php" class="active">Home</a></li>      
        <li><a href="donors.php">Donors</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="searchDoc.php">Search Doctor</a></li>
        <li><a href="searchHos.php">Search Hospital</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href=""><a style="font-size: 25px; color: black" > Hi, <?php echo $user_data['user_name']; ?></a></li>
        <li><a href="logout.php">(Logout)</a></li>
     
      </ul>  
  </nav>



  <div class="bigimage">
    
    <div class="overlay">
      <h1>"Donate Blood, Save Life."</h1>
      <p>~ Unknown</p>  <br>
	
    </div>
</div>

</body>
</html>