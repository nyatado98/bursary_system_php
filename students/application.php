<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
	header("location:login");
	exit;
}

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

if(isset($_POST['apply'])){
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
    if(empty($_POST['age'])){
        $age_err = "Please select age";
    }else{
        $age = trim($_POST['age']);
    }

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
        $phone = trim($_POST['phone']);
    }
    // if(empty($_POST['occupation'])){
    //     $occupation_err = "Please enter occupation";
    // }else{
    //     $occupation = trim($_POST['occupation']);
    // }
    // if(empty($_POST['family_status'])){
    //     $family_status_err = "Please select family status";
    // }else{
    //     $family_status = trim($_POST['family_status']);
    // }
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
    if(empty($_POST['location'])){
        $location_err = "Please select location";
    }else{
        $location = trim($_POST['location']);
    }
    if(empty($_POST['sub_location'])){
        $sub_location_err = "Please select sub-location";
    }else{
        $sub_location = trim($_POST['sub_location']);
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
    // if(empty($_POST['bank_name'])){
    //     $bank_name_err = "Please select bank name";
    // }else{
    //     $bank_name = trim($_POST['bank_name']);
    // }
    if(empty($_POST['school_doc'])){
        $school_doc_err = "Please choose a document";
    }else{
        $school_doc = trim($_POST['school_doc']);
        // $tmp_name_doc = $_FILES['school_doc']['tmp_name'];
    }
    if(empty($_POST['fee_structure'])){
        $fee_structure_err = "Please select fee structure document";
    }else{
        $fee_structure = trim($_POST['fee_structure']);
    }
    // if(empty($_POST['account_no'])){
    //     $account_no_err = "Please enter account number";
    // }else{
    //     $account_no = trim($_POST['account_no']);
    // }
    if(empty($fullname_err) && empty($age_err)&& empty($gender_err)&& empty($parent_guardian_name_err)&& empty($phone_err) && empty($email_err) && empty($id_no_err)&& empty($county_err)&& empty($ward_err)&& empty($location_err)&& empty($sub_location_err)
    && empty($adm_upi_reg_no_err) && empty($school_level_err)&& empty($school_name_err)){
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
            parent_id_no,county,ward,location,sub_location,school_level,adm_upi_reg_no,school_name,created_at,updated_at,year)VALUES('$fullname','$age','$gender','$parent_guardian_name','$phone','$email',
            '$id_no','$county','$ward','$location','$sub_location','$school_level','$reg_no','$school_name','$current_date','$current_date','$year')";
            $res = mysqli_query($conn,$sql);

            $sql1 = "INSERT INTO parents (parent_guardian_name,student_fullname,phone,parent_email,parent_id_no,created_at,updated_at)VALUES('$parent_guardian_name','$fullname','$phone','$email','$id_no','$current_date','$current_date')";
            $re = mysqli_query($conn,$sql1);

            $sql2 = "INSERT INTO applications (reference_number,parent_email,student_fullname,adm_upi_reg_no,school_type,school_name,location,status,
            created_at,updated_at,today_date,year)VALUES('$app_ref','$email','$fullname','$reg_no','$school_level','$school_name','$location','Pending...',
            '$current_date','$current_date','$today','$year')";
            $ress = mysqli_query($conn,$sql2);

            //insert uploads/school doc
            $name = $_FILES['school_doc']['name'];

	$target = "students_upload/";
    $target_file =$target . basename($_FILES["school_doc"]["name"]);
    $fileName = basename($_FILES["school_doc"]["name"]);
    $file_size = $_FILES["school_doc"]["size"];
    $file_type = $_FILES["school_doc"]["type"];
    $tmp_name = $_FILES['school_doc']['tmp_name'];
   

    //
    $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions = array("jpeg","jpg","png","gif","mp3","mp4","pdf","txt","doc","jfif","docx","zip");
    if (!in_array($file_ext, $extensions)) {
    	$errors = "The file type is not allowed...Please choose another file";
    }
    if ($file_size < 0) {
    	$errors = "The file size is invalid...choose another file";
    }

    $sql = "INSERT INTO students_uploads (reference_number,student_fullname,school_id_letter,fee_structure,created_at,updated_at)VALUES('$app_ref','$fullname','$fileName','','$current_date','$current_date')";
    $query = mysqli_query($conn,$sql);
    if($query){
        move_uploaded_file($tmp_name,$target.$name);

         //insert uploads/fee_structure
        $name = $_FILES['fee_structure']['name'];

        $target = "students_upload/";
        $target_file =$target . basename($_FILES['fee_structure']['name']);
        $file = basename($_FILES['fee_structure']['name']);
        $file_size = $_FILES['fee_structure']['size'];
        $file_type = $_FILES['fee_structure']['type'];
        $tmp_name = $_FILES['fee_structure']['tmp_name'];

        $sql = "UPDATE students_uploads SET fee_structure = '$file' WHERE reference_number = '$app_ref'";
        $r = mysqli_query($conn,$sql);
        if($r){
        move_uploaded_file($tmp_name,$target.$name);
        }
        
    }




            //send mail
            $mailto = $email;
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Your application for ".$app_ref." reference number has been received successfully. Use the reference number to track your application process.
			Thank You.\n";
		
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
            $sql = "INSERT INTO applications (reference_number,parent_email,student_fullname,adm_upi_reg_no,school_type,school_name,bank_name,account_no,location,status,
            created_at,updated_at,today_date,year)VALUES('$app_ref','$email','$fullname','$adm_upi_reg_no','$school_level','$school_name','$bank_name','$account_no','$location','Pending...',
            '$current_date','$current_date','$today','$year')";
            $rs = mysqli_query($conn,$sql);

            //send mail
            $mailto = $email;
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Your application for ".$app_ref." reference number has been received successfully. Use the reference number to track your application process.
			Thank You.\n";
		
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
  <style>
    .select-option:after{
    content:"";
    position:absolute;
    right:15px;
    top:50%;
    margin-top:-8px;

}
.search{
    padding:20px;
}
.contents{
    z-index: 999;
    display:none;
}
.search input{
    font-size:17px;
    padding:15px;
    outline:0;
    border:1px solid #b3b3b3;
}
.options{
    padding:0;
    margin-top:10px;
    overflow-y: auto;
    max-height: 250px;
}
.options li{
    padding :10px 15px;
    border-radius: 5px;
    font-size:21px;
    cursor:pointer;
    border-bottom: 1px solid gray;
}
.options li:hover{
    background-color: #b2b2b2;
}
.select-box.active .content{
    display:block;
}
</style>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard" class="logo">
						<img src="images/log_1.png" alt="Logo">
					</a>
					<a href="dashboard" class="logo logo-small">
						<img src="images/log_1.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
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
								<a href="logout"><i class="fa fa-cog"></i> <span>Logout</span></a>
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
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
                                <span class="font-weight-bold page-title" style="font-size:15px">WELCOME : <?php echo $_SESSION['user'];?> </span>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active"><label style="font-weight: 900; color: #0f893b; font-size: 25px">BURSARY APPLICATION SYSTEM</label></li>
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
                                    <form action="" method="post" enctype="multipart/form-data">
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
                                            @endif -->
                                            <h4 class="text-center font-weight-bold ">Fill Your Details here</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Student First-Name :</label>
                                                        <input type="text" name="firstname" class="form-control <?php echo $firstname_err ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter student firstname" value="<?php echo $firstname;?>">
                                                        
                                                        <span class="text-danger"><?php echo $firstname_err;?></span>
                                                       
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Student Last-Name :</label>
                                                        <input type="text" name="lastname" class="form-control <?php echo $lastname_err ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter student lastname" value="<?php echo $lastname;?>">
                                                        
                                                        <span class="text-danger"><?php echo $lastname_err;?></span>
                                                       
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Gender :</label>
                                                        <select name="gender" class="form-control <?php echo $gender_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <!-- <option value = ""></option> -->
                                                            <option value="<?php echo $gender ? $gender : '';?>" selected><?php echo $gender ? $gender : '';?></option>
                                                            <option> Male</option> 
                                                            <option>Female</option>
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $gender_err;?></span>
                                                        
                                                    </div>
                                                  
                                                </div>
                                                <div class="row mt-4">
                                                <div class="col-md-4">
                                                        <label class="font-weight-bold">Age :</label>
                                                        <select name="age" class="form-control <?php echo $age_err ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="<?php echo $age ? $age : '';?>" selected><?php echo $age ? $age : '';?></option>
                                                            <?php
                                        for ($i = 13; $i <= 27; $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>
                                                        </select>
                                                       
                                                        <span class="text-danger"><?php echo $age_err;?></span>
                                                        
                                                    </div>
                                                <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                                                        <input type="text" name="parent_guardian_name" value="<?php echo $_SESSION['user'];?>" readonly class="form-control font-weight-bold <?php echo $parent_guardian_name_err ? 'border border-danger' : '';?>" placeholder="Enter parent name">
                                
                                                        <span class="text-danger"><?php echo $parent_guardian_name_err;?></span>
                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Phone No :</label>
                                                        <input type="number" name="phone" class="form-control font-weight-bold <?php echo $phone_err ? 'border border-danger' : '';?>" placeholder="Enter phone number" value="<?php echo $phone;?>">
                                                        <span>Start with 07***</span><br>
                                                        <span class="text-danger"><?php echo $phone_err;?></span>
                                                        
                                                    </div>
                                                    <!-- <div class="col-md-4">
                                                        <label class="font-weight-bold">Occupation :</label>
                                                        <select name="occupation" class="form-control <?php echo $occupation_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $occupation ? $occupation : '';?>" selected><?php echo $occupation ? $occupation : '';?></option>
                                                            <option>Employed</option>
                                                            <option>Self-employed</option>
                                                            <option>Contract</option>
                                                            <option>Unemployed</option>
                                                            <option>Others</option>
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $occupation_err;?></span>
                                                        
                                                    </div> -->
                                                </div>
                                                <div class="row mt-4">
                                                    <!-- <div class="col-md-4">
                                                        <label class="font-weight-bold">Family Status :</label>
                                                        <select name="family_status" class="form-control <?php echo $family_status_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $family_status ? $family_status : '';?>" selected><?php echo $family_status ? $family_status : '';?></option>
                                                            <option>Rich</option>
                                                            <option>Average</option>
                                                            <option>Poor</option>
                                                            <option>Other</option>
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $family_status_err;?></span>
                                                       
                                                    </div> -->
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Parent Email :</label>
                                                        <input type="email" readonly name="email" placeholder="Enter the parent email address" class="form-control font-weight-bold <?php echo $email_err ? 'border border-danger' : '';?>" id="" value="<?php echo $_SESSION['user_email'];?>">
                                                     
                                                        <span class="text-danger"><?php echo $email_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Id No :</label>
                                                        <input type="number" name="id_no" placeholder="Enter the parent id number" class="form-control font-weight-bold <?php echo $id_no_err ? 'border border-danger' : '';?>" id="" value="<?php echo $id_no;?>">
                                                        
                                                        <span class="text-danger"><?php echo $id_no_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">County :</label>
                                                        <select name="county" readonly class="form-control <?php echo $county_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = "Nandi County" selected>Nandi County</option>
                                                            <!-- <option value="<?php echo $county ? $county : '';?>" selected><?php echo $county ? $county : '';?></option> -->
                                                            <!-- <option>Uasin Gishu</option> -->
                                                        </select>
                                                        
                                                        <span class="text-danger"><?php echo $county_err;?></span>
                                                       
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                   
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Ward :</label>
                                                        <select name="ward" class="form-control <?php echo $ward_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $ward ? $ward : '';?>" selected><?php echo $ward ? $ward : '';?></option>
                                                            <option>Ziwa</option>
                                                            <option>Soy</option>
                                                            <option>Kipsomba</option>
                                                            <option>Kaptagat</option>
                                                            <option>Kapsoya</option>
                                                            <option>Moiben</option>
                                                        </select>
                                                      
                                                        <span class="text-danger"><?php echo $ward_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Location :</label>
                                                        <select name="location" class="form-control <?php echo $location_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $location ? $location : '';?>" selected><?php echo $location ? $location : '';?></option>
                                                            <option>Munyaka</option>
                                                            <option>Silas</option>
                                                            <option>Ilula</option>
                                                            <option>Block 10</option>
                                                            <option>Marura</option>
                                                        </select>
                                                       
                                                        <span class="text-danger"><?php echo $location_err;?></span>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Sub-Location :</label>
                                                        <select name="sub_location" class="form-control <?php echo $sub_location_err ? 'border border-danger' : '';?> font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $sub_location;?>" selected><?php echo $sub_location;?></option>
                                                            <option>Subaru</option>
                                                            <option>Bondeni</option>
                                                            <option>Kamkunji</option>
                                                            <option>Airstrip</option>
                                                        </select>
                                                     
                                                        <span class="text-danger"><?php echo $sub_location_err;?></span>
                                                      
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 mt-3">
                                                        <label class="font-weight-bold">Year :</label>
                                                        <input type="text" value="<?php echo $year;?>"class="form-control"readonly>
                                                    </div>
                                                </div>
                                                
                                    </div>
                                    <hr>
									<div class="card-header" id="head" >
                                        <h4 class="text-center font-weight-bold ">Fill School Details here</h4>
                                    </div>
                                    <div class="card-body" >
                                            <div class="row">              
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">Institution :</label>
                                                    <select name="school_level" class="form-control <?php echo $school_level_err ? 'border border-danger' : '';?>">
                                                    <option value = ""></option>
                                                        <option value="<?php echo $school_level;?>" selected><?php echo $school_level;?></option>
                                                        <!-- <option>Primary school</option> -->
                                                        <option>Secondary School</option>
                                                        <option>University/College/TVET</option>
                                                    </select>
                                                    
                                                    <span class="text-danger"><?php echo $school_level_err;?></span>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">Enter UPI No/Adm No/Reg No :</label>
                                                    <input type="text" name="reg_no" class="form-control <?php echo $reg_no_err ? 'border border-danger' : '';?>" placeholder="Enter your upi/adm/reg no." value="<?php echo $reg_no;?>">
                                                    
                                                    <span class="text-danger"><?php echo $reg_no_err;?></span>
                                                   
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">School name :</label>
                                                    <div classs="select-box">
                                                    <div class="select-option">
                                                    <input type="text" name="" class="form-control" id="soValue" placeholder="select" readonly>
                                                    </div>
                                                    <div class="contents">
                                                        <div class="search">
                                                            <input type="text" name="" placeholder="SEARCH.." class="form-control" id="optionSearch">
                                                        </div>
                                                        <ul class="options">
                                                    <li>php</li>
                                                    <li>laravel</li>
                                                    <li>react</li>
                                                    <li>vue</li>
                                                    <li>python</li>
                                                    </ul>
                                                    </div>
                                                    </div>
                                                    
                                                    <select name="school_name" class="form-control <?php echo $school_name_err ? 'border border-danger' : '';?>" id="">
                                                    <option value = ""></option>
                                                        <option selected value="<?php echo $school_name ? $school_name : '';?>"><?php echo $school_name ? $school_name : '';?></option>
                                                        <option>Umoja High</option>
                                                        <option>Kimumu Secondary School</option>
                                                        <option>UG High School</option>
                                                        <option>64 Secondary School</option>
                                                        <option>Central Secondary School</option>
                                                    </select>
                                                   
                                                    <span class="text-danger"><?php echo $school_name_err;?></span>
                                                   
                                                </div>
                                            </div>
                                                <div class="row mt-4">
                                                    <!-- <div class="col-md-3">
                                                        <label class="font-weight-bold">Bank Name :</label>
                                                        <select name="bank_name" class="form-control <?php echo $bank_name_err ? 'border border-danger' : '';?>" id="">
                                                            <option value="<?php echo $bank_name ? $bank_name : "";?>" selected><?php echo $bank_name ? $bank_name : '';?></option>
                                                            <option value = ""></option>
                                                            <option>National Bank</option>
                                                            <option>KCB Bank</option>
                                                            <option>Co-operative Bank</option>
                                                            <option>Family Bank</option>
                                                        </select>
                                                       
                                                    <span class="text-danger"><?php echo $bank_name_err;?></span>
                                                   
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Bank Acc-No :</label>
                                                        <input type="text" name="account_no" class="form-control <?php echo $account_no_err ? 'border border-danger' : '';?>" placeholder="Enter account number" id="" value="<?php echo $account_no;?>">
                                                        
                                                    <span class="text-danger"><?php echo $account_no_err;?></span>
                                                   
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <label class="font-weight-bold">School Fees Structure Upload : (LIMIT 5Mbs)</label>
                                                        <input type="file" name="fee_structure" class="form-control <?php echo $fee_structure_err ? 'border border-danger' : '';?>" placeholder="Choose a file" id="" value="<?php echo $fee_structure;?>">
                                                        
                                                    <span class="text-danger"><?php echo $fee_structure_err;?></span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="font-weight-bold">School ID/School adm. letter Upload : (LIMIT 5Mbs)</label>
                                                        <input type="file" name="school_doc" class="form-control <?php echo $school_doc_err ? 'border border-danger' : '';?>" placeholder="Choose a file" id="" value="<?php echo $school_doc;?>">
                                                        
                                                    <span class="text-danger"><?php echo $school_doc_err;?></span>
                                                    </div>
                                                </div>
                                                <input type="submit" name="apply" class="btn mt-5 font-weight-bold mb-4" style="float: right;color:white;background-color:#166651" value="SUBMIT APPLICATION">
                                    </div>
                                </form>
								</div>
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
	
    <!--  <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

    const selectBox = document.querySelector('.select-box');
    const selectOption = document.querySelector('.select-option');
    const soValue = document.querySelector('#soValue');
    const optionSearch = document.querySelector('#optionSearch');
    const options = document.querySelector('.options');
    const optionsList = document.querySelector('.options li');
   
    selectOption.addEventListener('click',function(){
        selectBox.classList.toggle('active');
    })

    </script>
</html>