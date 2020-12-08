<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tbltimeoff SET toStatus = 'REJECTED' WHERE toId = '$id'");


	if($update === TRUE){
		print '<script>alert("Time - offs was been rejected");</script>';
		print '<script>window.location.assign("time-offs.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>