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
                            <a href="add-new-employee.php" class="btn btn-success btn-block" style="background-color: #008076;
    font-weight: bold;margin:7px;border-radius:20px;">ADD NEW EMPLOYEE</a>
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

                    $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$teamId'");

										if($employees->num_rows > 0)
								    {
                    			while($row = $employees->fetch_array()){
                              echo '<a href="view-employee-info.php?$id=' . $row['employeeId']. '">';
                              echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                              echo "<div class='row'>";
                              echo '<div class="col-sm-2 col-md-2 col-lg-2">';
                              echo '<img src="../img/' . $row['employeePicture']. '" class="img" style="width:150px;height:125.5px;margin-top: 10px;"/>';
                              echo "</div>";
                              echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                              echo "<h2 class='text-left' id='approval-header'> " . $row['employeeFirstname'] ." " . $row['employeeMiddlename']. " " . $row['employeeSurname']. " </h2>";
                              echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>Position: " . $row['employeePosition']. "</h4>";
                              echo "<h4 class='text-left' id='approval-body'>Manager: Kim Jasper Ibieta</h4>";
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

	<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
