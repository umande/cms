<?php 
require "php/login.php";

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" href="./design/css/bootstrap.min.css">
	<script src="./design/js/core/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="./design/style.css">

</head>
<body>
<div class="form" id="form">
  <form action="" method="post">
      <h6>LOGIN </h6>
    <div class="field email">
        <div class="icon"></div>
        <input class="input" id="email" type="text" name="username" placeholder="Email"/>
    </div>
    <div class="field password">
        <div class="icon"></div>
        <input class="input" id="password" type="password" name="password" placeholder="Password"/>
    </div>
    <button class="button" id="submit" name="login">LOGIN
        
    </button><small><?php foreach($errors as $erro)echo $erro."</bt>"; ?></small>

  </form>
</div>
    <!-- <div class="main-panel"> -->
      <!-- <div class="content"> -->
        <!-- <div class="container-fluid">
          <div class="row justify-content-center vh-50">
        
            <div class="col-lg-3 mx-auto">
              <div class="card card-block d-table-cell align-middle">
									<div class="card-header">
										<div class="card-title">Base Form Control</div>
									</div>
									<div class="card-body d-flex flex-column align-items-center">
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email" class="form-control" id="email" placeholder="Enter Email">
											<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" placeholder="Password">
										</div>
										<div class="card-action">
											<button class="btn btn-success">Submit</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</div>
                </div>
            </div>
          </div>
        </div> -->
      <!-- </div> -->
    <!-- </div> -->

</body>
<script src="./design/js/Filter.js"></script>

<script src="./design/js/core/jquery.3.2.1.min.js"></script>
<script src="./design/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="./design/js/core/bootstrap.min.js"></script>
<script src="./design/js/style1.min.js"></script>
</html>