<<<<<<< HEAD
<?php 
include 'students/database/connect.php';
if(isset($_SESSION["user_email"]) || $_SESSION["email_user"] == true){
	header("location:students/dashboard");
	exit;
}
require('students/dashboard.php');

=======
<?php 
include 'students/database/connect.php';
if(isset($_SESSION["user_email"]) || $_SESSION["email_user"] == true){
	header("location:students/dashboard");
	exit;
}
require('students/dashboard.php');

>>>>>>> 2019fb6bd2dd2ea15b95e71ca458d606c33ff2c1
?>