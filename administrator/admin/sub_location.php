<?php
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
    header("location:login");
    exit;
}


$sql = "SELECT * FROM sub_locations WHERE location='Kamobo' OR location= 'Kiminda' OR location ='Township' OR location ='Kapkangani'
OR location ='Chepkumia' OR location='Kilibwoni'  OR location='Lolminingai'  OR location='Kipsigak'  OR location='Kipture'  OR location='Kabirirsang'  OR location='Arwos'  OR location='Kaplamai'  OR location='Tulon'  OR location='Terige' ";
$result = $conn->query($sql);

$optionData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $location = $row['location'];
    $sub_locations = [$row['sub_location']]; // Adjust the field names accordingly

    if (!isset($optionData[$location])) {
        $optionData[$location] = [''];
    }

    $optionData[$location][] = $sub_locations;
}

// Return JSON response
echo json_encode($optionData);
?>