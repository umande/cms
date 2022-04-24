<?php 
	require "dashhed.php";

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
						<li class="nav-item active">
							<a href="request_1.php">
								<i class="la la-cart-arrow-down"></i>
								<p>Request</p>
								<span class="badge">3</span>
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
						<div class="row"> 
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
													<button class="btn btn-xs float-md-left" id="flt1" ><span class="la la-plus-circle" id="fd"></span></button>
												</h3>
											</div>
											
										<div class="table-responsive">
											<table class="table table-hover table-striped mt-3">
												<thead>
													<tr class="filters" style="background-color:#2e8b57;">
														<th><input type="text" class="form-control" placeholder=" No." disabled></th>
														<th><input type="text" class="form-control" placeholder=" Full name" disabled></th>
														<th><input type="text" class="form-control" placeholder=" User name" disabled></th>
														<th><input type="text" class="form-control" placeholder=" Place" disabled></th>
														<th><input type="text" class="form-control" placeholder=" Company" disabled></th>
														<th><input type="text" class="form-control" placeholder=" Status." disabled></th>
														<th class="td-actions text-center" style="color: black;">Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="tfont" scope="row">1</td>
														<td id="tfont">Table cell</td>
														<td id="tfont">Table cell</td>
														<td id="tfont">Table cell</td>
														<td id="tfont">Table cell</td>
														<td id="tfont">Table cell</td>
                                                        <td id="tfont" class="td-actions text-center"><a href="http://"><i class="la la-edit" title="Edit"></i></a> <a href="http://"><i class="la la-times text-danger" title="Remove"></i</a></td>
													</tr>
													
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
							<!-- end here -->
						</div>
					</div>




				</div>
			</div>
			
			<!-- end of pannel or container -->
<?php 
	require "dashfoot.php";
?>