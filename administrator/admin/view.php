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



$current_pass = $new_pass = $re_pass = "";
$err = "";


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
								<a href="students_uploads" style="font-size:20px" class="font-weight-bold"><i class="fa fa-arrow-left"></i> <span>GO BACK</span></a>
							</li>
							<!-- <li > 
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
						
							<li class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="location_report">Location Report</a></li>
									<li><a href="sub_location_report">Sub-location Report</a></li>
								</ul>
							</li>
				
							<li class="active"> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="settings"><i class="fa fa-cog"></i> <span>settings</span></a>
							</li>
							<li> 
								<a href="logout"><i class="fa fa-arrow-left"></i> <span>Logout</span></a>
							</li> -->
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Students Specific Documents</li>
								</ul>
							</div>
						</div>
					</div>
					

					<div class="row">
						<div class="container col-md-10">
                            <span class="text-success font-weight-bold"><?php echo $message ?></span><br>
                            <span class="text-danger font-weight-bold"><?php echo $err ?></span><br>

                            <!--  succes message 
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                <span class="font-weight-bold">{{session()->get('message')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                            @endif
                        
                              error message 
                              @if(session()->has('error'))
                              <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                  <span class="font-weight-bold">{{session()->get('error')}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                              @endif
                               -->
                            
							<!-- Revenue Chart -->
							
								<div class="card-body">
									<div id="line_graph">
									</div>
                                    <?php
                                    if(isset($_GET['view']) && isset($_GET['id'])){
                                        $school_id_letter = $_GET['view'];
										$id = $_GET['id'];
                                        $sql = "SELECT * FROM students_uploads WHERE school_id_letter = '$school_id_letter' AND id= '$id'";
                                        $re = mysqli_query($conn, $sql);
                                        while($rows = $re->fetch_assoc()){
                                            ?>
                                            <!-- <img src="<?php echo '../../students/students_upload/'.$rows['school_id_letter']?>" alt="Image picture"> -->
                                            <iframe src="<?php echo '../../students/students_upload/'.$rows['school_id_letter']?>" width="1500" height="800"></iframe>
                                            <?php
                                        }
                                    }elseif(isset($_GET["view_fee"]) && isset($_GET['id'])){
                                        $school_id_letter = $_GET['view_fee'];
										$id = $_GET['id'];
                                        $sql = "SELECT * FROM students_uploads WHERE fee_structure = '$school_id_letter' AND id= '$id'";
                                        $ree = mysqli_query($conn, $sql);
                                        while($rows = $ree->fetch_assoc()){
                                            ?>
                                            <!-- <img src="<?php echo '../../students/students_upload/'.$rows['fee_structure']?>" alt="Image picture"> -->
                                            <iframe src="<?php echo '../../students/students_upload/'.$rows['fee_structure']?>" width="1500" height="800"></iframe>
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