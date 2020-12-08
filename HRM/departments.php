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

    <?php include("../sidebar-hrm.php");?>
    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">

                <div class="panel" style="height:50px;box-shadow: 0px 0px 17px 0px #ccc;">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <a href="#addNewDepartmentModal" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;
    font-weight: bold;margin:7px;border-radius:20px;">ADD NEW DEPARTMENT</a>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-5">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                                <input type="text" name="search" class="form-control" style="margin:7px;border-radius:20px;" placeholder="Search"/>
                        </div>
                    </div>

                </div>

                <?php

  								include('../connect.php');

  								error_reporting(0);


  								$result = $connect->query('SELECT * FROM tbldepartments WHERE userId = "' . $users. '"');

                  if($result->num_rows > 0)
							    {
    								while($row = $result->fetch_array())
    								{
    									echo '<a href="approval-info.php?$id=' . $row['departmentId']. '">';
    									echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
    									echo "<div class='row'>";
    									echo '<div class="col-sm-2 col-md-2 col-lg-2">';
    									echo '<img src="../img/HUMANIAN-LOGO.png" class="img" style="width:150px;height:125.5px;margin-top: 10px;"/>';
                      echo "</div>";
    									echo '<div class="col-sm-10 col-md-10 col-lg-10">';
    									echo "<h2 class='text-left' id='approval-header'> " . $row['departmentName'] ." </h2>";
    									echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Field of Work: " . $row['departmentField'] ."</h4>";

                      $manager = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '" . $row['managerId']. "'");

                      while($data = $manager->fetch_array()){
                          echo "<h4 class='text-left' id='approval-body'>Manager: " . $data['employeeFirstname']. " " . $data['employeeMiddlename'].  " " . $data['employeeSurname'].  "</h4>";   
                      }
    									echo "</div>";
    									echo "</div>";
    									echo "</div>";
    									echo '</a>';

    								}
                  }
                  else{
										echo '<h3 class="text-center">No Records Found</h3>';
									}



                  ?>

            </div>
        </div>
    </div>

    <div id="addNewDepartmentModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:400px;margin-top: 150px;">
                  <div class="modal-header">
                        <h4 class="text-left">ADD NEW DEPARTMENT</h4>

                  </div>
                  <div class="modal-body">
                    <form method="POST" action="departments.php">
                        <input type="hidden" name="userId" value="<?php echo $users;?>">
                        <input type="hidden" name="companyId" value="<?php echo $teamId;?>">
                        <label>Department Name:</label>
                        <input type="text" name="department" class="form-control" reuiqred="required"/></br>
                        <label>Field of Work:</label>
                        <input type="text" name="field" class="form-control" reuiqred="required"/></br>
                        <label>Manager:</label>
                        <select class="form-control" name="manager" reuiqred="required"/>
                            <?php

                                include('connect.php');

                                $select = $connect->query("SELECT * FROM tblusers WHERE userId = '$teamId'");

                                while ($row = $select->fetch_array()) {
                                    echo '<option value="' . $row['ID']. '">' . $row['userName']. '</option>';
                                }



                            ?>
                        </select><br/>
                        <div class="row">
                          <div class="col-sm-6 col-md-6 col-lg-6">
                                <button type="button" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;" data-dismiss="modal">CLOSE FORM</button>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-6">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" style="background-color: #008076;
            font-weight: bold;border-radius:20px;" value="SAVE DEPARTMENT">
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


    $companyId = $_POST['companyId'];
    $departmentName = $_POST['department'];
    $departmentField = $_POST['field'];
    $userId = $_POST['userId'];


    if(isset($_POST['submit'])){

       $insert = $connect->query("INSERT INTO `tbldepartments`(`userId`, `departmentCompany`, `departmentName`, `departmentField`) VALUES ('$userId','$companyId','$departmentName','$departmentField')");

       if($insert === TRUE){
         print '<script>alert("This team department successfully created.")</script>';
         echo '<scritp>windows.location.assign("departments.php");</script>';

       }
       else{
         print '<script>alert("Something Went Wrong.")</script>';
         echo '<scritp>windows.location.assign("departments.php");</script>';

       }
    }




?>
