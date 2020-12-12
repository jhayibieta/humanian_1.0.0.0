<?php
    require("../connect.php");

    $search = $_GET['search'];

    $query = "SELECT * FROM tblovertime WHERE overtimeDate LIKE '%$search%'";

    $result = $connect->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_array()){
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
    else {
        echo "<h4 class='text-center'> No Records Found </h4>";
    }
?>