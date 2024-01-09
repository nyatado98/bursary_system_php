<?php 

include 'database/connect.php';
if(isset($_SESSION["user_email"]) || $_SESSION["email_user"] == true || isset($_SESSION['user'])){
	header("location:dashboard");
	exit;
}else{
    header("location:login");
}

?>