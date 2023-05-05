<?php
session_start();
require_once 'db_conn.php';

if (!isset($_POST['submit'])) {
    header('location: login.php?unauthorized');
    exit;
} else {
  $user=$_POST['username'];
  $password=$_POST['password'];

  $sql= "SELECT * FROM username WHERE Username = '$user' AND Password ='$password'";


  $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) == 0){
        header('location: login.php?error');
        exit;
    } else {
        $_SESSION['user'] = $_POST['username'];
        header('location: welcome.php');
        exit;
    }
}

