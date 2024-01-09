<?php 
session_start();
include 'database/connect.php';

unset($_SESSION["email_user"]);
unset($_SESSION["user_email"]);
unset($_SESSION['mssgs']);
unset($_SESSION['user_data']);
unset($_SESSION['school']);
header("location:login");
?>