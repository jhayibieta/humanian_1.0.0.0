<?php
    include('connect.php');
    if(isset($_GET['emailcode']))
    {
        $emailcode = $_GET['emailcode'];
        $query = $connect->query("SELECT * FROM tblusers WHERE status = 0 AND codeemail = '$emailcode' LIMIT 1");

        if($query->num_rows == 1)
        {
            while($row = $query->fetch_array())
            {

            }
            $update = $connect->query("UPDATE tblusers SET status = 1 WHERE codeemail = '$emailcode' LIMIT 1");
            if($update)
            {
                echo "<script>
                    swal({
                        title: 'You may now log in your account',
                        text: 'Verified Successfully',
                        icon: 'success'
                    });
                </script>";
                header("refresh:5;url=index.php");
            }
        }
        else {

        }
    }
    else {
        die("
        <link rel='stylesheet' href='css/bootstrap.min.css'>
        <div class='text-center' style='padding:200px; background: url('img/background.jpg')'>
            <h1 class='text-center'>Something went wrong. Check your internet connection or you may not yet been verified</h1>
            <h3></h3>
        </div>
        ");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verified. You will be redirected to login page. Please wait</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="text-center" style="padding:200px; background:url('img/background.jpg')">
        <h1>Your account has been verified. You will be redirected in a few seconds.</h1>
        <img src="img/806.gif" alt="">
    </div>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>