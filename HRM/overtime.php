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
                            <a href="#createOvertime" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;font-weight: bold;margin:7px;border-radius:20px;">ADD NEW RECORD</a>
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


                                $result = $connect->query('SELECT * FROM tblovertime WHERE teamId = "' . $teamId. '"');

                                    if($result->num_rows > 0)
                                    {
                                    while($row = $result->fetch_array())
                                    {
                                        echo '<a href="view-overtime.php?$id=' . $row['overtimeId']. '">';
                                        echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                                        echo "<div class='row'>";
                                        echo '<div class="col-sm-2 col-md-2 col-lg-2">';
                                        echo '<img src="../img/overtime.png" class="img" style="width: 150px;height: 140px;"/>';
                                        echo "</div>";
                                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                                        echo "<h2 class='text-left' id='approval-header'> " . $row['overtimeReason'] ." </h2>";
                                        
                                        $select = $connect->query('SELECT * FROM tblemployees WHERE employeeId = "' . $row['userId']. '"');

                                        while($data = $select->fetch_array()){
                                            echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Filed By: " . $data['employeeFirstname'] ." " . $data['employeeMiddlename']. " " . $data['employeeSurname']. "</h4>";    
                                        }
                                        
                                        echo "<h4 class='text-left' id='approval-body'>Status: " . $row['overtimeStatus']. " </h4>";
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

    <div id="createOvertime" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 80px;">
                  <div class="modal-header">
                    <h4 class="text-left">CREATE OVERTIME RECORD</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="overtime.php">
                        <input type="hidden" name="teamId" value="<?php echo $teamId;?>">
                        <label>Employee Name:*</label>
                        <?php

                            include('../connect.php');

                            error_reporting(0);

                            $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$teamId'");                                      
                                                        
                            echo '<select class="form-control" name="employeeName" required="required">';
                            echo '<option>--- </option>';
                            while($row = $employees->fetch_array())
                            {
                                echo '<option value="' . $row['employeeId']. '">' . $row['employeeFirstname']. ' ' . $row['employeeMiddlename']. ' ' . $row['employeeSurname']. '</option>';                   
                            }

                            echo '</select><br/>';

                        ?>
                                                
                        <div class="row">
                            <div class="col-md-6 lg-6 sm12">
                                <label>From: *</label>
                                <input type="time" name="from" class="form-control" required>
                            </div>
                            <div class="col-md-6 lg-6 sm12">
                                <label>To: *</label>
                                <input type="time" name="to" class="form-control" required>
                            </div>
                        </div><br/>

                        <label>Date of Overtime:</label>
                        <input type="date" name="date" class="form-control" required><br/>

                        <label>Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" required="required" placeholder="State Your Reason" style="height:90px; margin-bottom: 10px;">
                                    
                        </textarea>

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

    error_reporting(0);

    include('../connect.php');


    if(isset($_POST['submit'])){
        $team = $_POST['teamId'];
        $employeeName = $_POST['employeeName'];        
        $from = $_POST['from'];
        $date = $_POST['date'];
        $to = $_POST['to'];
        $reason = $_POST['reason'];

        $overtime = $connect->query("INSERT INTO `tblovertime`(`teamId`, `userId`, `overtimeDate`, `overtimeFrom`, `overtimeTo`, `overtimeHours`, `overtimeReason`, `overtimeStatus`) VALUES ('$team','$employeeName', '$date', '$from','$to','','$reason', 'APPROVED')");

        if($overtime === true){
            print '<script>alert("Leave Record successfully added");</script>';
            print '<script>window.location.assign("overtime.php");</script>';
        }
        else{
            print '<script>console.log("Mali");</script>';     
        }

    }







?>