<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chatroom";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if (!$conn){
        die("Failed To Connect" . mysqli_connect_error());
    }

    $room = $_POST['room'];
    $sql = "SELECT msg,stime,ip FROM `msgs` WHERE room='$room'";

    $html_content = "";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
            if ($row['ip']==$_SERVER['REMOTE_ADDR']){
                $html_content .= '<div class="message brighter">';
            }else{
                $html_content .= '<div class="message darker">';
            }
            $html_content .= $row['ip'];
            $html_content .= "<br><p>" .$row['msg'];
            $html_content .= "</p> <span class='time-right'>";
            $html_content .= $row['stime'] . "</span></div>";
        }
    }
    echo $html_content;
