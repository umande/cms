<?php 
	require "dashhed.php";

?>
			<ul class="nav">
						<li class="nav-item active">
							<a href="index.php">
								<i class="la la-dashboard"></i>
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
						<div class="row">
							<!-- componeent here -->
							<div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-car"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category" id="dfont">Carwash</p>
													<?php 
														$query = "SELECt * FROM company JOIN owner ON owner.id_company = company.id_company WHERE owner.role <> 'Admin'";
														$q = mysqli_query($conn,$query);
														$num = mysqli_num_rows($q);
													?>
													<h4 class="card-title"><?php echo $num; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category" id="dfont">Customer</p>
													<?php 
														$query = "SELECt * FROM customer";
														$q = mysqli_query($conn,$query);
														$num = mysqli_num_rows($q);
													?>
													<h4 class="card-title"><?php echo $num?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-cart-arrow-down"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category" id="dfont">Request</p>
													<?php 
														$query = "SELECt * FROM workorder";
														$q = mysqli_query($conn,$query);
														$num = mysqli_num_rows($q);
													?>
													<h4 class="card-title"><?php echo $num; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-primary">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category" id="dfont">Workers</p>
													<?php 
														$query = "SELECt * FROM worker";
														$q = mysqli_query($conn,$query);
														$num = mysqli_num_rows($q);
													?>
													<h4 class="card-title"><?php echo $num; ?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- map -->
							
							<div id="map"></div>
								
							<!-- end here -->
						</div>
					</div>
				</div>
			</div>
			<!-- end of pannel or container -->
<?php 
	require "dashfoot.php";
?>