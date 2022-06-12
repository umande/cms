<?php 
    require "php/login.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CMS</title>
    <link rel="shortcut icon" href="./design/images/icon.jpg">
    <link rel="stylesheet" href="design/css/style.css" />
    <link href="design/lib/css/all.css" rel="stylesheet">
    <link href="design/lib/flaticon/font/flaticon.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="content">
        
        <div class="image"></div>
      </div>
      <form id="form" action="" method="post">
        <div class="title"> <h3>LOGIN</h3> </div>
        <div>
          <label for="email">User Name</label>
          <i class="far fa-user"></i>
          <input type="text" name="username" value="<?php if(!empty($username)){ echo $username; } ?>" id="email" placeholder="habibu@gmail.com" />
          <i class="fas fa-exclamation-circle failure-icon"></i>
          <i class="far fa-check-circle success-icon"></i>
          <div class="error"></div>
        </div>
        <div>
          <label for="password">Password</label>
          <i class="fas fa-lock"></i>
          <input type="password" name="password" value="<?php if(!empty($password)){ echo $password; } ?>" id="password" placeholder="Password here" />
          <i class="fas fa-exclamation-circle failure-icon"></i>
          <i class="far fa-check-circle success-icon"></i>
          <div class="error"></div>
        </div>

        <button type="submit" id="submit" name="login" >Login</button>
        <small><?php foreach($errors as $erro){echo $erro."</br>";} ?></small>
      </form>
    </div>
  </body>
  <!-- <script src="design/js/main.js"></script> -->
</html>
