<?php 
// Set the path to your log file
$logFilePath = '../logs.txt';

// Enable error reporting
error_reporting(E_ALL);

// Set error logging to file
ini_set('log_errors', 1);
ini_set('error_log', $logFilePath);

include 'database/connect.php';
if(isset($_SESSION["user_email"]) || $_SESSION["email_user"] == true || isset($_SESSION['user'])){
	header("location:dashboard");
	exit;
}else{
    header("location:login");
}

?>