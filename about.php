<?php
session_start();
$title = 'Index';
require_once './functions/database_functions.php';
$row = getservicesActive();
// var_dump($result1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Clothing Center</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Coiffeur Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
	<link rel="stylesheet" href="css/lightbox.css"> <!-- lightbox css -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
	<!-- //web-fonts -->
</head>

<body>

	<!-- banner -->
	<div id="home" class="w3ls-banner ">
		<div class="banner-agileinfo">
			<!-- header -->
			
			<nav class="navbar navbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">Clothing Center</a>
					</div>
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="#">Beauty Center</a></li> -->
						<li><a href="about.php">about as</a></li>
						</ul>
					<ul class="nav navbar-nav navbar-right">
                    
						<?php
						if(isset($_SESSION['user'])){
						echo '<li><a href="admin_signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						';
						}else{
						echo '<li><a href="Regstrion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						';}
						if(isset($_SESSION['admin'])){
							echo '<li><a href="services.php"><span class="glyphicon glyphicon-home"></span> Admin mangement</a></li>
							';
							}
						?>
					</ul>
				</div>
			</nav>
			
		</div>
	</div>
	<!-- //banner -->
	<!-- about -->
	<div class="about">
		<div class="container">
			<div class="w3layouts_about_grids">
                <div class="col-md-5 w3layouts_about_grid_left">
					<div data-wow-delay="0.5s" class="wow fadeInUp w3layouts_about_grid_left_pos">
						<img height="30px" src="images/saud.jpg" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-7 w3layouts_about_grid_right">
                <h4 data-wow-delay="1.0s" class="wow fadeInDown">Welcome To Our </h4>
					<h5 data-wow-delay="1.5s" class="wow fadeInLeft">Professional programmer</h5>
					<p> <h4 data-wow-delay="1.4s" class="wow fadeInDown">info</h4>
                    <br>
                    <h4 data-wow-delay="1.4s" class="wow fadeInDown">Saud Alothman</h4> 
                    <h4 data-wow-delay="1.6s" class="wow fadeInDown">216110535</h4> 
					<h4 data-wow-delay="1.8s" class="wow fadeInDown">216110535@pus.edu.sa</h4> 
						</p>
                   <p data-wow-delay="2s" class="wow fadeInDown">Aliquam tincidunt nisl nec urna euismodl nec. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismod,
						ullamcorper scelerisque magna vulputate. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismodl nec.
					</p>
				</div>
			</div>
		</div>
	</div><div class="about">
		<div class="container">
			<div class="w3layouts_about_grids">
                <div data-wow-delay="0.5s" class="wow fadeInUp col-md-5 w3layouts_about_grid_left">
					<div class="w3layouts_about_grid_left_pos">
						<img height="30px" src="images/osama.jpg" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-7 w3layouts_about_grid_right">
                <h4 data-wow-delay="0.6" class="wow fadeInDown">Welcome To Our </h4>
					<h5 data-wow-delay="0.5s" class="wow fadeInLeft">Professional programmer</h5>
					<p> <h4 data-wow-delay="0.8s" class="wow fadeInDown">info</h4>
                    <br>
                    <h4 data-wow-delay="0.9s" class="wow fadeInDown">Osama Hafiz Ataur Rahman</h4> 
                    <h4 data-wow-delay="1s" class="wow fadeInDown">217110563</h4> 
					<h4 data-wow-delay="1.2s" class="wow fadeInDown">217110563@pus.edu.sa</h4> 
						</p>
                    <br >
					<p data-wow-delay="1s" class="wow fadeInDown">Aliquam tincidunt nisl nec urna euismodl nec. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismod,
						ullamcorper scelerisque magna vulputate. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismodl nec.
					</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>