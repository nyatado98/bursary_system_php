<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
    header("location:login");
    exit;
}

require "../vendor/autoload.php";
require __DIR__ . '../vendor/autoload.php';

use \Savannabits\Advantasms\Advantasms;

ini_set('include_path', get_include_path() . PATH_SEPARATOR . 'php.ini');
// require "../vendor/autoload.php";
// require __DIR__ . '../vendor/autoload.php';
// use Twilio\Rest\Client;

// $dotenv = new Symfony\Component\Dotenv\Dotenv(__DIR__);
// $dotenv->load('../.env');
// include('php.ini');

// Get the value of the upload_max_filesize directive.
// $uploadMaxFilesize = ini_get('upload_max_filesize');

//load composer autoloader
require 'vendor/autoload.php';
 require 'vendor/phpmailer/phpmailer/src/Exception.php';
 require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
 require 'vendor/phpmailer/phpmailer/src/SMTP.php';
$mail = new PHPMailer();

date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:s');
$year = date('Y');
$today = date('Y/m/d');
$app_ref ='BUR' .rand(1000,9999);
$firstname = $lastname = $fullname = $gender = $age = $reg_no = $parent_guardian_name = $phone = $occupation = $family_status = $email = $id_no = $county = $ward = $location = $sub_location = $school_level = $school_name = $bank_name = $account_no = $school_doc = $fee_structure = "";

$firstname_err = $lastname_err = $fullname_err = $gender_err = $age_err = $reg_no_err = $parent_guardian_name_err = $phone_err = $occupation_err = $family_status_err = $email_err = $id_no_err = $county_err = $ward_err = $location_err = $sub_location_err = $school_level_err = $school_name_err = $bank_name_err = $account_no_err = $school_doc_err = $fee_structure_err = "";
$errors = $dob = "";
$kapsabet_location = $kapkangani_location ='';

