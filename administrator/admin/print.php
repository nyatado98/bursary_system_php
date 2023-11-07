<?php 
require("fpdf183/fpdf.php");

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

if(isset($_GET['location']) && isset($_GET['ward']) && isset($_GET['sub_location'])){
    $location = $_GET['location'];
    $ward = $_GET['ward'];
    $sub_location = $_GET['sub_location'];


$sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

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
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}elseif(isset($_GET['ward'])){
    $ward = $_GET['ward'];

    $sql = "SELECT * FROM reports WHERE ward='$ward'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE ward='$ward'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

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
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['location'])){
    $location = $_GET['location'];

    $sql = "SELECT * FROM reports WHERE location='$location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE location='$location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE location='$location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Location : " .$location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

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
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['sub_location'])){
    $sub_location = $_GET['sub_location'];

    $sql = "SELECT * FROM reports WHERE sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE sub_location='$sub_location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-Location : " .$sub_location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

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
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['year'])){
    // $parent= "";
    $year = $_GET['year'];

    $sql = "SELECT * FROM applications WHERE year='".$year."'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE year='".$year."'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-Location : " , 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".$year, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
// while($r = $results->fetch_assoc()){
   
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    // }
}
if ($pdf->GetY() >= 200) {
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['byward'])){
    $ward = $_GET['byward'];

    $sql = "SELECT * FROM applications WHERE ward='$ward'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE ward='$ward'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['bylocation'])){
    $location = $_GET['bylocation'];

    $sql = "SELECT * FROM applicatons WHERE location='$location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE location='$location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Location : " .$location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
   
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['bysub_location'])){
    $sub_location = $_GET['bysub_location'];

    $sql = "SELECT * FROM applications WHERE sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE sub_location='$sub_location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-location : " .$sub_location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['by_year']) && isset($_GET['by_location']) && isset($_GET['by_ward']) && isset($_GET['by_sub_location'])){
    $year = $_GET['by_year'];
    $location = $_GET['by_location'];
    $ward = $_GET['by_ward'];
    $sub_location = $_GET['by_sub_location'];


$sql = "SELECT * FROM applications WHERE location='$location' AND year='$year' AND ward='$ward' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE location='$location' AND year='$year' AND ward='$ward' AND sub_location='$sub_location'";
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
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
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
?>