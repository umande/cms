<?php 
	require "../db/connection.php";
    require "../sanitization.php";
	require "dashhed.php";
    ob_start();
	
    $error = new SplFixedArray(8);
    if(isset($_GET['w_update'])){
        $id = $_GET['w_update'];
    
     
        $select="SELECT * FROM worker WHERE id = $id";
    
        $result = mysqli_query($conn,$select);
    
       
    
       if(mysqli_num_rows($result)){
           $worker = mysqli_fetch_assoc($result);
       }
    
     }

     if(isset($_POST['worker_update'])){
        $id = $_GET['w_update'];
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $address = mysqli_real_escape_string($conn, dataSanitizations($_POST['address']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $bd = mysqli_real_escape_string($conn, dataSanitizations($_POST['bd']));
        $sx = mysqli_real_escape_string($conn, dataSanitizations($_POST['optionsRadios']));
        
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
         if(empty($email)){
             $error[3] = "Enter email";
         }
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $error[3] = "Invalid email format";
           }
         if(empty($address)){
             $error[4] = "enter address";
         }
         if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
             $error[4] = "Only letters and white space allowed";
           }
         if (!preg_match("/^[0]{1}[0-9]{9}+$/",$phone)) {
             $error[5] = "Enter valid phone number";
         }
         if(empty($phone)){
             $error[5] = "enter phone number";
         }
         if(empty($bd)){
             $error[6] = "enter date of barth";
         }
         if(empty($sx)){
            $error[7] = "enter gender";
        }
        $GLOBALS['exart'] = 0;
         foreach($error as $k => $val){
             if($val == NULL){
                 $exart+=1; 
             }
         }
         if(isset($error) && $exart == 8){
            $update = "UPDATE worker SET worker_first_name = '$first_name', worker_second_name = '$second_name', worker_last_name = '$last_name', worker_email = '$email', worker_phone = '$phone', worker_address = '$address', worker_date_of_bath = '$bd', sex = '$sx'  WHERE worker.id = $id";
       
            $query = mysqli_query($conn,$update) or die("erro query");
       
            $msg = "";
            if($query){
               // header("Location : worker_1.php"); 
               ?>
               <script>location = "worker_1.php";</script>
               <?php
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
						<li class="nav-item">
							<a href="company_1.php">
								<i class="la la-car" style="color: #00ff7f;"></i>
								<p>Carwash</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="customer_1.php">
								<i class="la la-users" style="color: #00ff7f;"></i>
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
						<li class="nav-item active">
							<a href="worker_1.php">
								<i class="la la-users"></i>
								<p>Workers</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- pandelll or container -->
			<div class="main-panel" style="background: #87ceeb;">
				<div class="content">
					<div class="container-fluid">
						<!-- <h4 class="page-title">Component</h4> -->
						<div class="row">
							<!-- componeent here -->
                            <div class="col-md-12">
                                <div class="card justify-content-center" style="background: #87ceeb;border-color: #87ceeb;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a href="worker_1.php"><button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-mail-reply" id="fd"></span></button></a>
                                        </h3>
                                        <h4 class="panel-title">
                                            Edit Worker
                                        </h4>
                                    </div>
                                <div class="col-md-12">
									<div class="card-body col-md-12">
									    <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text">First Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="first_name" value="<?php echo $worker['worker_first_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[0]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Middle Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="second_name" value="<?php echo $worker['worker_second_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[1]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Last name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="last_name" value="<?php echo $worker['worker_last_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[2]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email Address</label>
                                                        <input type="email" class="form-control form-control-sm" id="smallInput" name="email" value="<?php echo $worker['worker_email']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[3]; }?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="text">Place</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="address" value="<?php echo $worker['worker_address']; ?>">
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[4]; }?></div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text">Phone</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="phone" value="<?php echo $worker['worker_phone']; ?>">
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[5]; }?></div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text">Date of barth</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="bd" value="<?php echo $worker['worker_date_of_bath']; ?>">
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[6]; }?></div>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <label>Gender</label><br/>
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="male" <?php echo ($worker['sex'] == "male") ? "checked" : "";?>>
                                                                <span class="form-radio-sign">Male</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="female" <?php echo ($worker['sex'] == "female") ? "checked" : "";?> >
                                                                <span class="form-radio-sign">Female</span>
                                                            </label>
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[7]; }?></div>
                                                        </div>
                                                        <div class="card-action" id="card-action">
                                                            <button class="btn btn-success mt-3 form-control" name="worker_update">update</button>
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