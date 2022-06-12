<?php 
	require "../db/connection.php";
    require "../sanitization.php";
	require "dashhed.php";
	$error = new SplFixedArray(6);
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
     
        $select="SELECT customer.customer_first_name,customer.customer_second_name,customer.customer_last_name,customer.customer_phone,sex,vehicle.vehicle_owner_number,vehicle.vehicle_brand,vehicle.id_vehicle FROM customer JOIN vehicle ON customer.id_vehicle = vehicle.id_vehicle WHERE id_customer=$id";
    
        $result = mysqli_query($conn,$select);
    
       
    
       if(mysqli_num_rows($result)){
           $customer = mysqli_fetch_assoc($result);
       }
    
     }
     
     if(isset($_POST['update'])){
        $id = $_GET['update'];
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $type_vehicle = mysqli_real_escape_string($conn, dataSanitizations($_POST['type_vehicle']));
        $pnumber = mysqli_real_escape_string($conn, dataSanitizations($_POST['pnumber']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $sex = mysqli_real_escape_string($conn, dataSanitizations($_POST['optionsRadios']));
        // $booking = mysqli_real_escape_string($conn, dataSanitizations($_POST['booking']));
        if(empty($first_name)){
            $error[0] = "enter first name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
             $error[0] = "Only letters and white space allowed";
        }
        if(empty($second_name)){
             $error[1] = "enter second name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$second_name)) {
             $error[1] = "Only letters and white space allowed";
        }
        if(empty($last_name)){
             $error[2] = "Enter last name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
             $error[2] = "Only letters and white space allowed";
        }
        if (!preg_match("/^[0]{1}[0-9]{9}+$/",$phone)) {
            $error[3] = "Enter valid phone number";
        }
        if(empty($phone)){
            $error[3] = "enter phone number";
        }
        if(empty($type_vehicle)){
            $error[4] = "enter type of vehicle";
        }
        if(empty($pnumber)){
            $error[5] = "enter plate number";
        }
        $GLOBALS['exart'] = 0;
        foreach($error as $k => $val){
            if($val == NULL){
                $exart+=1; 
            }
        }
        if(isset($error) && $exart == 6){
            $update = "UPDATE customer SET customer_first_name = '$first_name', customer_second_name = '$second_name', customer_last_name = '$last_name', customer_phone = '$phone', sex = '$sex' WHERE customer.id_customer = $id";
            $update1 = "UPDATE vehicle SET vehicle_owner_number = '$pnumber',vehicle_brand = '$type_vehicle' WHERE id_vehicle=".$customer['id_vehicle'];
            $query = mysqli_query($conn,$update) or die("error query2");
            $query1 = mysqli_query($conn,$update1) or die("error query1");
        
            $msg = "";
            if($query && $query1){
                ?>
                <script>
                    // location.reload();
                    // return false;
                    window.location = "customer_1.php";
                    </script>
                <?php 
                // header("location:./customer_1.php"); 
            }
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
                                            Edit Customer
                                        </h4>
                                    </div>
                                <div class="col-md-12">
									<div class="card-body col-md-12">
									    <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text">First Name</label>
                                                    <input type="text" class="form-control form-control-sm" id="smallInput" name="first_name" value="<?php echo $customer['customer_first_name']; ?>">
                                                    <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[0]; }?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Middle Name</label>
                                                    <input type="text" class="form-control form-control-sm" id="smallInput" name="second_name" value="<?php echo $customer['customer_second_name']; ?>">
                                                    <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[1]; }?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Last name</label>
                                                    <input type="text" class="form-control form-control-sm" id="smallInput" name="last_name" value="<?php echo $customer['customer_last_name']; ?>">
                                                    <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[2]; }?></div>
                                                </div>
                                                <div class="form-check">
                                                    <label>Gender</label><br/>
                                                    <label class="form-radio-label">
                                                        <input class="form-radio-input" type="radio" name="optionsRadios" value="male" <?php echo ($customer['sex'] == "male") ? "checked" : "";?>>
                                                        <span class="form-radio-sign">Male</span>
                                                    </label>
                                                    <label class="form-radio-label ml-3">
                                                        <input class="form-radio-input" type="radio" name="optionsRadios" value="female" <?php echo ($customer['sex'] == "female") ? "checked" : "";?> >
                                                        <span class="form-radio-sign">Female</span>
                                                    </label>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control form-control-sm" id="smallInput" name="email" value="<?php echo $customer['customer_email']; ?>">
                                                </div> -->

                                                </div>
                                                <div class="col-md-6">
                                                    <!-- <div class="form-group">
                                                        <label for="text">Place</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="address" value="<?php echo $customer['customer_address']; ?>">
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="text">Phone</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="phone" value="<?php echo $customer['customer_phone']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[3]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Type of Vehicle</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. toyota IST" value="<?php if(!empty($type_vehicle)){echo $type_vehicle;}else{ echo $customer['vehicle_brand']; } ?>" name="type_vehicle">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[4]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Plate Number</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" placeholder="eg. T 102 VVX" value="<?php if(!empty($pnumber)){echo $pnumber;}else{ echo $customer['vehicle_owner_number']; }  ?>" name="pnumber">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[5]; }?></div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="text">order</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="booking" value="<?php echo $customer['id_booking']; ?>">
                                                    </div> -->
                                        
                                                    
                                                    <div class="card-action">
                                                        <button class="btn btn-success mt-3 form-control" name="update">update</button>
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