<!DOCTYPE html>
<html>
<head>
<?php

include('connect.php');
session_start();

if($_SESSION['email']){

}
else{
	header('location:user.php');
}

$user = $_SESSION['email'];
$users = $_SESSION['email'];

$select = $connect->query("SELECT * FROM user WHERE email = '$users'");

while($row = $select->fetch_array()){
	$id = $row['userid'];
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
				<form method="POST">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<input class="form-control" name="POST" id="post" placeholder="Write Something..">
				</form>


			</div>
		</nav><hr/>

		<?php

			include('connect.php');

			
			$query = $connect->query("SELECT * FROM employees WHERE userId = '$id'");

			while($row = $query->fetch_array()){
				$firstname = $row['firstname'];
				$middlename = $row['middlename'];
				$lastname = $row['lastname'];

			}


		?>

	<div class="container-fluid" style="margin-top:70px;overflow-x: hidden;">
		<img src="../img/Humanian-Logo.png" class="log-in" alt="logo"/>
		<h2 class="text-center"><?php echo $firstname . ' ' . $middlename . ' '. $lastname;?> </h2><br>

	</div>

	<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container-fluid">
					<ul class="nav navbar-nav ">
						<li><a href="user.php"><span class="glyphicon glyphicon-home" id="glyph"></span></a></li>
						<li><a href="profile.php"><span class="glyphicon glyphicon-user" id="glyph"></span></a></li>
						<li><a href="time-in.php"><span class="glyphicon glyphicon-camera" id="glyph"></span></a></li>
						<li><a href="self-service.php"><span class="glyphicon glyphicon-file" id="glyph"></span></a></li>
						<li><a href="sign-out.php"><span class="glyphicon glyphicon-log-out" id="glyph"></span></a></li>
						
					</ul>
				
			</div>
		</nav>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
