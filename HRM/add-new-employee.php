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
    <script type="text/javascript">
      function getBack(){
        window.location.assign('employees.php');
      }
    </script>
<body id="top">

    <?php include("../sidebar-hrm.php");?>
    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">

                <div class="panel" style="height:500px;box-shadow: 0px 0px 17px 0px #ccc;padding:20px;">
                    <h4 class="text-left" style="color: #008076;font-weight:bold;">ADD NEW EMPLOYEE PROFILE</h4><hr/>
                    <form method="POST" action="add-new-employee.php">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6">
                        <label>First Name * :</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name:" required="required"/></br>
                        <label>Middle Name:</label>
                        <input type="text" class="form-control" name="middleName" placeholder="Middle Name:"/></br>
                        <label>Last Name * :</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name:" required="required"/></br>
                        <label>Position * :</label>
                        <input type="text" class="form-control" name="position" placeholder="Position:" required="required"/></br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-lg-6">
                        <label>Department * :</label>
                        <input type="text" class="form-control" name="department" placeholder="Department:" required="required"/></br>
                        <label>Email * :</label>
                        <input type="email" class="form-control" name="position" placeholder="Email:" required="required"/></br>
                        <label>Confirm Email * :</label>
                        <input type="email" class="form-control" name="department" placeholder="Confirm Email:" required="required"/></br>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                            <button type="button" onclick="getBack()" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;">BACK TO MAIN PAGE</button>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" style="background-color: #008076;
        font-weight: bold;border-radius:20px;" value="SAVE DEPARTMENT">
                      </div>
                    </div>
                    </form>
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

<?php

    include('../connect.php');

    error_reporting(0);

    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $confirm = $_POST['confirmEmail'];
    $password = SHA1('password');
    $fullName = $firstName . ' ' . $middleName . ' ' . $lastName;

    $select  = $connect->query("SELECT max(ID) as userId from tblusers");

    while($row = $select->fetch_array()){
      $userId = $row['userId'];
    }

    if(isset($_POST['submit'])){


      $insert = $connect->query("INSERT INTO `tblemployees`(`userId`, `teamId`, `employeeFirstname`, `employeePicture`, `employeeMiddlename`, `employeeSurname`, `employeePosition`)
       VALUES ('$users','$teamId','$firstName','Humanian-logo.png','$middleN  ame','$lastName','$position')");

      $insert = $connect->query("INSERT INTO `tblusers`(`userName`, `userEmail`, `userPassword`, `userType`, `userStatus`) VALUES ('$fullName','$email','$password','3','1')");

      if($insert === TRUE){
          print '<script>alert("Employee Successfully Registered");</script>';
          print '<script>window.location.assign("employees.php");</script>';
      }
      else{

      }
    }


?>