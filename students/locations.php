<?php
include 'database/connect.php';
if(!isset($_SESSION["user_email"]) || $_SESSION["email_user"] !== true || !isset($_SESSION['user'])){
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