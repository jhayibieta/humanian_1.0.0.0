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


    	<div class="sidebar">
	        <div class="container-fluid" id="sidebar-content">
	        		<img src="../img/Humanian-logo.png" alt="logo" class="logo-nav"/><hr/>


				<a href="../Employee/index.php" class="side-links"><span class="glyphicon glyphicon-dashboard" id="glyph-side"> &nbsp; DASHBOARD</span></a>
				<a href="../Employee/employees.php" class="side-links"><span class="glyphicon glyphicon-home" id="glyph-side"> &nbsp; EMPLOYEES</span></a>

				<a href="../Employee/timesheet.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; TIMESHEET</span></a>
				<a href="../Employee/time-offs.php" class="side-links"><span class="glyphicon glyphicon-calendar" id="glyph-side"> &nbsp; TIME-OFFS</span></a>

				<a href="../Employee/overtime.php" class="side-links"><span class="glyphicon glyphicon-time" id="glyph-side"> &nbsp; OVERTIME</span></a>
				<a href="../Employee/hr-concerns.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; HR CONCERNS</span></a>
				<a href="../Employee/attendance.php" class="side-links"><span class="glyphicon glyphicon-camera" id="glyph-side"> &nbsp; ATTENDANCE</span></a>
				

			</div>
        </div>

    	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><span class="glyphicon glyphicon-user" id="glyph"> &nbsp; <?php echo $userName; ?></span></a></li>
					
						<li><a href="sign-out.php"><span class="glyphicon glyphicon-log-out" id="glyph"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>



		

