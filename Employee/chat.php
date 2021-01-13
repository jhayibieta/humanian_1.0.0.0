<?php 
    session_start();
    include('../connect.php');

    $users = $_SESSION['dbId'];
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

    $employee2 = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

    while($row = $employee2->fetch_array())
    {
        $fname1 = $row['employeeFirstname'];
        $mname1 = $row['employeeMiddlename'];
        $sname1 = $row['employeeSurname'];
        $pic1 = $row['employeePicture'];
    }
?>

 <div class="modal-content" style="border-radius: 0px;height:500px;margin-top: 50px;width:950px;margin-left: -120px;">
    <div class="modal-header">
        <div class="img-profile1">
        
        </div>
        <h4 style="position: absolute; left: 80px; top: 10px;"><?php echo $fname.' '.$mname.' ' .$sname ?></h4>
        <span style="position: absolute; left: 80px; top: 40px; color: #ccc">Active now</span>

        <div class="pull-right">
            <div class="call-div">
                <a href=""><img src="../img/phone-call-button.png" alt=""></a>;
                <a href="" style="margin-left: 30px;"><img src="../img/video-call.png" alt=""></a>
                <a href="javascript:void(0);" style="margin-left: 30px;" data-dismiss="modal"><img src="../img/close.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <div class="div-right-info">
            <div class="img-profile1" style="width: 100px; height: 100px; margin-left: 90px;"></div>
            <h4 class="text-center"><?php echo $fname.' '.$mname.' ' .$sname ?></h4>
            <span style="position: absolute; left: 125px; top: 155px; color: #808185">Active now</span>
            <h5 style="margin-top: 50px">Position:</h5>
            <h5 style="margin-top: 20px;">Department:</h5>
            <h5 style="margin-top: 20px;">Contact Number:</h5>
            <a href="" style="position: absolute; top: 300px; left: 80px; color: black; font-weight: bold; text-decoration: none"><img src="../img/exclamation-mark-in-a-circle.png" style="position: absolute; left: -30px; top: 7px" alt=""><h4 class="text-center">Something went wrong</h4></a>
        </div>

        <div id="msgBody">
            <?php
                if(isset($id))
                {
                    $chats = $connect->query("SELECT * FROM tblchat WHERE (userId ='$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network");
                }
                else {
                    $employee3 = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

                    while($row = $employee->fetch_array()){
                        $fname = $row['employeeFirstname'];
                        $mname = $row['employeeMiddlename'];
                        $sname = $row['employeeSurname'];
                        $pic = $row['employeePicture'];
                        $position = $row['employeePosition'];
                        $start = $row['employeeStartDate'];
                    }

                    $employee4 = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

                    while($row = $employee2->fetch_array())
                    {
                        $fname1 = $row['employeeFirstname'];
                        $mname1 = $row['employeeMiddlename'];
                        $sname1 = $row['employeeSurname'];
                        $pic1 = $row['employeePicture'];
                    }
                    $chats = $connect->query("SELECT * FROM tblchat WHERE (userId = '$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network. Please check your internet connection");

                    while($row = $employee3->fetch_array())
                    {
                        while($row1 = $employee4->fetch_array())
                        {
                            while($chat = $chats->fetch_array()){
                                echo "<div class='convo-field'>";
                                if($chat['employeeId'] == $id)
                                {
                                    echo "<div class='img-profile1 img-profile2'><img src='../img/".$row['employeePicture']."'></div>";
                                    echo "<p class='partner-chatname'>".$row['employeeFirstname']. ' '.$row['employeeMiddlename'].' '.$row['employeeSurname']."</p>";
                                    echo "<p class='sent-time1'>".$chat['created_at']."</p>";
                                    echo "<div class='message1'>".$chat['message']."</div>";
                                }
                                else {
                                    echo "<div class='img-profile1 img-profile2 img-profile3'><img src='../img/".$row['employeePicture']."'></div>";
                                    echo "<p class='partner-chatname1'>".$row['employeeFirstname'].' '.$row['employeeMiddlename'].' '.$row['employeeSurname']."</p>";
                                    echo "<p class='sent-time2'>".$chat['created_at']."</p>";
                                    echo "<div class='message2'>".$chat['message']."</div>";
                                }
                                
                                echo "</div>";
                            }
                        }
                    }

                }
            ?>

            <div class="div-field-chat">
                <form method="POST" id="chatform">
                    <input type="hidden" value="<?php echo $users ?>" id="fromUser" name="fromUser">
                    <input type="hidden" value="<?php echo $id ?>" name="toUser" id="toUser">
                    <textarea class="textarea-field" name="sendmessage" id="sendmessage" placeholder="Type your message.... "></textarea>
                    <div class="pull-right">
                        <div class="files-div" style="padding-left: 2px;">
                            <button type="submit" name="message" id="message" style="margin-left: -10px; border:none; background: none;"><img src="../img/send.png" alt=""></button>
                            <button type="button" style="margin-left: -5px; border: none; background: none;"><img src="../img/happy.png" alt=""></button>
                            <button type="button" style="margin-left: -5px; border: none; background: none;"><img src="../img/attachment.png" alt=""></button>
                            <button type="button" style="margin-left: -5px; border:none; background: none;"><img src="../img/image.png" alt=""></button>
                            <button type="button" style="margin-left: -5px; border: none; background: none;"><img src="../img/gif.png" alt=""></button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>

        <!-- <div class="convo-field">
                <div class="img-profile1 img-profile2">

                </div>

                <p class="partner-chatname"><?php echo $fname.' '.$mname.' ' .$sname ?></p>
                <input type="hidden" value="
                <?php
                    $id = $_GET['id'];
                    echo $id;
                ?>
                " id="toUser" name="toUser">
                <p class="sent-time1">12/30/2020 11:00 p.m</p>

                <div class="message1">
                    <?php 
                    if(isset($id))
                    {
                        $chats = $connect->query("SELECT * FROM tblchat WHERE (userId ='$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network");
                    }
                    else {
                        $chats = $connect->query("SELECT * FROM tblchat WHERE (userId = '$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network. Please check your internet connection");

                        while($chat = $chats->fetch_array()){
                            if($chat['employeeId'] == $id)
                            {
                                echo $chat['message'];
                            }
                            else {
                                
                            }
                        }

                    }
                    ?>
                </div>

                <div class="img-profile1 img-profile2 img-profile3"></div>

                <p class="partner-chatname1"><?php echo $fname1.' '.$mname1.' '.$sname1;?></p>
                <input type="hidden" value="<?php 
                    $users = $_SESSION['dbId'];
                    echo $users;
                ?>" id="fromUser" name="fromUser">
                <p class="sent-time2">12/30/2020 11:00 p.m</p>

                <div class="message2">
                <?php 
                    if(isset($id))
                    {
                        $chats = $connect->query("SELECT * FROM tblchat WHERE (userId ='$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network");
                    }
                    else {
                        $chats = $connect->query("SELECT * FROM tblchat WHERE (userId = '$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network. Please check your internet connection");

                        while($chat = $chats->fetch_array()){
                            if($chat['userId'] == $users)
                            {
                                echo $chat['message'];
                            }
                        }

                    }
                    ?>
                </div>
            </div> -->
    </div>
</div>
<script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#message').click(function(e){
                e.preventDefault();
                var chatform = $("#chatform");
                $.ajax({
                    url: "chat-api.php",
                    method: "POST",
                    data: chatform.serialize(),
                    success: function(data){
                        $("#sendmessage").val("");
                    }
                });
            });

            setInterval(function(){
                $.ajax({
                    url: "realTimechat.php",
                    method: "POST",
                    data: {
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val()
                    },
                    success: function(data){
                        $("#msgBody").html(data);
                    }
                })
            }, 700);
        });
    </script>