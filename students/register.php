<?php 
include 'database/connect.php';

$firstname = $lastname = $fullname = $email = $password = $re_password = "";
$firstname_err = $lastname_err = $email_err = $password_err = $mssg = $re_pass_err = "";

if(isset($_POST['register'])){
    if(empty($_POST['firstname'])){
        $firstname_err = "Please enter first name";
    }else{
        $firstname = trim($_POST['firstname']);
    }
    if(empty($_POST['lastname'])){
        $lastname_err = "Please enter last name";
    }else{
        $lastname = trim($_POST['lastname']);
    }
    if(empty($_POST['email'])){
        $email_err = 'Please enter your email address';
    }else{
        $email = $_POST['email'];
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $email_err = "This email address is already taken";
        }else{
            $email = $_POST['email'];
        }
    }
if(empty($_POST['password'])){
    $password_err = 'Please enter your password';
}else{
    $password = $_POST['password'];
}
if(empty($_POST['re_password'])){
    $re_pass_err = 'Please confirm password';
}elseif($_POST['re_password'] != $_POST['password']){
    $re_pass_err = 'The passwords doesnt match';
}else{
     $re_password = $_POST['re_password'];
}
date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$today = date('Y/m/d  H:i:sa');
$year = date('Y');

if(empty($email_err)&&empty($re_pass_err)&&empty($password_err)){
    $fullname = $_POST['firstname'].' '.$_POST['lastname'];
    $sql = "INSERT INTO users (fullname,email,password,created_at,updated_at)VALUES('$fullname','$email','$password','$today','$today')";
    $query = mysqli_query($conn,$sql);
    if($query){
        $mssgs = "You have successfully register login here";
        $_SESSION['mssgs'] = $mssgs;
        header("location:login?success=");
    }else{
        echo "Could not register user something went wrong";
    }
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
    <link rel="shortcut icon"href="images/nandi.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src='bootstrap/jquery/jquery-3.5.1.min.js'></script>
    <title>Register page-students:</title>
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
    <div class="container col-md-8 bg-dark" id="main" style="margin-top: 13vh;border-radius: .5em;">
        <div class="row p-3" style="border: .1px light black">
        <div class="col-md-6">
            
            <div class="card-header jalign-item-center" style="background-image: url('images/emgwen.png');background-position:center;background-repeat:no-repeat;height:70vh">
                
                
            </div>
            </div>
            <div class="col-md-6" style="margin-top: 0vh">
            <div style="text-decoration:underline;;color:white">
              <h4 class="text-center font-weight-bold mb-3" style="font-size:35px"><span style="color: #0f893b">Register</span> <span style="color: orange">Here</span></h4>
              </div>
            <div class="card-body">
                <form method="POST" action="">
                <label class="font-weight-bold" style="color: white;">Enter Parent Firstname:</label>
                <input type="text" name="firstname" class="form-control <?php echo $firstname_err ? 'border border-danger' : '';?>" id="" placeholder="john" value="<?php echo $firstname;?>">
                <span class="text-danger"><?php echo $firstname_err;?></span><br>
                  
                <label class="font-weight-bold" style="color: white;">Enter Parent Lastname :</label>
                <input type="text" name="lastname" class="form-control <?php echo $lastname_err ? 'border border-danger' : '';?>" id="" placeholder="doe" value="<?php echo $lastname;?>">
                <span class="text-danger"><?php echo $lastname_err;?></span><br>

                <label class="font-weight-bold" style="color: white;">Enter Parent Email Address :</label>
                <input type="email" name="email" class="form-control <?php echo $email_err ? 'border border-danger' : '';?>" id="" placeholder="email@gmail.com" value="<?php echo $email;?>">
                <span class="text-danger"><?php echo $email_err;?></span><br>
                
                <label class="font-weight-bold" style="color: white;">Enter Password :</label>
                <input type="password" name="password" class="form-control <?php echo $password_err ? 'border border-danger' : '';?>" id="" placeholder="********" value="<?php echo $password;?>">
                
                <span class="text-danger"><?php echo $password_err;?></span><br>
                
                <label class="font-weight-bold" style="color: white;">Re-Enter Password :</label>
                <input type="password" name="re_password" class="form-control <?php echo $re_pass_err ? 'border border-danger' : '';?>" id="" placeholder="********" value="<?php echo $re_password;?>">
                
                <span class="text-danger"><?php echo $re_pass_err;?></span><br>
                
                <input type="submit" class="btn btn-primary mt-2 form-control font-weight-bold" style="font-size:17px" name="register" value="R E G I S T E R">
                </form>
                <div class="row justify-content-between">
                   <p class="mt-5" style="font-size:18px;color: white;" >If Registered ?. Click <a href="login"> Here</a></p>
            </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src='bootstrap/js/bootstrap.min.js'></script>
<script src='bootstrap/popper/popper.min.js'></script>
<script src='bootstrap/js/bootstrap.js'></script>
</html>