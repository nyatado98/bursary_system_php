<?php
include 'database/connect.php';

$user_email = $password = "";
$email_err = $password_err = $message = $email_reset = "";
$email_reset_err = "";
$user = "";
// $mssgs = "You have successfully register login here";
//  $_SESSION['mssgs'] = $mssgs;
// $mssgs = $_SESSION['mssgs'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST["user_email"]))){
        $email_err = "Enter email address";
    }elseif(isset($_POST["user_email"])){
        $sql = "SELECT * FROM users WHERE email ='".$_POST['user_email']."'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
            $message = "The email address is not registered";
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
        $query = "SELECT * FROM users WHERE email = '".$user_email."'";
        $result = mysqli_query($conn, $query);
        while($pass = $result->fetch_assoc()){
            if($password == $pass['password']){
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user'] = $pass['fullname'];
                $_SESSION['email_user'] = true;
                
            header("Location:dashboard");
            }else{
                $message = "Wrong password";
            }
        }
    }else{
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"href="images/log_1.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
    <title>Login page-students:</title>
</head>
<body>
    <div class="container col-md-8" style="margin-top: 20vh">
        <div class="row" style="border: .1px light black">
        <div class="col-md-6">
            
            <div class="card-header jalign-item-center" style="background-image: url('images/log_1.png');background-position:center;background-repeat:no-repeat;height:50vh">
                
                <h4 class="text-center font-weight-bold">LOGIN HERE</h4>
            </div>
            </div>
            <div class="col-md-6" style="margin-top: 2vh">
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
                <!-- <span class="text-success font-weight-bold"><?php echo $mssgs;?></span> -->
                <!-- <span class="text-danger font-weight-bold"><?php echo $message;?></span> -->

                <!-- @if(session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                    <span class="font-weight-bold">{{session()->get('message')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                    <span class="font-weight-bold">{{session()->get('success')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                @endif
                @if($errors->has('email_reset'))
                <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                    <span class="font-weight-bold">{{$errors->first('email_reset')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                 @endif -->
                <form method="POST" action="">
                   
                <label class="font-weight-bold">Enter Email address :</label>
                <input type="text" name="user_email" class="form-control <?php echo ($email_err) ? 'border border-danger' : '';?>"  placeholder="example@admin.com" value="<?php echo $user_email;?>">
                
                <span class="text-danger font-weight-bold"><?php echo $email_err;?></span><br>
               
                <label class="font-weight-bold">Enter Password :</label>
                <input type="password" name="password" class="form-control <?php echo ($password_err) ? 'border border-danger' : '';?>" placeholder="********">
                
                <span class="text-danger font-weight-bold"><?php echo $password_err;?></span><br>
                
                <input type="submit" class="btn btn-primary mt-2 form-control font-weight-bold" style="font-size:17px" name="login" value="L O G I N">
                </form>
                <div class="row justify-content-between">
                   <p class="mt-5">If not Registered Click <a href="register"> Here</a></p>
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
                 <input type="email" name="email" class="form-control" id="" required>
             
                 <span><?php echo $email_reset_err;?></span><br>
                 
                 <input type="submit" value="Reset" name="reset" class="btn btn-primary mt-2">
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