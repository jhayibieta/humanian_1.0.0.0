<?php
    session_start();
    error_reporting(0);
    include('../connect.php');

    $users = $_SESSION['dbId'];
    $id = $_GET['id'];

    $details = $connect->query("SELECT * FROM tbldetails WHERE employeeId = '$id'");

    while($row = $details->fetch_array())
    {
        $detailContact = $row['detailContact'];
        $detailCover = $row['detailCover'];
        $detailPhoto = $row['detailPhoto'];
    }

    $employee = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

    while($row = $employee->fetch_array()){
        $fname = $row['employeeFirstname'];
        $mname = $row['employeeMiddlename'];
        $sname = $row['employeeSurname'];
        $pic = $row['employeePicture'];
        $position = $row['employeePosition'];
        $start = $row['employeeStartDate'];
        $empContact = $row['employeeContact'];
    }
?>

<div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:400px;margin-left: 150px;">
    <div class="modal-header">
        <img src="../uploads/<?php echo $detailCover ?>" style="position: absolute; background-size: contain, cover; top: 0; left: 0; width: 100%; height: 40%;" alt="Cover Photo">
        <div class="img-profile4">
            <img src="../img/<?php echo $pic ?>" style="position: absolute; top: 0; left: 0; width: 125px; height: 120px; border-radius: 50%; background-repeat: no-repeat; background-size: auto;" alt="Display Picture">
        </div>
    </div>

    <div class="modal-body">
        <div style="margin-left: 70px">
            <h3 style="margin-top: 110px; font-weight: bold;"><?php echo $fname. ' '. $mname. ' '. $sname ?></h3>
            <div style="padding: 5px; margin-top: 25px; margin-left: 30px;">
                <img src="../img/suitcase.png" alt="">
                <p style="position: relative; margin-left: 30px; top: -20px; font-weight: bold"><?php echo $position ?></p>
                <img src="../img/phonebook.png" alt="">
                <p style="position: relative; margin-left: 30px; top: -20px; font-weight: bold"><?php echo $empContact ?></p>
            </div>
        </div>
    </div>
</div>