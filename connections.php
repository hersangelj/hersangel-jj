<?php
    $connection = mysqli_connect("localhost:3307", "root", "", "MyDB");
        if(mysqli_connect_error()){
            echo "Failed to connect to mysql: " .mysqli_connect_error();
        }else{
            echo "Connected";
        }
?>