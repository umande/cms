<?php 
	require "../db/connection.php";
    require "../sanitization.php";
	require "dashhed.php";
	
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
     
        $select="SELECT * FROM customer WHERE id_customer=$id";
    
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
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $address = mysqli_real_escape_string($conn, dataSanitizations($_POST['address']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        // $booking = mysqli_real_escape_string($conn, dataSanitizations($_POST['booking']));
        
         $update = "UPDATE customer SET customer_first_name = '$first_name', customer_second_name = '$second_name', customer_last_name = '$last_name', customer_email = '$email', customer_phone = '$phone', customer_address = '$address' WHERE customer.id_customer = $id";
       
         $query = mysqli_query($conn,$update) or die("erro query");
    
         $msg = "";
         if($query){
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
						<li class="nav-item">
							<a href="company_1.php">
								<i class="la la-car" style="color: #00ff7f;"></i>
								<p>Carwash</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="customer_1.php">
								<i class="la la-users"></i>
								<p>Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="request_1.php">
								<i class="la la-cart-arrow-down" style="color: #00ff7f;"></i>
								<p>Request</p>
								<span class="badge badge-success">3</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="worker_1.php">
								<i class="la la-users" style="color: #00ff7f;"></i>
								<p>Workers</p>
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
                                            Edit customer
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
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Middle Name</label>
                                                    <input type="text" class="form-control form-control-sm" id="smallInput" name="second_name" value="<?php echo $customer['customer_second_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Last name</label>
                                                    <input type="text" class="form-control form-control-sm" id="smallInput" name="last_name" value="<?php echo $customer['customer_last_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control form-control-sm" id="smallInput" name="email" value="<?php echo $customer['customer_email']; ?>">
                                                </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text">Place</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="address" value="<?php echo $customer['customer_address']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">Phone</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="phone" value="<?php echo $customer['customer_phone']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">order</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="booking" value="<?php echo $customer['id_booking']; ?>">
                                                    </div>
                                        
                                                    <div class="form-check">
                                                        <label>Gender</label><br/>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="optionsRadios" value=""  checked="">
                                                            <span class="form-radio-sign">Male</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                                                            <span class="form-radio-sign">Female</span>
                                                        </label>
                                                    </div>
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