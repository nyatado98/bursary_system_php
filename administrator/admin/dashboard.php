<?php 
use PHPMailer\PHPMailer\PHPMailer;
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
require "../../vendor/autoload.php";
// require __DIR__ . '../vendor/autoload.php';

use \Savannabits\Advantasms\Advantasms;
//load composer autoloader
require 'vendor/autoload.php';
 require 'vendor/phpmailer/phpmailer/src/Exception.php';
 require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
 require 'vendor/phpmailer/phpmailer/src/SMTP.php';

   $mail = new PHPMailer();

   
$ref = $upi_reg = $name = $school_type = $school_name = $location = $ward = $sub_location = "";
date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:sa');
$year = date('Y');
if(isset($_POST['edit'])){
	$ref = $_POST['ref'];
	$upi_reg = $_POST['upi_reg'];
	$name = $_POST['name'];
	$school_type = $_POST['school_type'];
	$school_name = $_POST['school_name'];
	$location = $_POST['location'];
	$ward = $_POST['ward'];
	$sub_location = $_POST['sub_location'];

	$sql = "UPDATE applications SET student_fullname ='$name',adm_upi_reg_no = '$upi_reg',school_type ='$school_type',school_name = '$school_name',location='$location',ward='$ward',sub_location='$sub_location',updated_at ='$current_date' WHERE reference_number = '$ref'";
	$query = mysqli_query($conn,$sql);
	if($query){
		$suc = "Successfully updated the application for reference number ".$_POST['ref'].".";
		$_SESSION['succ'] = $suc;
		header("location:dashboard?success=");
	}else{

	}
}


