<?php

// Adjust your database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bursary';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 100;

// Calculate the offset based on the current page and page size
$offset = ($page - 1) * $pageSize;

// Fetch options from the database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM secondary_schools LIMIT $offset, $pageSize";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output each option
        echo "<li value='{$row['id']}'>{$row['name']}</li>";
    }
}

$conn->close();

?>
