<?php
    $room_name = $_GET['roomname'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chatroom";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if (!$conn){
        die("Failed To Connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `rooms` WHERE roomname = '$room_name'";

    $result = mysqli_query($conn,$sql);

    if ($result){
        if (mysqli_num_rows($result)==0){
            $message = "This room does not exists. Try creating a new one.";

            echo "<script language='JavaScript'>";
            echo "alert('$message');";
            echo "window.location='http://localhost:63342/ChatRoom/';";
            echo "</script>";
        }else{

        }
    }else{
        echo "ERROR".mysqli_error($conn);
    }
    echo "Lets Rock";