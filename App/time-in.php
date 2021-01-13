<!DOCTYPE html>
<html>
<head>

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
<body id="top">

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<form>
					<input class="form-control" name="POST" id="post" placeholder="Write Something..">
				</form>						
			</div>
		</nav><hr/>

	<div class="container-fluid">
                <div id="my_camera"></div>
  
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

	<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 560,
        height: 450,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
