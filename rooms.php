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
        .message{
            border: 2px solid #dedede;
            border-radius: 5px;
            padding-left: 10px;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
        }
        .brighter{
            color: black;
            border-color: #FFF;
            background-color: #FFF;
            text-align: end;
        }

        .darker {
            color: white;
            border-color: #000;
            background-color: #000;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
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
            height: 400px;
            overflow-y: scroll;
        }
    </style>
    <title>ChatRoom - <?php echo $room_name; ?></title>
</head>

<body>

<header class="site-header sticky-top py-1 d-inline-flex w-100 p-4 py-2 mb-2">
    <a class="py-2 px-1" href="/"><img src="img/icons8-chat-24.png" alt="image" /></a>
    <nav class="px-3 w-100 d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="/">My ChatRoom</a>
        <a class="py-2 d-none d-md-inline-block" href="/">About</a>
        <a class="py-2 d-none d-md-inline-block" href="/">Contact</a>
    </nav>
</header>

<h2 class="mt-2 mb-4" align="center">Chat Messages - <?php echo $room_name; ?></h2>


<div class="container mt-2">
    <div class="anyClass">
        <div class="message brighter">
            <p>Hello. How are you today?</p>
            <span class="time-right">11:00</span>
        </div>
        <div class="message darker">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-left">11:01</span>
        </div>
    </div>
</div>


<label for="usermsg">
    <input type="text" id="usermsg" class="form-control" size="100%" name="usermsg" placeholder="Add Message">
</label>
<br>
<button class="btn btn-dark mt-3" id="submitsmg" name="submitsmg">SEND</button>

<div class="product-device shadow-sm d-none d-md-block"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">

    let clientmsg = $("#usermsg").val();

    $("#submitsmg").click(function () {
        $.post("postmsg.php",{
            text:clientmsg,
            room:'<?php echo $room_name; ?>',
            ip:'<?php echo $_SERVER['REMOTE_ADDR']; ?>'
        },
        function (data,status) {
            document.getElementsByClassName('anyClass')[0].innerHeight=data;
            return false;
        });
    });
</script>
</body>
</html>

