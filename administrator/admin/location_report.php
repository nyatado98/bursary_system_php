<?php 
require("fpdf183/fpdf.php");
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
$location = "";
$message = "";
if(isset($_POST['print'])){
	$location = $_POST['location'];
$sql = "SELECT * FROM students WHERE location ='".$location."'";
$results = mysqli_query($conn, $sql);
$count = mysqli_num_rows($results);
if($count <= 0){

	$message = "The location is not available in the records";

}else{
	$sql = "SELECT * FROM students WHERE location ='".$location."'";
	$resultss = mysqli_query($conn, $sql);

	$counter = 0; 
            $pdf = new FPDF('P','mm',array(150,250));
            $pdf->AddPage();
    
            // Set font and text color
            $imagePath = ('images/logo.png'); // Replace with the actual image path
            $pdf->Image($imagePath, 65,10,-300); 
            // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);
    
      $pdf->cell(50, 20,"", 0,1, '');
    $pdf->setFont('Arial','B',12);
      $pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
      $pdf->setFont('Arial','B',10);
      $pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
      $pdf->cell(120, 6, "info@nandicounty.go.ke", 0, 1, 'C');
    
      $pdf->setFont('Arial','B',9);
    
    $pdf->cell(50, 3,"", 0,1, '');
    
    $pdf->cell(10, 6,"", 0,0, 'C');
    
      $pdf->cell(50, 6,"County: Nandi County", 0,0, 'C');
    
      $pdf->cell(50, 6,"Location Selected: ".$location, 0,1, 'C');
    
    $pdf->cell(50, 1,"", 0,1, '');
      
    $pdf->setFont('Arial','B',8);
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,"S/N", 1,0, '');
    $pdf->cell(35, 6,"Student Name", 1,0, '');
    $pdf->cell(28, 6,"School Name", 1,0, '');
    $pdf->cell(32, 6,"School Level", 1,0, '');
    $pdf->cell(30, 6,"Date Updated", 1,1, '');
    // $pdf->cell(40, 6,"Month Updated", 1,1, '');
    $pdf->setFont('Arial','',11);
    
    
    $pdf->setFont('Arial','',8);
    // foreach($query as $data){
        while($val  =$resultss->fetch_assoc()){
            // Add content to the PDF
            $counter++;
            $pdf->cell(1, 4,"", 0,0, '');
            $pdf->cell(7, 6,$counter, 1,0, '');
            // $pdf->cell(30, 6,$data->id, 1,0, '');
            $pdf->cell(35, 6,$val['student_fullname'], 1,0, '');
            $pdf->cell(28, 6,$val['school_name'], 1,0, '');
            $pdf->cell(32, 6,$val['school_level'], 1,0, '');
            $pdf->cell(30, 6,$val['updated_at'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                        // Check if we have printed 10 rows, then start a new page
           
     }
     if ($pdf->GetY() >= 200) {
        $pdf->AddPage();
    }
            // Output the PDF (you can choose to save it to a file or send it as a response)
            $pdf->Output();
            // $pdf->Output("NandiCountyBursary.pdf",'D'); //'D' indicated download
    
            // exit();
              
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
						
							<li class="active" class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li class="active"><a href="location_report">Location Report</a></li>
									<li><a href="sub_location_report">Sub-location Report</a></li>
								</ul>
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Location Reports</li>
								</ul>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="container col-md-8">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-body">
									<div id="line_graph">
										<!-- @if(session()->has('message'))
                                        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif -->
										<span class="text-danger font-weight-bold"><?php echo ($message);?></span>
									</div>
									<form action="" method="post">
                                        
                                        <label>Select Location :</label>
                                        <select name="location" id="" class="form-control">
											<option>-select location-</option>
                                            <option>Munyaka</option>
                                            <option>Ilula</option>
                                            <option>Marura</option>
                                            <option>Block 10</option>
                                            <option>Silas</option>
                                            <option>Jerusalem</option>
                                        </select>
                                        <input type="submit" name="print" value="PRINT" class="btn btn-warning mt-2">
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