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

    <?php

      include("../sidebar.php");
      include("../connect.php");

      								$result = $connect->query('SELECT * FROM tblteams WHERE teamId = "' . $_GET['$id']. '"');

                      while($row = $result->fetch_array()){
												 $field = $row['teamBusinessfield'];
                         $image = $row['teamImage'];
                         $name = $row['teamName'];
                         $manager = $row['teamUser'];
                         $address = $row['teamAddress'];
												 $empReg = $row['teamEmployeeReg'];
                         $contact = $row['teamContact'];
                         $status = $row['teamStatus'];
                      }



    ?>
		<div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
                <div class="row">
                  <div class="col-sm-2 col-md-2 col-lg-2">
                    <img src="../img/<?php echo $image;?>" style="width:150px;height:150px;">
                  </div>
                  <div class="col-sm-10 col-md-10 col-lg-10">
                    <h2 class='text-left' id='approval-header'> <?php echo $name;?> </h2>
                    <h4 class='text-left' id='approval-body' style='margin-top:20px;'>Address: <?php echo $address;?></h4>
                    <h4 class='text-left' id='approval-body'>Manager: <?php echo $manager;?></h4>
                  </div>
                </div><hr/>
                  <h4 class='text-left' id='approval-body' style='margin-top:20px;'>Details:</h4>
                  <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
											<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Field of Business: </h4>
                      <h4 class='text-left' id='approval-body' >Address: </h4>
                      <h4 class='text-left' id='approval-body'>Manager:</h4>
											<h4 class='text-left' id='approval-body'>Registered Employees:</h4>
											<h4 class='text-left' id='approval-body'>Registration Status:</h4>
                    </div>
                    <div class="col-sm-9 col-md-9 col-lg-9">
											<h4 class='text-left' id='approval-body' style='margin-top:20px;'> <?php echo $field;?></h4>
											<h4 class='text-left' id='approval-body'> <?php echo $address;?></h4>
                      <h4 class='text-left' id='approval-body'> <?php echo $manager;?></h4>
											<h4 class='text-left' id='approval-body'> <?php echo $empReg . ' Employees';?></h4>
                      <h4 class='text-left' id='approval-body'> <?php echo $status;?></h4>
                    </div>
                  </div><hr/>
									<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Company Records:</h4>
									<div class="row">
											<div class="col-md-3 col-lg-3 col-sm-3">
												<h4 class='text-left' id='approval-body' style='margin-top:20px;'>BIR NUMBER: </h4>
												<h4 class='text-left' id='approval-body' >DTI NUMBER: </h4>
												<h4 class='text-left' id='approval-body'>Business Permit: </h4>
	                      <h4 class='text-left' id='approval-body' >BRGY Permit: </h4>
											</div>
											<div class="col-md-6 col-lg-6 col-sm-6">
												<h4 class='text-left' id='approval-body' style='margin-top:20px;'>BIR NUMBER: </h4>
												<h4 class='text-left' id='approval-body' >DTI NUMBER: </h4>
												<h4 class='text-left' id='approval-body'>Business Permit: </h4>
	                      <h4 class='text-left' id='approval-body' >BRGY Permit: </h4>
											</div>
									</div><hr/>
								
				    </div>
        </div>
    </div>

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
