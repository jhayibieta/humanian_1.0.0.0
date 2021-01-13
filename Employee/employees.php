<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - Employee</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>

<style>
    .img-profile1 {
        width: 50px; 
        height: 50px; 
        border-radius: 50%; 
        border: 1px solid black;
    }

    .img-profile2 {
        width: 35px;
        height: 35px;
    }

    .img-profile3 {
        margin-left: 510px;
        margin-top: 20px;
    }

    .img-profile4 {
        position: relative;
        z-index: 2;
        width: 125px;
        height: 120px;
        border-radius: 50%;
        border: 1px solid black;
        top: 120px;
        left: 120px;
    }
    .call-div {
        position: absolute; 
        left: 750px; 
        top: 20px;
    }

    .files-div {
        position: absolute; 
        left: 450px; 
        top: 18px;
    }

    .div-right-info {
        padding: 20px;
        position: absolute;
        top: 0;
        left: 620px;
        border-left: 1px solid #ccc;
        width: 325px;
        height: 417px;
        overflow-y: auto;
    }

    .div-field-chat {
        width: 65.3%;
        position: absolute;
        border-top: 1px solid #ccc;
        left: 0;
        top: 350px;
    }

    .textarea-field {
        resize: none;
        width: 430px;
        height: 40px;
        max-height: 45px;
        padding: 8px 0 0 18px;
        font-size: 14px;
        margin-top: 10px; 
        margin-left: 10px; 
        border-radius: 20px; 
        outline: none;
    }

    .convo-field {
        padding: 10px 0 0 10px;
        width: 64%;
        height: 320px;
        overflow: auto;
    }

    .message1 {
        width: 95%;
        overflow-wrap: break-word;
        display: block;
        padding: 1%;
        margin-top: 10px;
        background: #ccc;
        border-radius: 50px;
    }

    .message2 {
        width: 95%;
        overflow-wrap: break-word;
        display: block;
        padding: 1%;
        margin-left: 0;
        margin-top: 10px;
        background: #ccc;
        border-radius: 50px;
    }

    .partner-chatname {
        position: absolute; 
        left: 70px; 
        top: 25px;
    }

    .sent-time1 {
        position: absolute; 
        left: 70px; 
        top: 45px;
        color: #ccc;
    }

    .partner-chatname1 {
        position: absolute; 
        left: 390px; 
        top: 100px;
    }

    .sent-time2 {
        position: absolute; 
        left: 390px; 
        top: 120px;
        color: #ccc;
    }

    .user-name-1 {

    }
</style>
<body id="top">

    <?php include("../navigation-employee.php");?>

     <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">

                    <!---FOR TABS AND NAVIGATION--->
                    <div class="panel" style="height:50px;box-shadow: 0px 0px 17px 0px #ccc;">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-3">
                               
                            </div>
                            <div class="col-md-5 col-lg-5 col-sm-5">
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-3">
                                <form method="GET" id="search-form">
                                    <input type="text" name="search" id="search-text" class="form-control" style="margin:7px;border-radius:20px;" placeholder="Search"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!---FOR TABS AND NAVIGATION END--->

                <?php

                    include('../connect.php');
                    $employees = $connect->query("SELECT * FROM tblemployees WHERE teamId = '$team'");

                    
                    if($employees->num_rows > 0)
                    {
                      echo '<div class="row" id="search-results">';

                    while ($row = $employees->fetch_array()) {
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<div class="panel" id="dashboard-card" style="height:170px">';
                        echo '<div class="container-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-md-4 lg-4 sm-4">';
                        echo '<img src="../img/' . $row['employeePicture']. '" class="img" style="width:80px;height:80px;margin-top: 20px; border:1px solid #ccc; border-radius:50px;"/>';
                        echo '</div>';
                        echo '<div class="col-md-8 lg-8 sm-8">';
                        echo "<p class='text-left' style='margin-top: 40px;font-weight:bold;font-size: 13px;margin-bottom: 3px;'> " . $row['employeeFirstname'] ." " . $row['employeeMiddlename']. " " . $row['employeeSurname']. " </p>";
                        echo "<p class='text-left'>" . $row['employeePosition']. "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div><hr style="margin-bottom: 5px;"/>';
                        echo '<div class="container-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-md-6 lg-6 sm-12">';
                        echo '<h5 class="text-center"><a href="javascript:void(0);" data-id="'.$row['employeeId'].'" id="viewProfile">View</a></h5>';
                        echo '</div>';
                        echo '<div class="col-md-6 lg-6 sm-12">';
                        echo '<h5 class="text-center"><a href="javascript:void(0);" data-id="'.$row['employeeId'].'" id="messageChat">Message</a></h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }                 

                    echo '</div>';
                  }
                  else{
                      echo '<h4 class="text-center">No Records Yet</h4>';

                  }

                ?>
                
            </div>

            <div id="messageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                </div>
            </div>

            <div id="viewprofile" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                  
                  </div>
            </div>
        </div>
    <script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search-text').keyup(function(){
                var form = $('#search-form');
                $.ajax({
                    method: 'GET',
                    url: 'search.php',
                    data: form.serialize(),
                    success: function(data){
                        $('#search-results').html(data);
                    }
                });
            });

            $('#messageChat').click(function(){
                var id = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "chat.php?id=" + id,
                    data: {id: id},
                    success: function(data) {
                        $('.modal-dialog').html(data)
                        $('#messageModal').modal('show')
                    }
                });
            });

            $('#viewProfile').click(function(){
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "view-profile.php?id=" + id,
                    data: {id: id},
                    success: function(data) {
                        $('.modal-dialog').html(data)
                        $('#viewprofile').modal('show')
                    }
                });
            });
        })
    </script>

    <script>
        var textarea = document.querySelector('textarea');

        textarea.addEventListener('keydown', autosize);
                    
        function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            // el.style.cssText = '-moz-box-sizing:content-box';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
        }
    </script>
</body>
</html>
    