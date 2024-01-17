<?php
// Assuming you have a database connection established
include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
    header("location:login");
    exit;
}
// Retrieve the selected value from the AJAX request
// $selectedValue = $_POST['selectedValue'];

$ward = $_GET['ward'];

// Perform a query to fetch data based on the selected value
// Replace this with your actual database query
$query = "SELECT location FROM locations WHERE ward='$ward'";
$result = mysqli_query($conn, $query);

// Fetch the results and send them back as JSON
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row['location'];
}

echo json_encode($data);
// $input1_value = $_POST['input1_value'];

// // Based on the value of the first input field, generate the options for the second input field
// if ($input1_value == 'Kapsabet') {
//   $options = '<option value="option1_1">Option 1.1</option>
//               <option value="option1_2">Option 1.2</option>';
// } else if ($input1_value == 'option2') {
//   $options = '<option value="option2_1">Option 2.1</option>
//               <option value="option2_2">Option 2.2</option>';
// }

// // Return the options to the AJAX request
// echo $options;
?>
