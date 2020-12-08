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

    <?php 

      include("../navigation-employee.php");


    ?>


     <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
                <div class="row">
                    <div class="col-md-8 lg-8 sm-8">
                        

                        <div class="panel" id="dashboard-card" style="height:100px">
                           <div class="row">
                                <div class="col-md-2 lg-2 sm-2">
                                <img src="../img/<?php echo $pic;?>" id="feeds-user-image" style="height:60px;margin-top: 19px;margin-left: 20px;border-radius: 72px;border: 1px solid #ccc;"/>  
                                </div>
                                <div class="col-md-9 lg-9 sm-9">
                                  <textarea class="form-control" name="content" placeholder="Post your feelings!" style="margin-top: 22px;"></textarea>      
                                </div>
                           </div>                          
                        </div>

                        <?php

                          include('../connect.php');

                          $feeds = $connect->query("SELECT * FROM tblfeeds WHERE teamId = '$team' ORDER BY feedId DESC");

                          while($row = $feeds->fetch_array()){

                              echo '<div class="panel" id="dashboard-card" style="height:100%">';
                              echo '<div class="row">';
                              

                              $user = $connect->query("SELECT * FROM tblemployees WHERE userId = '" . $row['userId']. "'");

                              while($data = $user->fetch_assoc()){
                                echo '<div class="col-md-2 lg-2 sm-2">';
                                echo '<img src="../img/'. $data['employeePicture'].'" id="feeds-user-image" style="height:60px;margin-top: 19px;margin-left: 20px;border-radius: 72px;border: 1px solid #ccc;"/>';  
                                echo '</div>';
                                echo '<div class="9-md-9 lg-9 sm-9">';
                                echo '<h5 class="text-left" style="font-weight: bold;margin-bottom: 2px;margin-top: 32px;">'. $data['employeeFirstname'].' ' . $data["employeeMiddlename"]. ' ' . $data['employeeSurname']. '</h5>';
                                echo '<p class="text-left">A day ago</p>';
                                echo '</div>';  
                              }
                              echo '</div>';
                              
                              echo '<h5 class="text-left" style="margin-left:20px;margin-bottom:30px;margin-top:25px;">'. $row["feedContent"]. '</h5>';

                              if($row['feedImage'] !== ''){
                                echo '<img src="../img/' . $row["feedImage"]. '" id="feeds-image" style="width: 100%;border: 1px solid #ccc;"/>';
                              }
                              else{ 
                               
                              }
                              
                              
                              
                              echo '</div>';
                          
                          }



                        ?>                        
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">TIME-IN / TIME-OUT:</h5><hr/>
                        </div>
                        <div class="row">
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                              
                             </div>
                          </div>
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                            
                            </div>
                          </div>
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                              
                            </div>
                          </div>
                        </div>
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">YOU ARE HERE:</h5><hr/>
                        </div>
                        
                    </div>
                   </div> 
                

        </div>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
