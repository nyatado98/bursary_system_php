<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'database/connect.php';

$user_email = $password = "";
$email_err = $password_err = $message = $email_reset =$mssge= "";
$email_reset_err = "";
$user = "";

require 'vendor/autoload.php';
 require 'vendor/phpmailer/phpmailer/src/Exception.php';
 require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
 require 'vendor/phpmailer/phpmailer/src/SMTP.php';
$mail = new PHPMailer();

// $mssgs = "You have successfully register login here";
//  $_SESSION['mssgs'] = $mssgs;
// $mssgs = $_SESSION['mssgs'];
if(isset($_POST['login'])){
    if(empty(trim($_POST["user_email"]))){
        $email_err = "Enter email address";
    }elseif(isset($_POST["user_email"])){
        $sql = "SELECT * FROM users WHERE email ='".$_POST['user_email']."'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
            $mssge = "The email address is not registered";
        }else{
            $user_email = trim($_POST["user_email"]);
        }
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Enter password";
    }else{
        $password = trim($_POST["password"]);
    }
    if(empty($email_err) && empty($password_err)){
        $query = "SELECT fullname,password FROM users WHERE email = '".$user_email."'";
        $result = mysqli_query($conn, $query);
        while($pass = $result->fetch_assoc()){
            if($password == $pass['password']){
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user'] = $pass['fullname'];
                $_SESSION['email_user'] = true;
                
            header("Location:application");
            }else{
                $mssge = "Wrong password";
            }
        }
    }else{
        
    }
}
if(isset($_POST['reset'])){
    $email_reset = $_POST['email_reset'];
        $sql = "SELECT * FROM users WHERE email ='".$_POST['email_reset']."'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
            $mssge = "The email address is not in our records";
        }else{
            $url = "https://bursary.rf.gd/students/reset?email=$email_reset";
            $html ="Reset Password by clicking the link " . "$url";
            //send mail
            $mailto = $_POST['email_reset'];
            $mailSub = 'NANDI COUNTY';
            $mailMsg = $html;
        
            $mail ->IsSmtp();
           $mail ->SMTPDebug = 0;
           $mail ->SMTPAuth = true;
           $mail ->SMTPSecure = 'ssl';
           //$mail ->SMTPSecure = 'tsl';
           $mail ->Host = "smtp.gmail.com";
           $mail ->Port = 465; // or 587 or 465
           //$mail ->IsHTML(true);
           $mail ->Username = "danndong080@gmail.com";
           $mail ->Password = "okzumpamraiksdcq";
           $mail ->SetFrom("ict@nandicounty.com");
           $mail ->Subject = $mailSub;
           $mail ->Body = $mailMsg;
           $mail ->AddAddress($mailto);
        
           $mail->Send();
           $mssg = $fullname." Application made successfully and mail has been sent to applicant.";
           $_SESSION['message'] = $mssg;
           $message = "Application made successfully and mail has been sent to applicant.";
            header("location:login?m=");
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
    <title>Login page-students:</title>
    <style>
body{
    background-image: url('images/nandi-hills.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
@media (max-width:800px){
    .container{
        margin-top:2vh;
    }
}
@media (min-width:801px){
    .container{
        margin-top:20vh;
    }
}

        </style>
</head>
<body>
    <div class="container col-md-8 bg-dark main" style="border-radius: .5em;">
        <div class="row" style="border: .1px light black">
        <!--<div class="">
            
            <!--<div class="card-header align-item-center">-->
               <img src="images/emgwen.png" class="img-fluid col-md-6" >
                
            <!--</div>-->
            <!--</div>-->
            <div class="col-md-6" style="margin-top: ">
            <div class="card-body">
            <?php if(isset($mssgs)){?>
                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $mssgs;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>

                                                        <?php } ?>
                                                        <?php if(isset($_GET['m'])){
                        
                        $m = "Reset Link Sent Successfully to your email.";
                        ?>
                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $m;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>
                                                        
                                                        <?php } ?>
                                                         <?php if(isset($_GET['success'])){
                        
                        $message = "You have successfully register. Login Now.";
                        ?>
                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>
                                                        
                                                        <?php } ?>
                                                         <?php if(isset($_GET['s'])){
                        
                        $message = "You have successfully reset your password. Login Now.";
                        ?>
                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>
                                                        
                                                        <?php } ?>
               
                 <h4 class="text-center font-weight-bold mb-3"  style="font-size:35px;text-decoration:underline;color:white"><span style="color: #0f893b">Login</span> <span style="color: orange">Here</span></h4>
                 <span class="text-danger"><?php echo $mssge;?></span>
                <form method="POST" action="">
                   
                <label class="font-weight-bold" style="color: white;">Enter Email address :</label>
                <input type="text" name="user_email" class="form-control <?php echo ($email_err) ? 'border border-danger' : '';?>"  placeholder="example@admin.com" value="<?php echo $user_email;?>">
                
                <span class="text-danger font-weight-bold"><?php echo $email_err;?></span><br>
               
                <label class="font-weight-bold" style="color: white;">Enter Password :</label>
                <input type="password" name="password" class="form-control <?php echo ($password_err) ? 'border border-danger' : '';?>" placeholder="********">
                
                <span class="text-danger font-weight-bold"><?php echo $password_err;?></span><br>
                
                <input type="submit" class="btn btn-primary mt-2 form-control font-weight-bold" style="font-size:17px" name="login" value="L O G I N">
                </form>
                <div class="row justify-content-between">
                   <p class="mt-5" style="color: white;">If not Registered Click <a href="register"> Here?.</a></p>
                   <a href="" data-toggle="modal" data-target="#Modal" class="mt-5">Forgot Password?</a>
            </div>
            </div>
        </div>
    </div>

     <!-- reset password modal -->
     <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                <h4 class="text-center">Reset Password</h4>
             </div>
             <div class="modal-body">
                <form method="post" action="">
                  
                <label class="font-weight-bold">Enter Email :</label>
                 <input type="email" name="email_reset" class="form-control" id="" required>
             
                 <span><?php echo $email_reset_err;?></span><br>
                 
                 <input type="submit" value="Send Reset Link" name="reset" class="btn btn-primary mt-2">
                </form>
             </div>
         </div>
     </div>
 </div>
</body>
<script src='bootstrap/js/bootstrap.min.js'></script>
<script src='bootstrap/popper/popper.min.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</html>