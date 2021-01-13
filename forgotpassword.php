<?php
    include("connect.php");

    if(isset($_POST['confirmforgot']))
    {
        $emailaddress = $_POST['forgotemail'];

        $query = $connect->query("SELECT * FROM tblusers WHERE userEmail = '$emailaddress'");

        if()
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Humanian</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    #second-page {
        display: none;
    }
</style>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="panel" style="background:url('img/background.jpg')top center no-repeat;background-size: cover;height: 565px;box-shadow: 1px 1px 1px 1px #ccc;margin-top: 40px;border-radius: 0px;padding:27px;">
                <div class="text-center">
                    <h1 style="margin: 70px 0;">Did You Forgot Your Password?</h1><br>
			        <p style="margin-top: -90px; text-align: center;">Enter your email address you're using for your account below <br> and we will send you a link</p>
                </div>

                <div id="next-page">
                    <div class="form-group text-center" id="first-page">
                        <h4 style="margin-left: -350px; font-weight: bold;">Email Address:</h4>
                        <input type="email" name="forgotemail" placeholder="sample@example.com" class="form-control" style="width: 40%; margin-left: 300px;">
                        <input type="button" name="next-btn" id="next-btn" class="btn btn-primary mt-2" style="width: 40%; margin-left: -50px; margin-top: 10px;" value="Next">
                    </div>

                    <div class="form-group text-center" id="second-page">
                        <h4 style="margin-left: -280px; font-weight: bold;">6-digit verification code:</h4>
                        <input type="email" name="verificationcode" class="form-control" style="width: 40%; margin-left: 300px;" placeholder="XXXXXX">
                        <input type="submit" name="confirmforgot" class="btn btn-primary mt-2" style="width: 40%; margin-left: -50px; margin-top: 10px;" value="Done">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(function() {
            $("#next-btn").click(function(){
                $("#first-page").css("display", "none");
                $("#second-page").css("display", "block");
            });
        });
    </script>
</body>
</html>