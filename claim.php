<?php
    $room = $_POST['room'];
    if (strlen($room)>20 or strlen($room)<2){
        $message = "Please Choose A Name between 2 to 20 characters.";
        echo "<script language='JavaScript'>";
        echo "alert('$message');";
        echo "window.location='https://localhost/ChatRoom';";
        echo "</script>";
    }elseif ()