$message = $ref_no = "";
$total = 0;
if(isset($_POST["approve"])){
	$ref_no = $_POST["ref_no"];

	$sql = "SELECT * FROM applications WHERE reference_number ='$ref_no'";
	$mysql = mysqli_query($conn,$sql);
	while($row = $mysql->fetch_assoc()){
		if($row["status"] == "Awarded"){

			$message = "Application Already Reconciled for reference number <strong>".$ref_no."</strong>. You cannot reconcile again.";
			$_SESSION['message'] = $message;
			header("location:dashboard?message=");
	}else{
				$sql = "UPDATE applications SET status = 'Awarded' WHERE reference_number ='$ref_no'";
				$q = mysqli_query($conn,$sql);
				
				if($q){
						$sql = "SELECT * FROM parents WHERE student_fullname = '".$row['student_fullname']."'";
				        $querys = mysqli_query($conn,$sql);
				        while($qs = $querys->fetch_assoc()){
							$sql = "SELECT * FROM applications WHERE reference_number ='$ref_no' AND status = 'Awarded'";
		            		$res = mysqli_query($conn,$sql);
		            		while($r = $res->fetch_assoc()){
			        		if($r['school_type'] == 'Secondary School'){

								$_SESSION['school_type'] = $school_type;
								$_SESSION['parent_guardian_name'] = $parent;


					$total = 5000;
					$rad ='REP'. rand(100,999);
					$sql = "INSERT INTO reports (report_id,student_name,parent,school_level,school_name,ward,location,sub_location,Amount_awarded)VALUES(
					'$rad','".$row['student_fullname']."','".$qs['parent_guardian_name']."','".$r['school_type']."','".$r['school_name']."','$ward','".$r['location']."','$sub_location','$total')";
					mysqli_query($conn,$sql);

									// message
$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$qs['phone'];
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Congratulations!!!!. You have been awarded Emgwen NG-CDF Bursary 2024. We will let you know when the cheque is ready.")->send();

					$mailto = $qs['parent_email'];
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Congratulations!!!!. You have been selected as a beneficiary of Emgwen NG-CDF Bursary 2024.\n We will let you know when the cheque is ready.
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
			$mssg = "Application for reference number ".$ref_no." reconciled successfully and mail has been sent to applicant.";
			$_SESSION['mssg'] = $mssg;
			header("location:dashboard?mssg=");
		   }else{
				
				$total = 10000;
				$rad ='REP'. rand(100,999);
				$sql = "INSERT INTO reports (report_id,student_name,parent,school_level,school_name,ward,location,sub_location,Amount_awarded)VALUES(
				'$rad','".$row['student_fullname']."','".$qs['parent_guardian_name']."','".$r['school_type']."','".$r['school_name']."','$ward','".$r['location']."','$sub_location','$total')";
				mysqli_query($conn,$sql);

								// message
$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$qs['phone'];
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Congratulations!!!!. You have been awarded Emgwen NG-CDF Bursary 2024. We will let you know when the cheque is ready.")->send();

			$mailto = $qs['parent_email'];
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Congratulations!!!!. You have been selected as a beneficiary of Emgwen NG-CDF Bursary 2024.\n We will let you know when the cheque is ready.
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
		   $mssg = "Application for reference number ".$ref_no." reconciled successfully and mail has been sent to applicant.";
		   $_SESSION['mssg'] = $mssg;
			header("location:dashboard?mssg=");
			
			}
		}
		}
		}
	
}
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'config/head.php';?>
 

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<?php include 'config/header.php';?>
                        </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include 'config/sidebar.php'; ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<span class="page-title font-weight-bold" style="font-size:13px">WELCOME : <?php echo $_SESSION['email'];?> </span>

								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-one">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-users"></i>
										</div>
										<div class="db-info">
											<h3>
											<?php
								$sql = "SELECT * FROM admins";
								$result = mysqli_query($conn,$sql);
								$count = mysqli_num_rows($result);
								 echo $count;
								 ?>
											</h3>
											<h6>Staff</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-two">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-user"></i>
										</div>
										<div class="db-info">
											<h3>
											<?php
								$sql = "SELECT * FROM students";
								$result = mysqli_query($conn,$sql);
								$count = mysqli_num_rows($result);
								 echo $count;
								 ?>
											</h3>
											<h6>Students</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-three">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-receipt"></i>
										</div>
										<div class="db-info">
											<h3>
											<?php
											 $today = date('Y/m/d');
								$sql = "SELECT * FROM applications WHERE today_date = '".$today."'";
								$result = mysqli_query($conn,$sql);
								$count = mysqli_num_rows($result);
								 echo $count;
								 ?>
											</h3>
											<h6>Today's Applications</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-four">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-window-close"></i>
										</div>
										<div class="db-info">
											<h3>
												
											</h3>
											<h6>Today's Rollout</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<h5 class="card-title">Recent Applications</h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
								<?php if(isset($_GET['message'])){
						$mssg = $_SESSION['message'];
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
														<!-- Success message -->
														<?php if(isset($_GET['mssg'])){
						$message = $_SESSION['mssg'];
						$mssg = $message;
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $mssg;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
														<!--update application success message -->
														<?php if(isset($_GET['success'])){
						$suc = $_SESSION['succ'];
						$succs = $suc;
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $succs;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
								<div class="card-body">
									<div id="line_graph">
										
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped" id="sample">
										<thead>
											<tr>
												<td class="font-weight-bold text-center">#</td>
												<td class="font-weight-bold text-center">REF-NO.</td>
												<td class="font-weight-bold text-center">Applicant Name</td>
												<td class="font-weight-bold text-center">Location</td>
												<td class="font-weight-bold text-center">Status</td>
												<td class="font-weight-bold text-center">EDIT</td>
												<td class="font-weight-bold text-center">APPROVE</td>
											</tr>
										</thead>
										<tbody>
											<?php 
											$sql = "SELECT * FROM applications ORDER BY id ASC LIMIT 10";
											$result = mysqli_query($conn,$sql);
											while($val = $result->fetch_assoc()){
												?>
											<tr>
												<td><?php echo $val['id'];?></td>
												<td><?php echo $val['reference_number'];?></td>
												<td><?php echo $val['student_fullname'];?></td>
												<td><?php echo $val['location'];?></td>
												<td class="text-warning font-weight-bold"><?php echo $val['status'];?></td>
												<td class="text-center">
													<?php 
													if($val['status'] == "Awarded"){
													?>
													<?php }
													else{
														?>
													<a href=""class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
													<?php }
													?>
													<div class="modal fade" id="Edit<?php echo $val['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">EDIT APPLICATION</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="">
                                               
                                               <label class="font-weight-bold" style="float:left;">Reference Number :</label>
                                            <input type="text" name="ref" class="form-control" id="" readonly value="<?php echo $val['reference_number'];?>">
                                           <label class="font-weight-bold" style="float:left;">UPI/ADM/REG No :</label>
                                            <input type="text" name="upi_reg" class="form-control" id="" required value="<?php echo $val['adm_upi_reg_no'];?>">
                                            <label class="font-weight-bold" style="float:left;">Fullname :</label> 
                                            <input type="text" name="name" class="form-control" id="" required value="<?php echo $val['student_fullname'];?>" readonly>
											
                                            <label class="font-weight-bold" style="float:left;">School type :</label> 
                                            <select name="school_type" id="" class="form-control">
												<option selected><?php echo $val['school_type'];?></option>
                                                <option>--select school-level--</option>
                                                
                                                <option>Secondary School</option>
												<option>University School</option>
                                             </select>
											 <label class="font-weight-bold" style="float:left;">School name :</label> 
                                            <input type="text" name="school_name" class="form-control" id="" required value="<?php echo $val['school_name'];?>">
											
											 <label class="font-weight-bold" style="float:left;">Ward :</label> 
                                             <select name="ward" id="opts" class="form-control" >
                                             	<?php if($val['ward'] != ''){
                                             		?>
												<option selected><?php echo $val['ward'];?></option>
											<?php }else{ }?>
                                                <option>--select ward--</option>
                                                <?php 
                                                $sql = "SELECT * FROM wards";
                                                $re = mysqli_query($conn,$sql);
                                                while($ro = $re->fetch_assoc()){
                                                	?>
                                                	<option value="<?php echo $ro['ward'];?>"><?php echo $ro['ward'];?></option>
                                                <?php } ?>
                                             </select>
     
                                             <label class="font-weight-bold" style="float:left">Location :</label> 
                                            <select name="location" id="defaults" class="form-control" onchange="showS(this.value)">
												<option selected><?php echo $val['location'];?></option>
                                                <option>--select location--</option>
                                               
                                             <!--  <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>  -->
                                             </select>
											<label class="font-weight-bold" style="float:left;">Sub-location :</label> 
											<select name="sub_location" id="sec" class="form-control" required>
												<option selected><?php echo $val['sub_location'];?></option>
                                                <option>--select sub_location--</option>
                                                <option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Chepkumia</option>
                                                            <option>Cheboite</option>
                                             </select>
                                            <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
												</td>
												<td class="text-center">
												 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
												<a href="" data-toggle="modal" data-target="#Approve<?php echo $val['id'];?>" class="btn btn-success">Reconcile</a>
											 <!-- approve record  -->
											<div id="Approve<?php echo $val['id'];?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<form method="post" action="">
													<input type="hidden" name="ref_no" class="form-control" id="" readonly value="<?php echo $val['reference_number'];?>">

														<!-- Modal content-->
														<div class="modal-content">
									
															<div class="modal-header" style="background: #398AD7; color: #fff;">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Reconcile</h4>
															</div>
									
															<div class="modal-body">
																<p>
																	<div class="alert alert-warning">Are you Sure you want Approve.... <strong><?php echo $val['reference_number'];?>?</strong></p>
																</div>
																<div class="modal-footer">
																	<button type="submit" name="approve" class="btn btn-success">YES</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
																</div>
															</div>
													</form>
													</div>
												</div>
											</td>
											</tr>
											  <!-- delete record  -->
											 <div id="Modal<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <form method="post" action="">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
														<input type="hidden" name="ref" class="form-control" id="" readonly value="<?php echo $val['reference_number'];?>">
												
                                                            <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Delete</h4>
                                                            </div>
                                    
                                                            <div class="modal-body">
                                                                <p>
                                                                    <div class="alert alert-danger">Are you Sure you want Delete.... <strong><?php echo $val['reference_number'];?>?</strong></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="delete" class="btn btn-danger">YES</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    </div>
                                                </div>
											<?php }?>
										</tbody>
										
										</table>
									</div>
								</div>
							</div>
							<!-- /Revenue Chart -->
							 <select name="ward" id="opts" class="form-control" onchange="showL(this.value)">
                                             	<!-- <?php if($val['ward'] != ''){
                                             		?>
												<option selected><?php echo $val['ward'];?></option>
											<?php }else{ }?> -->
                                                <option>--select ward--</option>
                                                <?php 
                                                $sql = "SELECT * FROM wards";
                                                $re = mysqli_query($conn,$sql);
                                                while($ro = $re->fetch_assoc()){
                                                	?>
                                                	<option value="<?php echo $ro['ward'];?>"><?php echo $ro['ward'];?></option>
                                                <?php } ?>
                                             </select>
     
                                             <label class="font-weight-bold" style="float:left;">Location :</label> 
                                            <select name="location" id="defaults" class="form-control" onchange="showS(this.value)">
												<!-- <option selected><?php echo $val['location'];?></option> -->
                                                <!-- <option>--select location--</option> -->
                                               
                                              <!--   <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>  -->
                                             </select>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Wrapper -->

			
        </div>
		<!-- /Main Wrapper -->
		<?php include 'config/scripts.php';?>
    </body>
	
  <script src="./bootstrap/jquery/jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="./DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );
// 
    
// show locations
$(document).ready(function(){
    // Event handler for the change event on opts
    $('#opts').change(function(){
        // Get the selected value from opts
        var selectedValue = $(this).val();

        // Make an AJAX request to fetch data based on the selected value
        $.ajax({
            type: 'POST',
            url: `location.php?location=${selectedValue}`, // Use template literal
            data: { selectedValue: selectedValue },
            success: function(response) {
                // Clear previous options in defaults
                $('#defaults').empty();

                // Populate options in defaults based on the response
                $.each(response, function(key, value) {
                    $('#defaults').append('<option value="' + value + '">' + value + '</option>');
                    console.log(value);
                });
            }
        });
    });
});

// show sub_locations
function showS(optionValue) {
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
               console.log(optionElement);

            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}
    </script>
</html>