$kilibwoni_sub_location = $lolminingai_sub_location = $kipsigak_sub_location = $kipture_sub_location = $kabirirsang_sub_location =
$arwos_sub_location = $kaplamai_sub_location = $tulon_sub_location = $terige_sub_location = $kamobo_sub_location = $township_sub_location
= $kiminda_sub_location = $kapkangani_sub_location = $chepkumia_sub_location ="";
if(isset($_POST['apply'])){

    if(empty($_POST['dob'])){
        $age_err = "Please enter date of birth";
    }else{
    // Get the user's date of birth from the input field.
$dob = $_POST['dob'];

// Convert the user's date of birth to a PHP DateTime object.
$dateOfBirthObject = new DateTime($dob);

// Get the current date and time using the date() function.
$currentDateAndTime = date('Y-m-d H:i:s');

// Convert the current date and time to a PHP DateTime object.
$currentDateAndTimeObject = new DateTime($currentDateAndTime);

// Subtract the user's date of birth from the current date and time to get the user's age.
$age = $currentDateAndTimeObject->diff($dateOfBirthObject);
if($age->y < 15){
    $age_err = "The date of birth is less than the minimal age";
}elseif($age->y > 27){
    $age_err = "The date of birth is greater than the maximum age";
}
// Print the user's age to the console.
// echo $age->y;

    }
      if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
        $location_err = "Please select location";
    }else{
    
    $kapsabet_location = $_POST['kapsabet_location'];
    $kapkangani_location = $_POST['kapkangani_location'];
    $chepkumia_location = $_POST['chepkumia_location'];
    $kilibwoni_location = $_POST['kilibwoni_location'];
    if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
         $location = '';
     }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
         $location = $kapsabet_location;
    }elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
         $location = $chepkumia_location;
    }elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
         $location = $kapkangani_location;
    }else{
         $location = $kilibwoni_location;
     }
    
    
}
if(empty($_POST['sub_location'])){
    $sub_location_err = "Please select sub-location";
}else{
 $sub_location = trim($_POST['sub_location']);
}
    if(empty($_POST['firstname'])){
        $firstname_err = "Please enter student firstname";
    }else{
        $firstname = trim($_POST['firstname']);
    }
    if(empty($_POST['lastname'])){
        $lastname_err = "Please enter student lastname";
    }else{
        $lastname = trim($_POST['lastname']);
    }
    if(empty($_POST['gender'])){
        $gender_err = "Please select gender";
    }else{
        $gender = trim($_POST['gender']);
    }
    // if(empty($_POST['age'])){
    //     $age_err = "Please select age";
    // }else{
    //     $age = trim($_POST['age']);
    // }

    if(empty($_POST['reg_no'])){
        $reg_no_err = "Please enter reg_no";
    }else{
        $reg_no = trim($_POST['reg_no']);
    }
    if(empty($_POST['parent_guardian_name'])){
        $parent_guardian_name_err = "Please enter parent name";
    }else{
        $parent_guardian_name = trim($_POST['parent_guardian_name']);
    }
    
    if(empty($_POST['phone'])){
        $phone_err = "Please enter phone number";
    }elseif(strlen(trim($_POST['phone'])) < 9){
        $phone_err = "Phone number should not be less than 9 digits.";
    }else{
        $phone =trim($_POST['phone']);
    }
   
    if(empty($_POST['email'])){
        $email_err = "Please enter email";
    }else{
        $email = trim($_POST['email']);
    }
    if(empty($_POST['id_no'])){
        $id_no_err = "Please enter id number";
    }elseif(strlen(trim($_POST['id_no'])) < 8){
        $id_no_err = "ID number should not be less than 8 characters.";
    }else{
        $id_no = trim($_POST['id_no']);
    }
    if(empty($_POST['county'])){
        $county_err = "Please select county";
    }else{
        $county = trim($_POST['county']);
    }
    if(empty($_POST['ward'])){
        $ward_err = "Please select ward";
    }else{
        $ward = trim($_POST['ward']);
    }
  
   
    if(empty($_POST['school_level'])){
        $school_level_err = "Please select level";
    }else{
        $school_level = trim($_POST['school_level']);
    }
    if(empty($_POST['school_name'])){
        $school_name_err = "Please select school  name ";
    }else{
        $school_name = trim($_POST['school_name']);
    }
    $name = $_FILES['school_doc']['name'];
    if(empty($name)){
        $school_doc_err = "Please choose a document";
    }else{
        
             //insert uploads/school doc
             

             $target = "students_upload/";
             $target_file1 =$target . basename($_FILES["school_doc"]["name"]);
             $fileName = basename($_FILES["school_doc"]["name"]);
             $file_size = $_FILES["school_doc"]["size"];
             $file_type = $_FILES["school_doc"]["type"];
             $tmp_name = $_FILES['school_doc']['tmp_name'];
            
             $file_ext = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
         
             $extensions = array("jpeg","jpg","png","pdf","txt","doc","jfif","docx");
             if (!in_array($file_ext, $extensions)) {
                 $school_doc_err = "The file type is not allowed...Please choose another file";
             }
             elseif ($file_size > 5242880 || $file_size <= 0) {
                 $school_doc_err = "The file size is too large....choose another file which is 5MB or less";
             }
    }
    $fee_name = $_FILES['fee_structure']['name'];

    if(empty($fee_name)){
        $fee_structure_err = "Please select fee structure document";
    }
    // if(empty($_POST['account_no'])){
    //     $account_no_err = "Please enter account number";
    // }else{
    //     $account_no = trim($_POST['account_no']);
    // }
    if(empty($fullname_err) && empty($age_err)&& empty($gender_err)&& empty($parent_guardian_name_err)&& empty($phone_err) && empty($email_err) && empty($id_no_err)&& empty($county_err)&& empty($ward_err)&& empty($location_err)&& empty($sub_location_err)
    && empty($adm_upi_reg_no_err) && empty($school_level_err)&& empty($school_name_err)&& empty($school_doc_err)&& empty($fee_structure_err)){
        $fullname = $firstname.' '.$lastname;
    $sql = "SELECT * FROM applications WHERE student_fullname ='$fullname' AND year = '$year'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count >0){
        $message = $fullname." You already made an application!. You cannot make more than one application.";
        $_SESSION['mssg'] = $message;
        header("location:application?mssg=");
    }else{
        $sql = "SELECT * FROM students WHERE student_fullname = '$fullname' AND parent_email = '$email'";
        $results = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($results);
        if($count <= 0){
            
            $sql = "INSERT INTO students (student_fullname,age,gender,parent_guardian_name,phone,parent_email,
            parent_id_no,county,ward,location,sub_location,school_level,adm_upi_reg_no,school_name,created_at,updated_at,year)VALUES('$fullname','".$age->y."','$gender','$parent_guardian_name','$phone','$email',
            '$id_no','$county','$ward','$location','$sub_location','$school_level','$reg_no','$school_name','$current_date','$current_date','$year')";
            $res = mysqli_query($conn,$sql);

            $sql1 = "INSERT INTO parents (parent_guardian_name,student_fullname,phone,parent_email,parent_id_no,created_at,updated_at)VALUES('$parent_guardian_name','$fullname','$phone','$email','$id_no','$current_date','$current_date')";
            $re = mysqli_query($conn,$sql1);

            $sql2 = "INSERT INTO applications (reference_number,parent_email,parent,student_fullname,adm_upi_reg_no,school_type,school_name,ward,sub_location,location,status,
            created_at,updated_at,today_date,year)VALUES('$app_ref','$email','$parent_guardian_name','$fullname','$reg_no','$school_level','$school_name','$ward','$sub_location','$location','Pending...',
            '$current_date','$current_date','$today','$year')";
            $ress = mysqli_query($conn,$sql2);

       move_uploaded_file($tmp_name,$target_file1);
        // move_uploaded_file($tmp_name,$target_file2);

    $sql = "INSERT INTO students_uploads (reference_number,student_fullname,school_id_letter,fee_structure,created_at,updated_at)VALUES('$app_ref','$fullname','$fileName','','$current_date','$current_date')";
    $query = mysqli_query($conn,$sql);
    if($query){
        
          //insert uploads/school fee_structure
          $target = "students_upload/";
          $target_file2 =$target . basename($_FILES["fee_structure"]["name"]);
          $fee_fileName = basename($_FILES["fee_structure"]["name"]);
          $file_size = $_FILES["fee_structure"]["size"];
          $file_type = $_FILES["fee_structure"]["type"];
          $tmp_name = $_FILES['fee_structure']['tmp_name'];
         
          $file_ext = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
      
          $extensions = array("jpeg","jpg","png","PNG","pdf","txt","doc","jfif","docx");
          if (!in_array($file_ext, $extensions)) {
              $fee_structure_err = "The file type is not allowed...Please choose another file";
          }
          elseif ($file_size > 5242880 || $file_size <= 0) {
              $fee_structure_err = "The file size is too large....choose another file which is 5MB or less";
          }
    

        $sql = "UPDATE students_uploads SET fee_structure = '$fee_fileName' WHERE reference_number = '$app_ref'";
        $r = mysqli_query($conn,$sql);
        if($r){
        move_uploaded_file($tmp_name,$target_file2);
        }
        
    }
// send sms using advantasms


