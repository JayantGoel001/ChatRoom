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
        include 'db_connect.php';
    }
