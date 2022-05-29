<?php 
	require "../db/connection.php";
    session_start();
	$curent_em = $_SESSION['username'];
    $curent_name = $_SESSION['name'];
	$curent_log = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>c.m.s</title>
	<link rel="shortcut icon" href="../../design/images/icon.jpg">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	
	<link rel="stylesheet" href="../../design/css/bootstrap.min.css">
	<link href="../../design/css/Filter.css" rel="stylesheet">
	<script src="../../design/js/core/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="../../design/css/style2.css">
	<link rel="stylesheet" href="../../design/lib/themes/alertify.core.css">
	<link rel="stylesheet" href="../../design/lib/themes/alertify.default.css" id="toggleCSS">


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7nkdhgPZsOlAC4b3IWDAvTm3TSIaef7w&callback=initMap"    type="text/javascript"></script>
    <script type="text/javascript" src="../../design/js/jquery.min.js"></script>
    <script>
	var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
	new google.maps.Size(50, 50), new google.maps.Point(0, 0),
	new google.maps.Point(16, 32));
	const center =  [-3.368277, 36.680892];
	var map = null;
	var currentPopup;
	var bounds = new google.maps.LatLngBounds();
	function addMarker(lat, lng, info) {
			var pt = new google.maps.LatLng(lat, lng, info);
			bounds.extend(pt);
			var marker = new google.maps.Marker({
				position: pt,
				icon: icon,
				map: map
			});
			var popup = new google.maps.InfoWindow({
				content: info,
				maxWidth: 300
			});

	google.maps.event.addListener(marker, "click", function() {
			if (currentPopup != null) {
			currentPopup.close();
			currentPopup = null;
			}
			popup.open(map, marker);
			currentPopup = popup;
	});
	google.maps.event.addListener(popup, "closeclick", function() {
			map.panTo(center);
			currentPopup = null;
	});
	}
	function initMap() {
		map = new google.maps.Map(document.getElementById("map"), {
			center: new google.maps.LatLng(-3.368277, 36.680892),
			zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false,
			mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
			},
			navigationControl: true,
			navigationControlOptions: {
			style: google.maps.NavigationControlStyle.SMALL
	  }
			});


	$.getJSON('googlescript.php', function(items)
		{
		for (var i = 0; i < items.length; i++) {
			(function(item) {
				//  addMarker(item.lat, item.lng);
				addMarker(item.lat, item.lng, item.name + ":  " + item.desc);
				})(items[i]);
			}
	});

	center = bounds.getCenter();
	map.fitBounds(bounds);
	}

