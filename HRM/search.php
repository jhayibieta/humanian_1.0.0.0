<?php
    require("../connect.php");
    session_start();

    $users = $_SESSION['dbId'];

    $select = $connect->query('SELECT * FROM tblteams WHERE teamUser = "' . $users .'"');

    while($row = $select->fetch_array()){
        $teamId = $row['teamId'];
        $team = $row['teamName'];
    }

    $search = $_GET['search'];

    $query = "SELECT * FROM tblemployees WHERE employeeSurname LIKE '%$search%' AND teamId = '$teamId'";
    $result = $connect->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_array()){
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
    else {
        echo "<p style='text-align:center;'> No record found </p>";
    }
?>