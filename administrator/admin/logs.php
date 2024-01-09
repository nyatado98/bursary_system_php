<?php 
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
$sql = "SELECT * FROM logs";
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
								<a href="reports"><i class="fa fa-list"></i> <span>Bursary Reports</span></a>
							</li>
						
							<!-- <li class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="location_report">Location Report</a></li>
									<li><a href="sub_location_report">Sub-location Report</a></li>
								</ul>
							</li> -->
				
							<li > 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
                            <li class="active"> 
                                <a href="logs"><i class="fa fa-file"></i> <span>Logs</span></a>
                            </li>
                            <li> 
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Syste Logs</li>
								</ul>
							</div>
						</div>
					</div>
					

					<div class="row">
						<div class="container col-md-12">
                           <!--  <span class="text-success font-weight-bold"><?php echo $message ?></span><br>
                            <span class="text-danger font-weight-bold"><?php echo $err ?></span><br> -->
                            <a href="" class="badge badge-pill p-3 badge-danger mx-4" style="font-size:15px" data-toggle="modal" data-target="#New">Clear Logs</a>
                            <div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">Clear system logs</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                                    <div class="alert alert-warning">Are you Sure you want to clear All logs.... <strong>?</strong></p>
                                                                    </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <form method="post" action="">
                                                                    <button type="submit" name="clear" class="btn btn-danger">YES</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                                </form>
                                                                </div>
                                    </div>
                                </div>
                            </div>
							<!-- Revenue Chart -->
							
								<div class="card-body">
									<div id="line_graph">
									</div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="sample">
                                            <thead>
                                                <tr>
                                                    <td class="font-weight-bold text-center">#</td>
                                                    <td class="font-weight-bold text-center">Log-id</td>
                                                    <td class="font-weight-bold text-center">Fullname</td>
                                                    <td class="font-weight-bold text-center">Email</td>
                                                    <td class="font-weight-bold text-center">Status</td>
                                                    <td class="font-weight-bold text-center">Login-Time</td>
                                                    <td class="font-weight-bold text-center">Logout-Time</td>


                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                               if((mysqli_num_rows($result)) <= 0) {
                                               ?>
                                               <tr>
                                                   <td colspan="5" class="text-center text-danger">No logs available !!!!!.</td>
                                               </tr>
                                               <?php 
                                           }else{
                                               while($data = $result->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['id'];?></td>
                                                    <td><?php echo $data['log_id'];?></td>
                                                    <td><?php echo $data['fullname'];?></td>
                                                    <td><?php echo $data['email'];?></td>
                                                    <?php if ($data['status'] == 'Loggedin') {
                                                     ?>
                                                    <td class="badge badge-pill badge-success mt-2 m-1"><?php echo $data['status'];?></td>
                                                <?php }else{ ?>
                                                    <td class="badge badge-pill badge-danger mt-2 m-1"><?php echo $data['status'];?></td>
                                                <?php } ?>
                                                    <td><?php echo $data['login_time'];?></td>
                                                    <td><?php echo $data['logout_time'];?></td>
                                                </tr>
                                                <?php }}?>
                                            </tbody>
                                        </table>
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