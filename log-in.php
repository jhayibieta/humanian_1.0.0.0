<?php

include('connect.php');

session_start();


$email = $_POST['email'];
$password = SHA1($_POST['password']);

if($email&&$password)
{
    $result = $connect->query("SELECT * FROM tblusers WHERE userEmail = '$email' AND userPassword = '$password' AND status = 1");

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        $dbId = $row['ID'];
        $dbemail = $row['userEmail'];
        $dbpass = $row['userPassword'];
        $dbtype = $row['userType'];
        $dbteam = $row['teamId'];
        $dbstatus = $row['userStatus'];
      }

      if($email==$dbemail&&$password==$dbpass&&$dbtype==3&&$dbstatus==1)
      {
            print '<script>console.log("success");</script>';
            header("Location:Employee/index.php");
            $_SESSION['dbId'] = $dbId;
            $_SESSION['dbteam'] = $dbteam;
      }
      else if($email==$dbemail&&$password==$dbpass&&$dbtype==2&&$dbstatus==1){

            print '<script>console.log("success");</script>';
            header("Location:HRM/index.php");
            $_SESSION['dbId'] = $dbId;
            $_SESSION['dbteam'] = $dbteam;

      }
      else if($email==$dbemail&&$password==$dbpass&&$dbtype==1&&$dbstatus==1)
      {
            header("Location:Admin/index.php");
            $_SESSION['email'] = $dbemail;
      }


    }
    else
    {
      print '<script>console.log("denied");</script>';
      header("Location:index.php");
    }
}
?>
