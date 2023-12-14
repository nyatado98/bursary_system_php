<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.4/css/jquery.dataTables.css" />
<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jquery/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<title></title>
</head>
<body>

</body>


<?php 

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

// Get the filter option from the AJAX request
$filterOption = $_GET["option"];
$opts = $_GET["ward"];
$defaults = $_GET["location"];
$sec = $_GET["sub_location"];



	if($filterOption != '' && $opts !='' && $defaults !='' && $sec != ''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE year ='$filterOption' AND ward ='$opts' AND location ='$defaults' AND sub_location = '$sec'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($filterOption != '' && $opts !='' && $defaults !=''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE year ='$filterOption' AND ward ='$opts' AND location ='$defaults'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($opts !='' && $defaults !='' && $sec != ''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE ward ='$opts' AND location ='$defaults' AND sub_location = '$sec'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($filterOption != '' && $opts !=''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE year ='$filterOption' AND ward ='$opts'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($opts !='' && $defaults !=''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE  ward ='$opts' AND location ='$defaults'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($filterOption != ''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE year ='$filterOption'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }}elseif($opts !=''){
    // Use the selected option to fetch data from the database
    // Replace this query with your actual query
		$query = "SELECT * FROM applications WHERE ward ='$opts'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	  <td class="font-weight-bold text-center">#</td>
      <td class="font-weight-bold text-center">Year</td>
      <td class="font-weight-bold text-center">Student Name</td>
      <td class="font-weight-bold text-center">School Name</td>
      <td class="font-weight-bold text-center">School Level</td>
      <td class="font-weight-bold text-center">Ward</td>
      <td class="font-weight-bold text-center">Location</td>
      <td class="font-weight-bold text-center">Sub-location</td>
</tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["year"] ;?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["school_name"] ;?></td>
        <td class="text-white"><?php echo $row["school_type"] ;?></td>
        <td class="text-white"><?php echo $row["ward"] ?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
    </tr>
      <?php }
} else {?>
       <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td>
</tr>
		</thead>

<?php }} ?>
