<div class="convo-field">
    <div class="img-profile1 img-profile2">

    </div>

    <p class="partner-chatname"><?php echo $fname.' '.$mname.' ' .$sname ?></p>
    <input type="hidden" value="
    <?php
        $id = $_GET['id'];
        echo $id;
    ?>
    " id="toUser">
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
    ?>" id="fromUser">
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
</div>



                 <?php
                            if(isset($id))
                            {
                                $chats = $connect->query("SELECT * FROM tblchat WHERE (userId ='$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network");
                            }
                            else {

                                $employee3 = $connect->query("SELECT * FROM tblemployees WHERE employeeId = '$id'");

                                $employee4 = $connect->query("SELECT * FROM tblemployees WHERE userId = '$users'");

                                $chats = $connect->query("SELECT * FROM tblchat WHERE (userId = '$users' AND employeeId = '$id') OR (userId = '$id' AND employeeId = '$users')") or die("Failed to connect to network. Please check your internet connection");

                                while($row = $employee3->fetch_array())
                                {
                                    while($row1 = $employee4->fetch_array())
                                    {
                                        while($chat = $chats->fetch_array())
                                        {
                                            while($chat = $chats->fetch_array()){
                                                echo "<div class='convo-field'>";
                                                if($chat['employeeId'] == $id)
                                                {
                                                    echo "<div class='img-profile1 img-profile2'><img src='../img/".$row['employeePicture']."'></div>";
                                                    echo "<p class='partner-chatname'>".$row['employeeFirstname']. ' '.$row['employeeMiddlename'].' '.$row['employeeSurname']."</p>";
                                                    echo "<input type='hidden' value='".$_GET['id']."' id='toUser'>";
                                                    echo "<p class='sent-time1'>".$chat['created_at']."</p>";
                                                    echo "<div class='message1'>".$chat['message']."</div>";
                                                }
                                                else {
                                                    echo "<div class='img-profile1 img-profile2 img-profile3'><img src='../img/".$row['employeePicture']."'></div>";
                                                    echo "<p class='partner-chatname1'>".$row['employeeFirstname'].' '.$row['employeeMiddlename'].' '.$row['employeeSurname']."</p>";
                                                    echo "<input type='hidden' value='".$_SESSION['dbId']."' id='fromUser'>";
                                                    echo "<p class='sent-time2'>".$chat['created_at']."</p>";
                                                    echo "<div class='message2'>".$chat['message']."</div>";
                                                }
                                                
                                                echo "</div>";
                                            }
                                        }
                                    }
                                }

                            }
                        ?>