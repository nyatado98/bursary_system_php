<?php 

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
	header("location:login");
	exit;
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

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

$sql = "UPDATE students SET student_fullname = '".$fullname."',age ='".$age."',school_level ='".$school_level."',school_name ='".$school_name."',
county = '".$county."',ward='".$ward."',location='".$location."',sub_location='".$sub_location."',updated_at = '$current_date',year = '$year' WHERE id = '".$id."'";
 $query = mysqli_query($conn,$sql);
 if($query){
	$suc = "Successfully updated the details for student ".$_POST['fullname'].".";
		$_SESSION['succ'] = $suc;
		header("location:applicants?success=");
	
 }
 

}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include'config/head.php';?>

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<?php include'config/header.php';?>
                        </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul >
							<li class="menu-title"> 
								<!--<span>Main Menu</span>-->
							</li>
							<li > 
								<a href="dashboard"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li > 
								<a href="applications"><i class="fa fa-file"></i> <span>Applications</span></a>
							</li>
							
							<li class="active"> 
								<a href="applicants"><i class="fa fa-list"></i> <span>Applicants</span></a>
							</li>
							<li> 
								<a href="beneficiaries"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
							<li> 
								<a href="students_uploads"><i class="fa fa-file-image"></i> <span>Student Uploads</span></a>
							</li>
							<li> 
								<a href="amount_reports"><i class="fa fa-money-bill"></i> <span>Amount Reports</span></a>
							</li>
							<li> 
								<a href="reports"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li> 
								<a href="users"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="settings"><i class="fa fa-cog"></i> <span>settings</span></a>
							</li>
                            <li> 
								<a href="messaging"><i class="fa fa-message"></i> <span>Messages</span></a>
							</li>
							<li> 
								<a href="logout"><i class="fa fa-arrow-left"></i> <span>Logout</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Applicants</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						<div class="row">
                                    <div class="col-md-6">
                                    <h4 class="font-weight-bold" style="text-decoration:underline">FILTER BY :</h4>
                                    </div>
                                    
                                </div>
                                <form method="post" action="">
                                <div class="col-md-12">
                                <div class="card">
                                <div class="row p-2">
                              
								<div class="col-md-3" id="year">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
                                        <select name="Year" class="form-control" id="">
											<option value="">-Select Year-</option>
											<option value="<?php if(isset($_POST['filter_all']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                    </div>
                                </div>
								<div class="col-md-3" id="ward"  onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">-select ward-</option>
                                        <option value="Null">Null</option>
                                        <option value="<?php
                                        if(isset($_POST['filter_all']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $ward = $_POST['ward'];
                                        echo $ward;
                                        
                                        ?></option>
                                        <option value="Kapsabet">Kapsabet</option>
                                            <option value="Chepkumia">Chepkumia</option>
                                            <option value="Kapkangani">Kapkangani</option>
                                            <option value="Kilibwoni">Kilibwoni</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="location" >
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location" id="default" class="form-control">
                                        <option value="">-select location-</option>
                                       
                                        </select>
                                        <select name="kapsabet_location"class="form-control" id="kapsabet" style="display:none">
                                        <option value=""></option>
                                        <option value="<?php 
                                        $kapsabet_location ="";
                                        if(isset($_POST['filter_all']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                    // $_SESSION['kapsabet_location'] = $kapsabet_location;
                                        echo $kapsabet_location;?>" selected><?php
                                        if(isset($_POST['kapsabet_location']))
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                        echo $kapsabet_location;
                                        
                                        ?></option>
                                            <option value ="Kamobo">Kamobo</option>
                                            <option value ="Township">Township</option>
                                            <option value ="Kiminda">Kiminda</option>
                                        </select>
                                        <div  onchange="showOptions()">
                                        <select name="kapkangani_location"class="form-control" id="kapkangani" style="display:none;">
                                        <option value="">Null</option>
                                        <option value="<?php 
                                        $kapkangani_location = "";
                                        if(isset($_POST['filter_all']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                    // $_SESSION['kapkangani_location'] = $kapkangani_location;
                                        echo $kapkangani_location;?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                        echo $kapkangani_location;
                                        
                                        ?></option>
                                            <option value ="Kapkangani">Kapkangani</option>
                                        </select>
                                        </div>
                                        <div onchange="Options()">
                                        <select name="chepkumia_location"class="form-control" id="chepkumia" style="display:none;" >
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $chepkumia_location = "";
                                        
                                        if(isset($_POST['filter_all']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                    // $_SESSION['chepkumia_location'] = $chepkumia_location;
                                        echo $chepkumia_location;?>" selected><?php
                                        if(isset($_POST['filter']))
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                        echo $chepkumia_location;
                                        
                                        ?></option>
                                            <option value ="Chepkumia">Chepkumia</option>
                                        </select>
                                        </div>
                                        <select name="kilibwoni_location"class="form-control" id="kilibwoni" style="display:none;" onchange="show()">
                                        <option value="">Null</option>
                                        <option value="<?php
                                        $kilibwoni_location = "";
                                        if(isset($_POST['filter_all']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                    // $_SESSION['kilibwoni_location'] = $kilibwoni_location;
                                        echo $kilibwoni_location;?>" selected><?php
                                        if(isset($_POST['filter_all']))
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                        echo $kilibwoni_location;
                                        
                                        ?></option>
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
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location"class="form-control">
                                        <option value="">-select sub-location-</option>
                                        <option value="<?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?>" selected><?php if(isset($_POST['filter_all']))
                                        $sub_location = $_POST['sub_location'];
                                        echo $sub_location;
                                        
                                        ?></option>
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
                                    </div>
                                </div>
                                </div>
                                <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="column">
                                        <input type="submit" class="btn btn-primary mt-3 text-dark "value="Filter" name="filter_all" style="font-size:20px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="column">
                                        <input type="submit" class="btn btn-secondary mt-3"value="Reset" name="reset" style="font-size:20px;">
                                    </div>
                                </div>
                            </div>
                                </div>
                                </div>
                                </form>
                            <?php if(isset($_POST['filter_all'])){
                                                            if($_POST['ward'] == 'Kapkangani'){
                                                            ?>
                                                            <script>
                                                                document.getElementById('kapkangani').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';

                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kapsabet'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kapsabet').style.display = 'block';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Kilibwoni'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('kilibwoni').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('chepkumia').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }elseif($_POST['ward'] == 'Chepkumia'){

                                                            ?>
                                                            <script>
                                                                document.getElementById('chepkumia').style.display = 'block';
                                                                document.getElementById('kapsabet').style.display = 'none';
                                                                document.getElementById('kilibwoni').style.display = 'none';
                                                                document.getElementById('kapkangani').style.display = 'none';
                                                                document.getElementById('default').style.display = 'none';
                                                                </script>
                                                                <?php
                                                        }
                                                    }
                                                        ?>
							 <?php
                            // $school = $location = $ward = $sub_location = $year ="";
                            // $kapsabet_location = $kilibwoni_location = $chepkumia_location = $kapkangani_location ="";
                            
                           

                            if(isset($_POST['filter_all'])){
								   $Year = $_POST['Year'];
                                   $ward = $_POST['ward'];
                                   $sub_location = $_POST['sub_location'];
                               if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                   $location_err = "Please select location";
                               }else{
                               
                               $kapsabet_location = $_POST['kapsabet_location'];
                               $kapkangani_location = $_POST['kapkangani_location'];
                               $chepkumia_location = $_POST['chepkumia_location'];
                               $kilibwoni_location = $_POST['kilibwoni_location'];
                               if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                    $location = '';
                                }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                    $location = $kapsabet_location;
                               }elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                    $location = $chepkumia_location;
                               }elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
                                    $location = $kapkangani_location;
                               }else{
                                    $location = $kilibwoni_location;
                                }
                               }
                               if($Year !='' && $ward != '' && $location == '' && $sub_location == ''){
                                    $sql = "SELECT * FROM students WHERE year='$Year' AND ward='$ward'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?year_by=<?php echo $Year;?>&&ward_by=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                            <p class="text-danger">There is no available data from the selection</p>
                                                
                                                <?php
                                            }
                                        }}
                
                                        if(isset($_POST['filter_all'])){
                                            $Year = $_POST['Year'];
                                            $ward = $_POST['ward'];
                                            $sub_location = $_POST['sub_location'];
                                        if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                            $location_err = "Please select location";
                                        }else{
                                        
                                        $kapsabet_location = $_POST['kapsabet_location'];
                                        $kapkangani_location = $_POST['kapkangani_location'];
                                        $chepkumia_location = $_POST['chepkumia_location'];
                                        $kilibwoni_location = $_POST['kilibwoni_location'];
                                        if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                             $location = '';
                                         }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                             $location = $kapsabet_location;
                                        }elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                             $location = $chepkumia_location;
                                        }elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
                                             $location = $kapkangani_location;
                                        }else{
                                             $location = $kilibwoni_location;
                                         }
                                        }
