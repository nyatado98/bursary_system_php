<?php
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
	header("location:login");
	exit;
}
// $sql = "SELECT * FROM parents WHERE parent_email = '".$_SESSION['user_email']."'";
// $result = mysqli_query($conn,$sql);
// while($row = $result->fetch_assoc())
	$sql = "SELECT * FROM applications WHERE student_email = '".$_SESSION['user_email']."'";
	$re = mysqli_query($conn,$sql);

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
						<img src="images/CDF LOGO.jpg" alt="Logo">
					</a>
					<a href="dashboard" class="logo logo-small">
						<img src="images/CDF LOGO.jpg" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
					<label style="font-weight: 900; color: #0f893b; font-size: 25px" class="mx-5">BURSARY APPLICATION SYSTEM</label>
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
							<li > 
								<a href="application"><i class="fa fa-file"></i> <span>New Application</span></a>
							</li>
							
                            <!-- <li> 
								<a href="{{url('students/request_application')}}"><i class="fa fa-key"></i> <span>Request Application</span></a>
							</li> -->
							<li class="active"> 
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
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-12">
											<h5 class="text-center font-weight-bold" style="font-size: 30px"><span style="color: #0f893b">My</span> - <span style="color: orange">Applications</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
								<div class="card-body">
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Reference Number</td>
                                                <td>Application Date</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php while($item = $re->fetch_assoc()){?>
                                            <tr>
                                                
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['reference_number'];?></td>
                                                <td><?php echo $item['today_date'];?></td>
                                                <td><?php echo $item['status'];?></td>
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