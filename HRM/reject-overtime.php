<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tblovertime SET overtimeStatus = 'REJECTED' WHERE overtimeId = '$id'");


	if($update === TRUE){
		print '<script>alert("Overtime was been Rejected");</script>';
		print '<script>window.location.assign("overtime.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>