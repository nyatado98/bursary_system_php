<div class="col-md-3">
                                <div class="card">
                                <div class="row p-3">
                                    
                                <!-- <div class="col-md-6" id="opt" onchange="showHideSelectOptions()">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Select Here :</label>
                                        <select name="ward"class="form-control" id="opts">
                                        <option value="">-select Here-</option>
										<option value="Year">Year</option>
										<option value="School">School</option>
                                            <option value="Ward">Ward</option>
                                            <option value="Location">Location</option>
                                            <option value="Sub-Location">Sub-Location</option>
                                        </select>
                                        
                                        </form>
                                    </div>
                                </div> -->
								<div class="col-md-6" id="year" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Year :</label>
										<select name="Year" class="form-control" id="" >
											<option value="<?php echo $Year;?>" selected><?php
                                            if(isset($_POST['filter_year']))
                                            $Year = $_POST['Year'];
                                        echo $Year;
                                        
                                        ?></option>
											<option value=""></option>
											<?php 
											
											$years = range(2020, strftime("%Y",time()));
											foreach ($years as $key) :
							
												?>
												
												<option><?php echo $key;?></option>
											<?php endforeach ?>
										</select>
                                        <input type="submit" name="filter_year"class="btn btn-warning mt-3 mb-2"value="Filter-by-Year" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
								<div class="col-md-6" id="school" style="display:none">
                                    <div class="column">
                                        <form method="post" action="" >
                                        <label class="font-weight-bold" style="font-size:20px">School :</label>
                                        <select name="school"class="form-control" id="op">
                                        <option >-select school-</option>
                                        <option value=""></option>
                                            <option>Kimumu Secondary School</option>
                                            <option>64 Secondary School</option>
                                            <option>UG High School</option>
                                            <option>Magereza High School</option>
                                            <option>Umoja High </option>
                                            <option>Ilula Secondary School</option>
                                        </select>
                                        <input type="submit" name="filter_school"class="btn btn-warning mt-3 mb-2"value="Filter-by-School" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="ward" style="display:none">
                                    <div class="column">
                                        <form method="post" action="" onsubmit="return show()">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control" id="op">
                                        <option >-select ward-</option>
                                        <option value=""></option>
                                            <option value="Kimumu">Kimumu</option>
                                            <option value="Soy">Soy</option>
                                            <option>Kesses</option>
                                            <option>Kipkaren</option>
                                            <option>Langas</option>
                                            <option>Moiben</option>
                                        </select>
                                        <input type="submit" name="filter_wards"class="btn btn-warning mt-3 mb-2"value="Filter-by-Ward" >
                                        <!-- <input type="submit" name="reset_ward"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="location" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location"class="form-control">
                                        <option value="">-select location-</option>
                                        <option value=""></option>
                                        <option>Jerusalem</option>
                                            <option>Munyaka</option>
                                            <option>Silas</option>
                                            <option>Kiplombe</option>
                                            <option>Rock 2</option>
                                            <option>Block 10</option>
                                        </select>
                                        <input type="submit" name="filter_location"class="btn btn-warning mt-3 mb-2"value="Filter-by-Location" onclick="show()">
                                        <!-- <input type="submit" name="reset_location"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6" id="sub-location" style="display:none">
                                    <div class="column">
                                        <form method="post" action="">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-Location :</label>
                                        <select name="sub_location"class="form-control">
                                        <option value="">-select sub-location-</option>
                                        <option value=""></option>
                                        <option>Subaru</option>
                                            <option>Block 8</option>
                                            <option>Berlin</option>
                                            <option>Junior rate</option>
                                            <option>Kapsoya</option>
                                            <option>Langas</option>
                                        </select>
                                        <input type="submit" name="filter_sub_location"class="btn btn-warning mt-3 mb-2"value="Filter-by-Sub-Location">
                                        <!-- <input type="submit" name="reset_su_location"class="btn btn-danger mt-3 mb-2"value="Reset"> -->
                                        </form>
                                    </div>
                                </div>
                              
                            <?php
                            if(isset($_POST['filter_wards'])){
                                ?>
                                <script>
                                    document.getElementById('ward').style.display = "block";
                                    </script>
                              
                                <?php }elseif(isset($_POST['filter_location'])){
                                ?>
                                <script>
                                    document.getElementById('location').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_sub_location'])){
                                ?>
                                <script>
                                    document.getElementById('sub-location').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_year'])){
                                ?>
                                <script>
                                    document.getElementById('year').style.display = "block";
                                    </script>
                                
                                <?php }elseif(isset($_POST['filter_school'])){
                                ?>
                                <script>
                                    document.getElementById('school').style.display = "block";
                                    </script>
                                
                                <?php }?>
                                </div>
                                </div>
                                </div>
                                <?php
                            if(isset($_POST['filter_year'])){
                                        // $location = $_POST['location'];
                                        $Year = $_POST['Year'];
                                        // $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE year ='$Year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        $count = mysqli_num_rows($res);
                                        if($count == 0){
                                            ?>

                                            <?php }else{?>
                                                <a href="print?year_by=<?php echo $Year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Year</a>
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $ward = "";
                            if(isset($_POST['filter_wards'])){
                                        // $location = $_POST['location'];
                                        $ward = $_POST['ward'];
                                        // $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?ward_by=<?php echo $_POST['ward'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Ward</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $location = "";
                            if(isset($_POST['filter_location'])){
                                        $location = $_POST['location'];
                                       
                                        $sql = "SELECT * FROM students WHERE location='$location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?location_by=<?php echo $_POST['location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $sub_location = "";
                            if(isset($_POST['filter_sub_location'])){
                                        
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM students WHERE sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?sub_location_by=<?php echo $_POST['sub_location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Sub-location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							 <?php
                            $school = "";
                            if(isset($_POST['filter_school'])){
                                        
                                        $school = $_POST['school'];
                                        $sql = "SELECT * FROM students WHERE school_name='$school'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?school=<?php echo $_POST['school'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by School</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>

                            <!-- amount report -->
                            <div class="col-md-6">
                                    <div class="card">
                                <form method="post" action="">
                                    <div class="column">
                                        <div class="row p-2">
                                <div class="col-md-3">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Ward :</label>
                                        <select name="ward"class="form-control">
                                        <option value="">-select ward-</option>
                                        <option value=""></option>
                                            <option>Kimumu</option>
                                            <option>Soy</option>
                                            <option>Kesses</option>
                                            <option>Kipkaren</option>
                                            <option>Langas</option>
                                            <option>Moiben</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Location :</label>
                                        <select name="location"class="form-control">
                                        <option value="">-select location-</option>
                                        <option value=""></option>
                                            <option>Jerusalem</option>
                                            <option>Munyaka</option>
                                            <option>Silas</option>
                                            <option>Kiplombe</option>
                                            <option>Rock 2</option>
                                            <option>Block 10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="column">
                                        <label class="font-weight-bold" style="font-size:20px">Sub-location :</label>
                                        <select name="sub_location"class="form-control">
                                            <option value="">-select sub-location-</option>
                                        <option value=""></option>
                                            <option>Subaru</option>
                                            <option>Block 8</option>
                                            <option>Berlin</option>
                                            <option>Junior rate</option>
                                            <option>Kapsoya</option>
                                            <option>Langas</option>
                                        </select>
                                    </div>
                                </div>
                                        </div>
                                        <div class="row p-2">
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-warning mt-1"value="Filter" name="filter" style="font-size:20px;">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="column">
                                        <input type="submit" class="form-control btn btn-danger mt-1"value="Reset" name="reset" style="font-size:20px;">
                                    </div>
                                </div>
                            </div>
                                </div>
                                </form>
                                    </div>
                            </div>
                            <?php
                            if(isset($_POST['filter_wards'])){
                                        // $location = $_POST['location'];
                                        $ward = $_POST['ward'];
                                        // $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM applications WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?byward=<?php echo $_POST['ward'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Ward</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $location = "";
                            if(isset($_POST['filter_location'])){
                                        $location = $_POST['location'];
                                       
                                        $sql = "SELECT * FROM applications WHERE location='$location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?bylocation=<?php echo $_POST['location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
                            <?php
                            $sub_location = "";
                            if(isset($_POST['filter_sub_location'])){
                                        
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM applications WHERE sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?bysub_location=<?php echo $_POST['sub_location'];?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T by Sub-location</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>
							<?php
                            $year = $ward = $location = $sub_location = "";
                            if(isset($_POST['filter_all'])){
                                        $location = $_POST['location'];
                                        $ward = $_POST['ward'];
                                        $year = $_POST['year'];
                                        $sub_location = $_POST['sub_location'];
                                        $sql = "SELECT * FROM applications WHERE location='$location' AND  ward='$ward' AND year ='$year' AND sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $ress = $conn->query($sql);
                                        $counts = mysqli_num_rows($ress);
                                        if($counts > 0){
                                            ?>
                                            <a href="print?by_year=<?php echo $_POST['year'];?>&&by_location=<?php echo $location;?>&&by_ward=<?php echo $ward;?>&&by_sub_location=<?php echo $sub_location;?>" class="btn btn-primary text-dark font-weight-bold" target="_blank">P R I N T</a>
                                            <?php }else{?>
                                                
                                                <?php
                                            }
                                        }
                            ?>

<script type="text/javascript">
     if (this.responseText.trim() !== "") {
                linkElement.style.display = "inline"; // Make the link visible
                linkElement.href = "your_link_url?param=" + selectedOption; // Set the link URL
                linkElement.textContent = "Link Text"; // Set the link text (customize as needed)
            } else {
                linkElement.style.display = "none"; // Hide the link when no data
            }
</script>

<!-- print linl shown code -->
 <?php
                            $school = $location = $ward = $sub_location = $year ="";
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
                                        <a href="print?year_by=<?php echo $Year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
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
                                            <a href="print?ward_by=<?php echo $_POST['ward'];?>&&location_by=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
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
                                             <a href="print?ward_by=<?php echo $ward;?>&&location_by=<?php echo $location;?>&&sub_location_by=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
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
                                                <a href="print?year_by=<?php echo $Year;?>&&ward_by=<?php echo $ward;?>&&location_by=<?php echo $location;?>&&sub_location_by=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
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


                            <!-- show locations and ward select option -->
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


                                                        <!-- locations in applicants page -->
                                                        <select name="kapsabet_location"class="form-control" id="kapsabet" style="display:none" onchange="showO(this.value)" >
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
                                        
                                        <select name="kapkangani_location"class="form-control" id="kapkangani" style="display:none;"  onchange="showKap(this.value)">
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
                                       
                                        <select name="chepkumia_location"class="form-control" id="chepkumia" style="display:none;" onchange="showChep(this.value)">
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
                                        
                                        <select name="kilibwoni_location"class="form-control" id="kilibwoni" style="display:none;" onchange="showK(this.value)">
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
<!-- code to show data in table selected -->
<div class="table-responsive">
                                        <table class="table table-bordered table-striped " id="sample">
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
<!-- show ward select options -->
<script type="text/javascript">
        function showHideSelectOptions() {
  // Get the value of the parent select option.
  var parentSelectValue = document.getElementById("opts").value;

  // Show the child select option if the parent select option is set to "Option 2".
  if (parentSelectValue === "Kapsabet") {
    document.getElementById("kapsabet").style.display = "block";
    document.getElementById("default").style.display = "none";
    document.getElementById("chepkumia").style.display = "none";
    document.getElementById("kilibwoni").style.display = "none";
    document.getElementById("kapkangani").style.display = "none";
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

function showO(optionValue){
    const secondSelect = document.getElementById('sec');
      secondSelect.innerHTML = ''; // Clear the existing options

      const optionData = {
        Kamobo: ['','Kamobo'],
        Township: ['','Township'],
        Kiminda: ['','Kiminda', 'Meswo'],
      };

      if (optionData[optionValue]) {
        optionData[optionValue].forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.value = option;
          optionElement.textContent = option;
          secondSelect.appendChild(optionElement);
        });
      }
}

function showK(optionValue) {
      const secondSelect = document.getElementById('sec');
      secondSelect.innerHTML = ''; // Clear the existing options

      const optionData = {
        Kilibwoni: ['','Kilibwoni', 'Kapnyerebai', 'Kaplonyo'],
        Lolminingai: ['','Kabore', 'Ndubeneti', 'Kaplolok'],
        Kipsigak: ['','Kipsotoi', 'Kisigak','Kakeruge'],
        Kipture: ['','Kipture', 'Kimaam', 'Irimis'],
        Kabirirsang: ['','Kabirirsang','Underit','Chesuwe'],
        Arwos: ['','Tiryo'],
        Kaplamai: ['','Kaptangunyo'],
        Tulon: ['','Kapchumba'],
        Terige: ['','Song`oliet'],
      };

      if (optionData[optionValue]) {
        optionData[optionValue].forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.value = option;
          optionElement.textContent = option;
          secondSelect.appendChild(optionElement);
        });
      }
    }
function showKap(optionValue) {
      const secondSelect = document.getElementById('sec');
      secondSelect.innerHTML = ''; // Clear the existing options

      const optionData = {
        Kapkangani: ['','Chepsonoi', 'Tindinyo', 'Kiborgok'],
      };

      if (optionData[optionValue]) {
        optionData[optionValue].forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.value = option;
          optionElement.textContent = option;
          secondSelect.appendChild(optionElement);
        });
      }
}
function showChep(optionValue) {
      const secondSelect = document.getElementById('sec');
      secondSelect.innerHTML = ''; // Clear the existing options

      const optionData = {
        Chepkumia: ['','Chepkumia', 'Cheboite'],
      };

      if (optionData[optionValue]) {
        optionData[optionValue].forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.value = option;
          optionElement.textContent = option;
          secondSelect.appendChild(optionElement);
        });
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

// fetch data
function loadData() {
     const selectedOption = document.getElementById('year').value;
            
            if (selectedOption !== "") {
                fetch(`applicants.php?option=${selectedOption}`)
                    .then(response => response.json())
                    .then(data => updateTable(data))
                    .catch(error => console.error('Error fetching data:', error));
            }
        }

        // function updateTable(data) {
        //     const dataTable = document.getElementById('sample');
        //     dataTable.innerHTML = ''; // Clear existing rows

        //     // Add table header
        //     const headerRow = dataTable.insertRow();
        //     for (const key in data[0]) {
        //         const headerCell = document.createElement('th');
        //         headerCell.textContent = key;
        //         headerRow.appendChild(headerCell);
        //     }

        //     // Add data rows
        //     data.forEach(row => {
        //         const dataRow = dataTable.insertRow();
        //         for (const key in row) {
        //             const dataCell = dataRow.insertCell();
        //             dataCell.textContent = row[key];
        //         }
        //     });
        // }
</script>

<!-- total amount -->
<h4 class="font-weight-bold">TOTAL BURSEMENT AMOUNT : <?php 
                                    $totals = $outputs = 0;
                                    if(isset($_POST['filter'])){
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
                                    if($Year =='' && $ward =='' && $location == '' && $sub_location ==''){
                                     $sql = "SELECT Amount_awarded FROM reports WHERE  location ='$location' AND ward='$ward' AND sub_location='$sub_location' AND YEAR(created_at)='$Year'";

                                     // Execute the query and get the results.
                                     $res = $conn->query($sql);
                                     
                                     // Sum the values of the price column.
                                     $totals = 0;
                                     while ($row = $res->fetch_assoc()) {
                                       $totals += $row['Amount_awarded'];
                                     }
                                     $numbers = $totals;
                                     $outputs = number_format($numbers, 0, ',', ',');
                                    
                                    echo $outputs;
                                    }
                                }
                                    if(isset($_POST['filter'])){
                                        $Year = $_POST['Year'];
                                        $ward = $_POST['ward'];
                                        $sub_location = $_POST['sub_location'];
                                    // if(empty($_POST['kapsabet_location'])&&empty($_POST['kapkangani_location'])&&empty($_POST['kilibwoni_location'])&&empty($_POST['chepkumia_location'])){
                                    //     $location_err = "Please select location";
                                    // }else{
                                    
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
                                    // }
                                    if($Year == '' && $ward !='' && $location == '' && $sub_location ==''){
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
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
                                if($Year =='' && $ward !='' && $location != '' && $sub_location ==''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }}
                                    if(isset($_POST['filter'])){
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
                                if($Year == '' && $ward !='' && $location != '' && $sub_location !=''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location'AND sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
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
                                if($Year != '' && $ward !='' && $location != '' && $sub_location !=''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$Year' AND ward='$ward' AND location='$location'AND sub_location='$sub_location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
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
                                if($Year != '' && $ward !='' && $location != '' && $sub_location ==''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$Year' AND ward='$ward' AND location='$location'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
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
                                if($Year != '' && $ward !='' && $location == '' && $sub_location ==''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND YEAR(created_at)='$Year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                if(isset($_POST['filter'])){
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
                                if($Year != '' && $ward =='' && $location == '' && $sub_location ==''){
                                    
                                        $sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$Year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        
                                        // Sum the values of the price column.
                                        $totals = 0;
                                        while ($row = $res->fetch_assoc()) {
                                          $totals += $row['Amount_awarded'];
                                        }
                                        $numbers = $totals;
                                        $outputs = number_format($numbers, 0, ',', ',');
                                       
                                       echo $outputs;
                                    }
                                }
                                    ?></h4>
                                    <!-- total amount table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Report Id</td>
                                                <td class="font-weight-bold text-center">Student Name</td>
                                                <td class="font-weight-bold text-center">Parent Name</td>
                                                <td class="font-weight-bold text-center">School Level</td>
                                                <td class="font-weight-bold text-center">School Name</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Amount Awarded</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                          <?php
                                          if(isset($_POST["filter"])){
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

                                        if($Year !='' && $ward !='' && $location != '' && $sub_location !=''){
                                            $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year' AND location='$location' AND ward='$ward' AND sub_location='$sub_location'";
                                            $results = mysqli_query($conn, $sql);
                                          while($val = $results->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['report_id'];?></td>
                                                <td><?php echo $val['student_name'];?></td>
                                                <td><?php echo $val['parent'];?></td>
                                                <td><?php echo $val['school_level'];?></td>
                                                <td><?php echo $val['school_name'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td><?php echo $val['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year =='' && $ward !='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE ward ='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year =='' && $ward !='' && $location != '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE ward='$ward' AND location ='$location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year =='' && $ward =='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year' AND ward='$ward' AND location ='$location' AND sub_location ='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year !='' && $ward =='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year !='' && $ward !='' && $location == '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year' AND ward='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}elseif($Year !='' && $ward !='' && $location != '' && $sub_location ==''){
                                            
                                            $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year' AND ward='$ward' AND location ='$location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['report_id'];?></td>
                                                <td><?php echo $item['student_name'];?></td>
                                                <td><?php echo $item['parent'];?></td>
                                                <td><?php echo $item['school_level'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['Amount_awarded'];?></td>
                                            </tr>
                                            <?php }}}?>
                                            
                                            
                                            
                                        </tbody>
                                        
                                        </table>
                                    </div>
                                    <!-- amount report code for print link -->
                                     <?php
                            if(isset($_POST['filter'])){
                                $Year = $_POST['Year'];
                                $ward = $_POST['ward'];
                                $sub_location = $_POST['sub_location'] ?? null;
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
                                $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$Year'";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?year=<?php echo $Year;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>
                            <?php
                            if(isset($_POST['filter'])){
                                $Year = $_POST['Year'];
                                $ward = $_POST['ward'];
                                $sub_location = $_POST['sub_location'] ?? null;
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
                            if($Year !='' && $ward != '' && $location != '' && $sub_location != ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' AND sub_location='$sub_location' AND YEAR(created_at)='$Year'";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?year=<?php echo $Year;?>&&location=<?php echo $location;?>&&ward=<?php echo $ward;?>&&sub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>

<?php
                            if(isset($_POST['filter'])){
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
                            if($Year =='' && $ward != '' && $location == '' && $sub_location == ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward'";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?ward=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>
                            <?php
                            if(isset($_POST['filter'])){
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
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' ";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?locationss=<?php echo $location;?>&&wardss=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>
                                              <?php
                            if(isset($_POST['filter'])){
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
                            if($Year =='' && $ward != '' && $location != '' && $sub_location != ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' ";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?location=<?php echo $location;?>&&ward=<?php echo $ward;?>&&sub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>
                                                        <?php
                            if(isset($_POST['filter'])){
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
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND YEAR(created_at)='$Year' ";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?years=<?php echo $Year;?>&&wards=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                
                                                <?php
                                            }}}?>
                                                        <?php
                            if(isset($_POST['filter'])){
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
                            if($Year !='' && $ward != '' && $location != '' && $sub_location == ''){
                                $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' AND YEAR(created_at)='$Year' ";
                                                $q = mysqli_query($conn,$sql);
                                                $c = mysqli_num_rows($q);
                                                if($c > 0){
                                            ?>
                                        <a href="print?blocations=<?php echo $location;?>&&bwards=<?php echo $ward;?>&&byears=<?php echo $Year;?>" name="print" class="btn btn-primary text-dark font-weight-bold mb-3" target="_blank">Print</a>
                                            <?php }else{
                                                ?>
                                                <span class="text-danger">There is no available data in the selection made</span>
                                                <?php
                                            }}}?>
<!-- amunt report display queries -->
<tbody>
                                          <?php
                                          if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if($year !='' && $location == '' && $ward =='' && $sub_location ==''){
                                            $sql = "SELECT * FROM applications WHERE year='$year'";
                                            $results = mysqli_query($conn, $sql);
                                          while($val = $results->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $val['id'];?></td>
                                                <td><?php echo $val['year'];?></td>
                                                <td><?php echo $val['student_fullname'];?></td>
                                                <td><?php echo $val['school_name'];?></td>
                                                <td><?php echo $val['school_type'];?></td>
                                                <td><?php echo $val['ward'];?></td>
                                                <td><?php echo $val['location'];?></td>
                                                <td><?php echo $val['sub_location'];?></td>
                                            </tr>
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            
                                            if($year =='' && $location == '' && $ward !='' && $sub_location ==''){
                                            $ward = $_POST["ward"];
                                            $sql = "SELECT * FROM applications WHERE ward ='$ward'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year =='' && $location != '' && $ward !='' && $sub_location ==''){
                                            // $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year !='' && $location == '' && $ward !='' && $sub_location ==''){
                                            $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND year ='$year'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}
                                            if(isset($_POST["filter_all"])){
                                                $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
                                            if($year !='' && $location != '' && $ward !='' && $sub_location ==''){
                                            $location = $_POST["location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location' AND year ='$year'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if(($year =='' && $location != '' && $ward !='' && $sub_location !='')){
                                            $sub_location = $_POST["sub_location"];
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND location ='$location' AND sub_location ='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}if(isset($_POST["filter_all"])){
                                            $ward = $_POST['ward'];
                                            $year = $_POST['year'];
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
                                            if($year !='' && $location != '' && $ward !='' && $sub_location !=''){
                                            $sql = "SELECT * FROM applications WHERE ward='$ward' AND year ='$year' AND location='$location' AND sub_location='$sub_location'";
                                            $resul = mysqli_query($conn, $sql);
                                          while($item = $resul->fetch_assoc()){
                                            ?>
                                             <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['year'];?></td>
                                                <td><?php echo $item['student_fullname'];?></td>
                                                <td><?php echo $item['school_name'];?></td>
                                                <td><?php echo $item['school_type'];?></td>
                                                <td><?php echo $item['ward'];?></td>
                                                <td><?php echo $item['location'];?></td>
                                                <td><?php echo $item['sub_location'];?></td>
                                            </tr>
                                            <?php }}}?>
                                        </tbody>
                                        <!-- applications report Show print link -->
                                        <?php
                            if(isset($_POST['filter_all'])){
                                    $ward = $_POST['ward'];
                                        $year = $_POST['year'];
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

                                        if($year !='' && $location == '' && $ward =='' && $sub_location ==''){
                                        $sql = "SELECT * FROM applications WHERE year ='$year'";

                                        // Execute the query and get the results.
                                        $res = $conn->query($sql);
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            ?>
                                        <a href="print?year_print=<?php echo $year;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                            <?php }else{?>
                                                <span class="text-danger">No data avalable in the selected fields</span>
                                                
                                                <?php
                                            }
                                        }}
                                        if(isset($_POST['filter_all'])){
                                            $ward = $_POST['ward'];
                                                $year = $_POST['year'];
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
        
                                        if($year =='' && $location == '' && $ward !='' && $sub_location ==''){
                                            $sql = "SELECT * FROM applications WHERE ward ='$ward'";
    
                                            // Execute the query and get the results.
                                            $res = $conn->query($sql);
                                            $count = mysqli_num_rows($res);
                                            if($count > 0){
                                                ?>
                                            <a href="print?ward_print=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                <?php }else{?>
                                                    <span class="text-danger">No data avalable in the selected fields</span>
                                                    
                                                    <?php
                                                }
                                            }}
                                            if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year =='' && $location != '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE ward ='$ward' AND location ='$location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                                <a href="print?pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        <span class="text-danger">No data avalable in the selected fields</span>
                                                        
                                                        <?php
                                                    }
                                            }}
                                            if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year =='' && $location != '' && $ward !='' && $sub_location !=''){
                                                $sql = "SELECT * FROM applications WHERE ward ='$ward' AND location ='$location' AND sub_location='$sub_location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                            <a href="print?pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>&&pbysub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        <span class="text-danger">No data avalable in the selected fields</span>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location != '' && $ward !='' && $sub_location !=''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward' AND location ='$location'AND sub_location='$sub_location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                    <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>&&pbysub_location=<?php echo $sub_location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        <span class="text-danger">No data avalable in the selected fields</span>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location != '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward' AND location ='$location'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
        <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>&&pbylocation=<?php echo $location;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        <span class="text-danger">No data avalable in the selected fields</span>
                                                        
                                                        <?php
                                                    }
                                            }}if(isset($_POST['filter_all'])){
                                                $ward = $_POST['ward'];
                                                    $year = $_POST['year'];
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
            
                                            if($year !='' && $location == '' && $ward !='' && $sub_location ==''){
                                                $sql = "SELECT * FROM applications WHERE year='$year' AND ward ='$ward'";
        
                                                // Execute the query and get the results.
                                                $res = $conn->query($sql);
                                                $count = mysqli_num_rows($res);
                                                if($count > 0){
                                                    ?>
                                        <a href="print?pbyyear=<?php echo $year;?>&&pbyward=<?php echo $ward;?>" name="print" class="btn btn-primary text-dark font-weight-bold" target="_blank">Print</a>
                                                    <?php }else{?>
                                                        <span class="text-danger">No data avalable in the selected fields</span>
                                                        <?php
                                                    }
                                            }
                                    }
                            ?>



                            <!-- removed from live print.php -->
                            <?php
                            <?php 
require("fpdf183/fpdf.php");

include 'database/connect.php';
if(!isset($_SESSION["email_admin"]) || $_SESSION["email_admin"] !== true){
    header("location:login");
    exit;
}

if(isset($_GET['location']) && isset($_GET['ward']) && isset($_GET['sub_location'])){
    $location = $_GET['location'];
    $ward = $_GET['ward'];
    $sub_location = $_GET['sub_location'];


$sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}elseif(isset($_GET['location']) && isset($_GET['ward']) && isset($_GET['year'])){
    $location = $_GET['location'];
    $ward = $_GET['ward'];
    $year = $_GET['year'];


$sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND YEAR(created_at)='$year'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND YEAR(created_at)='$year'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE location='$location' AND ward='$ward' AND YEAR(created_at)='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}elseif(isset($_GET['ward']) && isset($_GET['year'])){
    $ward = $_GET['ward'];
    $year = $_GET['year'];


$sql = "SELECT * FROM reports WHERE ward='$ward' AND YEAR(created_at)='$year'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND YEAR(created_at)='$year'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE ward='$ward' AND YEAR(created_at)='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}

elseif(isset($_GET['ward'])){
    $ward = $_GET['ward'];

    $sql = "SELECT * FROM reports WHERE ward='$ward'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['year'])){
    $year = $_GET['year'];

    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$year'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Location : All", 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['year']) && isset($_GET['ward'])&&isset($_GET['location'])&&isset($_GET['sub_location'])){
    $ward = $_GET['ward'];
    $year = $_GET['year'];

    $location = $_GET['location'];
    $sub_location = $_GET['sub_location'];

    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward' AND location='$location' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward' AND location='$location' AND sub_location='$sub_location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward' AND location='$location' AND sub_location='$sub_location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-Location : " .$sub_location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['years']) && isset($_GET['wards'])){
    $ward = $_GET['wards'];
    $year = $_GET['years'];

    // $location = $_GET['location'];
    // $sub_location = $_GET['sub_location'];

    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE YEAR(created_at)='$year' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
elseif(isset($_GET['bwards']) && isset($_GET['blocations']) && isset($_GET['byears'])){
    $ward = $_GET['bwards'];
    $location = $_GET['blocations'];
    $year = $_GET['byears'];

    $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' AND YEAR(created_at)='$year'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location' AND YEAR(created_at)='$year'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' AND YEAR(created_at)='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
elseif(isset($_GET['wardss']) && isset($_GET['locationss'])){
    $ward = $_GET['wardss'];
    $location = $_GET['locationss'];
   

    $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location'";
$results = mysqli_query($conn, $sql);

$sql = "SELECT Amount_awarded FROM reports WHERE ward='$ward' AND location='$location'";

// Execute the query and get the results.
$result = $conn->query($sql);

// Sum the values of the price column.
$total = 0;
while ($row = $result->fetch_assoc()) {
  $total += $row['Amount_awarded'];
}
$number = $total;
$output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM reports WHERE ward='$ward' AND location='$location' ";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(40, 6,"Total Amount: ".$output, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(7, 6,"S/N", 1,0, '');
$pdf->cell(35, 6,"Student Name", 1,0, '');
$pdf->cell(30, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Amount", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(7, 6,$counter, 1,0, '');
    $pdf->cell(35, 6,$val['student_name'], 1,0, '');
    $pdf->Cell(30, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['Amount_awarded'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}

if(isset($_GET['year_print'])){
    // $parent= "";
    $year = $_GET['year_print'];

    $sql = "SELECT * FROM applications WHERE year='".$year."'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE year='".$year."'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-Location : " , 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".$year, 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
// while($r = $results->fetch_assoc()){
   
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    // }
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
if(isset($_GET['ward_print'])){
    $ward = $_GET['ward_print'];

    $sql = "SELECT * FROM applications WHERE ward='$ward'";
$results = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM applications WHERE ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
   
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
if(isset($_GET['pbyward']) && isset($_GET['pbylocation'])){
    $location = $_GET['pbylocation'];
    $ward = $_GET['pbyward'];

    $sql = "SELECT * FROM applications WHERE location='$location' AND ward='$ward'";
$results = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM applications WHERE location='$location' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(40, 6,"Location : " .$location, 0,0, 'C');

$pdf->cell(18, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
   
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['pbyyear'])&& isset($_GET['pbyward'])&& isset($_GET['pbylocation'])&& isset($_GET['pbysub_location'])){
    $sub_location = $_GET['pbysub_location'];
    $location = $_GET['pbylocation'];
    $ward = $_GET['pbyward'];
    $year = $_GET['pbyyear'];

    $sql = "SELECT * FROM applications WHERE year='$year' AND sub_location='$sub_location' AND location='$location' AND ward='$ward'";
$results = mysqli_query($conn, $sql);


    $sql = "SELECT * FROM applications WHERE year='$year' AND sub_location='$sub_location' AND location='$location' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Sub-location : " .$sub_location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}elseif(isset($_GET['pbyyear'])&& isset($_GET['pbyward'])&& isset($_GET['pbylocation'])){
    $location = $_GET['pbylocation'];
    $ward = $_GET['pbyward'];
    $year = $_GET['pbyyear'];

    $sql = "SELECT * FROM applications WHERE year='$year' AND location='$location' AND ward='$ward'";
$results = mysqli_query($conn, $sql);


    $sql = "SELECT * FROM applications WHERE year='$year' AND location='$location' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(40, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"location : " .$location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
if(isset($_GET['pbyyear'])&& isset($_GET['pbyward'])){
    $year = $_GET['pbyyear'];
    $ward = $_GET['pbyward'];
    // $sub_location = $_GET['pbysub_location'];

    $sql = "SELECT * FROM applications WHERE  year='$year' AND ward='$ward'";
$results = mysqli_query($conn, $sql);


    $sql = "SELECT * FROM applications WHERE  year='$year' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(40, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"Ward : " .$ward, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
if(isset($_GET['pby_sub_location'])&& isset($_GET['pby_ward'])&& isset($_GET['pby_location'])){
    $location = $_GET['pby_location'];
    $ward = $_GET['pby_ward'];
    $sub_location = $_GET['pby_sub_location'];

    $sql = "SELECT * FROM applications WHERE sub_location='$sub_location' AND location='$location' AND ward='$ward'";
$results = mysqli_query($conn, $sql);


    $sql = "SELECT * FROM applications WHERE sub_location='$sub_location' AND location='$location' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(40, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(35, 6,"location : " .$location, 0,0, 'C');

$pdf->cell(18, 6,"Year : " , 0,0, 'C');

$pdf->cell(40, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
}
elseif(isset($_GET['pby_year']) && isset($_GET['pby_location']) && isset($_GET['pby_ward']) && isset($_GET['pby_sub_location'])){
    $year = $_GET['pby_year'];
    $location = $_GET['pby_location'];
    $ward = $_GET['pby_ward'];
    $sub_location = $_GET['pby_sub_location'];


$sql = "SELECT * FROM applications WHERE location='$location' AND year='$year' AND ward='$ward' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM applications WHERE location='$location' AND year='$year' AND ward='$ward' AND sub_location='$sub_location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Year : " .date('Y'), 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_type'], 1,0, '');
    $pdf->cell(30, 6,$val['parent'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['location_by']) && isset($_GET['ward_by']) && isset($_GET['sub_location_by'])){
    // $year = $_GET['by_year'];
    $location = $_GET['location_by'];
    $ward = $_GET['ward_by'];
    $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : ".$ward .'    Sub-location :' .$sub_location, 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['location_by']) && isset($_GET['ward_by'])){
    // $year = $_GET['by_year'];
    $location = $_GET['location_by'];
    $ward = $_GET['ward_by'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : ".$ward .'    Location :' .$location, 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['location_by']) && isset($_GET['ward_by']) && isset($_GET['year_by'])){
    $year = $_GET['year_by'];
    $location = $_GET['location_by'];
    $ward = $_GET['ward_by'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward' AND year='$year'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE location='$location' AND ward='$ward' AND year='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : ".$ward. '    Location :' .$location, 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['ward_by'])){
    // $year = $_GET['by_year'];
    // $location = $_GET['location_by'];
    $ward = $_GET['ward_by'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE ward='$ward'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE ward='$ward'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : ".$ward, 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['year_by'])){
    // $year = $_GET['by_year'];
    // $location = $_GET['location_by'];
    $year = $_GET['year_by'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE year='$year'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE year='$year'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : All", 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['school'])){
    // $year = $_GET['by_year'];
    // $location = $_GET['location_by'];
    $school = $_GET['school'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE school_name='$school'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE school_name='$school'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : All", 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['location_by'])){
    // $year = $_GET['by_year'];
    $location = $_GET['location_by'];
    // $ward = $_GET['ward_by'];
    // $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE location='$location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE location='$location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : All", 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
if(isset($_GET['sub_location_by'])){
    // $year = $_GET['by_year'];
    // $location = $_GET['location_by'];
    // $ward = $_GET['ward_by'];
    $sub_location = $_GET['sub_location_by'];


$sql = "SELECT * FROM students WHERE sub_location='$sub_location'";
$results = mysqli_query($conn, $sql);

// $sql = "SELECT Amount_awarded FROM reports WHERE location='$location' AND ward='$ward' AND sub_location='$sub_location'";

// // Execute the query and get the results.
// $result = $conn->query($sql);

// // Sum the values of the price column.
// $total = 0;
// while ($row = $result->fetch_assoc()) {
//   $total += $row['Amount_awarded'];
// }
// $number = $total;
// $output = number_format($number, 0, ',', ',');

// if(isset($_POST['print'])){
    $sql = "SELECT * FROM students WHERE sub_location='$sub_location'";
    $res = mysqli_query($conn,$sql);


    $counter = 0; 
    $pdf = new FPDF('P','mm',array(150,250));
    $pdf->AddPage();

    // Set font and text color
    $imagePath = ('images/nandi.png'); // Replace with the actual image path
    $pdf->Image($imagePath, 60,1,-450); 
    // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');

$pdf->setFont('Arial','B',9);

$pdf->cell(50, 3,"", 0,1, '');

$pdf->cell(35, 6,"Constituency: Emgwen", 0,0, 'C');

$pdf->cell(60, 6,"Ward : All", 0,0, 'C');

$pdf->cell(30, 6,"Year: ".date('Y'), 0,1, 'C');

$pdf->cell(50, 1,"", 0,1, '');

$pdf->setFont('Arial','B',8);
$pdf->cell(1, 4,"", 0,0, '');
$pdf->cell(6, 6,"S/N", 1,0, '');
$pdf->cell(25, 6,"Student Name", 1,0, '');
$pdf->cell(35, 6,"School Name", 1,0, '');
$pdf->cell(32, 6,"School Level", 1,0, '');
$pdf->cell(30, 6,"Parent Name", 1,1, '');
// $pdf->cell(40, 6,"Month Updated", 1,1, '');
$pdf->setFont('Arial','',11);


$pdf->setFont('Arial','',8);
while($val = $res->fetch_assoc()){ 
    
    // Add content to the PDF
    $counter++;
    $pdf->cell(1, 4,"", 0,0, '');
    $pdf->cell(6, 6,$counter, 1,0, '');
    $pdf->cell(25, 6,$val['student_fullname'], 1,0, '');
    $pdf->Cell(35, 6,$val['school_name'], 1,0, '');
    $pdf->Cell(32, 6,$val['school_level'], 1,0, '');
    $pdf->cell(30, 6,$val['parent_guardian_name'], 1,1, ''); //Output each record, 0 indicates no border, 1 indicates new line
                // Check if we have printed 10 rows, then start a new page
    
}
if ($pdf->GetY() >= 200) {
$pdf->AddPage();
 // Set font and text color
 $imagePath = ('images/nandi.png'); // Replace with the actual image path
 $pdf->Image($imagePath, 60,1,-450); 
 // $pdf->Image("{{asset('images/logo.png')}}",65,10,-300);

$pdf->cell(50, 20,"", 0,1, '');
$pdf->setFont('Arial','B',12);
$pdf->cell(120, 6,"COUNTY GOVERNMENT OF NANDI", 0,1, 'C');
$pdf->setFont('Arial','B',10);
$pdf->cell(120, 6, "P.O BOX 40-30100", 0, 1, 'C');
$pdf->cell(120, 6, "info@emgwen.go.ke", 0, 1, 'C');
}
    // Output the PDF (you can choose to save it to a file or send it as a response)
    $pdf->Output();
      
}
?>