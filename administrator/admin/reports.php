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
								<a href="reports"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
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
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY :</h4>
                                    </div>
                                    <div class="col-md-6">
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY : Year, Ward, Location & Sub-location</h4>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="card">
                                <div class="row p-2">
                                    
                                <div class="col-md-6" id="opt" onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Select Here :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">-select Here-</option>
										    <option value="Year">Year</option>
                                            <option value="Ward">Ward</option>
                                            <option value="Location">Location</option>
                                            <option value="Sub-Location">Sub-location</option>
                                        </select>
                                        <!-- <input type="submit" name="filter_here"class="btn btn-warning mt-3 mb-2"value="Filter"> -->
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
								<!--  -->
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
                                        <input type="submit" name="filter_year"class="btn btn-warning mt-3 mb-2"value="Filter-by-Year">
                                        <!-- <input type="submit" name="reset_year"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
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
                            $ward = "";
                            if(isset($_POST['filter_here'])){
                                $ward = $_POST['ward'];
                                if($ward == 'Ward'){
                                ?>
                                <div class="col-md-6">
                                    <div class="column">
                                        <form method="post" action="">
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
                                        <input type="submit" name="filter_wards"class="btn btn-warning mt-3 mb-2"value="Filter-by-Ward">
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <?php }elseif($ward == 'Year'){
                                            ?>
											<div class="col-md-6">
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
                                        <input type="submit" name="filter_year"class="btn btn-warning mt-3 mb-2"value="Filter-by-Year">
                                        <!-- <input type="submit" name="reset_year"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
											<?php }elseif($ward == 'Location'){
                                            ?>
                                            <div class="col-md-6" id="options">
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
                                                
                                                <?php
                                            }elseif($ward == 'Sub-location'){
                                                ?>
                                                       <div class="col-md-6" >
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
                                            }
                                        }
                            ?>
                            <?php
                            if(isset($_POST['filter_wards'])){
                                ?>
                                <script>
									document.getElementById("ward").style.display = "block";
									</script>
                                <?php }elseif(isset($_POST['filter_year'])){
                                ?>
                               <script>
									document.getElementById("year").style.display = "block";
									</script>
								<?php }elseif(isset($_POST['filter_location'])){
                                ?>
                                <script>
									document.getElementById("location").style.display = "block";
									</script>
                                <?php }elseif(isset($_POST['filter_sub_location'])){
                                ?>
                                <script>
									document.getElementById("sub-location").style.display = "block";
									</script>
                                <?php }?>
                                </div>
                                </div>
                                </div>
                                <!--  -->
                                <div class="col-md-6">
									<div class="card">
                                <form method="post" action="">
                                    <div class="column">
                                        <div class="row p-2">
										<div class="col-md-2">
                                    <div class="column">
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
                                    </div>
                                </div>
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
                                            <option>kapsabet</option>
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
											<option>Ilula</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                            <option>Kamkunji</option>
                                        </select>
                                    </div>
                                </div>
                                        </div>
                                        <div class="row p-2">
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-warning mt-3"value="Filter" name="filter_all" style="font-size:20px;">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-danger mt-3"value="Reset" name="reset" style="font-size:20px;">
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
                                        $sql = "SELECT * FROM applications WHERE year ='$year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        $count = mysqli_num_rows($res);
                                        if($count == 0){
                                            ?>

                                            <?php }else{?>
                                                <a href="print?year=<?php echo $year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Year</a>
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
                                        $sql = "SELECT * FROM applications WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?byward=<?php echo $_POST['ward'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Ward</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $location = "";
                            if(isset($_POST['filter_location'])){
                                        $location = $_POST['location'];
                                       
                                        $sql = "SELECT * FROM applications WHERE location='$location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?bylocation=<?php echo $_POST['location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $sub_location = "";
                            if(isset($_POST['filter_sub_location'])){
                                        
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM applications WHERE sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?bysub_location=<?php echo $_POST['sub_location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Sub-location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							<?php
                            $year = $ward = $location = $sub_location = "";
                            if(isset($_POST['filter_all'])){
                                        $location = $_POST['location'];
                                        $ward = $_POST['ward'];
                                        $year = $_POST['year'];
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM applications WHERE location='$location' AND  ward='$ward' AND year ='$year' AND sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?by_year=<?php echo $_POST['year'];?>&&by_location=<?php echo $location;?>&&by_ward=<?php echo $ward;?>&&by_sub_location=<?php echo $sub_location;?>" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							<!-- Revenue Chart -->
							<div class="card card-chart">
								
								<div class="card-body">
									<div id="line_graph">
										<!-- <span class="text-danger font-weight-bold"><?php echo $message;?></span><br> -->
										<!-- @if(session()->has('message'))
                                        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
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
                                                <td class="font-weight-bold text-center">Year</td>
                                                <td class="font-weight-bold text-center">Student Name</td>
                                                <td class="font-weight-bold text-center">School Name</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">Ward</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Sub-location</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                          <?php
                                          if(isset($_POST["filter_year"])){
                                            $year = $_POST["year"];
                                            // $sub_location = $_POST["sub_location"];
                                            // $location = $_POST["location"];
                                           

                                            $sql = "SELECT * FROM applications WHERE year='$year'";
                                            $results = mysqli_query($conn, $sql);
                                          while($val = $results->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['year'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['school_name'];?></td>
                                                <td><?php echo $val['school_type'];?></td>
                                                <td><?php echo $val['ward'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td><?php echo $val['sub_location'];?></td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_wards"])){
                                            $ward = $_POST["ward"];
                                            $sql = "SELECT * FROM applications WHERE ward ='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_location"])){
                                            $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE location ='$location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_sub_location"])){
                                            $sub_location = $_POST["sub_location"];
                                            $sql = "SELECT * FROM applications WHERE sub_location ='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}elseif(isset($_POST["filter_all"])){
												$location = $_POST['location'];
												$ward = $_POST['ward'];
												$year = $_POST['year'];
                                            $sub_location = $_POST['sub_location'];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND year ='$year' AND location='$location' AND sub_location='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
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
	
    <!-- {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>  -->
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

  } else if(parentSelectValue === "Location"){
    
    document.getElementById("location").style.display = "block";
    document.getElementById("ward").style.display = "none";
    document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    }else if(parentSelectValue === "Sub-Location") {
		document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "block";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  }else if(parentSelectValue === "Year") {
		document.getElementById("year").style.display = "block";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  }
  
  else{
    document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  
  }

  // Hide the parent select option.
//   document.getElementById("opt").style.display = "none";
}
    </script>
</html>