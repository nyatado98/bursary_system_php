<?php
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
    header("location:login");
    exit;
}


$sql = "SELECT * FROM locations WHERE ward='Kapsabet' OR ward= 'Kapkangani' OR ward ='Kilibwoni' OR ward ='Chepkumia'";
$result = $conn->query($sql);

$optionData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $ward = $row['ward'];
    $locations = [$row['location']]; // Adjust the field names accordingly

    if (!isset($optionData[$ward])) {
        $optionData[$ward] = [''];
    }

    $optionData[$ward][] = $locations;
}

// Return JSON response
echo json_encode($optionData);
?>