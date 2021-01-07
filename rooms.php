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
        }
    }else{
        echo "ERROR".mysqli_error($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="product.css" rel="stylesheet">
    <link rel="icon" href="img/icons8-chat-24.png">
    <style>
        body {
            color: black;
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
            background: #8e8e8e;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
    <title>ChatRoom</title>
</head>
<body>

<h2>Chat Messages</h2>

<div class="container">
    <p>Hello. How are you today?</p>
    <span class="time-right">11:00</span>
</div>

<div class="container darker">
    <p>Hey! I'm fine. Thanks for asking!</p>
    <span class="time-left">11:01</span>
</div>

<div class="container">
    <p>Sweet! So, what do you wanna do today?</p>
    <span class="time-right">11:02</span>
</div>

<div class="container darker">
    <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
    <span class="time-left">11:05</span>
</div>

<div class="product-device shadow-sm d-none d-md-block"></div>

</body>
</html>

