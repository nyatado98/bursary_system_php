<?php 
require("fpdf183/fpdf.php");
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
$year =  $ward = $location = $sub_location = "";
$year_err = $message = "";
if(isset($_POST['filter_year'])){
	$year = $_POST['year'];
	$sql = "SELECT * FROM applications WHERE year='".$year."'";
	$qu = mysqli_query($conn, $sql);
	if(mysqli_num_rows($qu) <=0){
		$message = "The selected year -".$_POST['year']."- is not avalable in the records";
	}else{
	}
}
if(isset($_POST['filter_wards'])){
	$ward = $_POST['ward'];
	$sql = "SELECT * FROM applications WHERE ward='".$ward."'";
	$qu = mysqli_query($conn, $sql);
	if(mysqli_num_rows($qu) <=0){
		$message = "The selected ward -".$_POST['ward']."- is not avalable in the records";
	}else{
	}
}
if(isset($_POST['filter_location'])){
	$location = $_POST['location'];
	$sql = "SELECT * FROM applications WHERE location='".$location."'";
	$quu = mysqli_query($conn, $sql);
	if(mysqli_num_rows($quu) <=0){
		$message = "The selected location -".$_POST['location']."- is not avalable in the records";
	}else{
	}
}
if(isset($_POST['filter_sub_location'])){
	$sub_location = $_POST['sub_location'];
	$sql = "SELECT * FROM applications WHERE sub_location='".$sub_location."'";
	$qus = mysqli_query($conn, $sql);
	if(mysqli_num_rows($qus) <=0){
		$message = "The selected sub_location -".$_POST['sub_location']."- is not avalable in the records";
	}else{
	}
}

