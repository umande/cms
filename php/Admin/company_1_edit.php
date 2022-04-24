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
     

     if(isset($_POST['update1'])){
        global $cmpOwn;
        global $ido;
        $ido = $ido;
        $id = $cmpOwn;

        $company = mysqli_real_escape_string($conn, dataSanitizations($_POST['company']));
        $certificate = mysqli_real_escape_string($conn, dataSanitizations($_POST['certificate']));
        $photo = mysqli_real_escape_string($conn, dataSanitizations($_POST['photo']));
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $address = mysqli_real_escape_string($conn, dataSanitizations($_POST['address']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $sx = mysqli_real_escape_string($conn, dataSanitizations($_POST['optionsRadios']));

        // $description = mysqli_real_escape_string($conn, dataSanitizations($_POST['description']));
        
        $updt = "UPDATE company SET company_name = '$company', company_certificate = '$certificate', company_photo = '$photo'  WHERE company.id_company = $id";
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
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="company" value="<?php echo $company['company_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Certificate</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="certificate" value="<?php echo $company['company_certificate']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Company Photo</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="photo" value="<?php echo $company['company_photo']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">First Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="first_name" value="<?php echo $owncmp['owner_first_name']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">Second Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="second_name" value="<?php echo $owncmp['owner_second_name']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">Last Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="last_name" value="<?php echo $owncmp['owner_last_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Email</label>
                                                        <input type="text" class="form-control form-control-sm" id="smallInput" name="email" value="<?php echo $owncmp['owner_email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="text">Phone</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="phone" value="<?php echo $owncmp['owner_phone']; ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text">Address</label>
                                                            <input type="text" class="form-control form-control-sm" id="smallInput" name="address" value="<?php echo $owncmp['owner_address']; ?>">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="comment">Discription</label>
                                                            <textarea class="form-control" id="comment" rows="5" name="description"><?php echo $company['company_description']; ?>
                                                            
                                                            </textarea>
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
                                                        </div>
                                                        <div class="card-action">
                                                            <button class="btn btn-success mt-3 form-control" name="update1">update</button>
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