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

                    include('../connect.php');

                    $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$team'");

                    
                    if($employees->num_rows > 0)
                    {
                      echo '<div class="row">';

                    while ($row = $employees->fetch_array()) {
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<div class="panel" id="dashboard-card" style="height:170px">';
                        echo '<div class="container-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<img src="../img/' . $row['employeePicture']. '" class="img" style="width:80px;height:80px;margin-top: 20px; border:1px solid #ccc; border-radius:50px;"/>';
                        echo '</div>';
                        echo '<div class="col-md-8 lg-8 sm-8">';
                        echo "<p class='text-left' style='margin-top: 40px;font-weight:bold;font-size: 13px;margin-bottom: 3px;'> " . $row['employeeFirstname'] ." " . $row['employeeMiddlename']. " " . $row['employeeSurname']. " </p>";
                        echo "<p class='text-left'>" . $row['employeePosition']. "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div><hr style="margin-bottom: 5px;"/>';
                        echo '<div class="container-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-md-6 lg-6 sm-12">';
                        echo '<h5 class="text-center"><a href="">View</a></h5>';
                        echo '</div>';
                        echo '<div class="col-md-6 lg-6 sm-12">';
                        echo '<h5 class="text-center"><a href="#messageModal" data-toggle="modal">Message</a></h5>';
                        echo '</div>';
                        echo '</div>';
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
        
        
        <div id="messageModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:950px;margin-left: -120px;">
                  <div class="modal-header">
                        <h4 class="text-left">CREATE NEW MESSAGE</h4>

                  </div>
                  <div class="modal-body">
                   
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
    