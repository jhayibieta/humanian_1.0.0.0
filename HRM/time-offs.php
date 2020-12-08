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

   <style type="text/css">
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
            color: #555;
            cursor: default;
            background-color: #008076;
            color: #fff;
            font-weight: bold;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
       
   </style>
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
                          <a href="#leaveCraedit" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;font-weight: bold;margin:7px;border-radius:20px;">LEAVE MANAGER</a>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-5">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <form method="POST">
                                <input type="text" name="search" class="form-control" style="margin:7px;border-radius:20px;" placeholder="Search"/>
                            </form>
                        </div>
                    </div>
                    </div>


                    <?php

                                include('../connect.php');

                                error_reporting(0);


                                $result = $connect->query('SELECT * FROM tbltimeoff WHERE teamId = "' . $teamId. '"');

                                    if($result->num_rows > 0)
                                    {
                                    while($row = $result->fetch_array())
                                    {
                                        echo '<a href="view-time-offs.php?$id=' . $row['toId']. '">';
                                        echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                                        echo "<div class='row'>";
                                        echo '<div class="col-sm-2 col-md-2 col-lg-2">';

                                        if($row['toType'] === "VACATION LEAVE"){
                                            echo '<img src="../img/VL.png" class="img" style="width: 150px;height: 140px;"/>';
                                        
                                        }
                                        elseif($row['toType'] === "SICK LEAVE / EMERGENCY LEAVE"){
                                            echo '<img src="../img/SL.png" class="img" style="width: 150px;height: 140px;"/>';
                                        
                                        }
                                        echo "</div>";
                                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                                        echo "<h2 class='text-left' id='approval-header'> " . $row['toType'] ." </h2>";
                                        
                                        $select = $connect->query('SELECT * FROM tblusers WHERE ID = "' . $row['userId']. '"');

                                        while($data = $select->fetch_array()){
                                            echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Filed By: " . $data['userName'] ."</h4>";    
                                        }
                                        
                                        echo "<h4 class='text-left' id='approval-body'>Status: " . $row['toStatus']. " </h4>";
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

        <div id="leaveCraedit" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:950px;margin-left: -120px;">
                  <div class="modal-header">
                        <h4 class="text-left">LEAVE MANAGER</h4>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2 lg-2 sm-2" style="padding: 0px;border-right:1px solid #ddd; height: 100%">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#leaveType" style="border-radius: 0px;border-bottom: 1px solid #ddd;width:100%">CREATE LEAVE TYPE</a></li>
                                  <li><a data-toggle="tab" href="#ViewLeaveType" style="border-radius: 0px;border-bottom: 1px solid #ddd;width:100%">VIEW ALL LEAVE TYPES</a></li>
                                  <li><a data-toggle="tab" href="#addLeaveCredits" style="border-radius: 0px;border-bottom: 1px solid #ddd;">ADD LEAVE CREDITS</a></li>
                                  <li><a data-toggle="tab" href="#assignLeaveCredits" style="border-radius: 0px;border-bottom: 1px solid #ddd;">ASSIGN LEAVE TYPE</a></li>
                                  
                                </ul>

                            </div>
                            <div class="col-md-10 lg-10 sm-10">
                                <div class="tab-content">
                                  <div id="leaveType" class="tab-pane fade in active">
                                    <h5 style="margin-bottom: 20px;margin-left:0px;" id="card-header">CREATE LEAVE TYPE</h5><hr/>
                                        <div class="row">
                                            <div class="col-md-6 lg-6 sm-6">
                                                <form method="POST" action="time-offs.php">
                                                    <input type="hidden" name="team" value="<?php echo $teamId;?>">
                                                    <label>Leave Type Name:*</label>
                                                    <input type="text" name="name" class="form-control" required="required">
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-6 lg-6 sm-6">
                                                             <label>Leave Credits:*</label>
                                                             <input type="number" name="credits" class="form-control" required="required">
                                                        </div>
                                                        <div class="col-md-6 lg-6 sm-6">
                                                             <label>Accrue:*</label>
                                                             <input type="number" name="accrue" class="form-control" required="required">
                                                        </div>
                                                    </div><br/>
                                                    <label>Description:*</label>
                                                    <textarea class="form-control" name="description" style="height:70px;" required></textarea><br/>
                                                    <div class="row">
                                                              <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <button type="button" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;" data-dismiss="modal">CLOSE FORM</button>
                                                              </div>
                                                              <div class="col-sm-6 col-md-6 col-lg-6">
                                                                    <input type="submit" name="saveLeaveType" class="btn btn-primary pull-right" style="background-color: #008076;
                                                font-weight: bold;border-radius:20px;" value="SAVE LEAVE TYPE">
                                                              </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 lg-6 sm-6">
                                            </div>
                                        </div>
                                     
                                  </div>
                                  <div id="ViewLeaveType" class="tab-pane fade">
                                    <h5 style="margin-bottom: 20px;margin-left:0px;" id="card-header">VIEW ALL LEAVE TYPES</h5><hr/>
                                    
                                    <?php

                                        include('../connect.php');

                                        error_reporting(0);



                                        $leaveTypes = $connect->query("SELECT * FROM tblleavetypes WHERE teamId = '$teamId'");                                      
                                        if($leaveTypes->num_rows > 0)
                                        {
                                            echo '<table class="table table-striped">';
                                            echo '<thead>';
                                            echo '<tr><th>ID</th><th>Leave Type</th><th>Credits</th><th>Accrue</th><th>Description</th><th>Actions</th></tr>';
                                            echo '</thead>';
                                            echo '<tbody>';

                                            while($row = $leaveTypes->fetch_array())
                                            {
                                                echo '<tr>';
                                                echo '<td>' . $row['ltId']. '</td>';
                                                echo '<td>' . $row['ltName']. '</td>';
                                                echo '<td>' . $row['ltCredits']. '</td>';
                                                echo '<td>' . $row['ltAccrue']. '</td>';
                                                echo '<td>' . $row['ltDescription']. '</td>';
                                                echo '<td><a href="" class="btn btn-primary" style="background-color: #008076;
                                                font-weight: bold;border-radius:20px;">EDIT</a>';
                                                echo '</tr>';
                                            }

                                            echo '</tbody>';
                                            echo '</table>';
                                        }
                                        else{
                                            echo '<h3 class="text-center">No Records Found</h3>';
                                        }

                                    ?>
                        
                                  </div>

                                  <div id="addLeaveCredits" class="tab-pane fade">
                                    <h5 style="margin-bottom: 20px;margin-left:0px;" id="card-header">ADD LEAVE CREDITS</h5><hr/>
                                    <div class="row">
                                        <div class="col-md-6 lg-6 sm-6">
                                            <form method="POST" action="time-offs.php">
                                                <label>Leave Type:*</label>
                                                <?php

                                                    include('../connect.php');

                                                    error_reporting(0);

                                                    $leaveTypes = $connect->query("SELECT * FROM tblleavetypes WHERE teamId = '$teamId'");                                      
                                                        
                                                        echo '<select class="form-control" name="type-name" required="required">';
                                                        echo '<option>--- </option>';
                                                        while($row = $leaveTypes->fetch_array())
                                                        {
                                                            echo '<option value="' . $row['ltId']. '">' . $row['ltName']. '</option>';
                                                            
                                                        }

                                                        echo '</select>';

                                                ?>
                                                
                                                <br/>
                                                <label>Additional Credits:*</label>
                                                <input type="text" name="addCredits" class="form-control" required="required"><br/>        
                                                <div class="row">
                                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <button type="button" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;" data-dismiss="modal">CLOSE FORM</button>
                                                  </div>
                                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <input type="submit" name="addLeaveCredits" class="btn btn-primary pull-right" style="background-color: #008076;
                                    font-weight: bold;border-radius:20px;" value="ADD LEAVE CREDITS">
                                                  </div>
                                                </div>
                                            </form>       
                                        </div>
                                                 
                                        </div>
                                        <div class="col-md-6 lg-6 sm-6">
                                            
                                        </div>
                                    </div>
                                  
                                  <div id="assignLeaveCredits" class="tab-pane fade">
                                    <h5 style="margin-bottom: 20px;margin-left:0px;" id="card-header">ASSIGN LEAVE TYPE</h5><hr/>
                                    <div class="row">
                                        <div class="col-md-6 lg-6 sm-6">
                                            <form method="POST" action="time-offs.php">
                                                <label>Employee Name:*</label>
                                                <?php

                                                    include('../connect.php');

                                                    error_reporting(0);

                                                    $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$teamId'");                                      
                                                        
                                                        echo '<select class="form-control" name="employee-name" required="required">';
                                                        echo '<option>--- </option>';
                                                        while($row = $employees->fetch_array())
                                                        {
                                                            echo '<option value="' . $row['employeeId']. '">' . $row['employeeFirstname']. ' ' . $row['employeeMiddlename']. ' ' . $row['employeeSurname']. '</option>';
                                                            
                                                        }

                                                        echo '</select><br/>';

                                                ?>
                                                <br/>
                                                <label>Leave Type:*</label>
                                                <?php

                                                    include('../connect.php');

                                                    error_reporting(0);

                                                    $leaveTypes = $connect->query("SELECT * FROM tblleavetypes WHERE teamId = '$teamId'");                                      
                                                        
                                                        echo '<select class="form-control" name="assigned-leave-type" required="required">';
                                                        echo '<option>--- </option>';
                                                        while($row = $leaveTypes->fetch_array())
                                                        {
                                                            echo '<option value="' . $row['ltId']. '">' . $row['ltName']. '</option>';
                                                            
                                                        }

                                                        echo '</select><br/>';

                                                ?>        
                                                <div class="row">
                                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <button type="button" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;" data-dismiss="modal">CLOSE FORM</button>
                                                  </div>
                                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <input type="submit" name="assignLeaveType" class="btn btn-primary pull-right" style="background-color: #008076;
                                    font-weight: bold;border-radius:20px;" value="ASSIGN LEAVE TYPE">
                                                  </div>
                                                </div>
                                            </form>       
                                        </div>
                                        <div class="col-md-6 lg-6 sm-6">
                                            
                                        </div>
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


<?php

    include('../connect.php');

    error_reporting(0);


    if(isset($_POST['saveLeaveType'])){
        $name = $_POST['name'];
        $credits = $_POST['credits'];
        $accrue = $_POST['accrue'];
        $desc = $_POST['description'];
        $team = $_POST['team'];

        $saveLeavetype = $connect->query("INSERT INTO `tblleavetypes` (`teamId`, `ltName`, `ltDescription`, `ltCredits`, `ltAccrue`) VALUES ('$team', '$name', '$desc', '$credits', '$accrue');");

        if($saveLeavetype === TRUE){
            print '<script>alert("' . $name . ' was successfully saved.");</script>';
            print '<script>window.location.assign("time-offs.php");</script>';
        }
        else{
            print '<script>alert("Something went wrong");</script>';
        }
    }

    else if(isset($_POST['addLeaveCredits'])){
        $typeName = $_POST['type-name'];
        $addCredits = $_POST['addCredits'];

        $updateLeaveType = $connect->query("UPDATE tblleavetypes SET ltCredits = ltCredits + '$addCredits' WHERE ltId = '$typeName'");

        
        if($updateLeaveType  === TRUE){
            print '<script>alert("' . $typeName . ' was successfully updated.");</script>';
            print '<script>window.location.assign("time-offs.php");</script>';
        }
        else{
            print '<script>alert("Something went wrong");</script>';
        }      
    }
    else if(isset($_POST['assignLeaveType'])){
        $employee = $_POST['employee-name'];
        $employeeLeaveType = $_POST['assigned-leave-type'];


        $assignLeaveType = $connect->query("INSERT INTO tbluserleavetypes(userId,ltId) VALUES(' " .$employee . "', '" . $employeeLeaveType . "')");

        if($assignLeaveType === TRUE){
            echo '<script>alert("Leave Record successfully added");</script>';
            echo '<script>window.location.assign("time-offs.php");</script>';
        }
        else{
            print '<script>alert("Something went wrong");</script>';
        }

    }
    




?>