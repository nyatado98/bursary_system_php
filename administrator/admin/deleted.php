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