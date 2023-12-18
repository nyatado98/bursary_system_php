<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
    header("location:login");
    exit;
}

$data = $_SESSION['user_data'];
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

$firstname_err = $lastname_err = $fullname_err = $gender_err = $age_err = $reg_no_err = $parent_guardian_name_err = $phone_err = $occupation_err = $family_status_err = $email_err = $id_no_err = $county_err = $ward_err = $location_err = $sub_location_err = $school_level_err = $school_name_err = $reg_no_err = $account_no_err = $school_doc_err = $fee_structure_err = "";
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
    }elseif(strlen(trim($_POST['phone'])) < 10){
        $phone_err = "Phone number should not be less than 10 digits.";
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
// Check if the phone number starts with a zero
if (substr($phone, 0, 1) === '0') {
    // Remove the leading zero
    $phoneNumber = substr($phone, 1);


$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$phoneNumber;
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear ".$parent_guardian_name.", You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.")->send();
}
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
// Check if the phone number starts with a zero
if (substr($phone, 0, 1) === '0') {
    // Remove the leading zero
    $phoneNumber = substr($phone, 1);


$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$phoneNumber;
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear '".$parent_guardian_name."', You have successfully Applied for the Emgwen NCDF Student Bursary for financial year 2023-2024.")->send();
}
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
if (isset($_SESSION['school'])) {
    $school = $_SESSION['school'];
}else{
$school = [];
}
if(isset($_POST['next'])){
if(empty($_POST['school_level'])){
        $school_level_err = "Please select level";
    }else{
        $school_level = trim($_POST['school_level']);
    }
    if(empty($_POST['school_name'])){
        $school_name_err = "Please select school  name ";
    }else{
        $school_name = trim($_POST['school_name']);
    }if(empty($_POST['reg_no'])){
        $reg_no_err = "Please enter registration number/admission ";
    }else{
        $reg_no = trim($_POST['reg_no']);
    }
    if(empty($reg_no_err) && empty($school_level_err)&& empty($school_name_err)){

        $school = [
            "level"=>$school_level,
            "school_name" =>$school_name,
            "reg"=>$reg_no
        ];
        $_SESSION['school'] = $school;
        // Add new values to the existing data
    $data = array_merge($data, $school);

    $_SESSION['user_data'] = $data;
    header("location:uploads");
    }
}
if(isset($_POST['pre'])){
    $_SESSION['user_data'] = $data;
    header("location:application");
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('config/head.php');?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/steps.css">
<script type="text/javascript" src="js/steps.js"></script>
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
/*    padding:20px;*/
}
.contents{
    left: 0px;
    position:absolute;
    background-color:whitesmoke;
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
/*    margin-top:10px;*/
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
       /* #input{
            position: absolute;
            top: 43%;
            z-index: 99;
        }*/


        .form-group {
  border: 1px solid #ced4da;
/*  padding: 5px;*/
  border-radius: 6px;
/*  width: auto;*/
}
.form-group:focus {
  color: #212529;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
}
.form-group input {
  display: inline-block;
  width: auto;
  border: none;
}
.form-group input:focus {
  box-shadow: none;
}
@media screen and (max-width:800px){
    #phone{
        width:85vw;
    }
}
@media screen and (min-width:801px){
    #phone{
        width:25vw;
    }
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
                                <a href="school"><i class="fa fa-file"></i> <span>New Application</span></a>
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

                    <!-- start -->
                    <div class="container-fluid">  
 
    <div class="row justify-content-center">  
        <div class="col-md-12 text-center p-0 ">
        <div class="card-header">  
                        <h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">New</span> - <span style="color: orange">Application</span></h5>
                    </div>  
            <div class="card px-0 pt-4 pb-0  ">  
                <div id="msform" > 

                    <ul class="progressbar">  
                        <li class="active" id="account"><strong> Applicant Information </strong></li>  
                        <li class="active" id="personal"><strong> School Information </strong></li>  
                        <li id="payment"><strong> Upload Documents </strong></li>  
                        <li id="confirm"><strong> Finish </strong></li>  
                    </ul>  
                    <div class="progress">  
                        <div class="pbar pbar-striped pbar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"> </div>  
                    </div> <br>
                    <hr>
                    <div class="card-body mt-2">  
                    <fieldset>  
                        <div class="form-card">  
                            <div class="row">  
                                <div class="col-7">  
                                    <h2 class="fs-title" style="text-decoration: underline;"> School Details: </h2>  
                                </div>  
                                <div class="col-5">  
                                    <h2 class="steps"> Step 2 - 4 </h2>  
                                </div>  
                            </div> 
                            <form method="post" action="">
                            <div class="row">              
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="level">Institution :</label>
                                                    <select name="school_level" id="level" class="form-control <?php echo $school_level_err ? 'border border-danger' : '';?>">
                                                    <option value = ""></option>
                                                    <?php if($school_level !=''){?>
                                                        <option value="<?php echo $school_level;?>" selected><?php echo $school_level;?></option>
                                                    <?php }elseif ($_SESSION['school']) {
                                                        ?>
                                                        <option value="<?php echo $school['level'];?>" selected><?php echo $school['level'];?></option>
                                                        <?php
                                                    }else{?>
                                                        <option value="" selected>-select school level-</option>
                                                    <?php } ?>
                                                        <option>Secondary School</option>
                                                        <option>University/College/TVET</option>
                                                    </select>
                                                    
                                                    <span class="text-danger"><?php echo $school_level_err;?></span>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="school_name">School name :</label>
                                                    <div class="select-box">
                                                    <div class="select-option">
                                                    <input type="text" name="school_name" class="form-control <?php echo $school_name_err ? 'border border-danger' : '';?>" value="<?php if (isset($_SESSION['school'])) {
                                                        echo $school['school_name'];
                                                    }else{ echo $school_name;}?>" id="soValue" placeholder="-select school-" >
                                                    </div>
                                                    <div class="contents col-md-12" id="contents">
                                                        <!-- <div class="search">
                                                            <input type="text" name="" placeholder="Search.." class="form-control" id="optionSearch">
                                                        </div> -->
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
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold" for="reg_no">UPI/ Adm/ Reg Number :</label>
                                                    <input type="text" name="reg_no" id="reg_no" class="form-control <?php echo $reg_no_err ? 'border border-danger' : '';?>" placeholder="-enter admission number-" value="<?php if (isset($_SESSION['school'])) {
                                                        echo $school['reg'];
                                                    }else{ echo $reg_no;}?>">
                                                    
                                                    <span class="text-danger"><?php echo $reg_no_err;?></span>
                                                   
                                                </div>
                                                
                                            </div> 
                        </div> <input type="submit" name="next" class="mt-5 next action-button" value="Next" /> <input type="submit" name="pre" class="mt-5 pre action-button-pre" value="Previous" /> 
                        </form> 
                    </fieldset>  
                    <div class="card-footer">
                            <p class="mt-3" style="color: black;">** Note : Fill in all required fields and provide supporting documents and submit your application in one sitting **</p>
                        </div> 
                     </div>
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
<!-- end -->
                    
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
    const optionSearch = document.querySelector('#soValue');
    // const optionSearch = document.querySelector('#optionSearch');
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

            if (phoneNumber.length > 10) {
                phoneError.textContent = "Phone number should not exceed 10 characters.";
                phoneInput.setCustomValidity("Phone number should not exceed 10 characters.");
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
const phoneInputField = document.querySelector("#phone");
    phoneInputField.classList.add("form-control");

   const phoneInput = window.intlTelInput(phoneInputField, {
    onlyCountries:["ke"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
    // var input = document.querySelector("#phone");
    // input.classList.add("form-control");
    // window.intlTelInput(input, {
    //     separateDialCode: true,
    //     customPlaceholder: function (
    //         selectedCountryPlaceholder,
    //         selectedCountryData
    //     ) {
    //         return "e.g. " + selectedCountryPlaceholder;
    //     },
    // });
    // Add the Bootstrap form-control class after intlTelInput initialization
    input.classList.add("form-control");
    </script>
</html>