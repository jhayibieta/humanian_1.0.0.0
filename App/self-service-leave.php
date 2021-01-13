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
  		
		  <?php

error_reporting(0);

include('../connect.php');

$employees = $connect->query("SELECT * FROM tbltimeoff WHERE userId = '$users' ORDER BY toId DESC");


if($employees->num_rows > 0)
{
	while($row = $employees->fetch_array()){
		echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
		echo "<div class='row' style='display:inline-flex'>";
		echo '<div class="col-sm-2 col-md-2 col-lg-2">';
		if($row['toType'] === 'VACATION LEAVE'){
			echo '<img src="../img/VL.png" class="img" style="width:90px;height:90px;margin-top: 10px;"/>';
		}
		else{
			echo '<img src="../img/SL.png" class="img" style="width:90px;height:90px;margin-top: 10px;"/>';
		}
		echo "</div>";
		echo '<div class="col-sm-10 col-md-10 col-lg-10" style="padding-left:0px;">';
		echo "<h2 class='text-left' id='approval-header' style='font-size:19px;font-weight:bold;color:#008076;'>" . $row['toType']. "</h2>";
		echo "<h4 class='text-left' id='approval-body' style='margin-top:10px;font-size: 11px;'>FROM: " . $row['toDateFrom']. " TO: ". $row['toDateTo']."</h4>";
		echo "<h4 class='text-left' id='approval-body' style='font-size: 11px;'>Time-Off Status: " . $row['toStatus']. "</h4>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	
}else{
   echo '<h4 class="text-center">No Records Yet</h4>';

}

?>


        
      </div>
  		
	</div>

	<?php include('nav.php');?>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