if($Year !='' && $ward == '' && $location == '' && $sub_location == ''){
                                    $sql = "SELECT * FROM students WHERE year='$Year'";

                                    // Execute the query and get the results.
                                    $ress = $conn->query($sql);
                                    $counts = mysqli_num_rows($ress);
                                    if($counts > 0){
                                        ?>
                                        <a href="print?year_by=<?php echo $Year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                        <?php }else{?>
                                            <p class="text-danger">The selected year is not available in the records.</p>
                                            <?php
                                        }
                                    }
                                }
                                
                            if(isset($_POST['filter_all'])){
                                $Year = $_POST['Year'];
                                $ward = $_POST['ward'];
                                $sub_location = $_POST['sub_location'];
                            if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                $location_err = "Please select location";
                            }else{
                            
                            $kapsabet_location = $_POST['kapsabet_location'];
                            $kapkangani_location = $_POST['kapkangani_location'];
                            $chepkumia_location = $_POST['chepkumia_location'];
                            $kilibwoni_location = $_POST['kilibwoni_location'];
                            if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                 $location = '';
                             }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                 $location = $kapsabet_location;
                            }elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                 $location = $chepkumia_location;
                            }elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
                                 $location = $kapkangani_location;
                            }else{
                                 $location = $kilibwoni_location;
                             }
                            }
                                    if($Year =='' && $ward != '' && $location != '' && $sub_location == ''){
                                        $sql = "SELECT * FROM students WHERE  ward='$ward' AND location ='$location'";
    
                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?ward_by=<?php echo $_POST['ward'];?>&&location_by=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                            <p class="text-danger">There is no available data from the selection</p>
                                                <?php
                                            }
                                        }
                                             elseif($Year =='' && $ward != '' && $location != '' && $sub_location != ''){
                                         $sql = "SELECT * FROM students WHERE  location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                                                        
                                         // Execute the query and get the results.
                                         $ress = $conn->query($sql);
                                         $counts = mysqli_num_rows($ress);
                                         if($counts > 0){
                                             ?>
                                             <a href="print?ward_by=<?php echo $ward;?>&&location_by=<?php echo $location;?>&&sub_location_by=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                            <p class="text-danger">There is no available data from the selection</p>
                                                
                                                <?php
                                             }
                                         }
                                         elseif($Year !='' && $ward != '' && $location != '' && $sub_location != ''){
                                            $sql = "SELECT * FROM students WHERE year='$Year' AND  location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                                                           
                                            // Execute the query and get the results.
                                            $ress = $conn->query($sql);
                                            $counts = mysqli_num_rows($ress);
                                            if($counts > 0){
                                                ?>
                                                <a href="print?year_by=<?php echo $Year;?>&&ward_by=<?php echo $ward;?>&&location_by=<?php echo $location;?>&&sub_location_by=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                               <?php }else{?>
                                            <p class="text-danger">There is no available data from the selection</p>
                                                   
                                                   <?php
                                                }
                                            }

                                        
                                            elseif($Year !='' && $ward != '' && $location != '' && $sub_location == ''){
                                                $sql = "SELECT * FROM students WHERE year='$Year' AND  location='$location' AND ward='$ward' ";
                                                                               
                                                // Execute the query and get the results.
                                                $ress = $conn->query($sql);
                                                $counts = mysqli_num_rows($ress);
                                                if($counts > 0){
                                                    ?>
                                                    <a href="print?year_by=<?php echo $Year;?>&&ward_by=<?php echo $ward;?>&&location_by=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                   <?php }else{?>
                                            <p class="text-danger">There is no available data from the selection</p>
                                                       
                                                       <?php
                                                    }
                                                }
                                                elseif($Year =='' && $ward != '' && $location == '' && $sub_location == ''){
                                                    $sql = "SELECT * FROM students WHERE ward='$ward' ";
                                                                                   
                                                    // Execute the query and get the results.
                                                    $ress = $conn->query($sql);
                                                    $counts = mysqli_num_rows($ress);
                                                    if($counts > 0){
                                                        ?>
                                                        <a href="print?ward_by=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                                       <?php }else{?>
                                            <p class="text-danger">There is no available data from the ward selected.</p>
                                                           
                                                           <?php
                                                        }
                                                    }
    
                                            
                                }
                            ?>
						<!--update application success message -->
						<?php if(isset($_GET['success'])){
						$suc = $_SESSION['succ'];
						$succs = $suc;
						?>
						<div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                                <span class="font-weight-bold"><?php echo $succs;?></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                     </div>
													 <?php }else{ ?>
														
														<?php } ?>
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-body">
									<div id="line_graph">
                                    </div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Full Name</td>
                                                <td class="font-weight-bold text-center">Age</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">County</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Sub-location</td>
                                                <td class="font-weight-bold text-center">Actions</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php 
											if(isset($_POST["filter_all"])){
                                                $Year = $_POST['Year'];
                                                $ward = $_POST['ward'];
                                                $sub_location = $_POST['sub_location'];
                                            if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                                $location_err = "Please select location";
                                            }else{
                                            
                                            $kapsabet_location = $_POST['kapsabet_location'];
                                            $kapkangani_location = $_POST['kapkangani_location'];
                                            $chepkumia_location = $_POST['chepkumia_location'];
                                            $kilibwoni_location = $_POST['kilibwoni_location'];
                                            if($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                                 $location = '';
                                             }elseif($kapsabet_location != '' && $chepkumia_location == '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                                 $location = $kapsabet_location;
                                            }elseif($kapsabet_location == '' && $chepkumia_location != '' && $kapkangani_location == '' && $kilibwoni_location == ''){
                                                 $location = $chepkumia_location;
                                            }elseif($kapsabet_location == '' && $chepkumia_location == '' && $kapkangani_location != '' && $kilibwoni_location == ''){
                                                 $location = $kapkangani_location;
                                            }else{
                                                 $location = $kilibwoni_location;
                                             }
                                            }
                                           if($Year !='' && $ward == '' && $location == '' && $sub_location == ''){
                                            $sql = "SELECT * FROM students WHERE year='$Year'";
											$result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
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
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
                                            <?php }}elseif($Year =='' && $ward != '' && $location == '' && $sub_location == ''){
											  $sql = "SELECT * FROM students WHERE ward='$ward'";
											  $result = mysqli_query($conn, $sql);
										   while($val = $result->fetch_assoc()){
											?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
                                            <?php }}elseif($Year !='' && $ward != '' && $location == '' && $sub_location == ''){
                                            $sql = "SELECT * FROM students WHERE year='$Year' AND ward='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($val = $resul->fetch_assoc()){
											?>
											<tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
											<?php }}
                                           elseif($Year =='' && $ward != '' && $location != '' && $sub_location == ''){
                                                $sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward'";
                                                $resul = mysqli_query($conn, $sql);
                                              while($val = $resul->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $val['id'];?></td>
                                                    <td><?php echo $val['student_fullname'];?></td>
                                                    <td><?php echo $val['age'];?></td>
                                                    <td><?php echo $val['school_level'];?></td>
                                                    <td><?php echo $val['county'];?></td>
                                                    <td><?php echo $val['location'];?></td>
                                                    <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                    <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                     <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                    <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <form method="post" action="">
                                                               
                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                            
                                                                    <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">UPDATE</h4>
                                                                    </div>
                                            
                                                                    <div class="modal-body">
                                                                    <input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                        <label for="" class="font-weight-bold">Fullname :</label>
                                                                        <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                        <label for="" class="font-weight-bold">Age :</label>
                                                                        <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
                                                                        
                                                                        <label for="" class="font-weight-bold">School Level :</label>
                                                                        <select name="school_level" id="" class="form-control">
                                                                            <option selected><?php echo $val['school_level'];?></option>
                                                                            <option>--select school-level--</option>
                                                                            <!-- <option>Primary School</option> -->
                                                                            <option>Secondary School</option>
                                                                            <option>University/TVET/College</option>
                                                                         </select>
                                                                        <label for="" class="font-weight-bold">School Name :</label>
                                                                        <select name="school_name" id="" class="form-control">
                                                                            <option selected><?php echo $val['school_name'];?></option>
                                                                            <option>--select school--</option>
                                                                            <option>Moi Girls High School</option>
                                                                            <option>G.K High School</option>
                                                                            <option>U.G High School</option>
                                                                            <option>Umoja High School</option>
                                                                            <option>Kapsoya Secondary School</option>
                                                                         </select>
                                                                        <label for="" class="font-weight-bold">County :</label>
                                                                        <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
                                                                        <label for="" class="font-weight-bold">Ward :</label>
                                                                        <select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
                                                <?php }}elseif($Year =='' && $ward != '' && $location != '' && $sub_location != ''){
                                                $sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($val = $resul->fetch_assoc()){
											?>
											<tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
											<?php }}elseif($Year !='' && $ward != '' && $location != '' && $sub_location != ''){
                                                $sql = "SELECT * FROM students WHERE year='$Year' AND location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($val = $resul->fetch_assoc()){
											?>
											<tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
											<?php }}elseif($Year !='' && $ward != '' && $location != '' && $sub_location == ''){
                                                $sql = "SELECT * FROM students WHERE year='$Year' AND location='$location' AND ward='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($val = $resul->fetch_assoc()){
											?>
											<tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['age'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['county'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td class=" font-weight-bold"><?php echo $val['sub_location'];?></td>
                                                <td class="text-center"><a href="#edit<?php echo $val['id'];?>"class="btn btn-primary" data-toggle="modal" data-target="#Edit<?php echo $val['id'];?>">Edit</a>
                                                 <!-- <a href="" data-toggle="modal" data-target="#Modal<?php echo $val['id'];?>" class="btn btn-danger">Delete</a> -->
                                                <div id="Edit<?php echo $val['id'];?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <form method="post" action="">
                                                           
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                        
                                                                <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">UPDATE</h4>
                                                                </div>
                                        
                                                                <div class="modal-body">
																<input type="hidden" name="id" value="<?php echo $val['id'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Fullname :</label>
                                                                    <input type="text" name="fullname" value="<?php echo $val['student_fullname'];?>" class="form-control">
                                                                    <label for="" class="font-weight-bold">Age :</label>
                                                                    <input type="number" name="age" value="<?php echo $val['age'];?>" class="form-control">
																	
                                                                    <label for="" class="font-weight-bold">School Level :</label>
																	<select name="school_level" id="" class="form-control">
																		<option selected><?php echo $val['school_level'];?></option>
																		<option>--select school-level--</option>
																		<!-- <option>Primary School</option> -->
																		<option>Secondary School</option>
																		<option>University/TVET/College</option>
																	 </select>
																	<label for="" class="font-weight-bold">School Name :</label>
                                                                    <select name="school_name" id="" class="form-control">
																		<option selected><?php echo $val['school_name'];?></option>
																		<option>--select school--</option>
																		<option>Moi Girls High School</option>
																		<option>G.K High School</option>
																		<option>U.G High School</option>
																		<option>Umoja High School</option>
																		<option>Kapsoya Secondary School</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">County :</label>
                                                                    <input type="text" name="county" value="<?php echo $val['county'];?>" class="form-control">
																	<label for="" class="font-weight-bold">Ward :</label>
																	<select name="ward" id="" class="form-control">
																		<option selected><?php echo $val['ward'];?></option>
																		<option>--select ward--</option>
																		<option>Kapsabet</option>
																		<option>Kilibwoni</option>
																		<option>Kapkangani</option>
                                                                        <option>Chepkumia</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Location :</label>
                                                                    <select name="location" id="" class="form-control">
																		<option selected><?php echo $val['location'];?></option>
																		<option>--select location--</option>
                                                                        <option>Kamobo</option>
                                                                        <option >Township</option>
                                                                        <option>Kiminda</option>
																		<option >Kapkangani</option>
																		<option>Chepkumia</option>
																		<option >Kilibwoni</option>
                                                                        <option >Lolminingai</option>
                                                                        <option>Kipsigak</option>
                                                                        <option >Kipture</option>
                                                                        <option>Kabirirsang</option>
                                                                        <option >Arwos</option>
                                                                        <option >Kaplamai</option>
                                                                        <option >Tulon</option>
                                                                        <option >Terige</option>
																	 </select>
                                                                    <label for="" class="font-weight-bold">Sub Location :</label>
                                                                    <select name="sub_location" id="" class="form-control">
																		<option selected><?php echo $val['sub_location'];?></option>
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
											<?php }}}?>
                                        </tbody>
                                        
                                        </table>
                                    </div>
								</div>
							</div>
							<!-- /Revenue Chart -->
							
						</div>
					</div>

				</div>

                

			</div>
			<!-- /Page Wrapper -->

			
        </div>
		<!-- /Main Wrapper -->
		<?php include('config/scripts.php');?>
    </body>
	
    <!-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>  -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.13.4/js/jquery.dataTables.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );
    function show() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("kapsabet").value;
    }

	function showHideSelectOptions() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("opts").value;

  // Show the child select option if the parent select option is set to "Option 2".
  if (parentSelectValue === "Kapsabet") {
    document.getElementById("kapsabet").style.display = "block";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById('kilibwoni_sub').style.display = 'none';
    document.getElementById('sub').style.display = 'block';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
    document.getElementById("kapkangani").style.display = "none";
  } else if(parentSelectValue === "Chepkumia"){
    
    document.getElementById("chepkumia").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById('kilibwoni_sub').style.display = 'none';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'block';
    }else if(parentSelectValue === "Kilibwoni") {
		document.getElementById("kilibwoni").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById('sub').style.display = 'block';
    document.getElementById('chepkumia_sub').style.display = 'none';
    document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';


  }else if(parentSelectValue === "Kapkangani") {
		document.getElementById("kapkangani").style.display = "block";
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("default").style.display = "none";

        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
       
    document.getElementById('kapkangani_sub').style.display = 'none';

        document.getElementById('lolminingai_sub').style.display = 'none';
       
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';
    
        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        
        document.getElementById('sub').style.display = 'block';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

  }
 
  else if(parentSelectValue === "Null"){
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("ward").style.display = "block";
    document.getElementById("default").style.display = "block";
  
  }
  else{
    document.getElementById("kapsabet").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("ward").style.display = "block";
    document.getElementById("default").style.display = "block";
  }
}

