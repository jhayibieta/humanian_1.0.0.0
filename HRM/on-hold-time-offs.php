<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tbltimeoff SET toStatus = 'ON-HOLD' WHERE toId = '$id'");


	if($update === TRUE){
		print '<script>alert("Time - offs Successfully ON- Hold");</script>';
		print '<script>window.location.assign("time-offs.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>