<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tblhrconcern SET hrcStatus = 'ON-HOLD' WHERE hrcId = '$id'");


	if($update === TRUE){
		print '<script>alert("HR-Concern was been On-Hold");</script>';
		print '<script>window.location.assign("hr-concerns.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>