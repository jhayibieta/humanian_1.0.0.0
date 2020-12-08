<?php

include('connect.php');

session_start();


$email = $_POST['email'];
$password = SHA1($_POST['password']);

if($email&&$password)
{
    $result = $connect->query("SELECT * FROM tblusers WHERE userEmail = '$email' AND userPassword = '$password'");

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        $dbId = $row['ID'];
        $dbemail = $row['userEmail'];
        $dbpass = $row['userPassword'];
        $type = $row['userType'];
      }

      if($email==$dbemail&&$password==$dbpass&&$type==3)
      {
            print '<script>console.log("success");</script>';
            header("location: user.php");
            $_SESSION['dbId'] = $dbId;
      }
      
    }
    else
    {
      print '<script>console.log("denied");</script>';
    }
}
?>