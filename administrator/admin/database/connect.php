<?php

session_start();

// if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
// 	header("location:login");
// 	exit;
// }


$conn = mysqli_connect('localhost','root','','bursary');
// session_start();

// //if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//  // header("location: login.php");
//    // exit;
// //}

// $host = 'localhost';
// $username = 'root';  // Replace with your MySQL username
// $password = '';  // Replace with your MySQL password, or use an empty string if no password
// $database = 'bursary';  // Replace with the correct database name

// $conn = mysqli_connect($host, $username, $password, $database);

// if (!$conn) {
//     die('Connection failed: ' . mysqli_connect_error());
// }



?>