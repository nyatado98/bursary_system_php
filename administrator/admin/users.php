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
								<a href="reports"><i class="fa fa-list"></i> <span>Bursary Reports</span></a>
							</li>
						
							<!-- <li class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="location_report">Location Report</a></li>
									<li><a href="sub_location_report">Sub-location Report</a></li>
								</ul>
							</li> -->
				
							<li class="active"> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
                            <li> 
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Users</li>
								</ul>
							</div>
						</div>
					</div>
					

					<div class="row">
						<div class="container col-md-12">
                            <span class="text-success font-weight-bold"><?php echo $message ?></span><br>
                            <span class="text-danger font-weight-bold"><?php echo $err ?></span><br>
                            <a href="" class="btn btn-secondary mx-4" data-toggle="modal" data-target="#New">Add New User</a>
                            <div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">Add New USer</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="">
                        
                                               <label class="font-weight-bold">Enter Fullname :</label>
                                            <input type="text" name="name" class="form-control" id="" required >
                                           <label class="font-weight-bold">Enter Email :</label>
                                            <input type="email" name="email" class="form-control" id="" required >
                                            <label class="font-weight-bold">Enter Phone :</label> 
                                            <input type="number" name="phone" class="form-control" id="" required >
                                            <label class="font-weight-bold">Select Role :</label> 
                                            <select name="role" id="" class="form-control" required>
                                                <option>--select role--</option>
                                                <option>Admin</option>
                                                <option>Ass_admin</option>
                                             </select>
                                            <input type="submit" value="A D D" name="add" class="btn btn-success form-control mt-2">
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
                                                            <div class="col-md-6">
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?php echo $data['id'];?>">EDIT</a></div>
                                                         <!-- edit user modal -->
     <div class="modal fade" id="Modal<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                <h4 class="text-center">Edit User Details</h4>
             </div>
             <div class="modal-body">
                <form method="post" action="">
                    
                    <label class="font-weight-bold">Enter Fullname :</label>
                 <input type="hidden" name="id" class="form-control" id="" required value="<?php echo $data['id'];?>">

                 <input type="text" name="name" class="form-control" id="" required value="<?php echo $data['fullname'];?>">
                <label class="font-weight-bold">Enter Email :</label>
                 <input type="email" name="email" class="form-control" id="" required value="<?php echo $data['email'];?>">
                 <label class="font-weight-bold">Enter Phone :</label>
                 <input type="number" name="phone" class="form-control" id="" required value="<?php echo $data['phone'];?>">
                 <label class="font-weight-bold">Enter Role :</label>
                 <select name="role" id="" class="form-control" required>
                    <option  selected></option>
                    <option>--select role--</option>
                    <option>Admin</option>
                    <option>Ass_admin</option>
                 </select>
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