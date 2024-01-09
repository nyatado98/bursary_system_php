<?php 
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

require "../../vendor/autoload.php";
// require __DIR__ . '../vendor/autoload.php';

use \Savannabits\Advantasms\Advantasms;

$current = date('Y');
$message = $fullname = "";
$err = "";

// befor cheque distribution
if(isset($_POST['send'])){
	if (empty($_POST['message'])) {
		$err = "Please enter a message";

	}else{
		$message = trim($_POST['message']);
	}
 if (empty($err)) {
 	$sql = "SELECT * FROM applications WHERE status = 'Awarded' AND year = '$current'";
 	$result = mysqli_query($conn,$sql);
 	while($rows = $result->fetch_assoc()){
 		$name = $rows['student_fullname'];
 		$sql = "SELECT phone, student_fullname FROM students WHERE student_fullname = '$name' AND year = '$current'";
 		$query = mysqli_query($conn,$sql);
 		

foreach ($query as $key) {
 			// send sms
$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$key['phone'];
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear ".$key['student_fullname'].", We will let you know when the cheque is ready. Thank You.")->send();

	header("location:messaging?success");

		}
 	}

 }

}


// after cheque distribution
if(isset($_POST['send_sms'])){
	if (empty($_POST['message'])) {
		$err = "Please enter a message";

	}else{
		$message = trim($_POST['message']);
	}
 if (empty($err)) {
 	$sql = "SELECT * FROM applications WHERE status = 'Awarded' AND year = '$current'";
 	$result = mysqli_query($conn,$sql);
 	while($rows = $result->fetch_assoc()){
 		$name = $rows['student_fullname'];
 		$sql = "SELECT phone, student_fullname FROM students WHERE student_fullname = '$name' AND year = '$current'";
 		$query = mysqli_query($conn,$sql);
 		

foreach ($query as $key) {
 			// send sms
$apiKey = "bd3ef4f7a573e95e2eac35309dc0f8ca";
$partnerId = "2832";
$shortcode = "JOSSES";
$mobile ='254'.$key['phone'];
//instantiate
$sms = new Advantasms($apiKey,$partnerId,$shortcode);

//Send and receive response
$response = $sms->to($mobile)->message("Dear ".$key['student_fullname'].", Your cheque has been delivered to your school. Lias with your schools' burser or accounts office. Thank You.")->send();

	header("location:messaging?success");

		}
 	}

 }

}

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
							<li > 
								<a href="applications"><i class="fa fa-file"></i> <span>Applications</span></a>
							</li>
							
							<li > 
								<a href="applicants"><i class="fa fa-list"></i> <span>Applicants</span></a>
							</li>
							<li > 
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
						
							<!-- <li class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="location_report">Location Report</a></li>
									<li><a href="sub_location_report">Sub-location Report</a></li>
								</ul>
							</li> -->
				
							<li> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li > 
                                <a href="logs"><i class="fa fa-file"></i> <span>Logs</span></a>
                            </li>
                            <li class="active"> 
								<a href="messaging"><i class="fa fa-message"></i> <span>Messages</span></a>
							</li>
							<li> 
								<a href="settings"><i class="fa fa-cog"></i> <span>settings</span></a>
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
            <div class="page-wrapper mt-5">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Send Messages Here</li>
								</ul>
							</div>
						</div>
					</div>
					<hr>
					
<?php 
$sql = "SELECT * FROM applications WHERE status = 'Awarded' AND year = '$current'";
 	$result = mysqli_query($conn,$sql);
while ($rows = $result->fetch_assoc()) {
	$name = $rows['student_fullname'];
	$sql = "SELECT phone,student_fullname FROM students WHERE student_fullname = '$name' AND year = '$current'";
 		$query = mysqli_query($conn,$sql);
 // while ($row = $query->fetch_assoc()) {
 	foreach ($query as $key) {

 		
 	?>
 	<!-- <td><?php print_r($key['phone']);?></td>
 	<td><?php print_r($key['student_fullname']);?></td> -->

 <?php } } ?>
					<div class="row">
						<!-- <div class="container col-md-10"> -->
							<!-- Revenue Chart -->
							
								<div class="card-body">
									<div id="line_graph">
									</div>
									<div class="row">
                                    <div class="col-md-6">
									<form method="post" action="">
                                        <div class="card-header">
                                        <h4 class="text-center">Send Message</h4>
                                        </div>
                                       <!--  <label class="font-weight-bold mt-3">Select Here.</label>
                                        <select class="form-control"name="users">
                                            <option>All</option>
                                            <option>Select Users</option>
                                        </select> -->
                                        <label class="font-weight-bold mt-3">Message Here.</label>
                                        <textarea name="message" style="height: 10em; font-size:17px" class="form-control mb-3 <?php echo $err ? 'border border-danger' : '';?>" placeholder="Enter message here......" readonly>Dear Student, We will let you know when the cheque is ready. Thank You.</textarea>
                                        <span class="text-danger"><?php echo $err;?></span>
                                        <!-- <input type="submit" name="send" class="btn btn-info form-control" value="Send"> -->
                                        <button type="submit" name="send" class="btn btn-info form-control" style="font-size:17px"><i class="fa fa-paper-plane"></i> Send Message.</button>
                                    </form>
                                    </div>

                                    <div class="col-md-6">
									<form method="post" action="">
                                        <div class="card-header">
                                        <h4 class="text-center">Send Message</h4>
                                        </div>
                                       <!--  <label class="font-weight-bold mt-3">Select Here.</label>
                                        <select class="form-control"name="users">
                                            <option>All</option>
                                            <option>Select Users</option>
                                        </select> -->
                                        <label class="font-weight-bold mt-3">Message Here.</label>
                                        <textarea name="message" style="height: 10em; font-size:17px" class="form-control mb-3 <?php echo $err ? 'border border-danger' : '';?>" placeholder="Enter message here......" readonly>Dear Student, Your cheque has been delivered to your school. Lias with your schools' burser or accounts office. Thank You.</textarea>
                                        <span class="text-danger"><?php echo $err;?></span>
                                        <!-- <input type="submit" name="send_sms" class="btn btn-info form-control" value="Send">
                                         -->
                                         <button type="submit" name="send_sms" class="btn btn-info form-control" style="font-size:17px"><i class="fa fa-paper-plane"></i> Send Message.</button>
                                    </form>
                                    </div>
                                </div>
								</div>
							
							<!-- /Revenue Chart -->
							
						<!-- </div> -->
					</div>

				</div>

			</div>
			<!-- /Page Wrapper -->

			
        </div>
		<!-- /Main Wrapper -->
		<?php include('config/scripts.php');?>
    </body>
	
    <!-- <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script> -->
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