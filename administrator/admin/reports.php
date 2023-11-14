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
                                        <select name="year" class="form-control" id="">
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
								<div class="col-md-3" id="ward"  onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts">
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
                                        <option value="Kapsabet">Kapsabet</option>
                                            <option value="Chepkumia">Chepkumia</option>
                                            <option value="Kapkangani">Kapkangani</option>
                                            <option value="Kilibwoni">Kilibwoni</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="location" >
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location" id="default" class="form-control">
                                        <option value="">-select location-</option>
                                        </select>
                                        <select name="kapsabet_location"class="form-control" id="kapsabet" style="display:none">
                                        <option value=""></option>
                                        <option value="<?php 
                                        $kapsabet_location ="";
                                        if(isset($_POST['filter_all']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                    // $_SESSION['kapsabet_location'] = $kapsabet_location;
                                        echo $kapsabet_location;?>" selected><?php
                                        if(isset($_POST['kapsabet_location']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                        echo $kapsabet_location;
                                        
                                        ?></option>
                                            <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
                                        </select>
                                        <div  onchange="showOptions()">
                                        <select name="kapkangani_location"class="form-control" id="kapkangani" style="display:none;">
                                        <option value="">Null</option>
                                        <option value="<?php 
                                        $kapkangani_location = "";
                                        if(isset($_POST['filter_all']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                    // $_SESSION['kapkangani_location'] = $kapkangani_location;
                                        echo $kapkangani_location;?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                        echo $kapkangani_location;
                                        
                                        ?></option>
                                            <option value ="Kapkangani">Kapkangani</option>
                                        </select>
                                        </div>
                                        <div onchange="Options()">
                                        <select name="chepkumia_location"class="form-control" id="chepkumia" style="display:none;" >
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $chepkumia_location = "";
                                        
                                        if(isset($_POST['filter_all']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                    // $_SESSION['chepkumia_location'] = $chepkumia_location;
                                        echo $chepkumia_location;?>" selected><?php
                                        if(isset($_POST['filter']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                        echo $chepkumia_location;
                                        
                                        ?></option>
                                            <option value ="Chepkumia">Chepkumia</option>
                                        </select>
                                        </div>
                                        <select name="kilibwoni_location"class="form-control" id="kilibwoni" style="display:none;" onchange="show()">
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $kilibwoni_location = "";
                                        if(isset($_POST['filter_all']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                    // $_SESSION['kilibwoni_location'] = $kilibwoni_location;
                                        echo $kilibwoni_location;?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                        echo $kilibwoni_location;
                                        
                                        ?></option>
                                            <option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location"class="form-control">
                                        <option value="">-select sub-location-</option>
                                        <option value="<?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?></option>
                                        <option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="column">
                                        <input type="submit" class="btn btn-primary mt-3 text-dark "value="Filter" name="filter_all" style="font-size:20px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="column">
                                        <input type="submit" class="btn btn-secondary mt-3"value="Reset" name="reset" style="font-size:20px;">
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
							<?php
                            if(isset($_POST['filter_all'])){
                                    $ward = $_POST['ward'];
                                        $year = $_POST['year'];
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

                                        if($year !='' && $location == '' && $ward =='' && $sub_location ==''){
                                        $sql = "SELECT * FROM applications WHERE year ='$year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            ?>
                                        <a href="print?year_print=<?php echo $year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }}
                                        if(isset($_POST['filter_all'])){
                                            $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
        
                                        if($year =='' && $location == '' && $ward !='' && $sub_location ==''){
                                            $sql = "SELECT * FROM applications WHERE ward ='$ward'";
    
                                            // Execute the query and get the results.
                                            $res = $conn->query($sql);
                                            $count = mysqli_num_rows($res);
                                            if($count > 0){
                                                ?>
                                            <a href="print?ward_print=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                <?php }else{?>
                                                    
                                                    <?php
                                                }
                                            }}
                                            if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year =='' && $location != '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE ward ='$ward' AND location ='$location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                                <a href="print?pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        
                                                        <?php
                                                    }
                                            }}
                                            if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year =='' && $location != '' && $ward !='' && $sub_location !=''){
                                                $sql = "SELECT * FROM applications WHERE ward ='$ward' AND location ='$location' AND sub_location='$sub_location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                            <a href="print?pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>&&pbysub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location != '' && $ward !='' && $sub_location !=''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward' AND location ='$location'AND sub_location='$sub_location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                    <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>&&pbysub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location != '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward' AND location ='$location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
        <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location == '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                        <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        
                                                        <?php
                                                    }
                                            }
                                    }
                            ?>
                           
							<!-- Revenue Chart -->
							<div class="card card-chart">
								
								<div class="card-body">
									<div id="line_graph">
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
                                          if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if($year !='' && $location == '' && $ward =='' && $sub_location ==''){
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
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            
                                            if($year =='' && $location == '' && $ward !='' && $sub_location ==''){
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
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year =='' && $location != '' && $ward !='' && $sub_location ==''){
                                            // $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location'";
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
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year !='' && $location == '' && $ward !='' && $sub_location ==''){
                                            $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND year ='$year'";
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
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year !='' && $location != '' && $ward !='' && $sub_location ==''){
                                            $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location' AND year ='$year'";
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
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if(($year =='' && $location != '' && $ward !='' && $sub_location !='')){
                                            $sub_location = $_POST["sub_location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location' AND sub_location ='$sub_location'";
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
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if($year !='' && $location != '' && $ward !='' && $sub_location !=''){
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
                                            <?php }}}?>
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
  if (parentSelectValue === "Kapsabet") {
    document.getElementById("kapsabet").style.display = "block";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById('kilibwoni_sub').style.display = 'none';
    document.getElementById('sub').style.display = 'block';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
    document.getElementById("kapkangani").style.display = "none";
  } else if(parentSelectValue === "Chepkumia"){
    
    document.getElementById("chepkumia").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById('kilibwoni_sub').style.display = 'none';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'block';
    }else if(parentSelectValue === "Kilibwoni") {
		document.getElementById("kilibwoni").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById('sub').style.display = 'block';
    document.getElementById('chepkumia_sub').style.display = 'none';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';


  }else if(parentSelectValue === "Kapkangani") {
		document.getElementById("kapkangani").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("default").style.display = "none";

        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
       
    document.getElementById('kapkangani_sub').style.display = 'none';

        document.getElementById('lolminingai_sub').style.display = 'none';
       
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';
    
        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        
        document.getElementById('sub').style.display = 'block';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

  }
  else{
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    // document.getElementById("ward").style.display = "none";
    document.getElementById("default").style.display = "block";
  }
}
    </script>
</html>