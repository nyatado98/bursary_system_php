<?php
$fullname = $age = $family_status = $school_level =$school_name = $county = $ward  = $location =$sub_location = $Year= "";
$message = "";
date_default_timezone_set('Africa/Nairobi');
$current_date=strtotime("current");
$current_date = date('Y/m/d  H:i:sa');
$year = date('Y');

if(isset($_POST['update'])){
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$school_level = $_POST['school_level'];
$school_name = $_POST['school_name'];
$county = $_POST['county'];
$ward = $_POST['ward'];
$location = $_POST['location'];
$sub_location = $_POST['sub_location'];

$sql = "UPDATE students SET student_fullname = '".$fullname."',age ='".$age."',school_level ='".$school_level."',school_name ='".$school_name."',county = '".$county."',ward='".$ward."',location='".$location."',sub_location='".$sub_location."',updated_at = '$current_date' WHERE id = '".$id."'";
 $query = mysqli_query($conn,$sql);
 if($query){
	$suc = "Successfully updated the details for student ".$_POST['fullname'].".";
		$_SESSION['succ'] = $suc;
		header("location:applicants?success=");
	
 }
 

}
?>

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
		$query = "SELECT * FROM students WHERE year ='$filterOption' AND ward ='$opts' AND location ='$defaults' AND sub_location = '$sec'";
    
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
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
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
        </tr>
        
        
   <?php }

   // Prepare the response as JSON
// $response = array(
//     'year' => $filterOption
// );

// // Send the JSON response

// echo json_encode($response);
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
		</tr>
		

<?php }}elseif($opts != '' && $filterOption !='' && $defaults !=''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE ward ='$opts' AND year ='$filterOption' AND location = '$defaults'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td></tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
		</tr>
		<?php }
}
elseif($opts != '' && $sec !='' && $defaults !=''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE ward ='$opts' AND sub_location ='$sec' AND location = '$defaults'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td></tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
		</tr>
		<?php }
}
elseif($opts != '' && $filterOption !=''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE ward ='$opts' AND year ='$filterOption'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td></tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
		</tr>
		<?php }
}
elseif($opts != '' && $defaults !=''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE ward ='$opts' AND location = '$defaults'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td></tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
		</tr>
		<?php }
}
elseif($filterOption != ''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE year ='$filterOption'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
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
		
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
</tr></thead>
		
		<?php }
}elseif($opts != ''){

	// Use the selected option to fetch data from the database
    // Replace this query with your actual query
    $query = "SELECT * FROM students WHERE ward ='$opts'";
    $result = mysqli_query($conn, $query);
// Output the table rows
if ($result->num_rows > 0) {?>
	
          <thead>

	<tr>
	<td class='font-weight-bold text-center'>#</td>
	<td class='font-weight-bold text-center'>Fullname</td>
	<td class='font-weight-bold text-center'>Age</td>
	<td class='font-weight-bold text-center'>School_level</td>
	<td class='font-weight-bold text-center'>County</td>
	<td class='font-weight-bold text-center'>Location</td>
	<td class='font-weight-bold text-center'>Sub-location</td>
	<td class='font-weight-bold text-center'>Actions</td></tr>
		</thead>
		</tr>
<?php
    while ($row = $result->fetch_assoc()) {
    	?>

        
        <tr>
        <td class="text-center text-white"><?php echo  $row["id"] ?></td>
        <td class="text-white"><?php echo $row["student_fullname"] ;?></td>
        <td class="text-white"><?php echo $row["age"] ;?></td>
        <td class="text-white"><?php echo $row["school_level"] ;?></td>
        <td class="text-white"><?php echo $row["county"] ;?></td>
        <td class="text-white"><?php echo $row["location"] ?></td>
        <td class="text-white"><?php echo $row["sub_location"] ?></td>
        <td class="text-white text-center"><a href="#edit<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $row['id'];?>"><i class="fa fa-edit"></i>&nbsp&nbspEdit</a>
        	<!-- edit -->
        	<div id="Edit<?php echo $row['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $row['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $row['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold text-dark">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $row['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold text-dark">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $row['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $row['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold text-dark">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $row['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $row['location'];?></option>
																		<option>--select location--</option>
                                                                        <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
																		<option value ="Kapkangani">Kapkangani</option>
																		   <option value ="Chepkumia">Chepkumia</option>
																		<option value ="Kilibwoni">Kilibwoni</option>
                                            <option value ="Lolminingai">Lolminingai</option>
                                            <option value ="Kipsigak">Kipsigak</option>
                                            <option value ="Kipture">Kipture</option>
                                            <option value ="Kabirirsang">Kabirirsang</option>
                                            <option value ="Arwos">Arwos</option>
                                            <option value ="Kaplamai">Kaplamai</option>
                                            <option value ="Tulon">Tulon</option>
                                            <option value ="Terige">Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold text-dark">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $row['sub_location'];?></option>
																		<option>--select sub_location--</option>
																		<option>Kilibwoni</option>
                                                            <option>Kapnyerebai</option>
                                                            <option>Kaplonyo</option>
                                                            <option>Kabore</option>
                                                            <option>Ndubeneti</option>
                                                            <option>Kaplolok</option>
                                                            <option>Kipsotoi</option>
                                                            <option>Kisigak</option>
                                                            <option>Kakeruge</option>
                                                            <option>Kipture</option>
                                                            <option>Kimaam</option>
                                                            <option>Irimis</option>
                                                            <option>Kibirirsang</option>
                                                            <option>Underit</option>
                                                            <option>Chesuwe</option>
                                                            <option>Tiryo</option>
                                                            <option>Kaptagunyo</option>
                                                            <option>Kapchumba</option>
                                                            <option>Song'oliet</option>
                                                            <option>Meswo</option>
                                                            <option>Chepsonoi</option>
                                                            <option>Tindinyo</option>
                                                            <option>Koborgok</option>
                                                            <option>Cheptumia</option>
                                                            <option>Cheboite</option>
																	 </select>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																	</div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    </div>
        </td>
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
		</tr>
		<?php }
}
?>

<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#samples').DataTable();
    } );
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </html>
