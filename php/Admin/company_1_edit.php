<?php 
	require "../db/connection.php";
    require "../sanitization.php";
	require "dashhed.php";
	
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
     
        $select="SELECT * FROM company WHERE id_company = $id";
    
        $result = mysqli_query($conn,$select);
    
       if(mysqli_num_rows($result)){
           $company = mysqli_fetch_assoc($result);
       }

        $cmpOwn = $company['id_company'];
        $q3 = "SELECT * FROM owner WHERE id_company = $cmpOwn";
        $owncmp = mysqli_query($conn,$q3);
        $owncmp = mysqli_fetch_assoc($owncmp);
        $ido = $owncmp['id_owner'];
    
     }
     $error = new SplFixedArray(9);

     if(isset($_POST['update1'])){
        global $cmpOwn;
        global $ido;
        $ido = $ido;
        $id = $cmpOwn;

        $company = mysqli_real_escape_string($conn, dataSanitizations($_POST['company']));
        $certificate = mysqli_real_escape_string($conn, dataSanitizations($_POST['certificate']));
        // $photo = mysqli_real_escape_string($conn, dataSanitizations($_POST['photo']));
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $address = mysqli_real_escape_string($conn, dataSanitizations($_POST['address']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $sx = mysqli_real_escape_string($conn, dataSanitizations($_POST['optionsRadios']));
        $description = mysqli_real_escape_string($conn, dataSanitizations($_POST['description']));
        
        if(empty($company)){
            $error[0] = "enter company name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$company)) {
            $error[0] = "Only letters and white space allowed";
          }
        if(empty($certificate)){
            $error[1] = "enter certificate";
        }
        if(empty($first_name)){
            $error[2] = "enter first name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
            $error[2] = "Only letters and white space allowed";
          }
        if(empty($second_name)){
            $error[3] = "enter second name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$second_name)) {
            $error[3] = "Only letters and white space allowed";
          }
        if(empty($last_name)){
            $error[4] = "Enter last name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
            $error[4] = "Only letters and white space allowed";
        }
        if(empty($email)){
            $error[5] = "Enter email";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[5] = "Invalid email format";
          }
          if(empty($address)){
            $error[6] = "enter address";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
            $error[6] = "Only letters and white space allowed";
          }
        if (!preg_match("/^[0]{1}[0-9]{9}+$/",$phone)) {
            $error[7] = "Enter valid phone number";
        }
        if(empty($phone)){
            $error[7] = "enter phone number";
        }
        if(empty($description)){
            $error[8] = "enter address";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$description)) {
            $error[8] = "Only letters and white space allowed";
        }
       
        $GLOBALS['exart'] = 0;
        foreach($error as $k => $val){
            if($val == NULL){
                $exart+=1; 
            }
        }
      
        if(isset($error) && $exart == 9){
            $updt = "UPDATE company SET company_name = '$company', company_certificate = '$certificate', company_description = '$description' WHERE company.id_company = $id";
            $query = mysqli_query($conn,$updt) or die("companny error");

            $update = "UPDATE owner SET owner_first_name = '$first_name', owner_second_name = '$second_name', owner_last_name = '$last_name', owner_email = '$email', owner_phone = '$phone', owner_address = '$address', sex = '$sx'  WHERE owner.id_owner = $ido";
            $query1 = mysqli_query($conn,$update) or die("erro query");
        
            $msg = "";
            if($query1 && $query){
                // header('Location: company_1.php');
                ?>
                <script>location = "company_1.php";</script>
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
						<li class="nav-item active">
							<a href="company_1.php">
								<i class="la la-car"></i>
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
					<div class="container-fluid">
						<!-- <h4 class="page-title">Component</h4> -->
						<div class="row">
							<!-- componeent here -->
                            <div class="col-md-12">
                                <div class="card justify-content-center" style="background: #87ceeb;border-color: #87ceeb;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a href="company_1.php"><button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-mail-reply" id="fd"></span></button></a>
                                        </h3>
                                        <h4>Edit Company</h4>
                                    </div>
                                <div class="col-md-12">
									<div class="card-body col-md-12">
									    <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text">Company Name</label>
                                                        <?php
                                                            if(!empty($company['company_name'])){ 
                                                        ?>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="company" value="<?php echo $company['company_name']; ?>">
                                                        <?php 
                                                            }else if(empty($company['company_name'])){
                                                        ?>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="company" value="<?php echo $company; ?>">
                                                        <?php    
                                                        } ?>
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[0]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Certificate</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="certificate" value="<?php if(!empty($company['company_certificate'])){echo $company['company_certificate'];}else{ echo $certificate;} ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[1]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">First Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="first_name" value="<?php echo $owncmp['owner_first_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[2]; }?></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">Second Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="second_name" value="<?php echo $owncmp['owner_second_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[3]; }?></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">Last Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="last_name" value="<?php echo $owncmp['owner_last_name']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[4]; }?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Email</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="email" value="<?php echo $owncmp['owner_email']; ?>">
                                                        <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[5]; }?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="text">Phone</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="phone" value="<?php if(!empty($owncmp['owner_phone'])){echo $owncmp['owner_phone'];}else{echo $phone;} ?>">
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[7]; }?></div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text">Address</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="address" value="<?php echo $owncmp['owner_address']; ?>">
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[6]; }?></div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="comment">Discription</label>
                                                            <?php
                                                            if(!empty($company['company_description'])){ 
                                                                ?>
                                                            <textarea class="form-control" id="comment" rows="5" name="description"><?php echo $company['company_description'];?>
                                                            <?php 
                                                            }else if(empty($company['company_description'])){
                                                                ?>
                                                            <textarea class="form-control" id="comment" rows="5" name="description"><?php echo $description; ?>
                                                        <?php    
                                                        } ?>
                                                            </textarea>
                                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[8]; }?></div>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <label>Gender</label><br/>
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="male" <?php echo ($owncmp['sex'] == "male") ? "checked" : "";?>>
                                                                <span class="form-radio-sign">Male</span>
                                                            </label>
                                                            <label class="form-radio-label ml-3">
                                                                <input class="form-radio-input" type="radio" name="optionsRadios" value="female" <?php echo ($owncmp['sex'] == "female") ? "checked" : "";?> >
                                                                <span class="form-radio-sign">Female</span>
                                                            </label>
                                                            <div class="card-action">
                                                                <button class="btn btn-success mt-3 form-control" name="update1">update</button>
                                                            </div>
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