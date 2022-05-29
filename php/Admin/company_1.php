<?php 
	require "../db/connection.php";
	require "dashhed.php";

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
					<div class="container-fluid" style=" margin-top: -20px;">
						<!-- <h4 class="page-title">Component</h4> -->
						<div class="row" >
							<!-- componeent here -->
                            <div class="col-md-12">
							<div class="card" style="background: #87ceeb;border-color: #87ceeb;">
									<div class="card-body" style="padding-top: 0px;">
										<div class="panel panel-primary filterable">
												<div class="panel-heading">
													<h3 class="panel-title">
														<button class="btn btn-xs btn-filter float-md-right" id="flt" title="filter table"><span class="glyphicon glyphicon-filter la la-filter" id="fd"></span></button>
													</h3>
												</div>
												<div class="panel-heading">
													<h3 class="panel-title">
														<a href="company_1_add.php"><button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-plus-circle" id="fd"></span></button></a>
													</h3>
												</div>
												<div class="panel-heading">
													<h3 class="panel-title">
														Company List
													</h3>
												</div>
											<div class="table-responsive">
												<table class="table table-hover table-striped mt-3">
												<?php 
													$q1 = "SELECT * FROM company JOIN owner ON company.id_company = owner.id_company JOIN area ON area.id_area = company.id_area WHERE owner.role <> 'Admin'";
													$result = mysqli_query($conn,$q1);
													

													if(mysqli_num_rows($result)>0){

														?>
													<thead>
														<tr class="filters" style="background-color:#2e8b57;">
															<th><input type="text" class="form-control" placeholder=" No." disabled></th>
															<th><input type="text" class="form-control" placeholder=" Company name" disabled></th>
															<th><input type="text" class="form-control" placeholder=" Certificate" disabled></th>
															<th><input type="text" class="form-control" placeholder=" Place" disabled></th>
															<th><input type="text" class="form-control" placeholder=" Owner." disabled></th>
															<th><input type="text" class="form-control" placeholder=" Workers" disabled></th>
															<th class="td-actions text-center" style="color: black;">Action</th>
														</tr>
													</thead>
													<tbody>
													<?php
														$sn=1;
														while($company=mysqli_fetch_assoc($result)){
														
															$wrk = $company['id_company'];
															$q2 = "SELECT role,COUNT(owner_id) AS wn FROM owner JOIN worker ON id_owner = owner_id WHERE id_company = $wrk";
															$cmpwrk = mysqli_query($conn,$q2);
															$cmpwrk = mysqli_fetch_assoc($cmpwrk);
														?>
														<tr id="<?php echo$company['id_company'];?>">
															<td scope="row" id="tfont"><?php echo $sn++?></td>
															<td id="tfont"><?php echo $company['company_name']; ?></td>
															<td id="tfont"><?php echo $company['company_certificate']; ?></td>
															<td id="tfont"><?php echo $company['district']; ?></td>
															<td id="tfont"><?php echo $company['owner_first_name']; ?></td>
															<td id="tfont"><?php echo $cmpwrk['wn']; ?></td>
															<!-- <td id="tfont" class="td-actions text-center"><a href="company_1_edit.php?update=<?php echo$company['id_company'];?>"><i class="la la-edit" title="Edit"></i></a> <button class="remove"><i class="la la-times text-danger" title="Remove"></i</button class="remove"></td> -->
															<td id="tfont" class="td-actions text-center"><a href="company_1_edit.php?update=<?php echo$company['id_company'];?>"><i class="la la-edit" title="Edit"></i></a> <a href="#"><i class="la la-times text-danger remove" title="Remove"></i</a></td>
															
														</tr>
														
														<?php
															
														}  }
														?>
													</tbody>
												</table>
												<p id="rc">No.of Rows : <span id="rowcount"></span></p>
												<script>
												function checkval(){1==$("tbody tr:visible").length&&"No result found"==$("tbody tr:visible td").html()?$("#rowcount").html("0"):$("#rowcount").html($("tr:visible").length-1)}$(document).ready(function(){$("#rowcount").html($(".filterable tr").length-1),$(".filterable .btn-filter").click(function(){var t=$(this).parents(".filterable"),e=t.find(".filters input"),l=t.find(".table tbody");1==e.prop("disabled")?(e.prop("disabled",!1),e.first().focus()):(e.val("").prop("disabled",!0),l.find(".no-result").remove(),l.find("tr").show()),$("#rowcount").html($(".filterable tr").length-1)}),$(".filterable .filters input").keyup(function(t){if("9"!=(t.keyCode||t.which)){var e=$(this),l=e.val().toLowerCase(),n=e.parents(".filterable"),i=n.find(".filters th").index(e.parents("th")),r=n.find(".table"),o=r.find("tbody tr"),d=o.filter(function(){return-1===$(this).find("td").eq(i).text().toLowerCase().indexOf(l)});r.find("tbody .no-result").remove(),o.show(),d.hide(),d.length===o.length&&r.find("tbody").prepend($('<tr class="no-result text-center"><td colspan="'+r.find(".filters th").length+'">No result found</td></tr>'))}$("#rowcount").html($("tr:visible").length-1),checkval()})});
												</script>
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
			<script type="text/javascript">
				function reset () {
					$("#toggleCSS").attr("href", "../../design/lib/themes/alertify.default.css");
					alertify.set({
						labels : {
							ok     : "OK",
							cancel : "Cancel"
						},
						delay : 5000,
						buttonReverse : false,
						buttonFocus   : "ok"
					});
				}
				$(".remove").click(function(){
					var id = $(this).parents("tr").attr("id");
					// if(alertify.confirm('Are you sure you want to delete this record permanet?')){
						alertify.confirm("Are you sure you want to delete this record permanet?", function (e) {
							if (e) {
								$.ajax({
									url: 'company_1_delete.php',
									type: 'GET',
									data: {id : id},
									error: function() {
										alertify.alert('something is wrong');
									},
									success: function(data){
										$("#"+id).remove();
										alertify.alert("Record removed successfully");
									}

								});
								location.reload();
								return false;
								// alertify.alert("Successful AJAX after OK");
							} else {
								alertify.alert("Your Cancel!");
							}
					});
				});

			</script>
<?php 
	require "dashfoot.php";
?>




						