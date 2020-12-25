<?php
    session_start();
    require('../connect.php');

    $search = $_GET['search'];

    $users = $_SESSION['dbId'];

    if(isset($_GET['search'])){
        $query = "SELECT * FROM tbltimeoff WHERE toStatus ='$search' AND userId = '$users'";

        $result = $connect->query($query);

        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo "<div class='panel' id='dashboard-card' style='padding: 15px;'>";
                echo "<div class='row'>";
                echo '<div class="col-sm-2 col-md-2 col-lg-2">';
                if($row['toType'] === 'VACATION LEAVE'){
                    echo '<img src="../img/VL.png" class="img" style="width:150px;height:125.5px;margin-top: 10px;"/>';
                }
                else{
                    echo '<img src="../img/SL.png" class="img" style="width:150px;height:125.5px;margin-top: 10px;"/>';
                }
                echo "</div>";
                echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                echo "<h2 class='text-left' id='approval-header'>" . $row['toType']. "</h2>";
                echo "<h4 class='text-left' id='approval-body' style='margin-top:20px;'>FROM: " . $row['toDateFrom']. " &nbsp; TO: ". $row['toDateTo']."</h4>";
                echo "<h4 class='text-left' id='approval-body'>Time-Off Status: " . $row['toStatus']. "</h4>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        else {
            echo "<h4 class='text-center'>No records found</h4>";
        }
    }
?>