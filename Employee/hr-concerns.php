<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - Employee</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php include("../navigation-employee.php");?>

     <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
             <div class="container" id="dashboard-container">

                <!---FOR TABS AND NAVIGATION--->
                    <div class="panel" style="height:50px;box-shadow: 0px 0px 17px 0px #ccc;">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-3">
                                <a href="#modalHRConcerns" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;
        font-weight: bold;margin:7px;border-radius:20px;">FILE HR-CONCERN</a>
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
                    <!---FOR TABS AND NAVIGATION END--->

                                <?php

                                            error_reporting(0);

                                            include('../connect.php');

                                            $hrc = $connect->query("SELECT * FROM tblhrconcern WHERE userId = '$users' ORDER BY hrcId DESC");
                                            

                                            if($hrc->num_rows > 0)
                                            {
                                                while($row = $hrc->fetch_array()){
                                                    echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                                                    echo "<div class='row'>";
                                                    echo '<div class="col-sm-2 col-md-2 col-lg-2">';
                                                    echo '<img src="../img/HR-CONCERNS.png" class="img" style="width:150px;height:125.5px;margin-top: 10px;"/>';
                                                    echo "</div>";
                                                    echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                                                    echo "<h2 class='text-left' id='approval-header'>" . $row['hrcTitle']. "</h2>";
                                                    echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>" . $row['hrcContent']. "</h4>";
                                                    echo "<h4 class='text-left' id='approval-body'>Date Filed: " . $row['hrcFiled']. "</h4>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                                
                                            }else{
                                               echo '<h4 class="text-center">No Records Yet</h4>';

                                            }

                                        ?>
                                        

              
            </div>
        </div>
                   
                

        </div>

        <div id="modalHRConcerns" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:400px;margin-top: 150px;">
                  <div class="modal-header">
                        <h4 class="text-left">FILE HR-CONCERN</h4>

                  </div>
                  <div class="modal-body">
                    <form method="POST" action="hr-concerns.php">

                        <label>Title:</label>

                        <input type="text" class="form-control" name="title" id="title" placeholder="Concern Title" required="required"><br/>

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
        
        $title = $_POST['title'];
        $reason = $_POST['reason'];
        $date = date('y-d-m');

        $overtime = $connect->query("INSERT INTO `tblhrconcern`(`userId`, `hrcTitle`, `hrcContent`, `hrcFiled`) VALUES ('$users','$title','$reason','$date')");

        if($overtime === true){
            print '<script>window.location.assign("hr-concerns.php");</script>';
        }
        else{
            print '<script>console.log("Mali");</script>';     
        }

    }







?>