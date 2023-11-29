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
                            
							<!-- Revenue Chart -->
							
								<div class="card-body">
									<div id="line_graph">
									</div>

                                    <?php if(isset($_GET["view_fee"]) && isset($_GET['fee_id'])){
                                        $school_id_letter = $_GET['view_fee'];
										$id = $_GET['fee_id'];
                                        $sql = "SELECT * FROM students_uploads WHERE fee_structure = '$school_id_letter' AND id = '$id'";
                                        $ree = mysqli_query($conn, $sql);
                                        while($row = $ree->fetch_assoc()){
                                            ?>
                                            <!-- <img src="<?php echo '../../students/students_upload/'.$rows['fee_structure']?>" alt="Image picture"> -->
                                            <iframe src="<?php echo '../../students/students_upload/'.$row['fee_structure'];?>" class="col-md-10" width="1500" height="800"></iframe>
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
	
    <!-- <script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>  -->
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