<?php
    require("../connect.php");

    $search = $_GET['search'];

    $query = "SELECT * FROM tblemployees WHERE employeeSurname LIKE '%$search%'";
    $result = $connect->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_array()){
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
    }
    else {
        echo "<p style='text-align:center;'> No record found </p>";
    }
?>