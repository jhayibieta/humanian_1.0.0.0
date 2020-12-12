<?php 
    require("../connect.php");

    $search = $_GET['search'];

    $query = 'SELECT * FROM tblhrconcern WHERE hrcTitle LIKE "%$search%"';

    $result = $connect->query($query);

    if($result->num_rows > 0) {
        while($row = $result->fetch_array()){
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
    }
    else {
        echo '<h4 class="text-center"> No records found </h4>';
    }
?>