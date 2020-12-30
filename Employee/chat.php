<?php 
    session_start();
    include('../connect.php');

    $id = $_GET['id'];

    $employee = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

    while($row = $employee->fetch_array()){
        $fname = $row['employeeFirstname'];
        $mname = $row['employeeMiddlename'];
        $sname = $row['employeeSurname'];
        $pic = $row['employeePicture'];
        $position = $row['employeePosition'];
        $start = $row['employeeStartDate'];
    }
?>

 <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:950px;margin-left: -120px;">
             <div class="modal-header">
                 <div class="img-profile1">;
                    
                 </div>;
                 <h4 style="position: absolute; left: 80px; top: 10px;">.$fname. .$mname. .$sname.</h4>;
                 <span style="position: absolute; left: 80px; top: 40px; color: #ccc">Active now</span>;

                 <div class="pull-right">;
                     <div class="call-div">;
                         <a href=""><img src="../img/phone-call-button.png" alt=""></a>;
                         <a href="" style="margin-left: 30px;"><img src="../img/video-call.png" alt=""></a>;
                         <a href="javascript:void(0);" style="margin-left: 30px;" data-dismiss="modal"><img src="../img/close.png" alt=""></a>;
                     </div>;
                 </div>;
             </div>;
             <div class="modal-body">;
                 <div class="div-right-info">;
                     <div class="img-profile1" style="width: 100px; height: 100px; margin-left: 90px;"></div>;
                     <h4 class="text-center">.$fname. .$mname. .$sname.</h4>;
                     <span style="position: absolute; left: 125px; top: 155px; color: #808185">Active now</span>;
                     <h5 style="margin-top: 50px">Position:</h5>;
                     <h5 style="margin-top: 20px;">Department:</h5>;
                     <h5 style="margin-top: 20px;">Contact Number:</h5>;
                     <a href="" style="position: absolute; top: 300px; left: 80px; color: black; font-weight: bold; text-decoration: none"><img src="../img/exclamation-mark-in-a-circle.png" style="position: absolute; left: -30px; top: 7px" alt=""><h4 class="text-center">Something went wrong</h4></a>;
                 </div>;

                 <div class="convo-field">;
                     <div class="img-profile1 img-profile2">;

                     </div>;

                     <p class="partner-chatname">.$fname. .$mname. .$sname.</p>;
                     <p class="sent-time1">12/30/2020 11:00 p.m</p>;

                     <div class="message1">;
                         werewrwerwrerewweretyteryherewywretrwetweregrewtrretyewwtewtewtereyretreyretetreyretetretretretretre;
                     </div>;

                     <div class="img-profile1 img-profile2 img-profile3"></div>;

                     <p class="partner-chatname1">Janella Fabroa Ibieta</p>;
                     <p class="sent-time2">12/30/2020 11:00 p.m</p>;

                     <div class="message2">;
                         wertreyretrjrewrthghhtrewthyjtrewwgwtfgrywehweurheuwhueruewruewrbwhweubhwenbrhwehbryhweyrbhwer;
                     </div>;
                 </div>;

                 <div class="div-field-chat">;
                     <form method="POST">;
                         <textarea class="textarea-field" name="" id="" placeholder="Aa"></textarea>;
                     </form>;

                     <div class="pull-right">;
                         <div class="files-div">;
                             <a href=""><img src="../img/send.png" alt=""></a>;
                             <a href="" style="margin-left: 6px;"><img src="../img/happy.png" alt=""></a>;
                             <a href="" style="margin-left: 5px;"><img src="../img/attachment.png" alt=""></a>;
                             <a href="" style="margin-left: 5px;"><img src="../img/image.png" alt=""></a>;
                             <a href="" style="margin-left: 3px;"><img src="../img/gif.png" alt=""></a>;
                         </div>;
                     </div>;
                 </div>;
             </div>;
         </div>;