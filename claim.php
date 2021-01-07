<?php
    $room = $_POST['room'];

    if (strlen($room)>20 or strlen($room)<2){
        $message = "Please Choose A Name between 2 to 20 characters.";

        echo "<script language='JavaScript'>";
        echo "alert('$message');";
        echo "window.location='http://localhost:63342/ChatRoom/';";
        echo "</script>";

    }elseif (!ctype_alnum($room)){
        $message = "Please Choose A Alpha Numeric Name";

        echo "<script language='JavaScript'>";
        echo "alert('$message');";
        echo "window.location='http://localhost:63342/ChatRoom/';";
        echo "</script>";
    }else{
//        include 'db_connect.php';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "chatroom";

        $conn = mysqli_connect($servername,$username,$password,$database);

        if (!$conn){
            die("Failed To Connect" . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
        $result = mysqli_query($conn,$sql);
        if ($result){
            if (mysqli_num_rows($result)>0){
                $message = "Please Choose a Different Name. This room is already claimed";

                echo "<script language='JavaScript'>";
                echo "alert('$message');";
                echo "window.location='http://localhost:63342/ChatRoom/';";
                echo "</script>";
            }else{
                $sql = "INSERT INTO `rooms`(`roomname`, `stime`) VALUES('$room',CURRENT_TIMESTAMP );";
                $result = mysqli_query($conn,$sql);
                if ($result){
                    $message = "Your room is ready to Chat.";

                    echo "<script language='JavaScript'>";
                    echo "alert('$message');";
                    echo "window.location='http://localhost:63342/ChatRoom/rooms.php?roomname=' . $room. ';";
                    echo "</script>";
                }else{
                    echo ("ERROR".mysqli_error($conn));
                }
            }
        }else{
            echo ("ERROR ".mysqli_error($conn));
        }

    }

