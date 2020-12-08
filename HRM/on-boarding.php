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
                           <a href="#createAnnouncements" data-toggle="modal" class="btn btn-success btn-block" style="background-color: #008076;
    font-weight: bold;margin:7px;border-radius:20px;">CREATE ANOUNCEMENTS</a>        
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

                    $employees = $connect->query("SELECT * FROM tblfeeds WHERE userId = '$users'");

                    
                    if($employees->num_rows > 0)
                    {
                      echo '<div class="row">';

                    while ($row = $employees->fetch_array()) {
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<div class="panel" id="dashboard-card" style="height:300px">';
                        echo '<div class="container-fluid">';

                        if($row['feedImage'] === ""){
                            echo '<img src="../img/HUMANIAN-LOGO.png" class="img" style="width:100%;height:80px;margin-top: 20px; border:1px solid #ccc;"/>';
                        }
                        else{
                            echo '<img src="../img/' . $row['feedImage']. '" class="img" style="width:100%;height:80px;margin-top: 20px; border:1px solid #ccc;"/>';    
                        }
                        echo "<p class='text-left' style='margin-top: 40px;font-weight:bold;font-size: 13px;margin-bottom: 3px;'> " . $row['feedTitle'] . " </p>";
                        echo "<p class='text-left' style='height: 80px;'>" . $row['feedContent']. "</p>";
                        echo "<a href='view-announcement.php?id=" . $row['feedId']. "' class='btn btn-default btn-block'> VIEW MORE</a>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    }    
                    echo '</div>';             

                    
                  }
                  else{
                      echo '<h4 class="text-center">No Records Yet</h4>';

                  }

                ?>
                
                


        </div>


    </div>
    </div>


    <div id="createAnnouncements" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:950px;margin-left: -120px;">
                  <div class="modal-header">
                        <h4 class="text-left">CREATE ANOUNCEMENT</h4>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 lg-6 sm-6">
                                <form method="POST" action="on-boarding.php">
                                    <input type="hidden" name="team" value="<?php echo $teamId;?>"/>
                                    <input type="hidden" name="user" value="<?php echo $users;?>"/>
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control" required="required" placeholder="Enter Title:" /><br/>
                                    <label>Type:</label>
                                    <select name="type" class="form-control" required="required">
                                        <option>.....</option>
                                        <option>ADVISORY</option>
                                        <option>MEETING</option>
                                        <option>EVENT GATHERING</option>
                                    </select></br>
                                    <label>Content:</label>
                                    <textarea name="content" class="form-control" required="required" style="height:150px" placeholder="Enter Title:"></textarea><br/>

                                    <div class="row">
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                                <button type="button" name="close" class="btn btn-default pull-left" style="font-weight: bold;border-radius:20px;" data-dismiss="modal">CLOSE FORM</button>
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                                <input type="submit" name="submit" class="btn btn-primary pull-right" style="background-color: #008076;
                            font-weight: bold;border-radius:20px;" value="SAVE ANOUNCEMENT">
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


	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>


<?php


    error_reporting(0);

    include('../connect.php');

    $team = $_POST['team'];
    $userId = $_POST['user'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $content = $_POST['content'];

    

    if(isset($_POST['submit'])){

        $save = $connect->query("INSERT INTO `tblfeeds`(`userId`, `teamId`, `feedTitle`, `feedContent`, `feedImage`, `feedType`) VALUES ('$userId','$team','$title','$content','','$type')");

        if($save === TRUE){
            print '<script>alert("New Announcement has been created");</script>';
            print '<script>window.location.assign("on-boarding.php");</script>';
        }
        else{
            print '<script>console.log("Mali");</script>';
        }


    }








?>
