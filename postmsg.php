<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chatroom";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if (!$conn){
        die("Failed To Connect" . mysqli_connect_error());
    }

    $msg = $_POST['text'];
    $room = $_POST['room'];
    $ip = $_POST['ip'];
    $sql = "INSERT INTO `msgs` (`msg`,`room`,`ip`,`stime`) VALUES ('$msg','$room','$ip',CURRENT_TIMESTAMP )";
    mysqli_query($conn,$sql);
    mysqli_close($conn);

?>

