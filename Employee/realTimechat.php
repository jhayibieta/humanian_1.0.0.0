<?php
    include("../connect.php");
    
    $id = $_GET['id'];
    $users = $_SESSION['dbId'];

    $employee3 = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

    $employee4 = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

    $chats = $connect->query("SELECT * FROM tblchat WHERE (userId = '$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network. Please check your internet connection");

    while($row = $employee3->fetch_array())
    {
        while($row1 = $employee4->fetch_array())
        {
            while($chat = $chats->fetch_array())
            {
                while($chat = $chats->fetch_array()){
                    echo "<div class='convo-field'>";
                    if($chat['employeeId'] == $id)
                    {
                        echo "<div class='img-profile1 img-profile2'><img src='../img/".$row['employeePicture']."'></div>";
                        echo "<p class='partner-chatname'>".$row['employeeFirstname']. ' '.$row['employeeMiddlename'].' '.$row['employeeSurname']."</p>";
                        echo "<input type='hidden' value='".$_GET['id']."' id='toUser'>";
                        echo "<p class='sent-time1'>".$chat['created_at']."</p>";
                        echo "<div class='message1'>".$chat['message']."</div>";
                    }
                    else {
                        echo "<div class='img-profile1 img-profile2 img-profile3'><img src='../img/".$row1['employeePicture']."'></div>";
                        echo "<p class='partner-chatname1'>".$row1['employeeFirstname'].' '.$row1['employeeMiddlename'].' '.$row1['employeeSurname']."</p>";
                        echo "<input type='hidden' value='".$_SESSION['dbId']."' id='fromUser'>";
                        echo "<p class='sent-time2'>".$chat['created_at']."</p>";
                        echo "<div class='message2'>".$chat['message']."</div>";
                    }
                    
                    echo "</div>";
                }
            }
        }
    }   
?>