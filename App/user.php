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

    <script src="js/bootstrap.min.js"></script>

</head>
<body id="top">

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<form>
					<input class="form-control" name="POST" id="post" placeholder="Write Something..">
				</form>						
			</div>
		</nav><hr/>

	<div class="container-fluid" style="margin-top:70px;">
	<?php

			include('../connect.php');

			$feeds = $connect->query("SELECT * FROM tblfeeds WHERE teamId = '$team' ORDER BY feedId DESC");

			while($row = $feeds->fetch_array()){

				echo '<div class="panel" id="dashboard-card" style="height:100%">';
				echo '<div class="row" id="post-row" style="display: inline-flex;">';
				

				$user = $connect->query("SELECT * FROM tblemployees WHERE userId = '" . $row['userId']. "'");

				while($data = $user->fetch_assoc()){
				echo '<div class="col-md-2 lg-2 sm-2" style="padding-right:0px;">';
				echo '<img src="../img/'. $data['employeePicture'].'" id="feeds-user-image" style="width:60px;height:60px;margin-top: 19px;margin-left: 10px;border-radius: 72px;border: 1px solid #ccc;"/>';  
				echo '</div>';
				echo '<div class="col-md-9 lg-9 sm-9" style="padding-left: 0px;">';
				echo '<h5 class="text-left" style="font-weight: bold;margin-bottom: 2px;margin-top: 32px;margin-left:10px">'. $data['employeeFirstname'].' ' . $data["employeeMiddlename"]. ' ' . $data['employeeSurname']. '</h5>';
				echo '<p class="text-left" style="margin-left:10px">A day ago</p>';
				echo '</div>';  
				}
				echo '</div>';
				
				echo '<h5 class="text-left" style="margin-left:10px;margin-bottom:30px;margin-top:25px;">'. $row["feedContent"]. '</h5>';

				if($row['feedImage'] !== ''){
				echo '<img src="../img/' . $row["feedImage"]. '" id="feeds-image" style="width: 100%;border: 1px solid #ccc;"/>';
				}
				else{ 
				
				}
				
				
				
				echo '</div>';

			}

		?>
	</div>

	<?php include('nav.php');?>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
