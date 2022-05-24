<?php 
// error_reporting(0);
session_start();
    require "weblogin.php";
    // require '../php/functions.php';
    
?>
<!DOCTYPE html>
<html lang="en">
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
                            <?php 
                                if($_SESSION['$logsension'] == true){
                                    ?>
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <a href="service.php" class="nav-item nav-link active">Service</a>
                                <a href="washingpoint.php" class="nav-item nav-link">washing point</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                                    <?php
                                }else{
                                    ?>
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                                    <?php
                                }
                                
                                ?>
                            </div>
                            <?php 
                                if($_SESSION['$logsension'] == true){
                                    ?>
                                    <a href="weblogout.php" class="nav-item nav-link" style="float: right;">logout</a>
                                    <?php
                                }else{
                                    ?>
                                    <a href="#" class="nav-item nav-link" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Login</a>
                                <?php
                                }
                            
                            ?>
                             <!-- login -->
                             <div class="modal fade" id="exampleModal"  style="border: none; margin: none;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="margin: none;">
                                    <div class="modal-content">
                                    <div class="modal-header justfy-content-center" style="background-color: #202C45; ">
                                        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="background-color: #202C45;border-color: none;">
                                        <form id="shw" method="POST">
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                            <label for="recipient-name" class="col-form-label" style="color: #fff;">user name</label>
                                            <input type="text" class="form-control" id="recipient-name" name="username">
                                        </div>
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                            <label for="recipient-name" class="col-form-label" style="color: #fff;">Password</label>
                                            <input type="password" class="form-control" id="recipient-name" name="password">
                                        </div>
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                            <button type="submit" class="form-control btn-primary" name="login">Login</button>
                                            <small><?php foreach($errors as $erro){echo $erro."</br>";} ?></small>
                                        </div>
                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer" style="background-color: #202C45;">
                                    <p>click <a href="#" class="tooltip-test" title="registe if you dont have any account" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">here</a> to register</p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                             <!-- login -->

                             <!-- register -->
                             <div class="modal fade" id="register"  style="border: none; margin: none;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="margin: none;">
                                    <div class="modal-content">
                                    <div class="modal-header justfy-content-center" style="background-color: #202C45; ">
                                        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="background-color: #202C45;border-color: none;">
                                        <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">First Name</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Second Name</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Last Name</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Email</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Phone no.</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Enter Password</label>
                                                    <input type="password" class="form-control" id="recipient-name">
                                                </div>
                                                <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                                    <label for="recipient-name" class="col-form-label" style="color: #fff;">Confirm Password</label>
                                                    <input type="password" class="form-control" id="recipient-name">
                                                </div>
                                                <label for="recipient-name" class="col-form-label" style="color: #202C45;"></label>
                                                <button type="submit" class="form-control btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                        
                                    </div>
                                    <div class="modal-footer" style="background-color: #202C45;">
                                    </div>
                                    </div>
                                </div>
                                </div>
                             <!-- register -->
                        </div>
                    </div>
                </nav>
        </div>
        <!-- Nav Bar End -->

        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Washing Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash-1"></i>
                            <h3>Exterior Washing</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash"></i>
                            <h3>Interior Washing</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-vacuum-cleaner"></i>
                            <h3>Vacuum Cleaning</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-seat"></i>
                            <h3>Seats Washing</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-service"></i>
                            <h3>Window Wiping</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-service-2"></i>
                            <h3>Wet Cleaning</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash"></i>
                            <h3>Oil Changing</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-brush-1"></i>
                            <h3>Brake Reparing</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <h2>What our clients say</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                <?php 
                $compl = "SELECT * FROM complain";
                $compl = mysqli_query($conn,$compl) or die("card error");
                if(mysqli_num_rows($compl)>0){
                    while($cpl = mysqli_fetch_assoc($compl)){
                ?>
                    <div class="testimonial-item">
                        <!-- <img src="" alt="Image"> -->
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <p>
                               <?php  echo $cpl['complain'];?>
                            </p>
                        </div>
                    </div>
                    <?php 
                    }
                }
                ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-7">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>atc, Arusha, TANZANIA</p>
                            <p><i class="fa fa-phone-alt"></i>0752932680</p>
                            <p><i class="fa fa-envelope"></i>Habibujumanne80@gmail.com</p>
                            <div class="footer-social">
                                <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="about.php">About Us</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="service.php">Our Service</a>
                            <a href="washingpoint.php">Service Points</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Full Name">
                                <input class="form-control" placeholder="Email">
                                <button class="btn btn-custom">Submit</button>
                            </form>
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
