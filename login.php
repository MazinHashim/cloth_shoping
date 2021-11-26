<?php
session_start();
require_once "./functions/database_functions.php";
if (isset($_POST['login'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$user =  login($email,  $password);
	if($user['type'] == 'admin'){
		$_SESSION['admin'] = true;
		$_SESSION['user'] = $user;
		redirct('services.php');

	}
	if($user){
		$_SESSION['user'] = $user;
			redirct('shopping.php');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Clothing</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/animate.min.css">
</head>
<body>
	<div class="banner-agileinfo">
    <div class="bg-agile">
	<div data-wow-delay="0s" class="wow fadeInDown book-appointment">
	<h2 data-wow-delay="0s" class="wow fadeInDown">Login </h2>
			<form action="#" method="post">
			<div class="left-agileits-w3layouts same">
				<div data-wow-delay="0.4s" class="wow fadeInDown gaps">
					<p>Email Id</p>
					<input type="email" name="email" placeholder="" required="" />
				</div>	
			</div>
			<div data-wow-delay="0.8s" class="wow fadeInDown gaps">
			<p>Password</p>	
                <input required type="password"  id="password" name="password" maxlength="100" placeholder="">
            </div>
			<div class="clear"></div>
				<input data-wow-delay="1.2s" class="wow fadeInDown" type="submit" name="login" value="Login">
			</form>
		</div>
   </div>
</div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script src="js/wow.min.js"></script>
    	<script>new WOW().init();</script>
</body>
</html>