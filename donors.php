<?php 
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";
!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  $db= $con;
  $tableName="users";
  $columns= ['user_id', 'user_Name','blood_group','district', 'phone_number','email'];
  $fetchData = fetch_data($db, $tableName, $columns);

  function fetch_data($db, $tableName, $columns){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName)){
      $msg= "Table Name is empty";
}
    else{
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
        $result = $db->query($query);

        if($result== true){ 
            if ($result->num_rows > 0) {
               $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
               $msg= $row;
            } else {
               $msg= "No Data Found"; 
            }
           }else{
             $msg= mysqli_error($db);
           }
           }
           return $msg;
           }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Donors List </title>
    <? echo ‘<link href="style.css"  media="" >’ ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width" ,initial-scale="1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="donors.css" rel="stylesheet" type="text/css">
</head>


<body>

    <nav>
        <div class="logo">
            <p style="font-size: 25px; color: white;">BLOOD BANK</p>
        </div>

        <ul>
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="donors.php">Donors</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    <br><br><br><br><br>
    
    <div class="donoredit001">
        <p style="font-size: 26px; color: white;text-align:center;"> DONOR LIST </p>
    </div>

    <div class="nb">
        <p> N.B: You can contact a donor by phone number and also sent blood request by email </p>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $deleteMsg??''; ?>


                <table class="table table-striped" style="width:150%">

                    <th style=" color: white">ID</th>
                    <th style=" color: white">Name</th>
                    <th style=" color: white">Blood Group</th>
                    <th style=" color: white">District</th>
                    <th style=" color: white">Phone Number</th>
                    <th style=" color: white">Email</th>

                    </thead>
                    <tbody>
                        <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>

                        <td style=" color: white"><?php echo $data['user_id']??''; ?></td>
                        <td style=" color: white"><?php echo $data['user_Name']??''; ?></td>
                        <td style=" color: white"><?php echo $data['blood_group']??''; ?></td>
                        <td style=" color: white"><?php echo $data['district']??''; ?></td>
                        <td style=" color: white"><?php echo $data['phone_number']??''; ?></td>
                        <td style=" color: white"><?php echo $data['email']??''; ?></td>
                        <td style=" color: white"><a class="button3"
                                href="mailto:<?php echo $data['email']??''; ?>">Request</td></a>
                        </tr>
                        <?php
      $sn++;}}else{ ?>
                        <tr>
                            <td colspan="8">
                                <?php echo $fetchData; ?>
                            </td>
                        <tr>
                            <?php
    }?>
                    </tbody>

            </div>
        </div>
    </div>
    </div>

</body>

</html>