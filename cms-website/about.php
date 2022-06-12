<?php 
error_reporting(0);
session_start();
    require "weblogin.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>car wash</title>
        <link rel="shortcut icon" href="../design/images/icon.jpg">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/all.min.css" rel="stylesheet">
        <link href="lib/css/all.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
         <!-- Nav Bar Start -->
         <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <div class="container-fluid">
                        <a href="#" class="navbar-brand">MENU</a>
                            <a href="index.php">
                                    <h2 style="color: aliceblue;">Car <span>wash</span></h2>
                            </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toghle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <!-- <a href="service.php" class="nav-item nav-link">Service</a> -->
                                <a href="washingpoint.php" class="nav-item nav-link">Service point</a>
                                <a href="about.php" class="nav-item nav-link active">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                    </div>
                </nav>
        </div>
        <!-- Nav Bar End -->
       
        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <h2>About us</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="../design/img/profile.jpg" alt="Team Image" style="height: 300px;">
                            </div>
                            <div class="team-text">
                                <h2>Habibu J Muhangwa</h2>
                                <p>student of arusha technical college</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-10">
                        <div class="team-item">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia assumenda quibusdam ratione culpa repellendus quod hic dolores delectus perspiciatis optio atque cupiditate expedita quia nam, nulla aliquam officia amet? Ea.
                            Dignissimos veritatis dolor at iusto optio sapiente perferendis non accusantium amet minima, nulla officia corrupti tempora aliquam consectetur. Laboriosam voluptatem repellat distinctio ipsam expedita corrupti. Magnam nisi sed eaque accusantium?
                            Velit earum quod voluptate aliquam provident ipsa atque temporibus. Corporis pariatur temporibus aliquid explicabo autem incidunt quaerat ipsa quam dolor dolore, dolorum laboriosam, saepe eum quis non voluptatum debitis officia.
                            Voluptate iure eaque, rem aspernatur nobis maiores labore consequuntur mollitia recusandae earum explicabo. Ab fugit repudiandae, at aliquam ut aliquid doloremque dignissimos illo minus sunt. Similique sint sapiente explicabo illum!
                            Error dolor ad deleniti quasi obcaecati blanditiis iure optio inventore ratione magni quo adipisci, assumenda, eveniet perferendis accusantium quae porro facere debitis? Dicta quas harum ipsa dolores, delectus modi consectetur.
                            Dignissimos distinctio, doloribus autem quod fugit ex error optio veniam nisi aliquam culpa exercitationem nesciunt mollitia necessitatibus cumque, aperiam aut architecto dolore vitae. Quibusdam quam hic laudantium eos quidem odit?
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Team End -->

        <!-- Facts Start -->
        <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
            <div class="container">
                <div class="row justify-content-cener">
                    <div class="col-lg-4 col-md-8">
                        <div class="facts-item">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="facts-text">
                                <?php 
                                    $query = "SELECt * FROM company JOIN owner ON owner.id_company = company.id_company WHERE owner.role <> 'Admin'";
                                    $q = mysqli_query($conn,$query);
                                    $num = mysqli_num_rows($q);
                                ?>
                                <h3 data-toggle="counter-up"><?php echo $num; ?></h3>
                                <p>Service Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="facts-item">
                            <i class="fa fa-user"></i>
                            <div class="facts-text">
                                 <?php 
                                    $query = "SELECt * FROM worker";
                                    $q = mysqli_query($conn,$query);
                                    $num = mysqli_num_rows($q);
                                ?>
                                <h3 data-toggle="counter-up"><?php echo $num; ?></h3>
                                <p>Workers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="facts-item">
                            <i class="fa fa-users"></i>
                            <div class="facts-text">
                                <?php 
                                    $query = "SELECt * FROM customer";
                                    $q = mysqli_query($conn,$query);
                                    $num = mysqli_num_rows($q);
                                ?>
                                <h3 data-toggle="counter-up"><?php echo $num?></h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->


       <!-- Footer Start -->
       <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>atc, Arusha, TANZANIA</p>
                            <p><i class="fa fa-phone-alt"></i>0752932680</p>
                            <p><i class="fa fa-envelope"></i>Habibujumanne80@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="about.php">About Us</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="washingpoint.php">Service Points</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <p>&copy; 2022,ATC By <a href="#">Habibu Jumanne</a></p>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        

        <!-- JavaScript Libraries -->
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
