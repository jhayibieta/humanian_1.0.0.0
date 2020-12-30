<?php

session_start();

include('connect.php');


if($_SESSION['dbId'])
{

}
else
{


}

$user = $_SESSION['dbId'];
$users = $_SESSION['dbId'];


$select = $connect->query('SELECT * FROM tblusers WHERE ID = "' . $users .'"');

while($row = $select->fetch_array()){

  $team = $row['teamId'];
  $userName = $row['userName'];
}

$select2 = $connect->query('SELECT * FROM tbldetails WHERE userId = "'. $users .'"');

while($row = $select2->fetch_array()){
	$age = $row['detailAge'];
	$bday = $row['detailBirthdate'];
	$gender = $row['detailGender'];
	$houselot = $row['detailHouselot'];
	$brgycity = $row['detailBarangaycity'];
	$country = $row['detailCountry'];
	$zipcode = $row['detailPostalCode'];
	$contact = $row['detailContact'];
}

$result = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

while($row = $result->fetch_array()){
	$emid = $row['employeeId'];
	$pic = $row['employeePicture'];
	$firstname = $row['employeeFirstname'];
	$middlename = $row['employeeMiddlename'];
	$lastname = $row['employeeSurname'];
}

if(isset($_POST['save']))
{
	$age = $_POST['age'];
	$bdate = $_POST['bdate'];
	$gnder = $_POST['gnder'];
	$hlot = $_POST['hlot'];
	$brgy = $_POST['brgy'];
	$cntry = $_POST['cntry'];
	$zipc = $_POST['zipc'];
	$contactno = $_POST['contactno'];

	$check = $connect->query("SELECT * FROM tbldetails WHERE userId = $users");

	if($check->num_rows > 0)
	{
		$query = $connect->query("UPDATE tbldetails SET employeeId = '$emid', detailAge = '$age', detailBirthdate = '$bdate', detailGender = '$gnder', detailHouselot = '$hlot', detailContact = '$contactno', detailBarangaycity = '$brgy', detailCountry = '$cntry', detailPostalCode = '$zipc', detailPhoto = 'sample.png', detailCover = 'Sample.jpg'");

		if($query === true) {
			print '<script>alert("Employee Data Successfully Updated");</script>';
          	print '<script>window.location.assign("index.php");</script>';
		}
	}
	else {
		$query = $connect->query("INSERT INTO `tbldetails`(`employeeId`,`userId`, `detailAge`, `detailBirthdate`, `detailGender`, `detailHouselot`, `detailBarangaycity`, `detailCountry`, `detailStatus`, `detailContact`, `detailPostalCode`, `detailPhoto`, `detailCover`) VALUES ('$emid', '$users', '$age', 'bdate', '$gnder', '$hlot', '$brgy', '$cntry', 'Active', '$zipc', '$contactno', 'sample.png', 'Sample.jpg')");

		if($query === true) {
			print '<script>alert("Employee Data Successfully Inserted");</script>';
          	print '<script>window.location.assign("index.php");</script>';
		}
		else {

		}
	}
}
?>
	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
	<style>
		#dropdownEmp:focus {
			background: none;
		}

		ul.dropdown-menu {
			position: absolute;
			left: 0 !important;
		}
		.img-profile {
			width: 120px; 
			height: 120px; 
			border-radius: 50%; 
			margin-left: 200px;
			border: 1px solid black;
		}
	</style>
    	<div class="sidebar">
	        <div class="container-fluid" id="sidebar-content">
	        		<img src="../img/Humanian-logo.png" alt="logo" class="logo-nav"/><hr/>


				<a href="../Employee/index.php" class="side-links"><span class="glyphicon glyphicon-dashboard" id="glyph-side"> &nbsp; DASHBOARD</span></a>
				<a href="../Employee/employees.php" class="side-links"><span class="glyphicon glyphicon-home" id="glyph-side"> &nbsp; EMPLOYEES</span></a>

				<a href="../Employee/timesheet.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; TIMESHEET</span></a>
				<a href="../Employee/time-offs.php" class="side-links"><span class="glyphicon glyphicon-calendar" id="glyph-side"> &nbsp; TIME-OFFS</span></a>

				<a href="../Employee/overtime.php" class="side-links"><span class="glyphicon glyphicon-time" id="glyph-side"> &nbsp; OVERTIME</span></a>
				<a href="../Employee/hr-concerns.php" class="side-links"><span class="glyphicon glyphicon-file" id="glyph-side"> &nbsp; HR CONCERNS</span></a>
				<a href="../Employee/attendance.php" class="side-links"><span class="glyphicon glyphicon-camera" id="glyph-side"> &nbsp; ATTENDANCE</span></a>
				

			</div>
        </div>

    	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle" id="dropdownEmp" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user" id="glyph"> &nbsp; <?php echo $userName; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#infoModal"><span class="glyphicon glyphicon-list-alt"></span> Profile</a></li>
							</ul>
						</li>

						<li><a href="sign-out.php"><span class="glyphicon glyphicon-log-out" id="glyph"></span></a></li>
					</ul>
				</div>

				<div class="modal fade" id="infoModal" role="modal">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit My Profile</h4>
							</div>

							<div class="modal-body">
								<div>
									<form method="POST" name="update-employee">
										<div class="img-profile"></div>
										<div class="form-group" style="position: absolute; top: 40px; left: 350px; width: 100%;">
											<div class="col-md-4">
												<label class="col-form-label">Upload Photo:</label>
												<input type="file" class="form-control" name="picture">
											</div>
										</div>
										<div class="row">
											<div class="form-group" style="margin-top: 20px">
												<div class="col-md-4">
													<label class="col-form-label">First Name:</label>
													<input type="text" value="<?php echo $firstname ?>" class="form-control" name="fname">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Middle Name:</label>
													<input type="text" value="<?php echo $middlename ?>" class="form-control" name="mname">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Last Name:</label>
													<input type="text" class="form-control" value="<?php echo $lastname ?>" name="lname">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group" style="margin-top: 20px">
												<div class="col-md-4">
													<label class="col-form-label">Age:</label>
													<select name="age" class="form-control" id="">
															<option disabled>----</option>
															<option value="" selected><?php echo $age; ?></option>
															<?php
																for($j = 1; $j <= 100; $j++)
																{
																	echo "<option value='". $j ."'>". $j . "</option>";
																}
															?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Birthdate:</label>
													<input type="text" id="datepicker" class="form-control" name="bdate">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Gender:</label>
													<select name="gnder" class="form-control" id="">
														<option selected disabled>---</option>
														<option value="" selected><?php echo $gender; ?></option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group" style="margin-top: 20px">
												<div class="col-md-4">
													<label class="col-form-label">House Lot:</label>
													<input type="text" class="form-control" value="<?php echo $houselot ?>" name="hlot">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Barangay and City:</label>
													<input type="text" class="form-control" value="<?php echo $brgycity ?>" name="brgy">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Country:</label>
													<input type="text" class="form-control" value="<?php echo $country ?>" name="cntry">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="form-group" style="margin-top: 20px;">
												<div class="col-md-4">
													<label class="col-form-label">Postal/Zip Code:</label>
													<input type="text" class="form-control" value="<?php echo $zipcode ?>" name="zipc">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Contact Number:</label>
													<input type="text" class="form-control" value="<?php echo $contact ?>" name="contactno">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="col-form-label">Cover Photo:</label>
													<input type="text" class="form-control" name="cover">
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> SAVE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

	<script src ="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/jquery-validation.js"></script>

	<script>
		$(document).ready(function() {
			$('#datepicker').datepicker({
				format: 'yyyy/mm/dd'
			});

			// $(function() {
			// 	$("form[name='update-employee']").validate({
			// 		rules: {

			// 		}
			// 	})
			// });
		});
	</script>



		

