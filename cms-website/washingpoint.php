<?php 
// error_reporting(0);
session_start();
    require "weblogin.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>car wash</title>
        <link rel="shortcut icon" href="../design/images/icon.jpg">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
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
        <link href="css/style.css" rel="stylesheet">
        <!-- map  -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7nkdhgPZsOlAC4b3IWDAvTm3TSIaef7w&callback=initMap"    type="text/javascript"></script>
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <script>
        // function getLocation() {
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(showPosition);
        // } else {
        //     alert("Geolocation is not supported by this browser.");
        // }
        // }
        // function showPosition(position) {
        // var lat = position.coord.latitude;
        // var lng = position.coord.longitude;
        // function mymark(){
        //     console.log(lat);
        // }
        // map.setCenter(new google.maps.LatLng(lat, lng));
        
        // }
        // var com = showPosition();
        // com.mymark();
    
        var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
        new google.maps.Size(50, 50), new google.maps.Point(0, 0),
        new google.maps.Point(16, 32));

        // console.log(navigator.geolocation);
        const center = [-3.368277, 36.680892];
        var map = null;
        var currentPopup;
        var bounds = new google.maps.LatLngBounds();
        // addMarker
        function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng, info);
                bounds.extend(pt);
                var marker = new google.maps.Marker({
                    position: pt,
                    // label: "A",
                    icon: icon,
                    map: map,
                });
                var popup = new google.maps.InfoWindow({
                    content: info,
                    maxWidth: 300
                });

        google.maps.event.addListener(popup, "closeclick", function() {
                map.setZoom(14);
                map.panTo(center);
                currentPopup = null;
        });


        //map zoom
        google.maps.event.addListener(marker, "click", function() {
            map.setZoom(17);
            map.setCenter(marker.getPosition());
			if (currentPopup != null) {
			currentPopup.close();
			currentPopup = null;
			}
			popup.open(map, marker);
			currentPopup = popup;
	});


        }
        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                // center: new google.maps.LatLng(navigator.geolocation.getCurrentPosition(function( position ){var mylatlong = position.coords.latitude + "," + position.coords.longitude;})),
                center: new google.maps.LatLng(-3.368277, 36.680892),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
        
                });
// myyyyy locatiiii
        //         const marker = new google.maps.Marker({
        //     position: showPosition,
        //     position: { lat: -3.368277, lng: 36.680892 },
        //     map: map,
        // });
////////
        // teke from data base
        $.getJSON('googlescript.php', function(items)
            {
            for (var i = 0; i < items.length; i++) {
                (function(item) {
                    //  addMarker(item.lat, item.lng);
                    addMarker(item.lat, item.lng,'<h1 id="firstHeading">'+ item.name+'</h1>' + '<h4 id="secondHeading" class="firstHeading">'+item.desc+'</h4>'+'<a href="contact.php" class="btn" data-bs-toggle="modal" data-bs-target="#myModal">request</a>');
                    })(items[i]);
                }
        });

        center = bounds.getCenter();
        map.fitBounds(bounds);
        }

