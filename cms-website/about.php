<?php 
    require "../php/sanitization.php";
    session_start();
    require '../php/functions.php';
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
                                <a href="service.php" class="nav-item nav-link">Service</a>
                                <a href="washingpoint.php" class="nav-item nav-link">washing point</a>
                                <a href="about.php" class="nav-item nav-link active">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                            </div>
                            <a href="#" class="nav-item nav-link" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Login</a>
                             <!-- login -->
                             <div class="modal fade" id="exampleModal"  style="border: none; margin: none;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="margin: none;">
                                    <div class="modal-content">
                                    <div class="modal-header justfy-content-center" style="background-color: #202C45; ">
                                        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="background-color: #202C45;border-color: none;">
                                        <form id="shw">
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45; border-color: none;">
                                            <label for="recipient-name" class="col-form-label" style="color: #fff;">user name</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                            <label for="recipient-name" class="col-form-label" style="color: #fff;">Password</label>
                                            <input type="password" class="form-control" id="recipient-name">
                                        </div>
                                        <div id="fc" class="form-control mb-3" style="background-color: #202C45;">
                                            <button type="submit" class="form-control btn-primary">Login</button>
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
       
        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Developer</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Thomas Olsen</h2>
                                <p>Worker</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>James Alien</h2>
                                <p>Worker</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
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
