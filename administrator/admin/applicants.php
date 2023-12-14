<?php 

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

if (isset($_GET['option'])) {
    $selectedOption = $_GET['option'];
 $query = "SELECT id, student_fullname, age, school_level, county,location,sub_location FROM students WHERE year ='$selectedOption'";
    $result = mysqli_query($conn, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }


    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    }


$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

$fullname = $age = $family_status = $school_level =$school_name = $county = $ward  = $location =$sub_location = $Year= "";
$message = "";
date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:sa');
$year = date('Y');

if(isset($_POST['update'])){
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$school_level = $_POST['school_level'];
$school_name = $_POST['school_name'];
$county = $_POST['county'];
$ward = $_POST['ward'];
$location = $_POST['location'];
$sub_location = $_POST['sub_location'];

$sql = "UPDATE students SET student_fullname = '".$fullname."',age ='".$age."',school_level ='".$school_level."',school_name ='".$school_name."',county = '".$county."',ward='".$ward."',location='".$location."',sub_location='".$sub_location."',updated_at = '$current_date' WHERE id = '".$id."'";
 $query = mysqli_query($conn,$sql);
 if($query){
	$suc = "Successfully updated the details for student ".$_POST['fullname'].".";
		$_SESSION['succ'] = $suc;
		header("location:applicants?success=");
	
 }
 

}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include'config/head.php';?>

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<?php include'config/header.php';?>
                        </div>
			<!-- /Header -->
			
            <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
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
							
							<li class="active"> 
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
							<li> 
								<a href="reports"><i class="fa fa-list"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="settings"><i class="fa fa-cog"></i> <span>settings</span></a>
							</li>
                            <!-- <li> 
								<a href="messaging"><i class="fa fa-message"></i> <span>Messages</span></a>
							</li> -->
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
									<li class="breadcrumb-item active">Applicants</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
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
                              
								<div class="col-md-3" id="year">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
                                        <select name="Year" class="form-control"  id="filterOption" onchange="updateTable()">
                                            <!-- onchange="loadData()" -->
											<option value="">-Select Year-</option>
                                            
											<option value="<?php if(isset($_POST['filter_all']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option value="<?php echo $key;?>"><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-3" id="ward" onchange="updateTable()" >
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts"  onchange="showL(this.value)">
                                        <option value="">-select ward-</option>
                                        <option value="">Null</option>
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
                                        <!-- <option value="Kapsabet">Kapsabet</option>
                                            <option value="Chepkumia">Chepkumia</option>
                                            <option value="Kapkangani">Kapkangani</option>
                                            <option value="Kilibwoni">Kilibwoni</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="location" onchange="updateTable()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location" id="defaults" class="form-control" onchange="showS(this.value)">
                                            <option value="">Null</option>
                                        <option value="">-select location-</option>
                                       
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-3" onchange="updateTable()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location" class="form-control" id="sec">
                                        <option value="">-select sub-location-</option>
                                        <option value="">Null</option>
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
                                <!-- <div class="col-md-6">
                                    <div class="column">
                                        <input type="submit" class="btn btn-primary mt-3 text-dark "value="Filter" name="filter_all" style="font-size:20px;">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="column">

                                        <button type="submit" class="btn btn-secondary mt-3"value="Clear Filters" name="reset" style="font-size:20px;"> <i class="fa fa-brush"></i>&nbsp&nbspClear Filters</button>
                                       
                                    </div>
                                </div>
                            </div>
                                </div>
                                </div>
                                </form>
                          
							
						<!--update application success message -->
						<?php if(isset($_GET['success'])){
						$suc = $_SESSION['succ'];
						$succs = $suc;
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $succs;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
							<!-- Revenue Chart -->
              
							<div class="card card-chart">
								<div class="card-body">
									<div id="line_graph">
                                    </div>
                                    <div class="col-md-1 mb-2">
                                <!-- Link for printing data fetched by year/ward/location/sub-location -->
                                <p  class="text-warning font-weight-bold" target="_blank" id="error" style="display: none;color: black;">no data</p>
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
                                                <td class="font-weight-bold text-center text-white">#</td>
                                                <td class="font-weight-bold text-center text-white">Full Name</td>
                                                <td class="font-weight-bold text-center text-white">Age</td>
                                                <td class="font-weight-bold text-center text-white">School Level</td>
                                                <td class="font-weight-bold text-center text-white">County</td>
                                                <td class="font-weight-bold text-center text-white">Location</td>
                                                <td class="font-weight-bold text-center text-white">Sub-location</td>
                                                <td class="font-weight-bold text-center text-white">Actions</td>
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
	
    <!-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
        // bootstrap datatable
    jQuery(document).ready(function($) {
        $('#sample').DataTable();

    } );

   
   
    function show() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("kapsabet").value;
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
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year_by=" + selectedOption + "&&ward_by=" +ward + "&&location_by=" + location + "&&sub_location_by=" + sub_location; // Set the link URL
        }else if(selectedOption !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year_by=" + selectedOption + "&&ward_by=" +ward + "&&location_by=" + location ;
        }else if(sub_location !=='' && ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?sub_location_by=" + sub_location + "&&ward_by=" +ward + "&&location_by=" + location ;
        }

        else if(selectedOption !=='' && ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year_by=" + selectedOption + "&&ward_by=" +ward;
        }
        else if(ward !== '' && location !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?location_by=" + location + "&&ward_by=" +ward;
        }

        else if(selectedOption !=='' ){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?year_by=" + selectedOption;
        }else if(ward !== ''){
            var link = document.getElementById("successLink");
            link.style.display = ($('#test').find('tr').length > 1) ? 'block' : 'none';
            // link.textContent = "Print"+ selectedOption; 
            link.href = "http://localhost/nrs_projects/New%20folder/emgwen/bursary_system_php/administrator/admin/print?ward_by=" +ward;
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
    xhttp.open("GET", "data.php?option=" + selectedOption + "&ward=" + ward + "&location=" + location + "&sub_location=" + sub_location, true);
    xhttp.send();
}
$(document).ready(function() {
    // Initial DataTable initialization
    $('#test').DataTable();
});
    </script>
</html>
