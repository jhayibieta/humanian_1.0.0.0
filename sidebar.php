<?php

error_reporting(0);
session_start();
if($_SESSION['username'])
{

}
else
{


}

$user = $_SESSION['email'];
$users = $_SESSION['email'];


?>

        <div class="sidebar">
	        <div class="container-fluid" id="sidebar-content">
	        		<img src="../img/Humanian-logo.png" alt="logo" class="logo-nav"/><hr/>


				<a href="../Admin/index.php" class="side-links"><span class="glyphicon glyphicon-dashboard" id="glyph-side"> &nbsp; DASHBOARD</span></a>
				<a href="../Admin/approvals.php" class="side-links"><span class="glyphicon glyphicon-thumbs-up" id="glyph-side"> &nbsp; APPROVALS</span></a>
				<a href="../Admin/terms.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; TERMS</span></a>
				<a href="../Admin/users.php" class="side-links"><span class="glyphicon glyphicon-user" id="glyph-side"> &nbsp; USERS</span></a>
				<a href="../Admin/teams.php" class="side-links"><span class="glyphicon glyphicon-list" id="glyph-side"> &nbsp; TEAMS</span></a>


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
						<li><a href="index.php"><span class="glyphicon glyphicon-user" id="glyph"> &nbsp; <?php echo $users; ?></span></a></li>
						<li><a href="settings.php"><span class="glyphicon glyphicon-wrench" id="glyph"></span></a></li>
						<li><a href="sign-out.php"><span class="glyphicon glyphicon-log-out" id="glyph"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
