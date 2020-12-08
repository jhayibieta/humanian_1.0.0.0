<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - HRM</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php include("../sidebar-hrm.php");?>
    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
								<?php

									include('../connect.php');

									error_reporting(0);

                                    //for users
									$users = $connect->query("SELECT count(ID) as users FROM tblUsers WHERE userStatus = 1 AND teamId = '$teamId'");

									while($row = $users->fetch_array()){
										 $allUsers = $row['users'];
									}

                                    //for time-offs
                                    $timeoffs = $connect->query("SELECT count(toId) as timeOffs FROM tbltimeoff WHERE teamId = '$teamId'");

                                    while($row = $timeoffs->fetch_array()){
                                        $timeOffs = $row['timeOffs'];
                                    }

                                    //for overtime
                                    $overtime = $connect->query("SELECT count(overtimeId) as overtime FROM tblovertime WHERE teamId = '$teamId'");

                                    while($row = $overtime->fetch_array()){
                                        $allOvertime = $row['overtime'];
                                    }

                                    $hrc = $connect->query("SELECT count(hrcId) as concerns FROM tblhrconcern WHERE teamId = '$teamId'");

                                    while($row = $hrc->fetch_array()){
                                        $concerns = $row['concerns'];
                                    }

								?>


								<div class="row">
                                    <div class="col-md-4 lg-4 sm-4">
                                        <div class="panel" id="dashboard-card">
                                            <h5 class="text-left" id="card-header">EMPLOYEES</h5><hr/>
                														<h1 class="text-center" id="card-content"><?php echo $allUsers;?></h1>
                												</div>
                                    </div>
                                    <div class="col-md-4 lg-4 sm-4">
                                        <div class="panel" id="dashboard-card">
                                            <h5 class="text-left" id="card-header">REQUEST OVERTIME</h5><hr/>
                														<h1 class="text-center" id="card-content"><?php echo $allOvertime;?></h1>
                						</div>
                                    </div>
                                    <div class="col-md-4 lg-4 sm-4">
                                        <div class="panel" id="dashboard-card">
                                            <h5 class="text-left" id="card-header">REQUEST TIME-OFFS</h5><hr/>
                							<h1 class="text-center" id="card-content"><?php echo $timeOffs;?> </h1>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
									<div class="col-md-8 lg-8 sm-8">
											<div class="panel" id="dashboard-card-2">
													<h5 class="text-left" id="card-header">NEWLY REGISTERED EMPLOYEES</h5><hr/>
												    
											</div>
									</div>
									<div class="col-md-4 lg-4 sm-4">
											<div class="panel" id="dashboard-card-2">
													<h5 class="text-left" id="card-header">HR CONCERNS</h5><hr/>
                                                    <h1 class="text-center" id="card-content" style="font-size: 110px;"><?php echo $concerns;?> </h1>
											</div>
									</div>
								</div>


                                <div class="row">
                                    <div class="col-md-6 lg-6 sm-12">
                                        <div class="panel" id="dashboard-card-2" style="height:150px">
                                                <h5 class="text-left" id="card-header">OVERALL SALARY EXPENSE</h5><hr/>
                                                <h1 class="text-center" id="card-content" style="font-size: 40px;margin-top: 25px;">P. 300,000.00 </h1>
                                        </div>
                                        <div class="panel" id="dashboard-card-2" style="height:150px">
                                                <h5 class="text-left" id="card-header">INCOMING RESIGNATION COUNT * NUMBER OF SALARY </h5><hr/>
                                                <h1 class="text-center" id="card-content" style="font-size: 40px;margin-top: 25px;"> 3 * P. 60,000.00 </h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6 lg-6 sm-12">
                                        <div class="panel" id="dashboard-card-2" style="height:320px;">
                                                <h5 class="text-left" id="card-header">TALLY(PER POSITIONS)</h5><hr/>
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
