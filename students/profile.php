<?php
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
	header("location:login");
	exit;
}

date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:s');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['user_email']."'";
$result = mysqli_query($conn, $sql);
$name = $email = $password = "";

if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE users SET fullname ='".$name."', email = '".$email."',updated_at='$current_date' WHERE id='".$_POST['id'] ."'";
    $res = mysqli_query($conn, $sql);
    if($res){
    $message = "Users details updated successfully";
    header("location:profile?message=");
    }
    
}
//update password
$current_pass = $new_pass = $re_pass = "";
$err = "";
if(isset($_POST['reset'])){
    $id = $_POST['id'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];

$sql = "SELECT password FROM users WHERE id = '".$_POST['id']."'";
$r = mysqli_query($conn,$sql);
while($rows = $r->fetch_assoc()){
    if($current_pass != $rows['password']){
    $err = "The current password doesn't match the original password";
}elseif($re_pass != $new_pass){
    $err = "The confirm password doesn't match new password";
}else{
    $sql = "UPDATE users SET password = '".$new_pass."' WHERE id ='".$_POST['id']."'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $message = "User password reset successfully";
        header("location:profile?mssg=");
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
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard" class="logo">
						<img src="images/logo.png" alt="Logo">
					</a>
					<a href="dashboard" class="logo logo-small">
						<img src="images/logo.png" alt="Logo" width="30" height="30">
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
							<li > 
								<a href="my_applications"><i class="fa fa-list"></i> <span>My Applications</span></a>
							</li>
							<li class="active"> 
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
						// $mssg = $_SESSION['mssg'];
						$message = "Your details has been updated successfully.";
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $message;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
                                                        <?php if(isset($_GET['mssg'])){
						// $mssg = $_SESSION['mssg'];
						$message = "Your password has been updated successfully.";
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
											<h5 class="text-center font-weight-bold" style="font-size: 30px"><span style="color: #0f893b">My</span> - <span style="color: orange">Profile</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
                                <span class="text-danger font-weight-bold"><?php echo $err ?></span><br>
								<div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Fullname</td>
                                                    <td>Email</td>
                                                    <td>Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php while($data = $result->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['id'];?></td>
                                                    <td><?php echo $data['fullname'];?></td>
                                                    <td><?php echo $data['email'];?></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?php echo $data['id'];?>">EDIT</a></div>
                                                         <!-- edit user modal -->
     <div class="modal fade" id="Modal<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                <h4 class="text-center">Edit Personal Details</h4>
             </div>
             <div class="modal-body">
                <form method="post" action="">
                    
                    <label class="font-weight-bold">Enter Fullname :</label>
                 <input type="hidden" name="id" class="form-control" id="" required value="<?php echo $data['id'];?>">

                 <input type="text" name="name" class="form-control" id="" required value="<?php echo $data['fullname'];?>">
                <label class="font-weight-bold">Enter Email :</label>
                 <input type="email" name="email" class="form-control" id="" required value="<?php echo $data['email'];?>">
                 <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                </form>
             </div>
         </div>
     </div>
 </div>
                                                    <div class="col-md-6"><a href="" class="btn btn-secondary"  data-toggle="modal" data-target="#Change<?php echo $data['id'];?>">Change Password</a></div></div></td>
                                                </tr>
                                                                                                     <!-- edit user modal -->
     <div class="modal fade" id="Change<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="text-center">Change Password</h4>
                </div>
                <div class="modal-body">
                   <form method="post" action="">
                       
                       <label class="font-weight-bold">Enter Current Password :</label>
                    <input type="hidden" name="id" class="form-control" id="" value="<?php echo $data['id'];?>" >

                    <input type="password" name="current_pass" class="form-control" id="" >
                   <label class="font-weight-bold">Enter New Password :</label>
                    <input type="password" name="new_pass" class="form-control" id="" required>
                    <label class="font-weight-bold">Re-Enter New Password :</label>
                    <input type="password" name="re_pass" class="form-control" id="" required>
                    <input type="submit" value="R E S E T" name="reset" class="btn btn-success form-control mt-2">
                   </form>
                </div>
            </div>
        </div>
    </div>
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