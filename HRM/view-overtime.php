<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - HRM</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php 
            include("../sidebar-hrm.php");
            include("../connect.php");

            $timeoff = $connect->query("SELECT * FROM tblovertime WHERE overtimeId = '" . $_GET['$id'] . "'");

            while($row = $timeoff->fetch_array()){
                $ot = $row['overtimeId'];
                $id = $row['userId'];
                $start = $row['overtimeFrom'];
                $end = $row['overtimeTo'];
                $reason = $row['overtimeReason'];
                $status = $row['overtimeStatus'];      
            }

            $filer = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

            while($row = $filer->fetch_array()){
                $fname = $row['employeeFirstname'];
                $mname = $row['employeeMiddlename'];
                $sname = $row['employeeSurname'];
                $position = $row['employeePosition'];
                $pic = $row['employeePicture'];
            }
            
    ?>
    
    
	<div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
    
                <div class="row">
                    <div class="col-md-8 lg-8 sm-8">
                        <div class="panel" style="height:100px;box-shadow: 0px 0px 17px 0px #ccc;padding:12px">
                            <div class="row">
                                <dïv class="col-md-2 lg-2 sm-2">
                                    <img src="../img/<?php echo $pic;?>" class="img" style="height:74px;border: 1px solid #ccc;border-radius: 45px;width: 76px;">
                                </dïv>
                                <dïv class="col-md-6 lg-6 sm-6" style="padding-left: 0px;">
                                    <h4 class="text-left" style="color:#008076;font-weight: bold; margin-top: 14px;"><?php echo $fname . ' ' . $mname .' ' . $sname ?></h4>
                                    <h5 class="text-left"><?php echo $position;?></h5>
                                </dïv>
                                <div class="col-md-4 lg-4 sm-4">
                                    <h5 class="text-left" style="margin-top: 14px;"><span style="color:#008076;font-weight: bold;">STATUS:</span> <?php echo $status;?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="panel" style="height:300px;box-shadow: 0px 0px 17px 0px #ccc;">
                                <h5 class="text-left" id="card-header">EMPLOYEE'S REASON:</h5><hr/>
                                <p class="text-left" style="text-indent: 50px;"><?php echo $reason;?></p>
                        </div>
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" style="height:100px;box-shadow: 0px 0px 17px 0px #ccc;">
                            <h5 class="text-left" id="card-header">OVERTIME HOURS:</h5><hr/>
                        </div>
                        <div class="panel" style="height:300px;box-shadow: 0px 0px 17px 0px #ccc;">
                                <h5 class="text-left" id="card-header">TIME (PER HOUR):</h5><hr/>
                        </div>
                        
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="approve-overtime.php?$id=<?php echo $ot;?>" class="btn btn-block btn-success" style="background-color: #008076;border-radius:25px;font-weight: bold;">APPROVE</a>
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="on-hold-overtime.php?$id=<?php echo $ot;?>" class="btn btn-block btn-warning" style="border-radius:25px;font-weight: bold;">ON-HOLD</a>
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="reject-overtime.php?$id=<?php echo $ot;?>" class="btn btn-block btn-danger" style="border-radius:25px;font-weight: bold;">REJECTED</a>
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="overtime.php" class="btn btn-block btn-danger" style="border-radius:25px;font-weight: bold;">CANCEL</a>
                    </div>
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