</script>
	<style>
			.la{
  /* color: wh; */
			text-shadow: 1px 1px 1px black;
			}
			.nav-item :hover{
				text-decoration: none;
				color: black;
			}
			.active p{
			color: black !important;
			
			}
			.active a{
			border-left-color: #f3f4fa !important;
			background-color: #87ceeb !important;
			}
			.nav-item a:focus {
			text-decoration: none;
			color: white;
			}
			.nav-item:hover a:before{
			background: gray;
			opacity: 1;
			position: absolute;
			z-index: 1;
			width: 3px;
			height: 100%;
			content: '';
			left: 0;
			top: 0;
			}
			/*  */
			th,td{
			color: black;
			}
			.nav-item.active a i {
			color: black;
			}
			.nav-item a i{
			font-size: 23px;
			color: white;
			margin-right: 15px;
			width: 25px;
			text-align: center;
			vertical-align: middle;
			float: left;
			}
			.nav-item p::before{
			color: black;
			}
			.nav-item p::after{
			color: white;
			}
			.filters th input[type=text]:disabled::-webkit-input-placeholder{
			color: #000;
			font-size: 18px;
			background-color: #87ceeb;
			padding: 4px;
			}
			.filters th:nth-child(1) input[type=text]{
			color: #000 !important;
			width: 4em;
			background-color: #87ceeb;
			}
			.filters th input[type=text]{
			color: #000 !important;
			height: 1.7em;
			background-color: #87ceeb;
			}
			#flt{
			color: #00ff7f;
			background: #101050;
			float: right;
			margin: 0px;
			padding: 0px;
			}
			#flt1{
			color: #00ff7f;
			background: #101050;
			float: left;
			margin: 0px;
			padding: 0px;
			}
			#fd{
			font-size: 24px;
			}
			.badge{
			color: black;
			background-color: #87cef5;
			}
			.la-edit{
			color: #00ff2f;
			font-size: 20px;
			box-shadow: none;
			}
			.la-times{
			color: #00ff2f;
			font-size: 19px;
			box-shadow: none;
			}
			#dfont{
			color: white;
			font-size: 16px;
			}
			/* table{
				border-collapse: separate;
			} */
			#tfont{
			color: black;
			font-size: 17px;
			font-weight: bold;
			text-align: left;
			padding: 8px !important;
			padding-left: 12px !important;
			border: none;
			border-bottom: 2px solid black !important;			
			}
			#rc{
			color: black;
			font-size: 16px;
			font-weight: bold;
			}
			.dropdown-item:hover{
			background-color: #1A1A7D;
			}
			.card{
				padding: 1.5em .5em .5em;
				border-radius: 2em;
				text-align: center;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.2);
			}
			.card:hover{
				border-color: rgba(13, 110, 253, 0.7);
				box-shadow: 0px 0px 10px 2px rgba(13, 110, 253, 0.6);
			}
			
			.form-group{
				padding: 0px;
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
			.form-group input[type=email]{
				padding-left: 25px;
				background-color: #87ceeb;
				border: none;
				border-radius: 0px 0px 0px 20px;
				font-size: 16px;
				margin-bottom: 5px;
				border-bottom: 3px solid black;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
			}
			.form-group input[type=email]:focus{
				padding-left: 25px;
				background-color: #87ceeb;
				font-size: 16px;
				border-bottom: 3px solid black;
			}
			.form-group input[type=datetime-local]{
				padding-left: 25px;
				background-color: #87ceeb;
				border: none;
				border-radius: 0px 0px 0px 20px;
				font-size: 16px;
				margin-bottom: 5px;
				border-bottom: 3px solid black;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
			}
			.form-group input[type=datetime-local]:focus{
				padding-left: 25px;
				background-color: #87ceeb !important;
				font-size: 16px;
				border-bottom: 3px solid black;
			}
			.form-group input[type=file]{
				background-color: #87ceeb !important;
				color: black !important;
				font-size: 16px;
				border: none;
				border-radius: 0px 0px 0px 20px;
				border-left: 0PX solid black;
				margin-bottom: 5px;
				border-bottom: 3px solid black;
			}
			::-webkit-file-upload-button{
				padding: 2px;
				background-color: #7ebfda;
				border: none;
				border-radius: 0px 20px 0px 0px;
				border-right: 2px solid black;
				border-top: 2px solid black;
				margin-bottom: 5px;
			}
			.form-group textarea{
				padding-left: 10px;
				background-color: #87ceeb;
				border: none;
				border-radius: 30px 0px 0px 20px;
				border-bottom: 3px  solid black;
				border-bottom: 3px  solid black;
				border-left: 3px  solid black;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
			}
			#area{
				border: none;
				border-radius: 30px 0px 0px 20px;
				background-color: #87ceeb !important;
				/* border-color: black !important; */
				border-bottom: 3px solid black !important;
			}
			.form-group textarea:focus{
				padding-left: 10px;
				background-color: #87ceeb;
				border: none;
				border-radius: 30px 0px 0px 20px;
				border-bottom: 3px  solid black;
				border-bottom: 3px  solid black;
				border-left: 3px  solid black;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
			}
			.form-check span{
				color: black !important;
			}
			label{
				font-size: 19px !important;
			}
			label[for=text]{
				color: black !important;
				font-size: 19px !important;
				margin: 0px 0px 0px 0px !important;
			}
			label[for=email]{
				color: black !important;
				font-size: 19px !important;
				margin: 0px 0px 0px 0px !important;
			}
			.card-action button{
				border-radius: 20%;
				padding: 5px !important;
				margin: 0px !important;
				font-size: 18px !important;
				box-shadow: 0 5px 10px rgba(0, 0, 0,.1);
			}
			.card-action button:hover{
				border-radius: 20%;
				padding: 5px !important;
				margin: 0px !important;
				font-size: 18px !important;
				box-shadow: 0 5px 10px rgba(13, 110, 253, 0.4);
			}
			.prof{
				border: none;
				width: 100% !important;
				border-radius: 50% !important;
			}
			.prof img{
				border-radius: 50% !important;
				width: 100%;
				min-height: 50% !important;
			}
			.col-lg-3{
				color: black;
				font-weight: bold;
				font-size: 18px;
				font-style: italic;
				padding: 0px !important;
			}
			.col-lg-9{
				color: black;
				font-weight: bold;
				font-size: 16px;
				font-style: italic;
				padding: 0px !important;
			}
			h6{
				color: black;
				font-weight: bold;
				border: none;
				border-bottom: 2px solid black;
			}
			body{
				background-color: #87ceeb !important;
			}
			#cmp_im{
				border: none;
				width: 100% !important;
			}
			#cmp_im img{
				width: 100%;
				min-height: 30% !important;
				border-radius: 10%;
				box-shadow: 0 5px 10px rgba(13, 110, 253, 0.4);
			}
			#dc_r {
				color: #000 !important;
				padding: none !important;
				padding-top: -15px !important;
				padding: 5px !important;
				box-shadow: 0 1px 2px rgba(13, 110, 253, 0.4);
			}
			#map{
            height: 500px;
            width: 100%;
			box-shadow: 0 5px 10px rgba(13, 110, 253, 0.4);
			border-radius: 3%;
        }
			#map:hover{
				border-color: rgba(13, 110, 253, 0.7);
				box-shadow: 0px 0px 10px 2px rgba(13, 110, 253, 0.6);
        }
		#map gm-style-iw-d div{
            color: black;
        }
	</style>
	<script src="../../design/lib/alertify.min.js"></script>
	<script src="../../design/js/jquery-1.9.1.js"></script>
