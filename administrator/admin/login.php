<?php 
include 'database/connect.php';

$email = $password = "";
$email_err = $password_err = $message = $email_reset = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = "Enter email address";
    }elseif(isset($_POST["email"])){
        $sql = "SELECT * FROM admins WHERE email ='".$_POST['email']."'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
            $message = "The email address is not registered";
        }else{
            $email = trim($_POST["email"]);
        }
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Enter password";
    }else{
        $password = trim($_POST["password"]);
    }
    if(empty($email_err) && empty($password_err)){
        $query = "SELECT password FROM admins WHERE email = '".$email."'";
        $result = mysqli_query($conn, $query);
        while($pass = $result->fetch_assoc()){
            if($password == $pass['password']){
                $_SESSION['email'] = $email;
                $_SESSION['email_admin'] = true;
                
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
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon"href="images/log_1.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
    <title>Login page:</title>
</head>
<body>
    <div class="container col-md-8" style="margin-top: 20vh">
        <div class="row" style="border: .1px light black">
        <div class="col-md-6">
            
            <div class="card-header jalign-item-center" style="background-image: url('images/log_1.png');background-position:center;background-repeat:no-repeat;height:50vh">
                
                <h4 class="text-center font-weight-bold">LOGIN HERE</h4>
            </div>
            </div>
            <div class="col-md-6" style="margin-top: 6vh">
            <div class="card-body"> 
                <!-- <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky"> -->
                    <span class="font-weight-bold text-danger"><?php echo $message;?></span>
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div> -->
               
                <form method="POST" action="">
                <label class="font-weight-bold">Enter Email address :</label>
                <input type="email" name="email" class="form-control" id="" placeholder="example@admin.com" value="<?php echo $email;?>">
                <span class="text-danger"><?php echo $email_err;?></span><br>
                <label class="font-weight-bold">Enter Password :</label>
                <input type="password" name="password" class="form-control" id="" placeholder="********" value<?php echo $password;?>>
                <span class="text-danger"><?php echo $password_err;?></span><br>
                <input type="submit" class="btn btn-primary mt-2" value="LOGIN">
                </form>
                <div class="row justify-content-between">
                    <!-- <p class="mt-5">If not Registered Click <a href="{{url('register')}}"> Here</a></p>  -->
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
                <form method="post" action="{{url('reset_password')}}">
                <label class="font-weight-bold">Enter Email :</label>
                 <input type="email" name="email" class="form-control" id="" required>
                 <span><?php echo $email_reset;?></span><br>
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