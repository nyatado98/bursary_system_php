<?php 
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
	
}
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

$email = $_SESSION['email'];

$sql = "SELECT * FROM beneficiary_upload";
$result = mysqli_query($conn, $sql);

$document_name = $document= $ward = $location = $sub_location = "";
$document_err = $document_name_err = $ward_err = $location_err = $sub_location_err = "";
$errors = $message ="";
if(isset($_POST['upload'])){
	if(empty(trim($_POST['document_name']))){
		$document_err = "Please enter the document name";
	}else{
		$document_name = trim($_POST['document_name']);
	}
	$ward = $_POST['ward'];
	$location = $_POST['location'];
	$sub_location = $_POST['sub_location'];

	$name = $_FILES['document']['name'];

	$target = "beneficiary_uploads/";
    $target_file =$target . basename($_FILES["document"]["name"]);
    $fileName = basename($_FILES["document"]["name"]);
    $file_size = $_FILES["document"]["size"];
    $file_type = $_FILES["document"]["type"];
    $tmp_name = $_FILES['document']['tmp_name'];
    $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions = array("jpeg","jpg","png","pdf","txt","doc","jfif","docx");
    if (!in_array($file_ext, $extensions)) {
    	$errors = "The file type is not allowed...Please choose another file";
    }
    if ($file_size < 0) {
    	$errors = "The file size is invalid...choose another file";
    }
	date_default_timezone_set('Africa/Nairobi');
        $date_added=strtotime("current");
        $date_added = date('Y/m/d  H:i:sa');
	if(empty($document_name_err)&& empty($document)&& empty($errors)){
		$sql = "INSERT INTO beneficiary_upload (document_name,document,uploaded_by,ward,location,sub_location,created_at,updated_at)VALUES('$document_name','$fileName','$email','$ward','$location','$sub_location','$date_added','$date_added')";
		$q = mysqli_query($conn,$sql);
		if($q){
			move_uploaded_file($tmp_name,$target.$name);
			$suc = "Successfully uploaded the document ".$fileName.".";
		$_SESSION['succ'] = $suc;
		header("location:beneficiaries?success=");
		}else{
			$errors = "Could not upload the document";
		}
	}}
if(isset($_GET['download'])){
	$download = $_GET['download'];

// 	// Get the path to the file.
$filePath = 'beneficiary_uploads/'."$download";

// Set the Content-Type header.
header('Content-Type: application/octet-stream');

// Set the Content-Disposition header.
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
header('Content-Length: ' . filesize($filePath));
header('Pragma: public');
// Read the file from the server and output it to the browser.
readfile($filePath);

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
							<li class="active"> 
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
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Beneficiaries List Documents</li>
									<!-- <?php echo $email;?> -->
								</ul>
							</div>
						</div>
</div>

					<div class="row">
						<div class="col-md-12">
						<!-- success message -->
						<?php if(isset($_GET['success'])){
						// $suc = $_SESSION['succ'];
						$succs ="Document Uploaded Successfully.";
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $succs;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
														<span class="text-danger"><?php echo $errors;?></span><br>
							<!-- Revenue Chart -->
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#New">Add New Beneficiary Document</a>
                            <div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">Upload New Beneficiary Document</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="" enctype="multipart/form-data">
                                              
                                               <label class="font-weight-bold">Enter Document Name :</label>
                                            <input type="text" name="document_name" placeholder="Enter the document name" class="form-control" id="" required >
                                            
                                            <span class="text-danger"><?php echo $document_name_err;?></span><br>
                                    
                                           <label class="font-weight-bold">select Document :</label>
                                            <input type="file" name="document" class="form-control" id="" placeholder="choose a document" required >
											<span class="text-danger"><?php echo $document_err;?></span><br>
                                            <label class="font-weight-bold">select Ward :</label>
                                            <select name="ward" class="form-control" id="">
											<option>--select ward--</option>
											<option>Ziwa</option>
                                                            <option>Soy</option>
                                                            <option>Kipsomba</option>
                                                            <option>Kaptagat</option>
                                                            <option>Kapsoya</option>
                                                            <option>Moiben</option>
											</select>
                                            <span class="text-danger"><?php echo $ward_err;?></span><br>
                                            <label class="font-weight-bold">select Location :</label>
                                            <select name="location" class="form-control" id="" placeholder="-select location-">
											<option>--select location--</option>
																		<option>Jerusalem</option>
																		<option>Munyaka</option>
																		<option>Ziwa</option>
																		<option>Ilula</option>
																		<option>Block10</option>
																		<option>Subaru</option>
																		<option>Vet</option>
											</select>
                                            <span class="text-danger"><?php echo $location_err;?></span><br>
                                            <label class="font-weight-bold">select Sub-location :</label>
                                            <select name="sub_location" class="form-control" id="">
											<option>--select sub-location--</option>
											<option>Subaru</option>
                                                            <option>Bondeni</option>
                                                            <option>Kamkunji</option>
                                                            <option>Airstrip</option>
											</select>
                                            <span class="text-danger"><?php echo $sub_location_err;?></span><br>
                                            
                                            
                                           
                                            <input type="submit" value="U P L O A D" name="upload" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="card card-chart">
								
								<div class="card-body">
									<div id="line_graph">
										<!-- <span><?php echo $message ;?></span><br> -->
                                        <!-- @if(session()->has('message'))
                                        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
										@if(session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('success')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif -->
                                        
                                    </div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Document Name</td>
                                                <td class="font-weight-bold text-center">Document</td>
                                                <td class="font-weight-bold text-center">Updated at</td>
                                                <td class="font-weight-bold text-center">Uploaded By</td>
                                                <td class="font-weight-bold text-center">Actions</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
										<?php while($data = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td><?php echo $data['document_name'];?></td>
                                                <td><?php echo $data['document'];?></td>
                                                <td><?php echo $data['updated_at'];?></td>
                                                <td><?php echo $data['uploaded_by'];?></td>
                                                <td class="justify-content-between">
													<form method="GET" action="">
                                                    <a href="beneficiaries?download=<?php echo $data['document'];?>" name="download" class="btn btn-warning">DOWNLOAD</a>
                                                    <a href="view_bene?view=<?php echo $data['document'];?>&&id=<?php echo $data['id'];?>" class="btn btn-secondary">View</a>
													</form>
                                                </td>
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
    </script>
</html>
