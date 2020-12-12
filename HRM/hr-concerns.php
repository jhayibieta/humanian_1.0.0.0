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
                            <a href="#addConcerns" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;font-weight: bold;margin:7px;border-radius:20px;">ADD NEW RECORD</a>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-5">
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <form method="GET" id="concernshr">
                                <input type="text" name="search" id="search-concerns" class="form-control" style="margin:7px;border-radius:20px;" placeholder="Search"/>

                                <?php
                                    


                                ?>
                            </form>
                        </div>
                    </div>
			</div>

             <?php

                                include('../connect.php');

                                error_reporting(0);


                                $result = $connect->query('SELECT * FROM tblhrconcern WHERE teamId = "' . $teamId. '"');

                                    if($result->num_rows > 0)
                                    {
                                        echo '<div id="hrconcernresult">';
                                    while($row = $result->fetch_array())
                                    {
                                        echo '<a href="view-hr-concern.php?$id=' . $row['hrcId']. '">';
                                        echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                                        echo "<div class='row'>";
                                        echo '<div class="col-sm-2 col-md-2 col-lg-2">';
                                        echo '<img src="../img/HR-CONCERNS.png" class="img" style="width: 150px;height: 140px;"/>';
                                        echo "</div>";
                                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                                        echo "<h2 class='text-left' id='approval-header'> " . $row['hrcTitle'] ." </h2>";
                                        
                                        $select = $connect->query('SELECT * FROM tblemployees WHERE employeeId = "' . $row['userId']. '"');

                                        while($data = $select->fetch_array()){
                                            echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Filed By: " . $data['employeeFirstname'] . " " . $data['employeeMiddlename'] .  " " . $data['employeeSurname'] .  "</h4>";    
                                        }
                                        
                                        echo "<h4 class='text-left' id='approval-body'>Filed On: " . $row['hrcFiled']. " </h4>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo '</a>';

                                    }

                                        echo '</div>';
                                    }
                                    else{
                                        echo '<h3 class="text-center">No Records Found</h3>';
                                    }



                                ?>
        </div>
    </div>


    <div id="addConcerns" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:480px;margin-top: 80px;">
                  <div class="modal-header">
                    <h4 class="text-left">CREATE HR-CONCERN RECORD</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="hr-concerns.php">
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

                        <label>Title:</label>
                        <select class="form-control" name="title" required="required">
                            <option>--- </option>
                            <option>Employee Relations </option>
                            <option>Salary Matters </option>
                            <option>Date of Regularization </option>
                            <option>Renewal of Contact </option>
                        </select>
                        <br/>

                        <label>Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" required="required" placeholder="State Your Reason" style="height:150px; margin-bottom: 10px;">
                                    
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
    
    <script>
        $(document).ready(function(){
            $('#search-concerns').keyup(function(){
                var form = $('#concernshr');
                $.ajax({
                    method: 'GET',
                    url: 'search-hrconcern.php',
                    data: form.serialize(),
                    success: function(data) {
                        $('#hrconcernresult').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php

    error_reporting(0);

    include('../connect.php');


    if(isset($_POST['submit'])){
        $team = $_POST['teamId'];
        $employee = $_POST['employeeName'];
        $title = $_POST['title'];
        $reason = $_POST['reason'];
        $date = date('y-d-m');

        $overtime = $connect->query("INSERT INTO tblhrconcern(`userId`, `teamId`, `hrcTitle`, `hrcContent`, `hrcFiled`, `hrcStatus`) VALUES ('$employee', '$team','$title','$reason','$date','IN-REVIEW')");

        if($overtime === true){
            print '<script>alert("HR-Concern Successfully Filed");</script>';
            print '<script>window.location.assign("hr-concerns.php");</script>';
        }
        else{
            print '<script>console.log("Mali");</script>';     
        }

    }







?>