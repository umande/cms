<?php 
	require "dashhed.php";
	$Q = "SELECT * FROM owner WHERE owner_email = '$curent_em' AND owner_first_name = '$curent_name'";
	$Q1 = mysqli_query($conn,$Q);
	$prof = mysqli_fetch_assoc($Q1);
	$cm_id = $prof['id_company'];
	$QQ = "SELECT company_name,company_description,company_photo FROM company WHERE id_company = $cm_id";

	$Q2 = mysqli_query($conn,$QQ) or die("die from profile");
	$cm_n = mysqli_fetch_assoc($Q2);


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
						<li class="nav-item">
							<a href="worker_1.php">
								<i class="la la-users" style="color: #00ff7f;"></i>
								<p>Workers</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel" style="background: #87ceeb;">
				<div class="content">
					<div class="container-fluid">
					
						<div class="row justify-content-center">
							<!-- componeent here -->
                            <div class="col-md-1">
								<div  class="prof">
									<img src="../../design/img/user.png">
								</div>
                            </div>
                            <div class="col-md-4">
                            <h6 class="card-title">About Company</h6>
							<div class="row">
							<div class="col-md-6" id="dc_r"><?php echo $cm_n['company_description'];?></div>
							<div class="col-md-6" id="cmp_im"><img src="<?php echo "../../design/img/".$cm_n['company_photo'];?>" alt="" srcset=""></div>
							</div>
						</div>

                            <div class="col-md-6 align-self-center">
								<h6 class="card-title">About Person</h6>
                                <div class="card-body">
                                    <div class="row" id="dc_r">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $prof['owner_first_name']." ".$prof['owner_second_name']." ".$prof['owner_last_name']; ?></div>
                                    </div>

                                    <div class="row" id="dc_r">
                                        <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $cm_n['company_name'];?></div>
                                    </div>

                                    <div class="row" id="dc_r">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">Tanzania</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $prof['owner_address'];?></div>
                                    </div>

                                    <div class="row" id="dc_r">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $prof['owner_phone'];?></div>
                                    </div>

                                    <div class="row" id="dc_r">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $prof['owner_email'];?></div>
                                    </div>
                                </div>
                            </div>
							<!-- end here -->
						</div>
					</div>
				</div>
			</div>
			<!-- end of pannel or container -->
<?php 
	require "dashfoot.php";
?>