<?php
	include("connect.php");

	if(isset($_POST['submit']))
	{
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$username = $firstname . ' '. $middlename . ' ' . $lastname;
		$age = $_POST['age'];
		$bdate = $_POST['bdate'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confpassword = SHA1($_POST['confpassword']);
		$teamname = $_POST['teamname'];
		$estdate = $_POST['estdate'];
		$btype = $_POST['btype'];
		$busaddress = $_POST['busaddress'];
		$brgystate = $_POST['brgystate'];
		$zipcode = $_POST['zipcode'];
		$tinnumber = $_POST['tinnumber'];
		$dtinumber = $_POST['dtinumber'];
		$buspermit = $_POST['buspermit'];
		$brgypermit = $_POST['brgypermit'];
		$contactno = $_POST['contactnumber'];
		
		$target_dir = "../uploads/";
		$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
		$uploadOk = 1;
		$imageFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		$check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
		if($check !== false)
		{
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		}
		else {
			echo "File is not an image";
			$uploadOk = 0;
		}

		if(is_writable(dirname($target_file)))
		{
			if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file))
			{
				echo "<script>alert('The file".basename($_FILES["fileUpload"]["name"])."has been uploaded')</script>";
			}
			else {
				echo "<script>alert('Sorry the file is not uploaded')</script>";
			}
		}

		$emailcode = $_POST['emailcode'];

		$query = $connect->query("INSERT INTO `tblteams`(`teamImage`,`teamName`, `teamUser`, `teamAddress`, `teamEmployeeReg`, `teamBusinessfield`, `teamContact`, `teamBir`, `teamDti`, `teamBusinessPermit`, `teamBrgyPermit`, `teamCreatedAt`) VALUES ('$target_file','$teamname', '4', '$busaddress', '0', '$btype', '$contactno', '$tinnumber', '$dtinumber', '$buspermit', '$brgypermit', '$estdate')");

		$query = $connect->query("INSERT INTO `tblusers`(`teamId`, `userName`, `userEmail`, `userPassword`, `userType`, `userStatus`, `codeemail`) VALUES (LAST_INSERT_ID(), '$username', '$email', '$confpassword', '2', '1', '$emailcode')");

		if($query === TRUE)
		{
			// Email Verification
			$to = $email;
			$subject = "Click on the link to verify your account";
			$message = "
			
			<a href='http://localhost/humanian/verify.php?emailcode=$emailcode'>Verify your account</a>";
			$headers = "From: centrive@centrive.com \r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			mail($to, $subject, $message, $headers);
			header('Location: thankyou.php');

			echo "<script>console.log('$key')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - The Human Resource Portal</title>

    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="css/styles.css"  media="all">
</head>
<body id="top">

	<div class="container">
		<form method="POST" enctype="multipart/form-data">
			<div class="panel" id="firstPageregistration" style="background:url('img/background.jpg')top center no-repeat;background-size: cover;height: 565px;box-shadow: 1px 1px 1px 1px #ccc;margin-top: 40px;border-radius: 0px;padding:27px;">
				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-12">
						<h3 class="text-left">Step 1 of 3: Personal Information</h3><br/>
						<label>First Name:</label>
						<input type="text" name="firstname" id="firstname" class="form-control" required><br/>
						<label>Middle Name:</label>
						<input type="text" name="middlename" id="middlename" class="form-control" required><br/>
						<label>Last Name:</label>
						<input type="text" name="lastname" id="lastname" class="form-control" required><br/>
						<label>Birthdate:</label>
						<input type="text" name="bdate" id="bdate" class="form-control" required><br/>
						<label>Age:</label>
						<input type="number" name="age" id="age" class="form-control" required><br/>
						<button class="btn btn-md btn-success" id="nxt-btn" name="next">Next</button>
					</div>
				</div>
			</div>

			<div class="panel" id="secondPageregistration" style="background:url('img/background.jpg')top center no-repeat;background-size: cover;height: 565px;box-shadow: 1px 1px 1px 1px #ccc;margin-top: 40px;border-radius: 0px;padding:30px; display: none">
				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-12">
						<h3 class="text-left">Step 2 of 3: Email and Password</h3><br/>
						<label>Choose photo:</label>
						<input type="file" id="fileUpload" class="form-control" name="fileUpload"></br>
						<label>Contact Number:</label>
						<input type="text" name="contactnumber" id="contactnumber" class="form-control" required><br>
						<label>Email:</label>
						<input type="email" name="email" id="email" class="form-control" required><br/>
						<label>Password:</label>
						<input type="password" name="password" id="password" class="form-control"><br/>
						<label>Confirm Password:</label>
						<input type="password" name="confpassword" id="confpassword" class="form-control" required><br/>
						<div class="row">
							<div class="col-md-6 lg-6 sm-6">
								<button class="btn btn-md btn-success" id="prev-btn1" name="next">Previous</button>
								<button class="btn btn-md btn-success" id="nxt-btn1" name="next">Next</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="panel" id="thirdPageregistration" style="background:url('img/background.jpg')top center no-repeat;background-size: cover;height: 565px;box-shadow: 1px 1px 1px 1px #ccc;margin-top: 40px;border-radius: 0px;padding:30px; display: none">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-12">
						<h3 class="text-left">Step 3 of 4: Email Verification</h3><br/>
						<label>Enter 6-digit code:</label>
						<input type="text" name="codeemail" id="codeemail" class="form-control" required><br/>
						<div class="row">
							<div class="col-md-6 lg-6 sm-6">
								<button class="btn btn-md btn-success" id="prev-btn2" name="next">Previous</button>
								<button class="btn btn-md btn-success" id="nxt-btn2" name="next">Next</button>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<div class="panel" id="lastPageregistration" style="background:url('img/background.jpg')top center no-repeat;background-size: cover;height: 565px;box-shadow: 1px 1px 1px 1px #ccc;margin-top: 40px;border-radius: 0px;padding:30px; display: none">
				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-12">
						<h3 class="text-left">Step 3 of 3: Create your Team</h3><br/>
						<label>Team Name:*</label>
						<input type="text" name="teamname" id="teamname" class="form-control" required><br/>
						<label>Establish Date:*</label>
						<input type="date" name="estdate" id="estdate" class="form-control" required><br/>
						<label>Business Type:*</label>
						<input type="text" name="btype" id="btype" class="form-control" required><br/>
						<label>Building Address:*</label>
						<input type="text" name="busaddress" id="busadddress" class="form-control" required><br/>
						<label>Brgy Permit No.</label>
						<input type="text" name="brgypermit" id="brgypermit" class="form-control" required><br>
						<label for=""></label>
						<div class="row">
							<div class="col-md-6 lg-6 sm-6">
								<button class="btn btn-md btn-success" id="prev-btn3" name="next">Previous</button>
								<input type="submit" class="btn btn-md btn-success" name="submit" value="DONE">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-12">
						<label style="margin-top:76px">Brgy/City/State/Country:*</label>
						<input type="text" name="brgystate" id="brgystate" class="form-control" required><br/>
						<label>Zip Code:*</label>
						<input type="text" name="zipcode" id="zipcode" class="form-control" required><br/>
						<label>BIR TIN No.</label>
						<input type="text" name="tinnumber" id="tinnumber" class="form-control" required><br>
						<label>DTI Identification Number:</label>
						<input type="text" name="dtinumber" id="dtinumber" class="form-control" required><br>
						<label>Business Permit No.</label>
						<input type="text" name="buspermit" id="buspermit" class="form-control">
						<input type="hidden" name="emailcode" id="emailcode" value="<?php $str=rand(); $result = md5($str); echo $result?>">
					</div>
				</div>
			</div>
		</form>
	</div>

	<script src ="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
<!-- 
    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script> -->

    <script src="../js/script.js"></script>

	<script>
		$(function(){
			$('#datepicker').change(function(){
                var form = $('#otsearch');
                $.ajax({
                    method: "GET",
                    url: 'overtime-search.php',
                    data: form.serialize(),
                    success: function(data) {
                        $('#otsearchresults').html(data);
                    }
                })
			});
			
			$("#nxt-btn").click(function(){
				$("#secondPageregistration").css("display", "block");
				$("#firstPageregistration").css("display", "none");
			});

			// $("#nxt-btn1").click(function(){
			// 	$("#thirdPageregistration").css("display", "block");
			// 	$("#secondPageregistration").css("display", "none");
			// });
			$("#nxt-btn1").click(function(){
				$("#lastPageregistration").css("display", "block");
				$("#secondPageregistration").css("display", "none");
			});
			// $("#nxt-btn2").click(function(){
			// 	$("#lastPageregistration").css("display", "block");
			// 	$("#thirdPageregistration").css("display", "none");
			// });

			$("#prev-btn1").click(function(){
				$("#fistPageregistration").css("display", "block");
				$("#secondPageregistration").css("display", "none");
			});

			$("#prev-btn2").click(function(){
				$("#secondPageregistration").css("display","block");
				$("#thirdPageregistration").css("display", "none");
			});

			$("#prev-btn3").click(function(){
				$("#secondPageregistration").css("display", "block");
				$("#lastPageregistration").css("display", "none");
			});
		})
	</script>
</body>
</html>
