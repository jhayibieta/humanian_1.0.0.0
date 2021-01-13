<!DOCTYPE html>
<html>
<head>

<?php

session_start();

include('connect.php');


if($_SESSION['dbId'])
{

}
else
{


}

$user = $_SESSION['dbId'];
$users = $_SESSION['dbId'];


$select = $connect->query('SELECT * FROM tblusers WHERE ID = "' . $users .'"');

while($row = $select->fetch_array()){

  $team = $row['teamId'];
  $userName = $row['userName'];
}

$result = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

while($row = $result->fetch_array()){
	$pic = $row['employeePicture'];
}
?>
	<title>HUMANIAN - The Human Resource Portal</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css" media="all"/>
    <link rel="stylesheet" href="css/bootstrap-glyphicons.css" >

    <!--for cam-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
	<style type="text/css">
		h2.text-center {
		    font-size: 40px;
		    margin-top: 30px;
		    font-weight: bold;
		    color: #008076;
		}
	</style>
<body id="top">

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<form>
					<input class="form-control" name="POST" id="post" placeholder="Write Something..">
				</form>						
			</div>
		</nav><hr/>

	<div class="container-fluid" style="margin-top:60px;margin-bottom:60px;">
  		<div class="row">
  			<div class="col-lg-6 col-sm-6 col-md-6">
  				<a href="self-service-leave.php" style="text-decoration: none">
  				<div class="panel" id="self-services" style="height: 150px;box-shadow: 1px 1px 1px 1px #ccc;padding: 20px;">
				  <div class='row' style='display:inline-flex'>
				  	<div class="col-sm-2 col-md-2 col-lg-2">
					  <span class="glyphicon glyphicon-calendar" style='font-size:60px;font-weight:bold;color:#008076;'></span>
					</div>
					<div class="col-sm-10 col-md-10 col-lg-10" style="padding-left:0px;">
						<h2 class="text-left" style='font-size:25px;font-weight:bold;color:#008076;margin-top: auto;'>Time-Offs</h2>
						<ul type="dots" style="color:#000;padding-left: 15px;">
							<li>Time-Offs Request Viewer</li>
							<li>Request Time-Off</li>
						</ul>
					</div>
				  </div>
					  
  				</div>
  				</a>
  			</div>
  			<div class="col-lg-6 col-sm-6 col-md-6">
  				<a href="self-service-overtime.php" style="text-decoration: none">
  				<div class="panel" id="self-services" style="height: 150px;box-shadow: 1px 1px 1px 1px #ccc;padding: 20px;">
				  <div class='row' style='display:inline-flex'>
				  	<div class="col-sm-2 col-md-2 col-lg-2">
					  <span class="glyphicon glyphicon-time" style='font-size:60px;font-weight:bold;color:#008076;'></span>
					</div>
					<div class="col-sm-10 col-md-10 col-lg-10" style="padding-left:0px;">
						<h2 class="text-left" style='font-size:25px;font-weight:bold;color:#008076;margin-top: auto;'>Overtime</h2>
						<ul type="dots" style="color:#000;padding-left: 15px;">
							<li>Overtime Request Viewer</li>
							<li>Request Overtime</li>
						</ul>
					</div>
				  </div>
					  
  				</div>
  				</a>
  			</div>
  			<div class="col-lg-6 col-sm-6 col-md-6">
  				<a href="self-service-hr-concern.php" style="text-decoration: none">
  				<div class="panel" id="self-services" style="height: 150px;box-shadow: 1px 1px 1px 1px #ccc;padding: 20px;">
				  <div class='row' style='display:inline-flex'>
				  	<div class="col-sm-2 col-md-2 col-lg-2">
					  <span class="glyphicon glyphicon-book" style='font-size:60px;font-weight:bold;color:#008076;'></span>
					</div>
					<div class="col-sm-10 col-md-10 col-lg-10" style="padding-left:0px;">
						<h2 class="text-left" style='font-size:25px;font-weight:bold;color:#008076;margin-top: auto;'>HR Concerns</h2>
						<ul type="dots" style="color:#000;padding-left: 15px;">
							<li>HR Concerns Viewer</li>
							<li>File HR Concerns</li>
						</ul>
					</div>
				  </div>
					  
  				</div>
  				</a>
  			</div>  			
  		</div>
	</div>

	<?php include('nav.php');?>
	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
