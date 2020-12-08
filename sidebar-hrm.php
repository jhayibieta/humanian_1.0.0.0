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


$select = $connect->query('SELECT * FROM tblteams WHERE teamUser = "' . $users .'"');

while($row = $select->fetch_array()){
	$teamId = $row['teamId'];
	$team = $row['teamName'];
}

?>

        <div class="sidebar">
	        <div class="container-fluid" id="sidebar-content">
	        		<img src="../img/Humanian-logo.png" alt="logo" class="logo-nav"/><hr/>


				<a href="../HRM/index.php" class="side-links"><span class="glyphicon glyphicon-dashboard" id="glyph-side"> &nbsp; DASHBOARD</span></a>
				<a href="../HRM/departments.php" class="side-links"><span class="glyphicon glyphicon-home" id="glyph-side"> &nbsp; DEPARTMENTS</span></a>

				<a href="../HRM/positions.php" class="side-links"><span class="glyphicon glyphicon-list-alt" id="glyph-side"> &nbsp; POSITIONS</span></a>
				<a href="../HRM/on-boarding.php" class="side-links"><span class="glyphicon glyphicon-picture" id="glyph-side"> &nbsp; ON-BOARDING</span></a>
				<a href="../HRM/employees.php" class="side-links"><span class="glyphicon glyphicon-user" id="glyph-side"> &nbsp; EMPLOYEES</span></a>
				<a href="../HRM/time-offs.php" class="side-links"><span class="glyphicon glyphicon-calendar" id="glyph-side"> &nbsp; TIME-OFFS</span></a>

				<a href="../HRM/overtime.php" class="side-links"><span class="glyphicon glyphicon-time" id="glyph-side"> &nbsp; OVERTIME</span></a>
				<a href="../HRM/hr-concerns.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; HR CONCERNS</span></a>

				<a href="../HRM/payroll-set-up.php" class="side-links"><span class="glyphicon glyphicon-list" id="glyph-side"> &nbsp;PAYROLL</span></a>


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
					<a href="index.php" class="navbar-brand"></a>
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><span class="glyphicon glyphicon-user" id="glyph"> &nbsp; <?php echo $team; ?></span></a></li>
						<li><a href="settings.php"><span class="glyphicon glyphicon-wrench" id="glyph"></span></a></li>
						<li><a href="sign-out.php"><span class="glyphicon glyphicon-log-out" id="glyph"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