</script>
<style>
        #map {
            height: 500px;
            width: 100%;
            box-shadow: 0 5px 10px rgba(13, 110, 253, 0.4);
            border-radius: 3%;
        }
        #map:hover{
            border-color: rgba(13, 110, 253, 0.7);
            box-shadow: 0px 0px 10px 2px rgba(13, 110, 253, 0.6);
        }
        .gm-style .gm-style-iw-d::-webkit-scrollbar-track,
        .gm-style .gm-style-iw-d::-webkit-scrollbar-track-piece,
        .gm-style .gm-style-iw-c,
        .gm-style .gm-style-iw-t::after {
            background: #455068;
        }
        .gm-style .gm-style-iw-c{
            text-align: center !important;
            width: 10% !important;
        }
        #firstHeading{
            color: #ff0000 !important;
        }        
        #secondHeading{
            color: #0dfa41 !important;
            font-size: 16px !important;
        }
        #myModal1{
            background: #87ceeb !important;
            border-color: #101050 !important;
            padding: 1.5em .5em .5em !important;
            border-radius: 2em !important;
            text-align: center !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0,.2) !important;
        }
        .form-group textarea{
            padding-left: 10px !important;
            background-color: #87ceeb !important;
            border: none !important;
            border-radius: 30px 0px 0px 20px !important;
            border-bottom: 3px  solid black !important;
            border-bottom: 3px  solid black !important;
            border-left: 3px  solid black !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0,.1) !important;
        }
        .form-group input[type=text]{
            padding-left: 25px;
            background-color: #87ceeb;
            border: none;
            border-radius: 0px 0px 0px 20px;
            font-size: 16px;
            margin-bottom: 5px;
            border-bottom: 3px solid black;
            box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
        }
        .form-group input[type=text]:focus{
            padding-left: 25px;
            background-color: #87ceeb;
            font-size: 16px;
            border-bottom: 3px solid black;
        }
        .form-group input[type=text]:-webkit-autofill{
            padding-left: 25px;
            background-color: #87ceeb;
            font-size: 16px;
            border-bottom: 3px solid black;
        }
        .form-group textarea:focus{
            padding-left: 10px !important;
            background-color: #87ceeb !important;
            border: none !important;
            border-radius: 30px 0px 0px 20px !important;
            border-bottom: 3px  solid black !important;
            border-bottom: 3px  solid black !important;
            border-left: 3px  solid black !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0,.1) !important;
        }
        .form-group input[type=datetime-local]{
            padding-left: 25px !important;
            background-color: #87ceeb !important;
            color: black;
            border: none !important;
            border-radius: 0px 0px 0px 20px !important;
            font-size: 16px !important;
            margin-bottom: 5px !important;
            border-bottom: 3px solid black !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0,.1) !important;
        }
        .form-group input[type=datetime-local]:focus{
            padding-left: 25px !important;
            background-color: #87ceeb !important;
            font-size: 16px !important;
            border-bottom: 3px solid black !important;
            color: black !important;
        }
        select{
            border: none !important;
            border-radius: 30px 0px 0px 20px !important;
            background-color: #87ceeb !important;
            border-color: black !important;
            border-bottom: 3px solid black !important;
        }
    </style>
    </head>

    <body onload="initMap()">
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
                                <a href="washingpoint.php" class="nav-item nav-link active">Service point</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                    </div>
                </nav>
        </div>
        <!-- Nav Bar End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="section-header text-center">
                <h2>Washing Point</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- mapp -->
                    <div id="map"></div> 
                    <!-- mapp -->
                   
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- start request -->
        <div class="modal " id="myModal">
            <div  class="modal-dialog">
                <div id="myModal1" class="modal-content ">
                    <div class="modal-header">
                        <h4 class="h4 fw-bold" style="text-align:center !important; color: green !important;">Add Request</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" style="background-color: green;">X</button>
                    </div>

                    <div class="modal-body">
                        <div class="container">


                            <form action="" method="post">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for="">Type of Vehicle</label> -->
                                            <input type="text" class="form-control" placeholder="Type of Vehicle" required>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="">Vehicle Model</label> -->
                                            <input type="text" class="form-control" placeholder="Vehicle Model" required>
                                        </div>
                                            <div class="form-group">
                                                <!-- <label for="">Plate Number</label> -->
                                                <input type="text" class="form-control" placeholder="Plate Number" required>
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="">Services</label> -->
                                                <select name="" id="" class="form-control" id="area">
                                                    <option value="">---choose services--</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                </select>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for="">Exctra Services</label> -->
                                            <select name="" id="" class="form-control" id="area">>
                                                <option value="">---choose services--</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <!-- <label for="">Date and Time</label> -->
                                            <input type="text" class="form-control" placeholder="Choose date" onfocus="(this.type='datetime-local')">
                                        </div>
                                        <div class="form-group">
                                            
                                            <textarea name="" id="" cols="25" rows="5" class="form-control">More </textarea>
                                        </div>

                                        
                                    </div>
                                    <div class="form-group">
                                            
                                        <button type="submit" class="btn btn-info form-control">Request</button>
                                    </div>
                                    
                                </div>                           
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- request end -->

        <!-- Contact Start -->
        <div class="contact">
            <div class="section-header text-center">
                <h2>Request</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- mapp -->
                    <table class="table table-hover table-striped mt-3">
                        <thead>
                            <tr style="color: red;;" >
                                <th>No.</th>
                                <th>Full name</th>
                                <th>User name</th>
                                <th>Place</th>
                                <th>Company</th>
                                <th>Status.</th>
                                <th class="td-actions text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="tfont" scope="row">1</td>
                                <td id="tfont">T</td>
                                <td id="tfont">Table</td>
                                <td id="tfont">Table</td>
                                <td id="tfont">Table</td>
                                <td id="tfont">Table</td>
                                <td id="tfont" class="td-actions text-center"><a href="http://"><i class="la la-edit" title="Edit"></i></a> <a href="http://"><i class="la la-times text-danger" title="Remove"></i</a></td>
                            </tr>
                        </tbody>
                    </table> 
                    <!-- mapp -->
                   
                </div>
            </div>
        </div>
        <!-- Contact End -->


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
        <script>
            $('#myModal').modal('toggle');
        </script>
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
        <script src="lib/infobubble.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
