<?php 
    require("../connect.php");

    $search = $_GET['search'];

    $query = 'SELECT * FROM tblhrconcern WHERE hrcTitle LIKE "%$search%"';

    $result = $connect->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_array()){
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
    }
    else {
        echo '<h4 class="text-center"> No records found </h4>';
    }
?>