<?php 
require("fpdf183/fpdf.php");

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

$ward = $location = $sub_location = $Year = "";

if(isset($_POST['reset'])){
    unset($_POST['filter']);
}

$outputs = 0;
$sql = 'SELECT Amount_awarded FROM reports';

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@nandicounty.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}

// $year =
 $location ="";
if(isset($_POST['print_some'])){
    // $year = $_POST['year'];
    $location = $_POST['location'];


    $sql = "SELECT Amount_awarded FROM reports WHERE location ='".$location."'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');


    $sql = "SELECT * FROM reports WHERE location ='".$location."'";
    $rest = mysqli_query($conn,$sql);

    
    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@nandicounty.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $rest->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();

}
   if(isset($_POST['filter'])) {
    $Year = $_POST['Year'];
    $ward = $_POST['ward'];
    $sub_location = $_POST['sub_location'];
if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
    $location_err = "Please select location";
}else{

$kapsabet_location = $_POST['kapsabet_location'];
$kapkangani_location = $_POST['kapkangani_location'];
$chepkumia_location = $_POST['chepkumia_location'];
$kilibwoni_location = $_POST['kilibwoni_location'];
if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
     $location = '';
 }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
     $location = $kapsabet_location;
}elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
     $location = $chepkumia_location;
}elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
     $location = $kapkangani_location;
}else{
     $location = $kilibwoni_location;
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
							
							<li> 
								<a href="applicants"><i class="fa fa-list"></i> <span>Applicants</span></a>
							</li>
							<li> 
								<a href="beneficiaries"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
                            <li> 
								<a href="students_uploads"><i class="fa fa-file-image"></i> <span>Student Uploads</span></a>
							</li>
							<li class="active"> 
								<a href="amount_reports"><i class="fa fa-money-bill"></i> <span>Amount Reports</span></a>
							</li>
							<li> 
								<a href="reports"><i class="fa fa-list"></i> <span>Bursary Reports</span></a>
							</li>
						
							
				
							<li> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
                            <li > 
                                <a href="logs"><i class="fa fa-file"></i> <span>Logs</span></a>
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
									<li class="breadcrumb-item active">Amount Reports</li>
								</ul>
							</div>
						</div>
					</div>
					
				
					<div class="row">
						<div class="col-md-12">
                            <!-- <form method="post" action=""> -->
                                <div class="row">
                                    <div class="col-md-6">
                                    <h4 class="" style=""><i class="fa fa-filter"></i>&nbsp&nbspFilter By : </h4>
                                    </div>
                                    <!-- add -->
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                <form method="post" action="">
                                    <!-- <div class="column"> -->
                                        <div class="row p-2">
                                        <!-- <div class="col-md-3" id="year">
                                    <div class="column">
                                        
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
										<select name="Year" class="form-control" id="" >
											<option value="<?php 
                                        echo $Year;?>" selected><?php
                                        if(isset($_POST['filter']))
                                        $Year = $_POST['Year'];
                                    // $_SESSION['Year'] = $Year;
                                        echo $Year;
                                        
                                        ?></option>
											<option value=""></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                       
                                    </div>
                                </div> -->
                                <div class="col-md-3" id="year">
                                    <div class="column">
                                        
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
										<select name="Year" class="form-control" id="filterOption" onchange="update()">
											<?php if ($Year != '') {
                                             ?>
                                            <option value="<?php if(isset($_POST['filter']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?>" selected><?php if(isset($_POST['filter']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?></option>
                                    <?php }else{?>
                                        <option value="" selected>-Select Year-</option>
                                    <?php } ?>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option value="<?php echo $key;?>"><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                       
                                    </div>
                                </div>
                                <div class="col-md-3" onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts" onchange="showL(this.value)">
                                        <option value="">Null</option>
                                        
                                         <?php if ($ward != '') {
                                             ?>
                                        <option value="<?php
                                        if(isset($_POST['filter']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?>" selected><?php
                                        if(isset($_POST['filter']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?></option>
                                    <?php }else{?>
                                        <option value="" selected>-select ward-</option>
                                    <?php } ?>
                                         <?php 
                                        $sql = "SELECT * FROM wards";
                                        $q = mysqli_query($conn,$sql);
                                        while($r = $q->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $r['ward'];?>"><?php echo $r['ward'];?></option>
                                        <?php } ?>
                                            <!-- <option value="Kapsabet">Kapsabet</option>
                                            <option value="Chepkumia">Chepkumia</option>
                                            <option value="Kapkangani">Kapkangani</option>
                                            <option value="Kilibwoni">Kilibwoni</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select class="form-control" id="defaults" onchange="showS(this.value)">
                                            <option value=""></option>
                                             <?php if($location == ''){?>
                                        <option value="" selected>-select location-</option>
                                    <?php }else{?>

                                    <?php }?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-3" onchange="update()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-location :</label>
                                        <select name="sub_location" class="form-control" id="sec" >
                                            <option value=""></option>

                                             <?php if($sub_location == ''){?>

                                            <option value="" selected>-select sub-location-</option>
                                        <?php }else{?>
                                            <option value="<?php echo $sub_location;?>" selected><?php echo $sub_location;?></option>
                                       <?php } ?>
                                                            
                                        </select>
                                    </div>
                                </div>
                                        </div>
                                        <div class="row p-2 ">
                              
                                <div class="col-md-6">
                                   
                                        <button type="submit" class="btn btn-secondary mt-3"value="Clear Filters" name="reset" style="font-size:20px;"> <i class="fa fa-brush"></i>&nbsp&nbspClear Filters</button>
                                    
                                </div>
                            </div>
                                <!-- </div> -->
                                </form>
                                    </div>
                            </div>
                            </div>
                            <?php if(isset($_POST['filter'])){
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
                                
                            <!-- </form> -->
						<form method="post" action="" class="mb-3">
                          
                        </form>
							<!-- Revenue Chart -->
                            
                                        
                          
                            
                            <form method="post" action="">
                                <!-- <a href="print" name="print" target="_blank">Print</a> -->
                            <!-- <input type="submit" name="print" target="_blank" value="Print All" class="btn btn-primary mb-3">
                            <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#Print">Print By Location</a> -->
                            <div class="modal fade" id="Print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									   <h4 class="text-center">Print Bursement List</h4>
									</div>
									<div class="modal-body">
									   <form method="post" action="" >
										   <!-- <label class="font-weight-bold">Select Year Below :</label>
										<select name="year" class="form-control" id="">
											<option value="">-Select Year-</option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>  -->
									
										<!-- <span class="text-danger">{{$errors->first('year')}}</span><br> -->
										
										<label for="" class="font-weight-bold">Location : </label>
										<select name="location" id="" class="form-control font-weight-bold">
											<option value="">-Select Location Here-</option>
											<option>Munyaka</option>
                                            <option>Silas</option>
                                            <option>Ilula</option>
                                            <option>Block 10</option>
                                            <option>Marura</option>
                                            <option>Jerusalem</option>
										</select>
										
										<input type="submit" value="P R I N T" name="print_some" class="btn font-weight-bold text-white btn-success form-control mt-2">
									   </form>
									</div>
								</div>
							</div>
						</div>
							<div class="card card-chart">
								<div class="card-body">
                                    <h4 class="font-weight-bold" id="totalAmount">TOTAL BURSEMENT AMOUNT : 0</h4>
									<div id="line_graph">
                                       
                                    </div>
                                     <div class="col-md-1 mb-2">
                                <!-- Link for printing data fetched by year/ward/location/sub-location -->
                                <a href="#" name="print" class="btn btn-warning font-weight-bold" target="_blank" id="successLink" style="display: none;color: black;"><i class="fa fa-print"></i>&nbsp&nbspPrint</a>
                                </div>
                                    <!-- table for displaying the filtered data -->
                                    <div class="table-responsive">
                                        <table class="try table table-bordered table-striped table-dark table-hover text-white" id="test">

                                             <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Report Id</td>
                                                <td class="font-weight-bold text-center">Student Name</td>
                                                <td class="font-weight-bold text-center">Parent Name</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">School Name</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Amount Awarded</td>
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
	
    <!-- {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

    function show(){
        document.getElementById("ward").style.display = "block";
    document.getElementById("location").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    }
   
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
    // calls second function
    getTotalAmount();
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
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year=" + selectedOption + "&&ward=" +ward + "&&location=" + location + "&&sub_location=" + sub_location; // Set the link URL
        }else if(selectedOption !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year=" + selectedOption + "&&ward=" +ward + "&&location=" + location ;
        }else if(sub_location !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?sub_location=" + sub_location + "&&ward=" +ward + "&&location=" + location ;
        }

        else if(selectedOption !=='' && ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year=" + selectedOption + "&&ward=" +ward;
        }
        else if(ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?location=" + location + "&&ward=" +ward;
        }

        else if(selectedOption !=='' ){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year=" + selectedOption;
        }else if(ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?ward=" +ward;
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
    xhttp.open("GET", "amount_data.php?option=" + selectedOption + "&ward=" + ward + "&location=" + location + "&sub_location=" + sub_location, true);
    xhttp.send();
}
$(document).ready(function() {
    // Initial DataTable initialization
    $('#test').DataTable();
});
// total amount
function getTotalAmount() {
    // Get the selected filter option
    var selectedOption = document.getElementById("filterOption").value;
    var ward = document.getElementById("opts").value;
    var location = document.getElementById("defaults").value;
    var sub_location = document.getElementById("sec").value;

    // Send an AJAX request to the server to fetch the total amount
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the total amount display with the fetched data
            document.getElementById("totalAmount").innerHTML = this.responseText;
        }
    };

    // Make a GET request to the PHP script with the selected year as a parameter
    xhttp.open("GET", "total.php?option=" + selectedOption + "&ward=" + ward + "&location=" + location + "&sub_location=" + sub_location, true);
    xhttp.send();
}

    </script>
</html>
