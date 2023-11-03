<?php 
session_start();
include 'database/connect.php';

unset($_SESSION["email_admin"]);
header("location:login");
?>