$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$phone;
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear ".$parent_guardian_name.", You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.")->send();
               //send sms via twilio
//             $accountSid = getenv('TWILIO_ACCOUNT_SID');
// $authToken = getenv('TWILIO_AUTH_TOKEN');
// $twilioNumber = "+17124300592"; // Your Twilio phone number
// $recipientNumber = $phone; // Recipient's phone number
// $message = "You have Successfully Applied for Emgwen NGCDF Student Bursary for financial Year 2023 - 2024.";

// $client = new Client($accountSid, $authToken);

// try {
//   $message = $client->messages->create(
//     $recipientNumber,
//     array(
//       'from' => $twilioNumber,
//       'body' => $message
//     )
//   );
//   echo "SMS message sent successfully!";
// } catch (Exception $e) {
//   echo "Error sending SMS: " . $e->getMessage();
// }


            //send mail
            $mailto = $email;
            $mailSub = 'NANDI COUNTY';
            $mailMsg = "Dear ".$parent_guardian_name.", You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.";
        
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
            header("location:application?message=");
        }else{
            $sql = "INSERT INTO applications (reference_number,parent_email,parent,student_fullname,adm_upi_reg_no,school_type,school_name,ward,sub_location,location,status,
            created_at,updated_at,today_date,year)VALUES('$app_ref','$email','$parent_guardian_name','$fullname','$adm_upi_reg_no','$school_level','$school_name','$ward','$sub_location','$location','Pending...',
            '$current_date','$current_date','$today','$year')";
            $rs = mysqli_query($conn,$sql);


            // send sms using advantasms


$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$phone;
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear '".$parent_guardian_name."', You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.")->send();
       //send sms via twilio
//             $accountSid = getenv('TWILIO_ACCOUNT_SID');
// $authToken = getenv('TWILIO_AUTH_TOKEN');
// $twilioNumber = "+17124300592"; // Your Twilio phone number
// $recipientNumber = $phone; // Recipient's phone number
// $message = "You have Successfully Applied for Emgwen NGCDF Student Bursary for financial Year 2023 - 2024.";

// $client = new Client($accountSid, $authToken);

// try {
//   $message = $client->messages->create(
//     $recipientNumber,
//     array(
//       'from' => $twilioNumber,
//       'body' => $message
//     )
//   );
//   echo "SMS message sent successfully!";
// } catch (Exception $e) {
//   echo "Error sending SMS: " . $e->getMessage();
// }
            //send mail
            $mailto = $email;
            $mailSub = 'NANDI COUNTY';
            // $mailMsg = "Your application for ".$app_ref." reference number has been received successfully. Use the reference number to track your application process.
            // Thank You.\n";
            $mailMsg = "Dear ".$parent_guardian_name.", You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.";
        
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
           $mssg = $fullname.", Application made successfully and mail has been sent to applicant.";
            $_SESSION['message'] = $mssg;
            $message = "Application made successfully and mail has been sent to applicant.";
            header("location:application?message=");
        }
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include('config/head.php');?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <style>
  body{
      font-family: 'Roboto', sans-serif;
  }
    .select-option:after{
    content:"";
    position:absolute;
    right:15px;
    top:50%;
    margin-top:-8px;

}
.select-option input{
    cursor:pointer;
}
.search{
    padding:20px;
}
.contents{
    position:absolute;
    background-color:white;
    z-index: 99;
    display:none;
}
.search input{
    font-size:17px;
    padding:15px;
    outline:0;
    border:1px solid #b3b3b3;
}
.options{
    border:1px solid #333;
    padding:0;
    margin-top:10px;
    overflow-y: auto;
    max-height: 220px;
}
.options li{
    padding :10px 15px;
    /* border-radius: 5px; */
    font-size:15px;
    cursor:pointer;
    border-bottom: 1px solid gray;
}
.options li:hover{
    background-color: #b2b2b2;
}
.select-box.active .contents{
    display:block;
}
.select-box.active .select-option:after{
    transform: rotate(-180deg);
}
/* #head {
    border: 0.1px solid #6bc7fc;
    border-radius: 5px;
} */
.color {
    color: #6bc7fc;
}
.progress {
  width: 0%;
  height: 100%;
  background-color: #008000;
  transition: width 0.5s ease-in-out;
}

.progress-bar {
     position: fixed;
  top: 13px;
  margin-top:70px;
  width: 80%;
  height: 20px;
  background-color: #ccc;
  border: 1px solid #ddd;
  border-radius: .5em;
}
.percentage{
    position: absolute;
    left: 50%;
    margin-bottom: 10px;
    top:-12px;
    font-weight: bold;
    transform: translate(-50%, -50%);
    font-size: 16px;
    color:#000;
}

.green {
  background-color: #008000;
}
.preview-card {
  width: 250px;
  height: 250px;
  border: 1px solid black;
  /* padding: 10px;
  margin: 10px; */
}

#preview-image {

  width: 250px;
  height: 250px;
}
#preview {
    width: 250px;
  height: 250px;
}
body{
    overflow: auto;
}
  /* Style the container */
        .input-container {
            position: relative;
        }

        /* Style the icon */
        .input-icon {
            /*height: 35px;
            width: 28px;*/
/*            background-color: black;*/
font-weight: bold;
font-size: 14px;
            position: absolute;
            left: 19px;
            top: 54%;
            transform: translateY(-50%);
            color: black; /* Adjust the color as needed */
        }

        /* Style the input field */
        .input-field {
            padding-left: 30px; /* Space for the icon */
/*            width: 200px; /* Adjust the width as needed */*/
        }

