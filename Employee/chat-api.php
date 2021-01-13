<?php
    include("../connect.php");

    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $message = $_POST['sendmessage'];

    $output = "";

    $insert_chat = $connect->query("INSERT INTO `tblchat`(`userId`, `message`, `employeeId`) VALUES('$fromUser', '$message', '$toUser')");

    if($insert_chat === true)
    {
    }
    else {
    }
?>