</head>
<body onload="initMap()">
	<div class="wrapper">
		<div class="main-header" style="background: #202C45; border-color: #202C45;">
			<div class="logo-header" style="border-color: #202C45;">
				<a href="index.php" class="logo" style="color: white;font-size: 22px;">
					<span style="color: lime;">C </span>.<span style="color: red;"> M </span>.<span style="color: silver;"> S</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg" style="background: #202C45; border-color: #202C45;">
				<div class="container-fluid" style="background: #202C45; border-color: #202C45;">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center" >
						<li class="dropdown" >
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false" ><span style="color: #ff4500; border-color: #101050;"><?php echo $curent_log; ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user" style="background: #202C45; border-color: #202C45;">
									<div class="dropdown" style="border-color: #101050;"></div>
									<a class="dropdown-item" href="../logout.php" style="color: #ff4500;"><i class="fa fa-power-off" style="border-color: #101050;"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar" style="background: #202C45; border-color: #101050;">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user" style="border-color: #101050;margin-bottom:-20px;">
						<div class="photo"  style="margin-left:20%; width:58%; height:65%; box-shadow: 1px 3px 12px #87ceeb;">
							<img src="../../design/img/user.png" style="clear:right;">
						</div>
						<div class="info" style="display: block;clear:left;padding-top:20px;">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true" style="color: #f3f4fa; margin:auto;">
								<span>
									<span class="user-level" style="text-align: center;color:#ff4500;font-size:medium;"><?php echo $curent_name; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true">
								<ul class="nav">
									<li>
										<a href="profile_1.php">
											<span class="link-collapse" style="color: #f3f4fa;">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse" style="color: #f3f4fa;">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					
					