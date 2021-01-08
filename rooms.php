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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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

        .anyClass{
            height: 350px;
            overflow-y: scroll;
        }
    </style>
    <title>ChatRoom - <?php echo $room_name; ?></title>
</head>

<body>

<header class="site-header sticky-top py-1 d-inline-flex w-100 p-4 py-2">
    <a class="py-2 px-1" href="#"><img src="img/icons8-chat-24.png" alt="image" /></a>
    <nav class="px-3 w-100 d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="/">My ChatRoom</a>
        <a class="py-2 d-none d-md-inline-block" href="/">About</a>
        <a class="py-2 d-none d-md-inline-block" href="/">Contact</a>
    </nav>
</header>

<h2>Chat Messages - <?php echo $room_name; ?></h2>

<div class="container">
    <div c
    <p>Hello. How are you today?</p>
    <span class="time-right">11:00</span>
</div>

<div class="container darker">
    <p>Hey! I'm fine. Thanks for asking!</p>
    <span class="time-left">11:01</span>
</div>

<label for="usermsg">
    <input type="text" id="usermsg" class="form-control" size="100%" name="usermsg" placeholder="Add Message">
</label>
<br>
<button class="btn btn-dark mt-3" name="submitsmg">SEND</button>

<div class="product-device shadow-sm d-none d-md-block"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

