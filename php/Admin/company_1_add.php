<?php 
	require "../db/connection.php";
    require "../sanitization.php";
    // $company=$certificate=$first_name=$second_name=$last_name=$email=$address=$phone=$description=$areaname;
	require "dashhed.php";
	$error = new SplFixedArray(11);
     if(isset($_POST['update1'])){

        $company = mysqli_real_escape_string($conn, dataSanitizations($_POST['company']));
        $certificate = mysqli_real_escape_string($conn, dataSanitizations($_POST['certificate']));
        // $photo = mysqli_real_escape_string($conn, dataSanitizations($_POST['photo']));
        $first_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['first_name']));
        $second_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['second_name']));
        $last_name = mysqli_real_escape_string($conn, dataSanitizations($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, dataSanitizations($_POST['email']));
        $address = mysqli_real_escape_string($conn, dataSanitizations($_POST['address']));
        $phone = mysqli_real_escape_string($conn, dataSanitizations($_POST['phone']));
        $sx = $_POST['optionsRadios'];
        $description = mysqli_real_escape_string($conn, dataSanitizations($_POST['description']));
        $areaname = mysqli_real_escape_string($conn, dataSanitizations($_POST['areaname']));
        $fname = $_FILES['fileupload']['name'];
        $fsize = $_FILES['fileupload']['size'];
        $ftemp = $_FILES['fileupload']['tmp_name'];
        $er = $_FILES['fileupload']['error'];
        
        $allowed = array("jpg","jpeg","png","gif");
        $endi = strtolower($fname);
        $endi = explode(".",$endi);
        $endi = end($endi);
        // $endi = strtolower(end(explode(".",$fname)));

        if(empty($company)){
            $error[0] = "enter company name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$company)) {
            $error[0] = "Only letters and white space allowed";
          }
        if(empty($certificate)){
            $error[1] = "enter certificate";
        }

        $new_name = uniqid("",true);
        if(in_array($endi,$allowed)){
            if($fsize < 5000000){
                if(!$er){
                    
                }else{
                    $error[2] = "error sending";
                }
            }else{
                $error[2] = "file to rage";
            }
            
        }else{
            $error[2] = "this file is not an image";
        }
        
        if(empty($fname)){
            $error[2] = "upload image";
        }
        if(empty($first_name)){
            $error[3] = "enter first name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
            $error[3] = "Only letters and white space allowed";
          }
        if(empty($second_name)){
            $error[4] = "enter second name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$second_name)) {
            $error[4] = "Only letters and white space allowed";
          }
        if(empty($last_name)){
            $error[5] = "Enter last name";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
            $error[5] = "Only letters and white space allowed";
        }
        if(empty($email)){
            $error[6] = "Enter email";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[6] = "Invalid email format";
          }
        if(empty($address)){
            $error[7] = "enter address";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
            $error[7] = "Only letters and white space allowed";
          }
        if (!preg_match("/^[0]{1}[0-9]{9}+$/",$phone)) {
            $error[8] = "Enter valid phone number";
        }
        if(empty($phone)){
            $error[8] = "enter phone number";
        }
        if(empty($description)){
            $error[9] = "enter company description";
        }
        if(empty($areaname)){
            $error[10] = "chose area name";
        }
        

        $query5 = "SELECT id_area FROM area WHERE district = '$areaname'";
        $query5 = mysqli_query($conn,$query5);
        $idar = mysqli_fetch_assoc($query5);
        $idr = intval($idar['id_area']);
        $GLOBALS['exart'] = 0;
        foreach($error as $k => $val){
            if($val == NULL){
                $exart+=1; 
            }
        }
        if(isset($error) && $exart == 11){

            move_uploaded_file($ftemp,'../../design/img/'.$new_name.'.'.$endi);
            $photo = "$new_name.$endi";
            
            $updt = "INSERT INTO company(company_name,company_certificate,company_photo,company_description,id_area) VALUE('$company','$certificate','$photo','$description',$idr)";
            $query = mysqli_query($conn,$updt) or die("companny error");

            $update = "INSERT INTO owner(owner_first_name,owner_second_name,owner_last_name,owner_email,owner_phone,owner_address,sex) VALUE('$first_name','$second_name','$last_name','$email','$phone','$address','$sx')";
            $query1 = mysqli_query($conn,$update) or die("erro query");
            
            $qid = "SELECT id_company FROM company WHERE company_name = '$company' AND company_certificate = '$certificate'";
            $id = mysqli_query($conn,$qid);
            $id = mysqli_fetch_assoc($id);
            $idd = $id['id_company'];
            $idc = "UPDATE owner SET id_company = $idd WHERE owner_first_name = '$first_name' AND owner_email = '$email'";
            $query3 = mysqli_query($conn,$idc);

            if($query && $query1 && $query3){
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
						<div class="row">
							<!-- componeent here -->
                            <div class="col-md-12">
                                <div class="card justify-content-center" style="background: #87ceeb;border-color: #87ceeb;">
                                <div class="col-md-12">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="company_1.php"><button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-mail-reply" id="fd"></span></button></a>
                                    </h4>
                                        <h4 class="panel-title">
                                            Register Company
                                        </h4>
                                    </div>
                                <div class="col-md-12">
									<div class="card-body col-md-12">
                                        
									    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" enctype="multipart/form-data" id="form">
                                            <!--  -->
                                            <div class="row">
                                                <!--  -->
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="text">Company Name</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($company)){echo $company;} ?>" name="company" id="cname" placeholder="eg. Dew carwash">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[0]; }?></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Certificate</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($certificate)){echo $certificate;} ?>" name="certificate" id="certi" placeholder="eg. Td63d733">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[1]; }?></div>
                                            </div>
                                            <div class="form-group">
												<label for="exampleFormControlFile1">Company Photo</label>
												<input type="file" class="form-control-file" name="fileupload" id="pht" style="background-color: #87ceeb;">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[2]; }?></div>
                                            </div>
                                            <div class="form-group">
												<label for="solidSelect">Area</label>
												<select class="form-control input-solid" name="areaname" id="area" > 
                                            <?php 
                                                if(!empty($areaname)){
                                                    ?>
                                                    <option <?php $areaname;?>><?php echo $areaname;?></option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <option value="">--Choose Area--</option>
                                                    <?php
                                                    $query4 = "SELECT * FROM area";
                                                    $query4 = mysqli_query($conn,$query4);
                                                    while($area = mysqli_fetch_assoc($query4)){
                                                    ?>
                                                        <option <?php $area['district'];?>><?php echo $area['district'];?></option>
                                                <?php
                                                }
                                            }  
                                            ?>
                                            </select>
                                            <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[10]; }?></div>
											</div>
                                            <div class="form-group">
                                                <label for="text">First Name</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($first_name)){echo $first_name;} ?>" name="first_name" id="fnam" placeholder="eg. habibu">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[3]; }?></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">Second Name</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($second_name)){echo $second_name;} ?>" name="second_name" id="snam" placeholder="eg. jumanne">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[4]; }?></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Last Name</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($last_name)){echo $last_name;} ?>" name="last_name" id="lnam" placeholder="eg. mhangwa">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[5]; }?></div>
                                            </div>
                                            </div>
                                            <!--  -->
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="text">Email</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($email)){echo $email;} ?>" name="email" id="em" placeholder="eg. habibujumane80@gmail.com">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[6]; }?></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">Phone</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($phone)){echo $phone;} ?>" name="phone" id="ph" placeholder="eg. 0752932680">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[8]; }?></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">Address</label>
                                                <input type="text" class="form-control form-control-sm" value="<?php if(!empty($address)){echo $address;} ?>" name="address" id="add" placeholder="eg. mianzini">
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[7]; }?></div>
                                            </div>
                                            
                                            <div class="form-group">
												<label for="comment">Discription</label>
												<textarea class="form-control" rows="5" value="<?php if(!empty($description)){echo $description;} ?>" name="description" id="des">
                                                
												</textarea>
                                                <div class="err" style="color: red;"><?php if(!empty($error)){echo $error[9]; }?></div>
											</div>
                                            
                                            <div class="form-check">
                                                <label>Gender</label><br/>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="optionsRadios" value="male" id="sx" checked>
                                                    <span class="form-radio-sign">Male</span>
                                                </label>
                                                <label class="form-radio-label ml-3">
                                                    <input class="form-radio-input" type="radio" name="optionsRadios" value="female" id="sx">
                                                    <span class="form-radio-sign">Female</span>
                                                </label>
                                                <div class="card-action">
                                                    <button class="btn btn-success mt-3 form-control" name="update1">Submit</button>
                                                    <!-- <input type="submit" class="btn btn-success mt-3 form-control" name="update1" id="submit" value="Submit"> -->
                                                </div>
                                            </div>
                                            </div>
                                                <!--  -->
                                            </div>
                                            <!--  -->  
                                        </form>
                                        <script src="../../design/inputv.js"></script>
									</div>
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