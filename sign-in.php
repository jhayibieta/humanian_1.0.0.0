<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - The Human Resource Portal</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="css/styles.css"  media="all">

    <script src="js/bootstrap.min.js"></script>

</head>
<body id="top">

	<div class="container">

			<img src="./img/Humanian-Logo.png" class="logo" alt="logo"/>

			<form action="log-in.php" method="POST" id="log-in-form">
				<input class="form-control" type="email" name="email" id="Email" placeholder="Email:" required="required"><br/>
				<input class="form-control" type="password" name="password" id="Password" placeholder="Password:" required="required"/><br/>
				<button name="submit" id="log-in-button" class="btn btn-success btn-block">LOG-IN</button>

				<div class="row">
					<div class="col-md-6 lg-6">
						<a class="btn btn-link" id="left">Forgot Password?</a>
					</div>
					<div class="col-md-6 lg-6">
						<a href="register-01.php" class="btn btn-link" id="right">Create Account</a>
					</div>
				</div>

			</form>


	</div>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