if(isset($_POST['pri'])){
	$year = $_POST['year'];
	$sql = "SELECT * FROM applications WHERE year='".$year."'";
	$q = mysqli_query($conn, $sql);
	if(mysqli_num_rows($q) <=0){
		$message = "The selected year -".$_POST['year']."- is not avalable in the records";
	}else{

	// $sql = "SELECT * FROM students WHERE year ='".$year."'";
	// $result = mysqli_query($conn,$sql);
	// $count = mysqli_num_rows($result);
	// if($count > 0){
		$sql = "SELECT * FROM applications WHERE year = '".$year."'";
		$re = mysqli_query($conn,$sql);
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

  $pdf->cell(50, 6,"Year Selected: ".$year, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');
  
$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(28, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Date Updated", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($data = $re->fetch_assoc()){
        // Add content to the PDF
        $counter++;
        $pdf->cell(1, 4,"", 0,0, '');
        $pdf->cell(7, 6,$counter, 1,0, '');
        // $pdf->cell(30, 6,$data->id, 1,0, '');
        $pdf->cell(28, 6,$data['student_fullname'], 1,0, '');
        $pdf->cell(35, 6,$data['school_name'], 1,0, '');
		// $pdf->SetXY(10, 20);
        $pdf->cell(32, 6,$data['school_level'], 1,0, '');
        $pdf->cell(30, 6,$data['updated_at'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                    // Check if we have printed 10 rows, then start a new page
       
 }
 if ($pdf->GetY() >= 200) {
    $pdf->AddPage();
}
        // Output the PDF (you can choose to save it to a file or send it as a response)
        $pdf->Output();
        // $pdf->Output("NandiCountyBursary.pdf",'D'); //'D' indicated download

        // exit();
                // break; // If found, you can break out of the loop to stop further iterations.

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
							<li> 
								<a href="beneficiaries"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
							<li> 
								<a href="students_uploads"><i class="fa fa-file-image"></i> <span>Student Uploads</span></a>
							</li>
							<li> 
								<a href="amount_reports"><i class="fa fa-money-bill"></i> <span>Amount Reports</span></a>
							</li>
							<li class="active"> 
								<a href="reports"><i class="fa fa-list"></i> <span>Bursary Reports</span></a>
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Filter Applications Reports Here</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
						<!--  -->
						<span class="text-danger font-weight-bold"><?php echo $message;?></span><br>
						
						<div class="col-md-12">
						<div class="row">
                                    <div class="col-md-6">
                                    <h4 class="" style=""><i class="fa fa-filter"></i>&nbsp&nbspFilter By : </h4>
                                    </div>
                                </div>
                                <form method="post" action="">
                                <div class="col-md-12">
                                <div class="card">
                                <div class="row p-2">
                                    
                                <!-- <div class="col-md-6" id="opt" onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Select Here :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">-select Here-</option>
										    <option value="Year">Year</option>
                                            <option value="Ward">Ward</option>
                                            <option value="Location">Location</option>
                                            <option value="Sub-Location">Sub-location</option>
                                        </select> -->
                                        <!-- <input type="submit" name="filter_here"class="btn btn-warning mt-3 mb-2"value="Filter"> -->
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        <!-- </form>
                                    </div>
                                </div> -->
								<!--  -->
								<div class="col-md-3" id="year">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
                                        <select name="year" class="form-control" id="filterOption" onchange="update()">
											<option value="">-Select Year-</option>
											<option value="<?php if(isset($_POST['filter_all']))
                                        $year = $_POST['year'];
                                        echo $year;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $year = $_POST['year'];
                                        echo $year;
                                        
                                        ?></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-3" id="ward"  onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts" onchange="showL(this.value)">
                                        <option >-select ward-</option>
                                        <option value="<?php
                                        if(isset($_POST['filter_all']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?></option>
                                        <?php 
                                        $sql = "SELECT * FROM wards";
                                        $q = mysqli_query($conn,$sql);
                                        while($r = $q->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $r['ward'];?>"><?php echo $r['ward'];?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location" id="defaults" class="form-control" onchange="showS(this.value)">
                                        <option value="">-select location-</option>
                                        </select>
                                        
                                        </div>
                                    </div>
                               
                                <div class="col-md-3" onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location"class="form-control" id="sec">
                                        <option value="">-select sub-location-</option>
                                        <option value="<?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?></option>
                                      
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="row p-2">
                               
                                <div class="col-md-6">
                                    <div class="column">
                                        <button type="submit" class="btn btn-secondary mt-3"value="Clear Filters" name="reset" style="font-size:20px;"> <i class="fa fa-brush"></i>&nbsp&nbspClear Filters</button>
                                    </div>
                                </div>
                            </div>
                                </div>
                                </div>
                                </form>
                                <?php if(isset($_POST['filter_all'])){
                                                            if($_POST['ward'] == 'Kapkangani'){
                                                            ?>
                                                            <script>
                                                                document.getElementById('kapkangani').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';

                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kapsabet'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kapsabet').style.display = 'block';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kilibwoni'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kilibwoni').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Chepkumia'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('chepkumia').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }
                                                    }
                                                        ?>
                                <!-- </div>
                                </div>
                                </div>
                            </div> -->
							
                           
							<!-- Revenue Chart -->
							<div class="card card-chart">
								
								<div class="card-body">
									<div id="line_graph">
									</div>
									<div class="col-md-1 mb-2">
                                <!-- Link for printing data fetched by year/ward/location/sub-location -->
                                <a href="#" name="print" class="btn btn-warning font-weight-bold" target="_blank" id="successLink" style="display: none;color: black;"><i class="fa fa-print"></i>&nbsp&nbspPrint</a>
                                </div>
									<div class="table-responsive">
                                        <table class="try table table-bordered table-striped table-dark table-hover text-white" id="test">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Year</td>
                                                <td class="font-weight-bold text-center">Student Name</td>
                                                <td class="font-weight-bold text-center">School Name</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">Ward</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Sub-location</td>
                                            </tr>
                                        </thead>
                                        
                                        
                                        
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
	
    <!-- {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

    

// show locations
function showL(optionValue) {
 const secondSelect = document.getElementById('defaults');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'locations.php', true);
   xhr.send();
}
// show sub_locations
function showS(optionValue) {
 const secondSelect = document.getElementById('sec');
   secondSelect.innerHTML = ''; // Clear the existing options

   // Make an AJAX request to get data from the server
   const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
         const optionData = JSON.parse(xhr.responseText);

         if (optionData[optionValue]) {
            optionData[optionValue].forEach(option => {
               const optionElement = document.createElement('option');
               optionElement.value = option;
               optionElement.textContent = option;
               secondSelect.appendChild(optionElement);
            });
         }
      }
   };

   xhr.open('GET', 'sub_location.php', true);
   xhr.send();
}

function update(){
    // calls first function
    updateTable();
}
// dispaly the print button and the data in the table
        function updateTable() {
    // Get the selected filter option
    var selectedOption = document.getElementById("filterOption").value;
    var ward = document.getElementById("opts").value;
    var location = document.getElementById("defaults").value;
    var sub_location = document.getElementById("sec").value;



    // Send an AJAX request to a PHP script to fetch filtered data
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the table content with the fetched data
            document.getElementById("test").innerHTML = this.responseText;


             // Toggle link visibility based on data presence

            if(selectedOption !=='' && ward !== '' && location !== '' && sub_location !==''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?pby_year=" + selectedOption + "&&pby_ward=" +ward + "&&pby_location=" + location + "&&pby_sub_location=" + sub_location; // Set the link URL
        }else if(selectedOption !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?pbyyear=" + selectedOption + "&&pbyward=" +ward + "&&pbylocation=" + location ;
        }else if(sub_location !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?pby_sub_location=" + sub_location + "&&pby_ward=" +ward + "&&pby_location=" + location ;
        }

        else if(selectedOption !=='' && ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?pbyyear=" + selectedOption + "&&pbyward=" +ward;
        }
        else if(ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?pbylocation=" + location + "&&pbyward=" +ward;
        }

        else if(selectedOption !=='' ){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year_print=" + selectedOption;
        }else if(ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?ward_print=" +ward;
        }else{
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?";
        }
             // Destroy the existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#test')) {
                $('#test').DataTable().destroy();
            }

            // Reinitialize DataTable after updating the content
            $('#test').DataTable();

        }
    };
    xhttp.open("GET", "applications_report.php?option=" + selectedOption + "&ward=" + ward + "&location=" + location + "&sub_location=" + sub_location, true);
    xhttp.send();
}
$(document).ready(function() {
    // Initial DataTable initialization
    $('#test').DataTable();
});
    </script>
</html>