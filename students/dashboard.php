<?php
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
	header("location:students/login");
	exit;
}
// Set the path to your log file
$logFilePath = '../logs.txt';

// Enable error reporting
error_reporting(E_ALL);

// Set error logging to file
ini_set('log_errors', 1);
ini_set('error_log', $logFilePath);

// $_SESSION['mssg'] = "";
//edit

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
		$mssg = $ref;
		$_SESSION['mssg'] = $mssg;
	
		header("location:dashboard?message=");
		
	}else{
		header("location:dashboard");
	}
	
}
// $sql = "SELECT * FROM users WHERE email = '".$_SESSION['user_email']."'";
// $result = mysqli_query($conn,$sql);
// while($row = $result->fetch_assoc()){


	$sql = "SELECT * FROM applications WHERE student_email = '".$_SESSION['user_email']."'";
	$re = mysqli_query($conn,$sql);	
	// print_r($re)									;
					

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('config/head.php');?>

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard" class="logo">
						<img src="./images/CDF LOGO.jpg" alt="Logo">
					</a>
					<a href="dashboard" class="logo logo-small">
					<label style="font-weight: 900; color: #0f893b; font-size: 15px;margin-left:-130px">BURSARY APPLICATION SYSTEM</label>
					
					</a>
					<!-- <a href="dashboard" class="logo mobile">
					<label style="font-weight: 900; color: #0f893b; font-size: 15px">BURSARY APPLICATION SYSTEM</label>
					</a> -->
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
					<label style="font-weight: 900; color: #0f893b; font-size: 25px" class="mx-5">BURSARY APPLICATION SYSTEM</label>
				</a>
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
					<!-- <label style="font-weight: 900; color: #0f893b; font-size: 25px">BURSARY APPLICATION SYSTEM</label> -->
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
							<li class="active"> 
								<a href="dashboard"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							
							<li> 
								<a href="application"><i class="fa fa-file"></i> <span>New Application</span></a>
							</li>
							
                            <!-- <li> 
								<a href="students/request_application"><i class="fa fa-key"></i> <span>Request Application</span></a>
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
							<div class="col-sm-12">
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
									<li class="breadcrumb-item active"></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							
					<?php if(isset($_GET['message'])){
						$mssg = $_SESSION['mssg'];
						$message = "Application updated successfully for application ref no. " .$mssg;
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-12">
											<h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">Recent</span> - <span style="color: orange">Applications</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
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
												<td class="font-weight-bold text-center">Status</td>
												<td class="font-weight-bold text-center">EDIT</td>
												<!-- <td class="font-weight-bold text-center">EDIT School Docs</td> -->
												
											</tr>
										</thead>
										<tbody>
											<?php while($item = $re->fetch_assoc()){
												?>
											<tr>
                                                
												<td><?php echo $item['id'];?></td>
												<td><?php echo $item['reference_number'];?></td>
												<td><?php echo $item['student_fullname'];?></td>
												<?php if($item['status'] == "Awarded"){ ?>
												<td class="text-success font-weight-bold"><?php echo $item['status'];?></td>
												
												<?php }else{?>
												<td class="text-warning font-weight-bold"><?php echo $item['status'];?></td>
													<?php }?>
												<td class="text-center">
												<?php if($item['status'] == "Awarded"){

?>
<?php }else{?>
												<a href="" class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $item['reference_number'];?>">Edit</a><?php }?>
											</td>
						<div class="modal fade" id="Edit<?php echo $item['reference_number'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">EDIT APPLICATION</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action=""  enctype="multipart/form-data">
                                               <label class="font-weight-bold">Reference Number :</label>
                                            <input type="text" name="ref" class="form-control" id="" readonly value="<?php echo $item['reference_number'];?>">
                                           <label class="font-weight-bold">UPI/ADM/REG No :</label>
                                            <input type="text" name="upi_reg" class="form-control" id="" required value="<?php echo $item['adm_upi_reg_no'];?>">
                                            <label class="font-weight-bold">Fullname :</label> 
                                            <input type="text" name="name" class="form-control" id="" required value="<?php echo $item['student_fullname'];?>">
											
                                            <label class="font-weight-bold">School type :</label> 
                                            <select name="school_type" id="" class="form-control">
												<option selected><?php echo $item['school_type'];?></option>
                                                <option>--select role--</option>
                                                <!-- <option>Primary School</option> -->
                                                <option>Secondary School</option>
												<option>University School</option>
                                             </select>
											 <label class="font-weight-bold">School name :</label> 
                                            <input type="text" name="school_name" class="form-control" id="" required value="<?php echo $item['school_name'];?>">
											<label class="font-weight-bold">Location :</label> 
                                            <select name="location" id="" class="form-control" required>
												<option selected><?php echo $item['location'];?></option>
                                                <option>--select location--</option>
                                                <?php 
                                                $sql = "SELECT * FROM locations";
                                                $r = mysqli_query($conn,$sql);
                                                while ($row=$r->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['location']?>"><?php echo $row['location']?></option>
                                            <?php } ?>
                                                
                                             </select>
											 <label class="font-weight-bold">Ward :</label> 
											 <select name="ward" class="form-control  font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $item['ward'];?>" selected><?php echo $item['ward'];?></option>
                                                            <?php 
                                                $sql = "SELECT * FROM wards";
                                                $r = mysqli_query($conn,$sql);
                                                while ($row=$r->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['ward']?>"><?php echo $row['ward']?></option>
                                            <?php } ?>
                                                            
                                                        </select>
											<label class="font-weight-bold">Sub-location :</label> 
                                            <select name="sub_location" class="form-control font-weight-bold">
                                                        <option value = ""></option>
                                                            <option value="<?php echo $item['sub_location'];?>" selected><?php echo $item['sub_location'];?></option>
                                                            <?php 
                                                $sql = "SELECT * FROM sub_locations";
                                                $r = mysqli_query($conn,$sql);
                                                while ($row=$r->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['sub_location']?>"><?php echo $row['sub_location']?></option>
                                            <?php } ?>
                                                        </select>
                                            <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
										
											<!-- <td><a href=" " class="btn btn-secondary" >EDIT DOCS</a></td> -->
                                           
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
	
   <!-- <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

	function showAlertBox(message) {
  // Create the alert box element.
  const alertBox = document.createElement('div');
  alertBox.id = 'alert-box';
  alertBox.textContent = message;

  // Append the alert box element to the body of the document.
  document.body.appendChild(alertBox);

  // Center the alert box on the screen.
  alertBox.style.top = '50%';
  alertBox.style.left = '50%';
  alertBox.style.transform = 'translate(-50%, -50%)';

  // Set the z-index of the alert box so that it is displayed above all other elements on the page.
  alertBox.style.zIndex = 999;
}

// Hide the alert box after 5 seconds.
setTimeout(function() {
  document.getElementById('alert-box').remove();
}, 5000);

    </script>
</html>