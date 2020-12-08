<?php

  include('../connect.php');

  error_reporting(0);

  $update = $connect->query('UPDATE tblteams SET teamStatus = "Approve" WHERE teamId = "' . $_GET['$id'] . '"');

  if($update === TRUE){
    print '<script>alert("This team successfully approved.")</script>';
    print '<script>window.location.assign("approval-info.php?$id='. $_GET['$id'].'")</script>';
  }
  else{

  }


?>
