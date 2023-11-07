<?php 

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

$fullname = $age = $family_status = $school_level =$school_name = $county = $ward  = $location =$sub_location = "";
$message = "";
date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:sa');
$year = date('Y');

if(isset($_POST['update'])){
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$family_status = $_POST['family_status'];
$school_level = $_POST['school_level'];
$school_name = $_POST['school_name'];
$county = $_POST['county'];
$ward = $_POST['ward'];
$location = $_POST['location'];
$sub_location = $_POST['sub_location'];

$sql = "UPDATE students SET student_fullname = '".$fullname."',age ='".$age."',family_status = '".$family_status."',school_level ='".$school_level."',school_name ='".$school_name."',
county = '".$county."',ward='".$ward."',location='".$location."',sub_location='".$sub_location."',updated_at = '$current_date',year = '$year' WHERE id = '".$id."'";
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
								<a href="reports"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li class="submenu">
								<a href="dashboard"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="location_report">Location Report</a></li>
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
									<li class="breadcrumb-item active">Applicants</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						<div class="row">
                                    <div class="col-md-6">
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY :</h4>
                                    </div>
                                    <div class="col-md-6">
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY : Ward, Location & Sub-location</h4>
                                    </div>
                                </div>
								<div class="row">
                                <div class="col-md-6">
                                <div class="card">
                                <div class="row p-3">
                                    
                                <div class="col-md-6" id="opt" onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Select Here :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">-select Here-</option>
										<option value="Year">Year</option>
										<option value="School">School</option>
                                            <option value="Ward">Ward</option>
                                            <option value="Location">Location</option>
                                            <option value="Sub-Location">Sub-Location</option>
                                        </select>
                                        <!-- <input type="submit" name="filter_ward"class="btn btn-warning mt-3 mb-2"value="Filter" onClick="hideDiv()"> -->
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
								<div class="col-md-6" id="year" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
										<select name="year" class="form-control" id="">
											<option value="">-Select Year-</option>
											<option value=""></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                        <input type="submit" name="filter_year"class="btn btn-warning mt-3 mb-2"value="Filter-by-Year" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
								<div class="col-md-6" id="school" style="display:none">
                                    <div class="column">
                                        <form method="post" action="" >
                                        <label class="font-weight-bold" style="font-size:20px">School :</label>
                                        <select name="school"class="form-control" id="op">
                                        <option >-select school-</option>
                                        <option value=""></option>
                                            <option>Kimumu Secondary School</option>
                                            <option>64 Secondary School</option>
                                            <option>UG High School</option>
                                            <option>Magereza High School</option>
                                            <option>Umoja High </option>
                                            <option>Ilula Secondary School</option>
                                        </select>
                                        <input type="submit" name="filter_school"class="btn btn-warning mt-3 mb-2"value="Filter-by-School" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="ward" style="display:none">
                                    <div class="column">
                                        <form method="post" action="" onsubmit="return show()">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="op">
                                        <option >-select ward-</option>
                                        <option value=""></option>
                                            <option value="Kimumu">Kimumu</option>
                                            <option value="Soy">Soy</option>
                                            <option>Kesses</option>
                                            <option>Kipkaren</option>
                                            <option>Langas</option>
                                            <option>Moiben</option>
                                        </select>
                                        <input type="submit" name="filter_wards"class="btn btn-warning mt-3 mb-2"value="Filter-by-Ward" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="location" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location"class="form-control">
                                        <option value="">-select location-</option>
                                        <option value=""></option>
                                        <option>Jerusalem</option>
                                            <option>Munyaka</option>
                                            <option>Silas</option>
                                            <option>Kiplombe</option>
                                            <option>Rock 2</option>
                                            <option>Block 10</option>
                                        </select>
                                        <input type="submit" name="filter_location"class="btn btn-warning mt-3 mb-2"value="Filter-by-Location" onclick="show()">
                                        <!-- <input type="submit" name="reset_location"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="sub-location" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location"class="form-control">
                                        <option value="">-select sub-location-</option>
                                        <option value=""></option>
                                        <option>Subaru</option>
                                            <option>Block 8</option>
                                            <option>Berlin</option>
                                            <option>Junior rate</option>
                                            <option>Kapsoya</option>
                                            <option>Langas</option>
                                        </select>
                                        <input type="submit" name="filter_sub_location"class="btn btn-warning mt-3 mb-2"value="Filter-by-Sub-Location">
                                        <!-- <input type="submit" name="reset_su_location"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                              
                            <?php
                            if(isset($_POST['filter_wards'])){
                                ?>
                                <script>
                                    document.getElementById('ward').style.display = "block";
                                    </script>
                              
                                <?php }elseif(isset($_POST['filter_location'])){
                                ?>
                                <script>
                                    document.getElementById('location').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_sub_location'])){
                                ?>
                                <script>
                                    document.getElementById('sub-location').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_year'])){
                                ?>
                                <script>
                                    document.getElementById('year').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_school'])){
                                ?>
                                <script>
                                    document.getElementById('school').style.display = "block";
                                    </script>
                                
                                <?php }?>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                <form method="post" action="">
                                    <div class="column">
                                        <div class="row p-2">
                                <div class="col-md-3">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control">
                                        <option value="">-select ward-</option>
                                        <option value=""></option>
                                            <option>Kimumu</option>
                                            <option>Soy</option>
                                            <option>Kesses</option>
                                            <option>Kipkaren</option>
                                            <option>Langas</option>
                                            <option>Moiben</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location"class="form-control">
                                        <option value="">-select location-</option>
                                        <option value=""></option>
                                            <option>Jerusalem</option>
                                            <option>Munyaka</option>
                                            <option>Silas</option>
                                            <option>Kiplombe</option>
                                            <option>Rock 2</option>
                                            <option>Block 10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-location :</label>
                                        <select name="sub_location"class="form-control">
                                            <option value="">-select sub-location-</option>
                                        <option value=""></option>
                                            <option>Subaru</option>
                                            <option>Block 8</option>
                                            <option>Berlin</option>
                                            <option>Junior rate</option>
                                            <option>Kapsoya</option>
                                            <option>Langas</option>
                                        </select>
                                    </div>
                                </div>
                                        </div>
                                        <div class="row p-2">
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-warning mt-1"value="Filter" name="filter_all" style="font-size:20px;">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-danger mt-1"value="Reset" name="reset" style="font-size:20px;">
                                    </div>
                                </div>
                            </div>
                                </div>
                                </form>
                                    </div>
                            </div>
                            </div>
							<?php
                            if(isset($_POST['filter_year'])){
                                        // $location = $_POST['location'];
                                        $year = $_POST['year'];
                                        // $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE year ='$year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        $count = mysqli_num_rows($res);
                                        if($count == 0){
                                            ?>

                                            <?php }else{?>
                                                <a href="print?year_by=<?php echo $year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Year</a>
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $ward = "";
                            if(isset($_POST['filter_wards'])){
                                        // $location = $_POST['location'];
                                        $ward = $_POST['ward'];
                                        // $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?ward_by=<?php echo $_POST['ward'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Ward</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $location = "";
                            if(isset($_POST['filter_location'])){
                                        $location = $_POST['location'];
                                       
                                        $sql = "SELECT * FROM students WHERE location='$location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?location_by=<?php echo $_POST['location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $sub_location = "";
                            if(isset($_POST['filter_sub_location'])){
                                        
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?sub_location_by=<?php echo $_POST['sub_location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Sub-location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							 <?php
                            $school = "";
                            if(isset($_POST['filter_school'])){
                                        
                                        $school = $_POST['school'];
                                        $sql = "SELECT * FROM students WHERE school_name='$school'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?school=<?php echo $_POST['school'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by School</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							 <?php
                            $school = $location = $ward = $sub_location ="";
                            if(isset($_POST['filter_all'])){
								$location = $_POST['location'];
								$sub_location = $_POST['sub_location'];
                                        
                                        $ward = $_POST['ward'];
                                        $sql = "SELECT * FROM students WHERE ward='$ward' AND location ='$location' AND sub_location ='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?ward_by=<?php echo $_POST['ward'];?>&&location_by=<?php echo $_POST['location'];?>&&sub_location_by=<?php echo $_POST['sub_location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
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
                                                <td class="font-weight-bold text-center">Full Name</td>
                                                <td class="font-weight-bold text-center">Age</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">County</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Sub-location</td>
                                                <td class="font-weight-bold text-center">Actions</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php 
											if(isset($_POST["filter_year"])){
											  $year = $_POST["year"];
											  // $sub_location = $_POST["sub_location"];
											  // $location = $_POST["location"];
											 
  
											  $sql = "SELECT * FROM students WHERE year='$year'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_school"])){
											  $school = $_POST["school"];
											  // $sub_location = $_POST["sub_location"];
											  // $location = $_POST["location"];
											 
  
											  $sql = "SELECT * FROM students WHERE school_name='$school'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_wards"])){
											  $ward = $_POST["ward"];
											  // $sub_location = $_POST["sub_location"];
											  // $location = $_POST["location"];
											 
  
											  $sql = "SELECT * FROM students WHERE ward='$ward'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_location"])){
											//   $year = $_POST["year"];
											  // $sub_location = $_POST["sub_location"];
											  $location = $_POST["location"];
											 
  
											  $sql = "SELECT * FROM students WHERE location='$location'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_sub_location"])){
											//   $year = $_POST["year"];
											  $sub_location = $_POST["sub_location"];
											  // $location = $_POST["location"];
											 
  
											  $sql = "SELECT * FROM students WHERE sub_location='$sub_location'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_all"])){
												$location = $_POST['location'];
												$ward = $_POST['ward'];
												// $year = $_POST['year'];
                                            $sub_location = $_POST['sub_location'];
                                            $sql = "SELECT * FROM students WHERE ward='$ward' AND location='$location' AND sub_location='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($val = $resul->fetch_assoc()){
											?>
											<tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Family Status :</label>
                                                                    <select name="family_status" id="" class="form-control">
																		<option selected><?php echo $val['family_status'];?></option>
																		<option>--select status--</option>
																		<option>Rich</option>
																		<option>Average</option>
																		<option>Poor</option>
																		<option>Very-poor</option>
																		
																	 </select>
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<option>Primary School</option>
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kimumu</option>
																		<option>Ainabkio</option>
																		<option>Moiben</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
																		<option>Boma</option>
																		<option>Mwanzo</option>
																		<option>Kipkaren</option>
																		<option>Langas</option>
																		<option>Jerusalem</option>
																		<option>Berlin</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Soy</option>
																		<option>Kiplombe</option>
																		<option>Ngurunga</option>
																		<option>Quinet</option>
																		<option>Kapsoya</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
											<?php }}?>
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
	
    <!-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );

	function showHideSelectOptions() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("opts").value;

  // Show the child select option if the parent select option is set to "Option 2".
  if (parentSelectValue === "Ward") {
    document.getElementById("ward").style.display = "block";
    document.getElementById("year").style.display = "none";
    document.getElementById("location").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("school").style.display = "none";
  } else if(parentSelectValue === "Location"){
    
    document.getElementById("location").style.display = "block";
    document.getElementById("ward").style.display = "none";
    document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("school").style.display = "none";
    }else if(parentSelectValue === "Sub-Location") {
		document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "block";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
    document.getElementById("school").style.display = "none";

  }else if(parentSelectValue === "Year") {
		document.getElementById("year").style.display = "block";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("school").style.display = "none";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  }
  else if(parentSelectValue === "School") {
		document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("school").style.display = "block";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  }
  else{
    document.getElementById("year").style.display = "none";
    document.getElementById("school").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  
  }

  // Hide the parent select option.
//   document.getElementById("opt").style.display = "none";
}
    </script>
</html>
