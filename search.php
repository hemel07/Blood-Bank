<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    
	<link href="search.css" rel="stylesheet" type="text/css">
    <title>Search Donors</title>
</head>
<body>
<div class="logo">
	 <a style="text-decoration:none; font-size: 35px; color: black;" href="index.php">Blood Bank</a></div>
        </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search by the "Blood Group" or "District" </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
<br><br><br>
                                <form action="" method="GET">
                                    <div class="inputgroup_3">
									
                                        <input class="searchbar01" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form_control" placeholder="Search data">
                                        <button type="submit" class="btnsearchprimary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table-bordered">
                            <thead>
                                <tr>
								<th>User ID</th>
									<th>User Name</th>
									<th>Blood Group</th>
									<th>District</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>	</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","login_sample_db");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM users WHERE CONCAT(blood_group,district) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['user_id']; ?></td>
                                                    <td><?= $items['user_name']; ?></td>
                                                    <td><?= $items['blood_group']; ?></td>
                                                    <td><?= $items['district']; ?></td>
													<td><?= $items['phone_number']; ?></td>
													<td><?= $items['email']; ?></td>
													<td><a class="button3" href="mailto:<?php echo $items['email']??''; ?>">Request</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
