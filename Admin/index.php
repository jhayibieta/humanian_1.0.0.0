<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - Administrator</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php include("../sidebar.php");?>
    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
								<?php

									include('../connect.php');

									error_reporting(0);

									$users = $connect->query("SELECT count(ID) as users FROM tblUsers WHERE userStatus = 1");

									while($row = $users->fetch_array()){
										 $allUsers = $row['users'];
									}

								?>
								<div class="row">
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">USERS</h5><hr/>
														<h1 class="text-center" id="card-content"><?php echo $allUsers;?> Users</h1>
												</div>
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">TEAMS</h5><hr/>
														<h1 class="text-center" id="card-content">10 Teams</h1>
												</div>
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">APPROVALS</h5><hr/>
														<h1 class="text-center" id="card-content">10 Teams</h1>
                        </div>
                    </div>
                </div>
								<div class="row">
									<div class="col-md-8 lg-8 sm-8">
											<div class="panel" id="dashboard-card-2">
													<h5 class="text-left" id="card-header">REGISTRATION HISTORY</h5><hr/>
												
											</div>
									</div>
									<div class="col-md-4 lg-4 sm-4">
											<div class="panel" id="dashboard-card-2">
													<h5 class="text-left" id="card-header">NUMBER OF DEVICES</h5><hr/>
											</div>
									</div>
								</div>
            </div>

        </div>
    </div>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
