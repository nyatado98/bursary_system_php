<?php 
include 'students/database/connect.php';
if(isset($_SESSION["user_email"]) || $_SESSION["email_user"] == true){
	header("location:students/dashboard");
	exit;
}
require('students/dashboard.php');
?>