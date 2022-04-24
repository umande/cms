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
							<a href="customer_1.php">
								<i class="la la-users" style="color: #00ff7f;"></i>
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
			<!-- <div class="main-panel" style="background: #87ceeb;"> -->
			<div class="main-panel" style="background: #87ceeb;">
				<div class="content">
					<div class="container-fluid">
						<!-- <h4 class="page-title">Component</h4> -->
						<div class="row">
							<!-- componeent here -->
							<div class="col-md-4">
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
														$sl = "SELECT id_company FROM owner WHERE owner_email = '$curent_em'";
														$q = mysqli_query($conn,$sl) or die("un expected error");
														$cmp_id = mysqli_fetch_assoc($q);
														$cmp_id = (int)$cmp_id['id_company'];
														$query = "SELECt * FROM customer WHERE company_id = $cmp_id";
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
							<div class="col-md-4">
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
							<div class="col-md-4">
								<div class="card card-stats card-warning">
									<div class="card-body">
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
														$sl = "SELECT id_owner FROM owner WHERE owner_email = '$curent_em'";
														$q = mysqli_query($conn,$sl) or die("un expected error");
														$own_id = mysqli_fetch_assoc($q);
														$own_id = (int)$own_id['id_owner'];

														$query = "SELECt * FROM worker WHERE owner_id = $own_id";
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
							
							<!-- end here -->
						</div>
					</div>
				</div>
			</div>
			<!-- end of pannel or container -->
<?php 
	require "dashfoot.php";
?>