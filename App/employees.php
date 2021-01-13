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

                    include('connect.php');

                    $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$team'");
 
                    
                    if($employees->num_rows > 0)
                    {
                      echo '<a href="employee.php" style="color:#008076;">';
                      echo '<div class="row">';

                    while ($row = $employees->fetch_array()) {
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<div class="panel" id="dashboard-card" style="height:100%; padding-bottom:10px; margin-bottom:5px;">';
                        echo '<div class="container-fluid">';
                        echo '<div class="row" style="display: inline-flex;">';
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<img src="../img/' . $row['employeePicture']. '" class="img" style="width:80px;height:80px;margin-top: 5px; border:1px solid #ccc; border-radius:50px;"/>';
                        echo '</div>';
                        echo '<div class="col-md-8 lg-8 sm-8">';
                        echo "<p class='text-left' style='margin-top: 20px;font-weight:bold;font-size: 13px;margin-bottom: 3px;'> " . $row['employeeFirstname'] ." " . $row['employeeMiddlename']. " " . $row['employeeSurname']. " </p>";
                        echo "<p class='text-left'>" . $row['employeePosition']. "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }                 

                    echo '</div>';
                    echo '</a>';
                  }
                  else{
                      echo '<h4 class="text-center">No Records Yet</h4>';

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
