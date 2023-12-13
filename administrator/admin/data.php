<?php 

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

if (isset($_GET['option'])) {
    $selectedOption = '2023';

    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT id, student_fullname, age, school_level, county,location,sub_location FROM students WHERE year ='$selectedOption'";
    $result = mysqli_query($conn, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No option selected";
}
?>