</style>
<script>


    </script>
    <body>
    
        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <!-- Header -->
            <div class="header">
                <!-- Logo -->
                <div class="header-left">
                    <a href="dashboard" class="logo">
                        <img src="images/CDF LOGO.jpg" alt="Logo">
                    </a>
                    <a href="dashboard" class="logo logo-small">
                        <img src="images/CDF LOGO.jpg" alt="Logo" width="30" height="30">
                    </a>
                </div>
                <!-- /Logo -->
                
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-align-left"></i>
                        <label style="font-weight: 900; color: #0f893b; font-size: 25px;" class="mx-5">BURSARY APPLICATION SYSTEM</label>
                </a>
                <a class="mobile_btn" id="mobile_btn">
                    <i class="fas fa-bars"></i>
                </a>
                        </div>
            <!-- /Header -->
            
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul >
                            <li class="menu-title"> 
                                <!--<span>Main Menu</span>-->
                            </li>
                            <li > 
                                <a href="dashboard"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="active"> 
                                <a href="application"><i class="fa fa-file"></i> <span>New Application</span></a>
                            </li>
                            
                            <!-- <li> 
                                <a href="{{url('students/request_application"><i class="fa fa-key"></i> <span>Request Application</span></a>
                            </li> -->
                            <li> 
                                <a href="my_applications"><i class="fa fa-list"></i> <span>My Applications</span></a>
                            </li>
                            <li> 
                                <a href="profile"><i class="fa fa-user"></i> <span>Profile</span></a>
                            </li>
                    
                            <li> 
                                <a href="logout"><i class="fa fa-arrow-left"></i> <span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->
            
            <!-- Page Wrapper -->
            <div class="page-wrapper">
            
                <div class="content container-fluid">

                    <div class="page-header col-md-12">
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <!--<h3 class="page-title">Welcome Admin!</h3>-->
                                <span class="font-weight-bold page-title" style="font-size:15px">WELCOME : <?php 
                                    $sql = "SELECT fullname FROM users WHERE email = '".$_SESSION['user_email']."'";
                                    $q = mysqli_query($conn,$sql);
                                    while($r = $q->fetch_assoc()){
                                        $user = $r['fullname'];
                                        echo $user;
                                    }
                                ?> </span>
                                <ul class="breadcrumb">
                                    <!--<li class="breadcrumb-item active"><label style="font-weight: 900; color: #0f893b; font-size: 25px">BURSARY APPLICATION SYSTEM</label></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        
                            <!-- Revenue Chart -->
                            <div class="card card-chart">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">New</span> - <span style="color: orange">Application</span></h5>
                                        </div>
                                        <div class="col-6">
                                                                                    
                                        </div>
                                    </div>                      
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="card-header" id="head" >
                                        <?php if(isset($_GET['mssg'])){
                        $mssg = $_SESSION['mssg'];
                        $message = $mssg;
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>
                                                        
                                                        <?php } ?>
                                                        <?php if(isset($_GET['message'])){
                        $mssg = $_SESSION['message'];
                        $message = $mssg;
                        ?>
                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
                                                     <?php }else{ ?>
                                                        
                                                        <?php } ?>
                                           
                                            <h4 class="text-center font-weight-bold color ">Applicant's Details</h4>
                                            
                                        </div>
             
<div class="progress-bar mx-5 sticky-top col-md-9">
    <div class="progress " id="progress"></div>
    <span class="percentage" id="percentage">0%</span>
