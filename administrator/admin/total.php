<?php 
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

$filterOption = $_GET["option"];
$opts = $_GET["ward"];
$defaults = $_GET["location"];
$sec = $_GET["sub_location"];

if($filterOption != '' && $opts !='' && $defaults !='' && $sec != ''){
	$query = "SELECT SUM(Amount_awarded) AS Amount_awarded FROM reports WHERE YEAR(created_at) = '$filterOption'  AND ward ='$opts' AND location ='$defaults' AND sub_location = '$sec'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount_awarded'];

$outputs = number_format($totalAmount, 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
}elseif($filterOption != '' && $opts !='' && $defaults !=''){
	$query = "SELECT SUM(Amount_awarded) AS Amount_awarded FROM reports WHERE YEAR(created_at) = '$filterOption'  AND ward ='$opts' AND location ='$defaults'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount_awarded'];

$outputs = number_format($totalAmount, 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
}elseif($filterOption != '' && $opts !=''){
	$query = "SELECT SUM(Amount_awarded) AS Amount_awarded FROM reports WHERE YEAR(created_at) = '$filterOption'  AND ward ='$opts'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount_awarded'];

$outputs = number_format($totalAmount, 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
}elseif($sec != '' && $opts !='' && $defaults !=''){
	$query = "SELECT SUM(Amount_awarded) AS Amount_awarded FROM reports WHERE sub_location = '$sec'  AND ward ='$opts' AND location ='$defaults'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount_awarded'];

$outputs = number_format($totalAmount, 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
}elseif($opts !='' && $defaults !=''){
	$query = "SELECT SUM(Amount_awarded) AS Amount_awarded FROM reports WHERE ward ='$opts' AND location ='$defaults'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount_awarded'];

$outputs = number_format($totalAmount, 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
}elseif($filterOption != ''){
	$query = "SELECT SUM(Amount_awarded) AS Amount FROM reports WHERE YEAR(created_at) = '$filterOption'";
$result = mysqli_query($conn, $query);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Get the total amount
$totalAmount = $row['Amount'];
$outputs = number_format($row["Amount"], 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
                                       
}
elseif($opts !=''){
	$query = "SELECT SUM(Amount_awarded) AS Amount FROM reports WHERE ward ='$opts'";
$result = mysqli_query($conn, $query);

 // Sum the values of the price column.
    $row = $result->fetch_assoc();
    $outputs = number_format($row["Amount"], 0, ',', ',');
    echo 'TOTAL BURSEMENT AMOUNT : '.$outputs.'';
                                       
                                       // echo $numbers;
}

?>