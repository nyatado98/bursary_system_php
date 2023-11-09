<<<<<<< HEAD
<?php

// Decode the JSON file into an associative array.
$json_file = file_get_contents('WARD.json');
$json_data = json_decode($json_file, true);

// Connect to the database.
$db = new PDO('mysql:host=localhost;dbname=iebc', 'root', '');

// Create a SQL INSERT statement for each row in the associative array.

// Decode the JSON file into an associative array.
$json_file = file_get_contents('WARD.json');
$json_data = json_decode($json_file, true);

// Check if the JSON data is null.
if (!is_null($json_data)) {
    // Iterate over the JSON data.
    foreach ($json_data as $row) {
        // Process the row
        if ($row['WARD'] !== 'NaN') {
            $sql = 'INSERT INTO emgwen (ward) VALUES (?)';
    
            // Prepare the SQL statement.
            $stmt = $db->prepare($sql);
    
            // Bind the values from the associative array to the SQL statement parameters.
            $stmt->bindValue(1, $row['WARD']);
            
    
            // Execute the SQL statement.
            $stmt->execute();
        }
    }
} else {
    // The JSON data is null
}
// foreach ($json_data as $row) {
//     // Check if the value is NaN.
//     if ($row['value'] !== 'NaN') {
//         $sql = 'INSERT INTO emgwen (ward) VALUES (?)';

//         // Prepare the SQL statement.
//         $stmt = $db->prepare($sql);

//         // Bind the values from the associative array to the SQL statement parameters.
//         $stmt->bindValue(1, $row['ward']);
        

//         // Execute the SQL statement.
//         $stmt->execute();
//     }
// }

// Close the database connection.
$db = null;

=======
<?php

// Decode the JSON file into an associative array.
$json_file = file_get_contents('WARD.json');
$json_data = json_decode($json_file, true);

// Connect to the database.
$db = new PDO('mysql:host=localhost;dbname=iebc', 'root', '');

// Create a SQL INSERT statement for each row in the associative array.

// Decode the JSON file into an associative array.
$json_file = file_get_contents('WARD.json');
$json_data = json_decode($json_file, true);

// Check if the JSON data is null.
if (!is_null($json_data)) {
    // Iterate over the JSON data.
    foreach ($json_data as $row) {
        // Process the row
        if ($row['WARD'] !== 'NaN') {
            $sql = 'INSERT INTO emgwen (ward) VALUES (?)';
    
            // Prepare the SQL statement.
            $stmt = $db->prepare($sql);
    
            // Bind the values from the associative array to the SQL statement parameters.
            $stmt->bindValue(1, $row['WARD']);
            
    
            // Execute the SQL statement.
            $stmt->execute();
        }
    }
} else {
    // The JSON data is null
}
// foreach ($json_data as $row) {
//     // Check if the value is NaN.
//     if ($row['value'] !== 'NaN') {
//         $sql = 'INSERT INTO emgwen (ward) VALUES (?)';

//         // Prepare the SQL statement.
//         $stmt = $db->prepare($sql);

//         // Bind the values from the associative array to the SQL statement parameters.
//         $stmt->bindValue(1, $row['ward']);
        

//         // Execute the SQL statement.
//         $stmt->execute();
//     }
// }

// Close the database connection.
$db = null;

>>>>>>> 2019fb6bd2dd2ea15b95e71ca458d606c33ff2c1
