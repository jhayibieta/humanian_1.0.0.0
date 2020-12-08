<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - Administrator</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php include("../sidebar.php");?>
		<div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
						<div class="container" id="dashboard-container">
							<div class="panel" style="height:40px;box-shadow: 0px 0px 17px 0px #ccc;">

							</div>

							<?php

								include('../connect.php');

								error_reporting(0);


								$result = $connect->query('SELECT * FROM tblusers WHERE userType = "2"');

								while($row = $result->fetch_array())
                {
									echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
									echo "<h2 class='text-left' id='approval-header'> " . $row['userName'] ." </h2><br>";
									echo "<h4 class='text-left' id='approval-body'>Address: 1782 Lapu-Lapu st. lower Tawi Tawi Brgy: 181 Pangarap Village Caloocan City</h4>";
									echo "<h4 class='text-left' id='approval-body'>Manager: Kim Jasper Ibieta</h4>";
									echo "</div>";


                }




							?>

						</div>
				</div>
        </div>
    </div>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
