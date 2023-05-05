<?php

$server = "localhost";
    $user = "root";
    $password = "";
    $database = "forum";

    $conn= mysqli_connect($server, $user, $password,$database,);
    if(!$conn){
        die ('conection to database failed. '.mysqli_connect_error());
    }
