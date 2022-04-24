<?php 
	require "../db/connection.php";
    require "../sanitization.php";
	require "dashhed.php";
	
     if(isset($_POST['customer_add'])){

        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $sex = mysqli_real_escape_string($conn, dataSanitizations($_POST['optionsRadios']));
        $type_vehicle = mysqli_real_escape_string($conn, dataSanitizations($_POST['type_vehicle']));
        $pnumber = mysqli_real_escape_string($conn, dataSanitizations($_POST['pnumber']));
        $time = mysqli_real_escape_string($conn, dataSanitizations($_POST['time']));
        
        $sl = "SELECT id_company FROM owner WHERE owner_email = '$curent_em'";
        $q = mysqli_query($conn,$sl) or die("un expected error");
        $cmp_id = mysqli_fetch_assoc($q);
        $cmp_id = (int)$cmp_id['id_company'];

         $update = "INSERT INTO customer(customer_first_name,customer_second_name,customer_last_name,customer_phone,sex,company_id) VALUE('$first_name','$second_name','$last_name','$phone','$sex',$cmp_id)";
         $update1 = "INSERT INTO vehicle(vehicle_owner_number,vehicle_brand) VALUE('$pnumber','$type_vehicle')";
         $query = mysqli_query($conn,$update) or die("error query2");
         $query1 = mysqli_query($conn,$update1) or die("error query1");
    
         if($query && $query1){
            // header("location:customer_1.php"); 
            ?>
            <script>location = "customer_1.php";</script>
            <?php 
         }
         
    }

?>
			<ul class="nav">
						<li class="nav-item">
							<a href="index.php">
								<i class="la la-dashboard" style="color: #00ff7f;"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="customer_1.php">
								<i class="la la-users"></i>
								<p>Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="worker_1.php">
								<i class="la la-users" style="color: #00ff7f;"></i>
								<p>Workers</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="request_1.php">
								<i class="la la-cart-arrow-down" style="color: #00ff7f;"></i>
								<p>Request</p>
								<span class="badge badge-success">3</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- pandelll or container -->
			<div class="main-panel" style="background: #87ceeb;">
				<div class="content">
					<div class="container-fluid" >
						<!-- <h4 class="page-title">Component</h4> -->
						<div class="row">
							<!-- componeent here -->
                            <div class="col-md-12">
                                <div class="card justify-content-center" style="background: #87ceeb;border-color: #87ceeb;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a href="customer_1.php"><button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-mail-reply" id="fd"></span></button></a>
                                        </h3>
                                        <h4 class="panel-title">
                                            Register Customer
                                        </h4>
                                    </div>
                                <div class="col-md-12">
									<div class="card-body col-md-12">
									    <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text">First Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. habibu" name="first_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Middle Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. jumanne" name="second_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Last name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. mhangwa" name="last_name">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                            <label for="text">Phone</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. 0752932680" name="phone">
                                                     </div>
                                                    
                                                    <div class="form-check">
                                                            <label>Gender</label><br/>
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="male">
                                                                <span class="form-radio-sign">Male</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="female">
                                                                <span class="form-radio-sign">Female</span>
                                                            </label>
                                                        </div>
                                                </div>

                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="text">Type of Vehicle</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. toyota IST" name="type_vehicle">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="text">Plate Number</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. T 102 VVX" name="pnumber">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text">Time</label>
                                                            <input type="datetime-local" class="form-control form-control-sm" id="smallInput" name="time">
                                                        </div>
                                            
                                                        
                                                        <div class="card-action">
                                                            <button class="btn btn-success mt-3 form-control" name="customer_add">submit</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>
											
									</div>
								</div>
                        </div>

							<!-- end here -->
</div>
						</div>


					</div>
				</div>
			</div>
			<!-- end of pannel or container -->
<?php 
	require "dashfoot.php";
?>