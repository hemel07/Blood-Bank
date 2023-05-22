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
                        <h4>Search by your location </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
<br><br><br>
                                <form action="" method="GET">
                                    <div class="inputgroup_3">
									
                                        <input class="searchbar01" type="text" name="searchHos" required value="<?php if(isset($_GET['searchHos'])){echo $_GET['searchHos']; } ?>" class="form_control" placeholder="Search Hospital">
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
								<th> ID</th>
									<th>Name</th>
									<th>location</th>
									<th>type</th>
									
									<th>	</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","login_sample_db");

                                    if(isset($_GET['searchHos']))
                                    {
                                        $filtervalues = $_GET['searchHos'];
                                        $query = "SELECT * FROM hospital WHERE CONCAT (location,type) LIKE '%private%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>  
                                                <td><?= $items['id']; ?></td>
                                                    <td><?= $items['name']; ?></td>
                                                    <td><?= $items['location']; ?></td>
													<td><?= $items['type']; ?></td>

												
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