function showOptions() {
  
    var parentValue = document.getElementById("kapkangani").value;
    if(parentValue === 'Kapkangani'){
        document.getElementById('kapkangani_sub').style.display = 'block';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

    }else if(parentValue === ''){
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'block';
    }
    
}

function Options() {
    var parentV = document.getElementById("chepkumia").value;
if(parentV === "Chepkumia"){
        document.getElementById('chepkumia_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

        }else if(parentV === ''){
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'block';
        }

}
function show() {
    var parentVa = document.getElementById("kilibwoni").value;
if(parentVa === "Kilibwoni"){
        document.getElementById('kilibwoni_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

        }else if(parentVa === 'Lolminingai'){
        document.getElementById('lolminingai_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Kipsigak'){
        document.getElementById('kipsigak_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Kipture'){
        document.getElementById('kipture_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }
        else if(parentVa === 'Kabirirsang'){
        document.getElementById('kabirirsang_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Arwos'){
        document.getElementById('arwos_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Kaplamai'){
        document.getElementById('kaplamai_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Tulon'){
        document.getElementById('tulon_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }else if(parentVa === 'Terige'){
        document.getElementById('terige_sub').style.display = 'block';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
        }
        
        if(parentVa === ''){
        document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'block';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('kilibwoni_sub').style.display = 'none';
        }

}

function showOpt(){
    var parentVa = document.getElementById("kapsabet").value;
if(parentVa === 'Kamobo'){
    document.getElementById('kamobo_sub').style.display = 'block';
    document.getElementById('kiminda_sub').style.display = 'none';
    document.getElementById('township_sub').style.display = 'none';
    document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';

}else if(parentVa === 'Kiminda'){
    document.getElementById('kiminda_sub').style.display = 'block';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('township_sub').style.display = 'none';

    document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';

}else if(parentVa === 'Township'){
    document.getElementById('township_sub').style.display = 'block';
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';

    document.getElementById('kilibwoni_sub').style.display = 'none';
        document.getElementById('sub').style.display = 'none';
        document.getElementById('kapkangani_sub').style.display = 'none';
        document.getElementById('lolminingai_sub').style.display = 'none';
        document.getElementById('chepkumia_sub').style.display = 'none';
        document.getElementById('kipsigak_sub').style.display = 'none';
        document.getElementById('kipture_sub').style.display = 'none';
        document.getElementById('kabirirsang_sub').style.display = 'none';
        document.getElementById('arwos_sub').style.display = 'none';

        document.getElementById('kaplamai_sub').style.display = 'none';
        document.getElementById('tulon_sub').style.display = 'none';
        document.getElementById('terige_sub').style.display = 'none';

}else if(parentVa === ''){
    document.getElementById('township_sub').style.display = 'none';
    document.getElementById('sub').style.display = 'block';
    
    document.getElementById('kamobo_sub').style.display = 'none';
    document.getElementById('kiminda_sub').style.display = 'none';
}
}


    </script>
</html>
