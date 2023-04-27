<?php

    $conn = mysqli_connect("localhost","root","","todo_app");

    if(!$conn){
        die('接続はできませんでした'. mysqli_connect_error());
    }

?>