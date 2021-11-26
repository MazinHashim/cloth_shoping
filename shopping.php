<?php
session_start();
$title = 'Index';
require_once './functions/database_functions.php';
$row = getservicesActive();
if(!isset($_SESSION['user'])){
	redirct('login.php');
}
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
		<div class="banner-agileinfo" style="min-height: 100vh;">
			<!-- header -->
			
			<nav class="navbar navbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<a data-wow-delay="0s" class="wow fadeInLeft navbar-brand" href="index.php">Clothing Center</a>
					</div>
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="#">Beauty Center</a></li> -->
						<li data-wow-delay="0.4s" class="wow fadeInLeft"><a href="about.php">about as</a></li>
						</ul>
					<ul class="nav navbar-nav navbar-right">
                    
						<?php
						if(isset($_SESSION['user'])){
						echo '<li data-wow-delay="0.8s" class="wow fadeInLeft"><a href="admin_signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						';
						}else{
						echo '<li data-wow-delay="1.2s" class="wow fadeInLeft"><a href="Regstrion.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li data-wow-delay="1.6s" class="wow fadeInLeft"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						';}
						if(isset($_SESSION['admin'])){
							echo '<li data-wow-delay="2.0s" class="wow fadeInLeft"><a href="services.php"><span class="glyphicon glyphicon-home"></span> Admin mangement</a></li>
							';
							}
						?>
					</ul>
				</div>
			</nav>
			<div class="header">
				<div class="container">
					<div class="logo">
						<h2 data-wow-delay="0.4s" class="wow fadeInLeft"><a href="shopping.php">Welcome in Let Shopping Center</a></h2>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="wow bounceIn banner-w3ltext">
					<h2>Let Shopping<span>Clothing Center</span></h2>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about -->
	<div class="about" style="min-height: 100vh;">
		<div class="container">
			<div class="w3layouts_about_grids">
				<div class="col-md-5 w3layouts_about_grid_left">
					<div class="wow fadeInUp w3layouts_about_grid_left_pos">
						<img src="images/aa.jpg" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-7 w3layouts_about_grid_right">
					<h4 data-wow-delay="0.4s" class="wow fadeInLeft">Welcome To Our</h4>
					<h5 class="wow fadeInLeft">Professional Hair Stylers</h5>
					<p data-wow-delay="0.4s" class="wow fadeInUp">Ut porttitor ut est eu ornare. In metus dui, suscipit at viverra faucibus, accumsan at odio. Duis
						finibus sollicitudin libero, sed tempor diam euismod sed.
						Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismod, ullamcorper
						scelerisque magna vulputate. Duis finibus sollicitudin libero, sed tempor diam euismod sed. Sed
						interdum odio a finibus gravida.
						Aliquam tincidunt nisl nec urna euismodl nec. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismod,
						ullamcorper scelerisque magna vulputate. Duis finibus sollicitudin libero, sed tempor diam
						euismod sed. Sed interdum odio a finibus gravida. Aliquam tincidunt nisl nec urna euismodl nec.
					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.one-long-line {
			max-height: 220px;
			white-space: wrap;
			overflow: hidden;
			text-overflow: clip;
			transition: 2s ease-in-out !important;
			word-wrap: break-word;
		}

		.one-long-line:hover {
			overflow: visible;
			max-height: max-content;
			word-wrap: break-word;
		}
	</style>
<!-- start -->
<div class="container" style="margin-left: 0">
	<div class="row">
<?php 
foreach($row as $services) {
  ?>
	<div class="col-md-offset-1 col-md-3">
		<a href="cart.php?servers_id=<?php echo $services['id']; ?>" >
		<div class="panel panel-primary">
			<div class="panel-heading " style="max-height: max-content;">
				<div class="row">
				<h4 class="col-md-6" ><?php echo $services['name']; ?></h4>
				<h4 class="col-md-6" ><?php echo $services['price'] . "SAR"; ?></h4>
			</div>
		</div>
			<div class="panel-body">
				<img width="100%" class="img-responsive img-rounded" src="images/<?php echo $services['img_path']; ?>">
				<div class="panel-body">
					<p class="one-long-line text-justify overflow-wrap"><?php echo $services['description']; ?></p>
					
				</div>
			</div>
		</div>
		</a>
	</div>
	<?php } ?>
	<!-- end -->
	</div>
	</div>
</body>

</html>