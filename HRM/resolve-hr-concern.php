<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tblhrconcern SET hrcStatus = 'RESOLVED' WHERE hrcId = '$id'");


	if($update === TRUE){
		print '<script>alert("HR-Concern Successfully Resolve");</script>';
		print '<script>window.location.assign("hr-concerns.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>