</div>
                                        <div class="card-body mt-2">
                                            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="firstname">Student First-Name :</label>
                                                        <input type="text" name="firstname" id="first" class="form-control <?php echo $firstname_err ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter Student firstname"  value="<?php echo $firstname;?>" >
                                                        
                                                        <span class="text-danger"><?php echo $firstname_err;?></span>
                                                       
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="lastname">Student Last-Name :</label>
                                                        <input type="text" name="lastname" id="last" class="form-control <?php echo $lastname_err ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter Student lastname" value="<?php echo $lastname;?>" >
                                                        
                                                        <span class="text-danger"><?php echo $lastname_err;?></span>
                                                       
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="gender">Gender :</label>
                                                        <select name="gender" id="gender" class="form-control  <?php echo $gender_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <!-- <option value = ""></option> -->
                                                            <option value="<?php echo $gender ? $gender : '';?>" selected><?php echo $gender ? $gender : '';?></option>
                                                            <option> Male</option> 
                                                            <option> Rather Not Say</option> 
                                                            <option>Female</option>
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $gender_err;?></span>
                                                        
                                                    </div>
                                                  
                                                </div>
                                                <div class="row mt-4">
                                                <div class="col-md-4">
                                                        <label class="font-weight-bold" for="date">D-O-B:</label>
                                                        <input type="date" id="date" class="form-control <?php echo $age_err ? 'border border-danger' : '';?>" name="dob" >
                                                    
                                                      
                                                        <span class="text-danger"><?php echo $age_err;?></span>
                                                        
                                                    </div>
                                                <div class="col-md-4">
                        
                                                        <?php
                                                            $sql = "SELECT fullname FROM users WHERE email = '".$_SESSION['user_email']."'";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($r = $q->fetch_assoc()){
                                                                $user = $r['fullname'];
                                                            ?>
                                                            <?php if($user == ''){?>
                                                             <label class="font-weight-bold" for="parent_guardian_name">Enter Parent/Guardian Name :</label>
                                                        <input type="text" id="parent" name="parent_guardian_name" value="<?php echo $user;?>" class="form-control font-weight-bold" placeholder="Enter parent name" readonly>
                                                        <span class="text-danger">Please fill the parent name under the profile page first.</span>
                                                        <?php }else{?>
                                                        <label class="font-weight-bold" for="parent_guardian_name">Enter Parent/Guardian Name :</label>
                                                        <input type="text" id="parent"  name="parent_guardian_name" value="<?php echo $user;?>" readonly class="form-control font-weight-bold" placeholder="Enter parent name">
                                                        <?php }}?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="column mx-3">
                                                        <label class="font-weight-bold" for="phone">Phone Number :</label>
                                                        <div class="row">
                                                        <p class="form-control col-md-2 text-center font-weight-bold" readonly>+254</p>
                                                        <!-- <p class="input-icon">254</p> -->
                                                        <input type="number" name="phone" id="phone" class="col-md-10 input-field form-control font-weight-bold <?php echo $phone_err ? 'border border-danger' : '';?>" placeholder="7 - - - - - -" value="<?php echo $phone;?>" oninput="validatePhoneNumber()">
                                                        </div>
                                                        <span class="font-italic">Example:712345678</span><br>

                                                        <span id="phoneError" style="color: red;"></span>
                                                        <span class="text-danger"><?php echo $phone_err;?></span>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="email">Parent Email :</label>
                                                        <input type="email" readonly name="email" class="form-control font-weight-bold <?php echo $email_err ? 'border border-danger' : '';?>" placeholder="Enter parent email address" id="" value="<?php echo $_SESSION['user_email'];?>">
                                                     
                                                        <span class="text-danger"><?php echo $email_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="id_no">ID Number :</label>
                                                        <input type="number" name="id_no" id="id" class="form-control font-weight-bold <?php echo $id_no_err ? 'border border-danger' : '';?>" placeholder="Enter id number" id="" value="<?php echo $id_no;?>">
                                                        
                                                        <span class="text-danger"><?php echo $id_no_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="county">County :</label>
                                                        <select name="county" id="county" readonly class="form-control <?php echo $county_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = "Nandi County" selected>Nandi County</option>
                                                            <!-- <option value="<?php echo $county ? $county : '';?>" selected><?php echo $county ? $county : '';?></option> -->
                                                           
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $county_err;?></span>
                                                       
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                   
                                                    <div class="col-md-4" onchange="showHideSelectOptions()">
                                                        <label class="font-weight-bold" for="opts">Ward :</label>
                                                        <select name="ward" id="opts" class="form-control <?php echo $ward_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = "">Null</option>
                                                            <option value="<?php echo $ward ? $ward : '';?>" selected><?php echo $ward ? $ward : '';?></option>
                                                            <?php 
                                                            $sql = "SELECT * FROM wards";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($rows = $q->fetch_assoc()){
                                                                ?>
                                                            <option value="<?php echo $rows['ward'];?>"><?php echo $rows['ward'];?></option>
                                                        <?php }?>
                                                            
                                                        </select>
                                                      
                                                        <span class="text-danger"><?php echo $ward_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="default">Location :</label>
                                                        <select name="location" id="default" class="form-control <?php echo $location_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $location ? $location : '';?>" selected><?php echo $location ? $location : '';?></option>
                                                           
                                                        </select>
                                                        <!-- onchange="showOpt()" -->
                                                        <select name="kapsabet_location"class="form-control" id="kapsabet" style="display:none;" onchange="showO(this.value)">
                                        <option value="">Null</option>
                                        <option value="<?php 
                                        $kapsabet_location ="";
                                        if(isset($_POST['apply']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                        echo $kapsabet_location;?>" selected><?php
                                        if(isset($_POST['kapsabet_location']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                        echo $kapsabet_location;
                                        
                                        ?></option>
                                         <?php 
                                                            $sql = "SELECT * FROM locations WHERE ward='Kapsabet'";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($rows = $q->fetch_assoc()){
                                                                ?>
                                            <option value ="<?php echo $rows['location'];?>"><?php echo $rows['location'];?></option>
                                        <?php }?>
                                            <!-- <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option> -->
                                        </select>
                                        <!-- onchange="showOptions()" -->
                                        <select name="kapkangani_location"class="form-control" id="kapkangani" style="display:none;" onchange="showKap(this.value)">
                                        <option value="">Null</option>
                                        <option value="<?php 
                                        $kapkangani_location = "";
                                        if(isset($_POST['apply']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                    // $_SESSION['kapkangani_location'] = $kapkangani_location;
                                        echo $kapkangani_location;?>" selected><?php
                                        if(isset($_POST['apply']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                        echo $kapkangani_location;
                                        
                                        ?></option>
                                         <?php 
                                                            $sql = "SELECT * FROM locations WHERE ward='Kapkangani'";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($rows = $q->fetch_assoc()){
                                                                ?>
                                            <option value ="<?php echo $rows['location'];?>" ><?php echo $rows['location'];?></option>
                                        <?php }?>
                                        </select>
                                        
                                        <!-- onchange="Options()" -->
                                        <select name="chepkumia_location"class="form-control" id="chepkumia" style="display:none;"  onchange="showChep(this.value)">
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $chepkumia_location = "";
                                        
                                        if(isset($_POST['apply']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                    // $_SESSION['chepkumia_location'] = $chepkumia_location;
                                        echo $chepkumia_location;?>" selected><?php
                                        if(isset($_POST['apply']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                        echo $chepkumia_location;
                                        
                                        ?></option>
                                        <?php 
                                                            $sql = "SELECT * FROM locations WHERE ward='Chepkumia'";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($rows = $q->fetch_assoc()){
                                                                ?>
                                            <option value ="<?php echo $rows['location'];?>" ><?php echo $rows['location'];?></option>
                                        <?php }?>
                                        </select>
                                        
                                        <select name="kilibwoni_location"class="form-control" id="kilibwoni" style="display:none;" onchange="showK(this.value)">
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $kilibwoni_location = "";
                                        if(isset($_POST['apply']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                    // $_SESSION['kilibwoni_location'] = $kilibwoni_location;
                                        echo $kilibwoni_location;?>" selected><?php
                                        if(isset($_POST['apply']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                        echo $kilibwoni_location;
                                        
                                        ?></option>
                                        <?php 
                                                            $sql = "SELECT * FROM locations WHERE ward='Kilibwoni'";
                                                            $q = mysqli_query($conn,$sql);
                                                            while($rows = $q->fetch_assoc()){
                                                                ?>
                                            <option  value ="<?php echo $rows['location'];?>" id="kili"><?php echo $rows['location'];?></option>
                                        <?php }?>
                                        
                                        </select>
                                       
                                             
                                                        <span class="text-danger"><?php echo $location_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold" for="sec">Sub-Location :</label>
                                                        <select name="sub_location" id="sec"  class="form-control <?php echo $sub_location_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                             <option id="main" style="display: none;" value="<?php echo $sub_location ? $sub_location :'';?>" selected><?php echo $sub_location ? $sub_location :'';?></option>
                                                          
                                                        </select>
                                                       
                                                     
                                                        <span class="text-danger"><?php echo $sub_location_err;?></span>
                                                      
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 mt-3">
                                                        <label class="font-weight-bold" for="year">Year :</label>
                                                        <input type="text" name="year" id="year" value="<?php echo $year;?>"class="form-control"readonly>
                                                    </div>
                                                </div>
                                                
                                    </div>
                                    <hr>
                                    <div class="card-header" id="head" >
                                        <h4 class="text-center font-weight-bold color">School Details</h4>
                                    </div>
                                    <div class="card-body mt-4" >
                                            <div class="row">              
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="level">Institution :</label>
                                                    <select name="school_level" id="level" class="form-control <?php echo $school_level_err ? 'border border-danger' : '';?>">
                                                    <option value = ""></option>
                                                        <option value="<?php echo $school_level;?>" selected><?php echo $school_level;?></option>
                                                        <!-- <option>Primary school</option> -->
                                                        <option>Secondary School</option>
                                                        <option>University/College/TVET</option>
                                                    </select>
                                                    
                                                    <span class="text-danger"><?php echo $school_level_err;?></span>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="reg_no">UPI/ Adm/ Reg Number :</label>
                                                    <input type="text" name="reg_no" id="reg_no" class="form-control <?php echo $reg_no_err ? 'border border-danger' : '';?>" value="<?php echo $reg_no;?>">
                                                    
                                                    <span class="text-danger"><?php echo $reg_no_err;?></span>
                                                   
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="school_name">School name :</label>
                                                    <div class="select-box">
                                                    <div class="select-option">
                                                    <input type="text" name="school_name" class="form-control <?php echo $school_name_err ? 'border border-danger' : '';?>" value="<?php echo $school_name;?>" id="soValue" placeholder="-select school-" readonly>
                                                    </div>
                                                    <div class="contents" id="contents">
                                                        <div class="search">
                                                            <input type="text" name="" placeholder="Search.." class="form-control" id="optionSearch">
                                                        </div>
                                                        <ul class="options" id="schools">
                                                            <!-- <li></li> -->
                                                    <li>Umoja High</li>
                                                    <li>Kimumu Secondary School</li>
                                                    <li>UG High School</li>
                                                    <li>64 Secondary School</li>
                                                    <li>Central Secondary School</li>
                                                    <li>Segero Girls</li>
                                                    <li>Alliance Girls</li>
                                                    <li>Alliance Boys</li>
                                                    <li>Kapsabet Boys</li>

                                                    </ul>
                                                    </div>
                                                    </div>
                                                   
                                                    <span class="text-danger"><?php echo $school_name_err;?></span>
                                                   
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-header" id="head" >
                                                <h4 class="text-center font-weight-bold color">Upload Section</h4>
                                            </div>
                                                <div class="row mt-4">
                                                    
                                                    <div class="col-md-6">
                                                        <div class="column">
                                                        <label class="font-weight-bold" for="file-upload-field">School Fees Structure : (Max 5MB)</label>
                                                        <!-- <input type="file" name="fee_structure" class="form-control <?php echo $fee_structure_err ? 'border border-danger' : '';?>" placeholder="Choose a file" id="file" value="<?php echo $fee_structure;?>" onchange="validateFile(this.files[0]);"> -->
                                                        <input type="file" id="file-upload-field" class="form-control" name="fee_structure">
                                                        <span id="file-upload-error" class="text-danger font-weight-bold"></span>
                                                    <!-- <span class="text-danger"><?php echo $fee_structure_err;?></span> -->
                                                    <!-- <div class="preview-card mt-2">
                                                     <iframe id="preview-image" src="" alt="Selected document preview"></iframe>
                                                    </div> -->
                                                    </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="column">
                                                        <label class="font-weight-bold" for="school_doc">School ID/School adm. letter : (Max 5MB)</label>
                                                        <input type="file" name="school_doc" class="form-control" placeholder="Choose a file" id="file-upload" value="<?php echo $name;?>">
                                                        <span class="text-danger"><?php print_r($errors);?></span>
                                                        <span id="file-error" class="text-danger font-weight-bold"></span>
                                                    <!-- <span class="text-danger"><?php echo $school_doc_err;?></span><br> -->
                                                    <!-- <div class="preview-card mt-2">
                                                     <iframe id="preview" src="" alt="Selected document preview"></iframe>
                                                    </div> -->
                                                    </div>
                                                    </div>
                                                    


                                                </div>
                                             
                                                <input type="submit" name="apply" class="btn application mt-5 font-weight-bold mb-4 " style="float: right;color:white;background-color:#166651" onmouseover="this.style.backgroundColor='orange'" onmouseout="this.style.backgroundColor='#166651'" value="SUBMIT APPLICATION">
                                    </div>
                                </form>
                                </div>
                                <?php if(isset($_POST['apply'])){
                                                            if($_POST['ward'] == 'Kapkangani'){
                                                            ?>
                                                            <script>
                                                                document.getElementById('kapkangani').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';

                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kapsabet'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kapsabet').style.display = 'block';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kilibwoni'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kilibwoni').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Chepkumia'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('chepkumia').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }
                                                        
                                                        if($_POST['kapsabet_location'] || $_POST['chepkumia_location'] || $_POST['kapkangani_location'] || $_POST['kilibwoni_location']){
                                                            ?>
                                                            <script>
                                                                // document.getElementById('kamobo_sub').style.display = 'block';
                                                                document.getElementById('sub').style.display = 'block';
                                                                </script>
                                                    
                                                    <?php
                                        }}
                                            ?>
                                                        
                            </div>
                            <!-- /Revenue Chart -->
                            
                        </div>
                    </div>

                </div>

            </div>
            <!-- /Page Wrapper -->

            
        </div>
        <!-- /Main Wrapper -->
        <?php include('config/scripts.php');?>
    </body>
    
     <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script> 
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

    const selectBox = document.querySelector('.select-box');
    const selectOption = document.querySelector('.select-option');
    const soValue = document.querySelector('#soValue');
    const optionSearch = document.querySelector('#optionSearch');
    const options = document.querySelector('.options');
    const optionsList = document.querySelectorAll('.options li');
   
    selectOption.addEventListener('click', () =>{
        selectBox.classList.toggle('active');
    });

    optionsList.forEach(function(optionsListSingle){
        optionsListSingle.addEventListener('click',function(){
            text = this.textContent;
            soValue.value = text;
        selectBox.classList.remove('active');

        })
    });
    optionSearch.addEventListener('keyup', function(){
        var filter,li, i , textValue;
        filter = optionSearch.value.toUpperCase();
        li = options.getElementsByTagName('li');
        for(i =0;i<li.length; i++){
            liCount = li[i];
            textValue  = liCount.textContent ||liCount.innerText;
            if(textValue.toUpperCase().indexOf(filter) > -1){
                li[i].style.display = '';
            }else{
                li[i].style.display = 'none';
            }
        }
    });


    $(document).ready(function() {
  // Get the input field
  var inputField = $('#file-upload-field');

  // Add an event listener for the file change event
  inputField.on('change', function() {
    // Get the selected file
    var file = inputField.prop('files')[0];
    var maxFileSize = 5242880; // 5MB
    var minFileSize = 0; //0MB
  var allowedFileTypes = ['jpeg', 'png', 'PNG', 'doc','docx','pdf','JPG','jpg','txt', 'PDF'];
     // var allowedFileTypes = ['image/jpeg', 'image/png', 'image/PNG', 'image/doc','image/docx','image/pdf','image/PDF','image/JPG','image/jpg','image/txt'];

  var fileExtension = file.name.split('.').pop();

    // Check if the file is oversize
    if (file.size > 5242880 && allowedFileTypes.includes(fileExtension)) {
      // Display an error message
      $('#file-upload-error').text('The file is too large.');
      inputField.val('');
      return;
    }

    // Check if the file type is allowed
    if (!allowedFileTypes.includes(fileExtension) && file.size < 5242880) {
      // Display an error message
      $('#file-upload-error').text('The file type is not allowed.');
      inputField.val('');
      return;
    }
    
    if(!allowedFileTypes.includes(fileExtension) && file.size > 5242880 ){
          // Display an error message
      $('#file-upload-error').text('The file is too large and also the file type is not allowed.');
      inputField.val('');
      return;
    }

    // If the file is valid, clear the error message
    $('#file-upload-error').text('');
  });


// Get the input element for the file upload.
const fileInputElement = document.querySelector('#file-upload-field');

// Add an event listener for the file change event.
fileInputElement.addEventListener('change', function(event) {
  // Get the selected file.
  const file = event.target.files[0];

  // Create a new FileReader object.
  const fileReader = new FileReader();

  // Add an event listener for the load event.
  fileReader.addEventListener('load', function(event) {
    // Get the base64 encoded data for the image.
    const base64Data = event.target.result;

    // Set the src attribute of the preview image to the base64 encoded data.
    document.querySelector('#preview-image').src = base64Data;
  });

  // Read the selected file as a data URL.
  fileReader.readAsDataURL(file);
});

});

// school doc

$(document).ready(function() {
  // Get the input field
  var inputField = $('#file-upload');

  // Add an event listener for the file change event
  inputField.on('change', function() {
    // Get the selected file
    var file = inputField.prop('files')[0];
    var maxFileSize = 5242880; // 5MB
    var minFileSize = 0; //0MB
  var allowedFileTypes =['jpeg', 'png', 'PNG', 'doc','docx','pdf','jpg','JPG','txt', 'PDF'];
    // var allowedFileTypes = ['image/jpeg', 'image/png', 'image/PNG', 'image/doc','image/docx','image/pdf','image/PDF','image/JPG','image/jpg','image/txt'];


  var fileExtension = file.name.split('.').pop();

    // Check if the file is oversize
    if (file.size > 5242880 && allowedFileTypes.includes(fileExtension)) {
      // Display an error message
      $('#file-error').text('The file is too large.');
      inputField.val('');
      return;
    }

    // Check if the file type is allowed
    if (!allowedFileTypes.includes(fileExtension) && file.size <= 5242880 ) {
      // Display an error message
      $('#file-error').text('The file type is not allowed.');
      inputField.val('');
      return;
    }

    if(!allowedFileTypes.includes(fileExtension) && file.size > 5242880 ){
          // Display an error message
      $('#file-error').text('The file is too large and also the file type is not allowed.');
      inputField.val('');
      return;
    }

    // If the file is valid, clear the error message
    $('#file-error').text('');
});
    // 
    // Get the input element for the file upload.
const fileInputElement = document.querySelector('#file-upload');

// Add an event listener for the file change event.
fileInputElement.addEventListener('change', function(event) {
  // Get the selected file.
  const file = event.target.files[0];

  // Create a new FileReader object.
  const fileReader = new FileReader();

  // Add an event listener for the load event.
  fileReader.addEventListener('load', function(event) {
    // Get the base64 encoded data for the image.
    const base64Data = event.target.result;

    // Set the src attribute of the preview image to the base64 encoded data.
    document.querySelector('#preview').src = base64Data;
  });

  // Read the selected file as a data URL.
  fileReader.readAsDataURL(file);

  });
});


//     function validateFile(file) {
//         var inputField = $('#file');
//     var maxFileSize = 5242880; // 5MB
//     var minFileSize = 0; //0MB
//     var allowedFileTypes = ['image/jpeg', 'image/png', 'image/PNG', 'image/doc','image/docx','image/pdf','image/jpg','image/txt'];

//     // Get the file size and file type.
//     var fileSize = file.size;
//     var fileType = file.type;

//     // Check if the file size is greater than the maximum allowed file size.
//     if (fileSize > maxFileSize) {
//         // alert("The file size is too large.");
//         // return false;
//         $('#file-upload-error').text('The file is too large.');
//       inputField.val('');
//       return;
//     }
//     //  if(filesize <= minFileSize){
//     //     alert("The file size is too small.");
//     //     return false;
//     // }

//     // Check if the file type is one of the allowed file types.
//     if (!allowedFileTypes.includes(fileType)) {
//         // alert("The file type is not allowed.");
//         // return false;
//         $('#file-upload-error').text('The file type is not allowed.');
//       inputField.val('');
//       return;
//     }
//   // If the file is valid, clear the error message
//   $('#file-upload-error').text('');
//     // return true;
// }


// kapsabet sub-location
function showO(optionValue) {
 const secondSelect = document.getElementById('sec');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}
// kapkangani sub-location
function showKap(optionValue) {
 const secondSelect = document.getElementById('sec');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}
// chepkumia sub-location
function showChep(optionValue) {
 const secondSelect = document.getElementById('sec');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}

// show kilibwoni sub_locations
function showK(optionValue) {
 const secondSelect = document.getElementById('sec');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}


function showHideSelectOptions() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("opts").value;

  // Show the child select option if the parent select option is set to "Option 2".
  if (parentSelectValue === "Kapsabet") {
    document.getElementById("kapsabet").style.display = "block";
     document.getElementById("kapkangani").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById('kilibwoni_sub').style.display = 'none';
 
   
    
  } else if(parentSelectValue === "Chepkumia"){
    
    document.getElementById("chepkumia").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";

    }else if(parentSelectValue === "Kilibwoni") {
        document.getElementById("kilibwoni").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";


  }else if(parentSelectValue === "Kapkangani") {
        document.getElementById("kapkangani").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("default").style.display = "none";

  }
}

// progress bar
  const inputFields = document.querySelectorAll('input, select, #soValue');
    const progressBarFillElement = document.getElementById('progress');
    const progressTextElement = document.getElementById('percentage');

    function updateProgress() {
      const totalFields = 14;
      let filledFields = 0;

      for (const inputField of inputFields) {
        if (inputField.value) {
          filledFields++;
        }
      }

      const progressPercentage = Math.floor(((filledFields / totalFields) * 100)-35);
      progressBarFillElement.style.width = `${progressPercentage}%`;
      progressTextElement.textContent = `Progress: ${progressPercentage}%`;
    }

    // Update progress initially
    updateProgress();

    // Update progress on input change
    for (const inputField of inputFields) {
      inputField.addEventListener('input', updateProgress);
    }

       function validatePhoneNumber() {
            var phoneInput = document.getElementById("phone");
            var phoneError = document.getElementById("phoneError");

            var phoneNumber = phoneInput.value.trim();

            if (phoneNumber.length > 9) {
                phoneError.textContent = "Phone number should not exceed 9 characters.";
                phoneInput.setCustomValidity("Phone number should not exceed 9 characters.");
            } 
            // else if(phoneNumber.length < 9) {
            //     phoneError.textContent = "Phone number should not be less than 9 characters.";
            //     phoneInput.setCustomValidity("Phone number should not be less than 9 characters.");
            // }
            else{
                phoneError.textContent = "";
                phoneInput.setCustomValidity("");
            }
        }
// const phoneInputField = document.querySelector("#phone");
//    const phoneInput = window.intlTelInput(phoneInputField, {
//      utilsScript:
//        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//    });
    // var input = document.querySelector("#phone");
    // window.intlTelInput(input, {
    //     separateDialCode: true,
    //     customPlaceholder: function (
    //         selectedCountryPlaceholder,
    //         selectedCountryData
    //     ) {
    //         return "e.g. " + selectedCountryPlaceholder;
    //     },
    // });
    </script>
</html>