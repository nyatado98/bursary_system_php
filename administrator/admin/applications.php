<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exeption;
use PHPMailer\PHPMailer\SMTP;

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
//load composer autoloader
require 'vendor/autoload.php';
 require 'vendor/phpmailer/phpmailer/src/Exception.php';
 require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
 require 'vendor/phpmailer/phpmailer/src/SMTP.php';

   $mail = new PHPMailer();

$sql = "SELECT * FROM applications";
$result = mysqli_query($conn, $sql);

$ref = $upi_reg = $name = $school_type = $school_name = $location = $ward = $sub_location = "";
// $m = "";
// $m = $_SESSION['m'];
// $_SESSION['m'] = $m;
$parent ="";


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
	// if($query){
		$suc = "Successfully updated the application for reference number ".$_POST['ref'].".";
		$_SESSION['succ'] = $suc;
		header("location:applications?success=");
	// }else{

	// }
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
			header("location:applications?message=");
	}else{
				$sql = "UPDATE applications SET status = 'Awarded' WHERE reference_number ='$ref_no'";
				$q = mysqli_query($conn,$sql);
				
				if($q){
						$sql = "SELECT * FROM parents WHERE student_fullname = '".$row['student_fullname']."'";
				        $querys = mysqli_query($conn,$sql);
				        while($qs = $querys->fetch_assoc()){
							$sql = "SELECT * FROM students WHERE student_fullname = '".$row['student_fullname']."'";
							$qu = mysqli_query($conn,$sql);
							while($q = $qu->fetch_assoc()){
								$ward = $q['ward'];
								$sub_location = $q['sub_location'];
							
							$sql = "SELECT * FROM applications WHERE reference_number ='$ref_no' AND status = 'Awarded'";
		            		$res = mysqli_query($conn,$sql);
		            		while($r = $res->fetch_assoc()){
			        		if($r['school_type'] == 'Secondary School'){

								$_SESSION['school_type'] = $school_type;
								$_SESSION['parent_guardian_name'] = $parent;


					$total = 5000;
					$rad ='REP'. rand(100,999);
					$sql = "INSERT INTO reports (report_id,student_name,parent,school_level,school_name,ward,location,sub_location,Amount_awarded,created_at,updated_at)VALUES(
					'$rad','".$row['student_fullname']."','".$qs['parent_guardian_name']."','".$r['school_type']."','".$r['school_name']."','$ward','".$r['location']."','$sub_location','$total','$current_date','$current_date')";
					mysqli_query($conn,$sql);

					$mailto = $qs['parent_email'];
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Congratulations!!!!. You have been awarded Emgwen NGCDF Bursary 2024. We will let you know when the cheque is ready.
			Thank You.";
		
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
		   header("location:applications?mssg=");
		   }else{
				
				$total = 10000;
				$rad ='REP'. rand(100,999);
				$sql = "INSERT INTO reports (report_id,student_name,parent,school_level,school_name,ward,location,sub_location,Amount_awarded,created_at,updated_at)VALUES(
				'$rad','".$row['student_fullname']."','".$qs['parent_guardian_name']."','".$r['school_type']."','".$r['school_name']."','$ward','".$r['location']."','$sub_location','$total','$current_date','$current_date')";
				mysqli_query($conn,$sql);

			$mailto = $qs['parent_email'];
			$mailSub = 'NANDI COUNTY';
			$mailMsg = "Congratulations!!!!. You have been awarded Emgwen NGCDF Bursary 2024. We will let you know when the cheque is ready.
			Thank You.";
		
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
		   $mssg = "Application for reference number ".$ref_no." approved successfully and mail has been sent to applicant.";
		   $_SESSION['mssg'] = $mssg;
		   header("location:applications?mssg=");
			}
		}
		}
		}
		}
	
}
}
}
unset($_SESSION['m']);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('config/head.php');?>

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<?php include('config/header.php');?>
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
								<a href="applications"><i class="fa fa-file"></i> <span>Applications</span></a>
							</li>
							
							<li > 
								<a href="applicants"><i class="fa fa-list"></i> <span>Applicants</span></a>
							</li>
							<li> 
								<a href="beneficiaries"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
							<li> 
								<a href="students_uploads"><i class="fa fa-file-image"></i> <span>Student Uploads</span></a>
							</li>
							<li> 
								<a href="amount_reports"><i class="fa fa-money-bill"></i> <span>Amount Reports</span></a>
							</li>
							<li> 
								<a href="reports"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="messaging"><i class="fa fa-message"></i> <span>Messages</span></a>
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

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Applications</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
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
							<div class="card card-chart">
								
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
												<td class="font-weight-bold text-center">School Type</td>
												<td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Application Date</td>
												<td class="font-weight-bold text-center">Status</td>
												<td class="font-weight-bold text-center">EDIT</td>
												<td class="font-weight-bold text-center">APPROVE</td>
											</tr>
										</thead>
										
										<tbody>
										<?php while($val = $result->fetch_assoc()){
											?>
											<tr>
												<td><?php echo $val['id'];?></td>
												<td><?php echo $val['reference_number'];?></td>
												<td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['school_type'];?></td>
												<td><?php echo $val['location'];?></td>
                                                <td><?php echo $val['today_date'];?></td>
												<td class="text-warning font-weight-bold"><?php echo $val['status'];?></td>
												<td class="text-center">	
												<?php if($val['status'] == "Awarded"){?>
													<?php 
												}else{?>
												<a href=""class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['reference_number'];?>">Edit</a>
												<?php }?>
													<div class="modal fade" id="Edit<?php echo $val['reference_number'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
														aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																   <h4 class="text-center">EDIT APPLICATION</h4>
																</div>
																<div class="modal-body">
																   <form method="post" action="">
																	 
																	   <label class="font-weight-bold">Reference Number :</label>
																	<input type="text" name="ref" class="form-control" id="" readonly value="<?php echo $val['reference_number'];?>">
																   <label class="font-weight-bold">UPI/ADM/REG No :</label>
																	<input type="text" name="upi_reg" class="form-control" id="" required value="<?php echo $val['adm_upi_reg_no'];?>">
																	<label class="font-weight-bold">Fullname :</label> 
																	<input type="text" name="name" class="form-control" id="" required value="<?php echo $val['student_fullname'];?>">
																	
																	<label class="font-weight-bold">School type :</label> 
																	<select name="school_type" id="" class="form-control">
																		<option selected><?php echo $val['school_type'];?></option>
																		<option>--select role--</option>
																		
																		<option>Secondary School</option>
																		<option>University/College/TVET</option>
																	 </select>
																	 <label class="font-weight-bold">School name :</label> 
																	<input type="text" name="school_name" class="form-control" id="" required value="<?php echo $val['school_name'];?>">
																	<label class="font-weight-bold">Location :</label> 
																	<select name="location" id="" class="form-control" required>
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option value ="Kamobo">Kamobo</option>
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
                                            <option value ="Terige">Terige</option>
																	 </select>
											<label class="font-weight-bold">Ward :</label> 

																	 <select name="ward" class="form-control  font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $val['ward'];?>" selected><?php echo $val['ward'];?></option>
                                                            <option>Kapsabet</option>
                                                            <option>Chepkumia</option>
                                                            <option>Kilibwoni</option>
                                                            <option>Kapkangani</option>
                                                            
                                                        </select>
											<label class="font-weight-bold">Sub-location :</label> 
                                            <select name="sub_location" class="form-control font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $val['sub_location'];?>" selected><?php echo $val['sub_location'];?></option>
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
												 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a>  -->
												<a href=""class="btn btn-success" data-toggle="modal" data-target="#Approve<?php echo $val['reference_number'];?>">Reconcile</a>
											 <!-- approve record  -->
											<div id="Approve<?php echo $val['reference_number'];?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<form method="post" action="">
														<input type="hidden" name="ref_no" value="<?php echo $val['reference_number'];?>">
														<!-- Modal content-->
														<div class="modal-content">
									
															<div class="modal-header" style="background: #398AD7; color: #fff;">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Approve</h4>
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
											<!-- delete record -->
											<div id="Modal<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{url('delete_application/'.$val->id)}}">
                                                        @csrf
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                    
                                                            <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Delete</h4>
                                                            </div>
                                    
                                                            <div class="modal-body">
                                                                <p>
                                                                    <div class="alert alert-danger">Are you Sure you want Delete.... <strong><?php echo $val['reference_number'];?>?</strong></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="delete_acc" class="btn btn-danger">YES</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    </div>
                                                </div>
											</tr>
											<?php }?>
										</tbody>
										
										</table>
									</div>
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
	
    <!--  <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );
    </script>
</html>