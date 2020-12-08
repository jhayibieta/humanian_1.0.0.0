<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tblovertime SET overtimeStatus = 'APPROVED' WHERE overtimeId = '$id'");


	if($update === TRUE){
		print '<script>alert("Overtime Successfully Approved");</script>';
		print '<script>window.location.assign("overtime.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>