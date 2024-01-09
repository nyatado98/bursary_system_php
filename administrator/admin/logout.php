<?php 
session_start();
include 'database/connect.php';

if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true || !isset($_SESSION['log_id'])){
	header("location:login");
	exit;
}

date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:s');
$time = date('H:i:s');
$today = date('Y/m/d');

$sql = "UPDATE logs SET status ='logged Out', logout_time = '$time' WHERE log_id = '".$_SESSION['log_id']."'";
$result = mysqli_query($conn,$sql);

unset($_SESSION["log_id"]);

unset($_SESSION["email_admin"]);
header("location:login");
?>