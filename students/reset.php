<?php

include 'database/connect.php';

$re_password = $password = "";
$re_password_err = $password_err = $message = $email_reset =$mssge= "";
$err = "";
$user = "";

if(isset($_GET['email'])){
    $email = $_GET['email'];

if(isset($_POST['reset'])){
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password";
    }else{
        $password = trim($_POST['password']);
    }
    if(empty(trim($_POST["re_password"]))){
        $re_password_err = "Please re-enter password";
    }else{
        $re_password = trim($_POST["re_password"]);
        if($re_password != $password){
            $re_password_err = "Passwords do not match";
        }
        else{
        $re_password = trim($_POST["re_password"]);
        }
    }
    if(empty($password_err) && empty($re_password_err)){
        $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if($result){
            header("location:login?s");
        }else{
            $err = "Could not change password. Something went wrong";
        }
    }else{
        
    }
   
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"href="images/nandi.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
    <title>Reset password page:</title>
    <style>
body{
    background-image: url('images/nandi-hills.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
        </style>
</head>
<body>
    <div class="container col-md-8 bg-dark" style="margin-top: 20vh;border-radius: .5em;">
        <div class="row p-3" style="border: .1px light black">
        <div class="col-md-6">
            
            <div class="card-header align-item-center" style="background-image: url('images/emgwen.jpg');background-position:center;background-repeat:no-repeat;height:50vh;">
                
                
            </div>
            </div>
            <div class="col-md-6" style="margin-top: 2vh">
            
            <div class="card-body">
                         
            <?php if(isset($_GET['success'])){
						
						$message = "Password changed successfully. Login Now.";
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky;margin-top:17vh">
                                                <a href="http://localhost/nrs_projects/New%20folder/bursary_system_php/students/login" class="font-weight-bold p-3">Login Now</a>
                                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button> -->
                                                     </div>
													 <?php }else{ ?>
                                                        <h4 class="text-center font-weight-bold mb-3"  style="font-size:35px;text-decoration:underline;color:white"><span style="color: #0f893b">Reset</span> <span style="color: orange">Password</span></h4>
                 <span class="text-danger"><?php echo $err;?></span>
                <form method="POST" action="">
                   
                <label class="font-weight-bold" style="color: white;">Enter Password :</label>
                <input type="password" name="password" class="form-control <?php echo ($password_err) ? 'border border-danger' : '';?>"  placeholder="*******" value="<?php echo $password;?>">
                
                <span class="text-danger font-weight-bold"><?php echo $password_err;?></span><br>
               
                <label class="font-weight-bold" style="color: white;">Re-Enter Password :</label>
                <input type="password" name="re_password" class="form-control <?php echo ($re_password_err) ? 'border border-danger' : '';?>" placeholder="********" value="<?php echo $re_password;?>">
                
                <span class="text-danger font-weight-bold"><?php echo $re_password_err;?></span><br>
                
                <input type="submit" class="btn btn-primary mt-2 form-control font-weight-bold" style="font-size:17px" name="reset" value="Reset Password">
                </form>
														<?php } ?>
                
            </div>
        </div>
    </div>
</body>
<script src='bootstrap/js/bootstrap.min.js'></script>
<script src='bootstrap/popper/popper.min.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</html>