<?php

	include('../connect.php');


	$id = $_GET['$id'];


	$update = $connect->query("UPDATE tbltimeoff SET toStatus = 'APPROVED' WHERE toId = '$id'");


	if($update === TRUE){
		print '<script>alert("Time - offs Successfully approve");</script>';
		print '<script>window.location.assign("time-offs.php");</script>';
	}
	else{
		print '<script>console.log("Mali");</script>';
	}





?>