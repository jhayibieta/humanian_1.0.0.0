<?php 
      
      include("../sidebar-hrm.php");
      include("../connect.php");

      $id = $_GET['$id'];

      $employee = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

      while($row = $employee->fetch_array()){
        $fname = $row['employeeFirstname'];
        $mname = $row['employeeMiddlename'];
        $sname = $row['employeeSurname'];
        $pic = $row['employeePicture'];
        $position = $row['employeePosition'];
        $start = $row['employeeStartDate'];

      }

      $details = $connect->query("SELECT * FROM tbldetails WHERE employeeId = '$id'");

      while($row = $details->fetch_array()){
        $detailage = $row['detailAge'];
        $birthdate = $row['detailBirthdate'];
        $status = $row['detailStatus'];
        $lot = $row['detailHouselot'];
        $brgy = $row['detailBarangaycity'];
        $country = $row['detailCountry'];
        $zip = $row['detailPostalCode'];
        $gender = $row['detailGender'];
        $contact = $row['detailContact'];
      }

      $feeds = $connect->query("SELECT * FROM tblfeeds WHERE employeeId = '$id'");

      while($row = $feeds->fetch_array()){
          $feedContent = $row['feedContent'];
          $feedImage = $row['feedImage'];
          $feedCreated = $row['feedCreated'];
      }
    ?>
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
    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10 ">
            <div class="container" id="dashboard-container">
    
                <div class="row">
                    <div class="col-md-8 lg-8 sm-8">
                        <div class="panel" style="height:100px;box-shadow: 0px 0px 17px 0px #ccc;padding:12px;">
                             <div class="row">
                                <dïv class="col-md-2 lg-2 sm-2">
                                    <img src="../img/<?php echo $pic;?>" class="img" style="height:74px;border: 1px solid #ccc;border-radius: 45px;width: 76px;">
                                </dïv>
                                <dïv class="col-md-6 lg-6 sm-6" style="padding-left: 0px;">
                                    <h4 class="text-left" style="color:#008076;font-weight: bold; margin-top: 14px;"><?php echo $fname . ' ' . $mname .' ' . $sname ?></h4>
                                    <h5 class="text-left"><?php echo $position;?></h5>
                                </dïv>
                                <div class="col-md-4 lg-4 sm-4">
                                    <h5 class="text-left" style="margin-top: 14px;"><span style="color:#008076;font-weight: bold;">DATE JOINED:</span> <?php echo $start;?></h5>
                                    <h5 class="text-left" style="margin-top: 14px;"><span style="color:#008076;font-weight: bold;">STATUS:</span> &nbsp; <?php echo $status;?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="panel" style="height:425px;box-shadow: 0px 0px 17px 0px #ccc; overflow: scroll;">
                             <h5 class="text-left" id="card-header">EMPLOYEE'S DAILY FEEDS:</h5><hr/>
                             <div class="container-fluid">
                                <div class="row">
                                    <dïv class="col-md-2 lg-2 sm-2">
                                        <img src="../img/<?php echo $pic;?>" class="img" style="height:74px;border: 1px solid #ccc;border-radius: 45px;width: 76px;">
                                    </dïv>
                                    <dïv class="col-md-6 lg-6 sm-6" style="padding-left: 0px;">
                                        <h4 class="text-left" style="color:#008076;font-weight: bold; margin-top: 14px;"><?php echo $fname . ' ' . $mname .' ' . $sname ?></h4>
                                        <h5 class="text-left"><?php echo $position;?></h5>
                                    </dïv>
                                    <div class="col-md-4 lg-4 sm-4">
                                    <h5 class="text-left" style="margin-top: 14px;"><span style="color:#008076;font-weight: bold;">POSTED ON:</span> <?php echo $feedCreated ?></h5>
                                </div>

                                <h5 class="text-left" style="position: relative; right: 390px; top: 50px"><?php echo $feedContent; ?></h5>
                                <img src="../img/<?php echo $feedImage ?>" id="feeds-image" style="width: 100%; border: 1px solid #ccc; margin-top: 60px;"/>'
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" style="height:422px;box-shadow: 0px 0px 17px 0px #ccc; overflow: scroll">
                          <h5 class="text-left" id="card-header">201 FILE RECORDS:</h5><hr/>
                              <div class="container-fluid">
                              <p class="text-left">AGE : <?php echo $detailage; ?></p>
                               <p class="text-left">GENDER : <?php echo $gender; ?></p>   
                               <p class="text-left">BIRTHDATE : <?php echo $birthdate;?></p>
                               <p class="text-left">CONTACT NO. : <?php echo $contact;?></p>
                               <p class="text-left">ADDRESS : <span> <?php echo $lot . ' ' . $brgy;?></span></p>
                               <p class="text-left">COUNTRY : <span> <?php echo $country;?></span></p>
                               <p class="text-left">ZIP CODE : <span> <?php echo $zip;?></span></p>
                                <p class="text-left">SSS : </p>
                               <p class="text-left">PHIL HEALTH : </p>   
                               <p class="text-left">PAGIBIG : </p>
                               <p class="text-left">BIR/TIN : </p>
                              </div>

                              <div class="row" style="padding: 15px;">
                                    <div class="col-md-6 lg-6 sm-6">
                                        <a href="resolve-hr-concern.php?$id=<?php echo $_GET['$id'];?>" class="btn btn-block btn-success" style="background-color: #008076;border-radius:25px;font-weight: bold; overflow-wrap:">ACTIVATE</a>
                                    </div>
                                    <div class="col-md-6 lg-6 sm-6">
                                        <a href="on-hold-hr-concern.php?$id=<?php echo $_GET['$id'];?>" class="btn btn-block btn-warning" style="border-radius:25px;font-weight: bold;">DEACTIVATE</a>
                                        
                                    </div>
                                    <div class="col-md-6 lg-6 sm-6">
                                        <a href="on-hold-hr-concern.php?$id=<?php echo $_GET['$id'];?>" class="btn btn-block btn-primary" style="border-radius:25px;font-weight: bold;">MODIFY</a>
                                    </div>
                                    <div class="col-md-2 lg-2 sm-2">
                                    </div>
                                    <div class="col-md-2 lg-2 sm-2">
                                    </div>
                                    <div class="col-md-6 lg-6 sm-6">
                                        <a href="hr-concerns.php" class="btn btn-block btn-danger" style="border-radius:25px;font-weight: bold;">CANCEL</a>
                                    </div>
                                </div>
                        </div>
                        
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
