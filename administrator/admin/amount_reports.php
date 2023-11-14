<?php 
require("fpdf183/fpdf.php");

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}
$ward = $location = $sub_location = $Year ="";

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
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY :</h4>
                                    </div>
                                    
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
                                <div class="col-md-3" onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">Null</option>
                                        <option value="<?php  if(isset($_POST['filter']))
                                        $ward = $_POST['ward'];
                                    // $_SESSION['ward'] = $ward;
                                        echo $ward;?>" selected><?php
                                        if(isset($_POST['filter']))
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
                                <div class="col-md-3">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select class="form-control" id="default">
                                            <option value=""></option>
                                        </select>
                                        <select name="kapsabet_location"class="form-control" id="kapsabet" style="display:none;" onchange="showOpt()">
                                        <option value="">Null</option>
                                        <option value="<?php 
                                        $kapsabet_location ="";
                                        if(isset($_POST['filter']))
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
                                        if(isset($_POST['filter']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                    // $_SESSION['kapkangani_location'] = $kapkangani_location;
                                        echo $kapkangani_location;?>" selected><?php
                                        if(isset($_POST['filter']))
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
                                        
                                        if(isset($_POST['filter']))
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
                                        if(isset($_POST['filter']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                    // $_SESSION['kilibwoni_location'] = $kilibwoni_location;
                                        echo $kilibwoni_location;?>" selected><?php
                                        if(isset($_POST['filter']))
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
                                        <label class="font-weight-bold" style="font-size:20px">Sub-location :</label>
                                        <select class="form-control" id="" name="sub_location">
                                            <option>-select sub-location-</option>
                                            <option value="<?php echo $sub_location;?>" selected><?php echo $sub_location;?></option>
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
                                        <div class="row p-2 ">
                                <div class="col-md-6">
                                    
                                        <input type="submit" class="btn btn-warning mt-1"value="Filter" name="filter" style="font-size:20px;">
                                    
                                </div>
                                <div class="col-md-6">
                                   
                                        <input type="submit" class="btn btn-danger mt-1"value="Reset" name="reset" style="font-size:20px;">
                                    
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
                            <?php
                            if(isset($_POST['filter'])){
                                // $Year = $_POST['Year'];
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
                            if($ward != '' && $location != '' && $sub_location != ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' AND sub_location='$sub_location'";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?location=<?php echo $location;?>&&ward=<?php echo $ward;?>&&sub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">P R I N T</a>
                                            <?php }else{
                                                ?>
                                                
                                                <?php
                                            }}}?>

<?php
                            if(isset($_POST['filter'])){
                                // $Year = $_POST['Year'];
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
                            if($ward != '' && $location == '' && $sub_location == ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward'";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?ward=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">P R I N T</a>
                                            <?php }else{
                                                ?>
                                                
                                                <?php
                                            }}}?>
                            <?php
                            if(isset($_POST['filter'])){
                                // $Year = $_POST['Year'];
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
                            if($ward != '' && $location != '' && $sub_location == ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' ";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?location=<?php echo $location;?>&&ward=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">P R I N T</a>
                                            <?php }else{
                                                ?>
                                                
                                                <?php
                                            }}}?>

                                        
                          
                            
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
                                    <h4 class="font-weight-bold">TOTAL BURSEMENT AMOUNT : <?php 
                                    $totals = $outputs = 0;
                                    if(isset($_POST['filter'])){
                                        // $Year = $_POST['Year'];
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
                                    if($ward =='' && $location == '' && $sub_location ==''){
                                     $sql = "SELECT Amount_awarded FROM reports WHERE  location ='$location' AND ward='$ward' AND sub_location='$sub_location'";

                                     // Execute the query and get the results.
                                     $res = $conn->query($sql);
                                     
                                     // Sum the values of the price column.
                                     $totals = 0;
                                     while ($row = $res->fetch_assoc()) {
                                       $totals += $row['Amount_awarded'];
                                     }
                                     $numbers = $totals;
                                     $outputs = number_format($numbers, 0, ',', ',');
                                    
                                    echo $outputs;
                                    }
                                }
                                    if(isset($_POST['filter'])){
                                        // $Year = $_POST['Year'];
                                        $ward = $_POST['ward'];
                                        $sub_location = $_POST['sub_location'];
                                    // if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                    //     $location_err = "Please select location";
                                    // }else{
                                    
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
                                    // }
                                    if($ward !='' && $location == '' && $sub_location ==''){
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
                                    // $Year = $_POST['Year'];
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
                                if($ward !='' && $location != '' && $sub_location ==''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }}
                                    if(isset($_POST['filter'])){
                                    // $Year = $_POST['Year'];
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
                                if($ward !='' && $location != '' && $sub_location !=''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location'AND sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                    ?></h4>
									<div id="line_graph">
                                       
                                    </div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
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
                                        
                                        <tbody>
                                          <?php
                                          if(isset($_POST["filter"])){
                                        
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

                                        if($ward !='' && $location != '' && $sub_location !=''){
                                            $sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                            $results = mysqli_query($conn, $sql);
                                          while($val = $results->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['report_id'];?></td>
                                                <td><?php echo $val['student_name'];?></td>
                                                <td><?php echo $val['parent'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['school_name'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td><?php echo $val['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($ward !='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE ward ='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($ward !='' && $location != '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE ward='$ward' AND location ='$location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($ward =='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE ward='$ward' AND location ='$location' AND sub_location ='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
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
  else if(parentSelectValue === "School") {
		document.getElementById("year").style.display = "none";
    document.getElementById("sub-location").style.display = "none";
    document.getElementById("school").style.display = "block";
    document.getElementById("location").style.display = "none";
    document.getElementById("ward").style.display = "none";
  }
  else if(parentSelectValue === "Null"){
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("ward").style.display = "none";
    document.getElementById("default").style.display = "block";

  
  }else{
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("ward").style.display = "none";
    document.getElementById("default").style.display = "block";
  }
}

    </script>
</html>
