<?php 
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
$sql = "SELECT * FROM admins";
$result = mysqli_query($conn, $sql);
$name = $email = $phone = $password = "";
$message = "";
if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE admins SET fullname ='".$name."', email = '".$email."', phone = '".$phone."' WHERE id='".$_POST['id'] ."'";
    $res = mysqli_query($conn, $sql);
    if($res){
    $message = "Users details updated successfully";
    // header("location:users");
    }
    
}
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = random_int(100000,999999);

    date_default_timezone_set('Africa/Nairobi');
	$today=strtotime("current");
    $today = date('Y-m_d H:m:s');

    $sql = "INSERT INTO admins (fullname,email,phone,password,created_at,updated_at)VALUES('$name','$email','$phone','$password','$today','$today')";
    $ress = mysqli_query($conn,$sql);
    if($ress){
        $message = "Users successfully added";
        // header("Location:users");
    }
}

$current_pass = $new_pass = $re_pass = "";
$err = "";
if(isset($_POST['reset'])){
    $id = $_POST['id'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];

$sql = "SELECT password FROM admins WHERE id = '".$_POST['id']."'";
$r = mysqli_query($conn,$sql);
while($rows = $r->fetch_assoc()){
    if($current_pass != $rows['password']){
    $err = "The current password doesn't match the original password";
}elseif($re_pass != $new_pass){
    $err = "The confirm password doesn't match new password";
}else{
    $sql = "UPDATE admins SET password = '".$new_pass."' WHERE id ='".$_POST['id']."'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $message = "User password reset successfully";
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
					

					<div class="row">
						<div class="container col-md-10">
							<!-- Revenue Chart -->
							
								<div class="card-body">
									<div id="line_graph">
									</div>
                                    <div class="col-md-7">
									<form method="post" action="">
                                        <div class="card-header">
                                        <h4 class="text-center">Send Message</h4>
                                        </div>
                                        <label class="font-weight-bold mt-3">Select Here.</label>
                                        <select class="form-control"name="users">
                                            <option>All</option>
                                            <option>Select Users</option>
                                        </select>
                                        <label class="font-weight-bold mt-3">Message Here.</label>
                                        <textarea name="message" class="form-control mb-3"></textarea>
                                        <input type="submit" name="send" class="btn btn-info form-control" value="Send">
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
	
    {{-- <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script> --}}
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