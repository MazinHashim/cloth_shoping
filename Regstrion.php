<?php

require_once "./functions/database_functions.php";

if (isset($_POST['regstrion'])){
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$number = trim($_POST['number']);
	$password = trim($_POST['password']);
	$user =  signUpCustmer($name, $email, $number, $password, 'customers','1');
	if($user){
		session_start();
		$_SESSION['user'] = $user;
		redirct('index.php');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Clothing</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/animate.min.css">
</head>
<body>
<!--background-->
<div class="banner-agileinfo">
    <div class="bg-agile">
	<div data-wow-delay="0s" class="wow fadeInDown book-appointment">
	<h2>Regestrion</h2>
			<form action="#" method="post">
			<div class="left-agileits-w3layouts same">
				<div data-wow-delay="0s" class="wow fadeInDown gaps">
					<p>Your Name</p>
					<input type="text" name="name" placeholder="" required=""/>
				</div>	
				<div data-wow-delay="0.4s" class="wow fadeInDown gaps">
					<p>Email Id</p>
					<input type="email" name="email" placeholder="" required="" />
				</div>	
				<div data-wow-delay="0.8s" class="wow fadeInDown gaps">	
					<p>Contact Number</p>
					<input type="text" name="number" placeholder="" required=""/>
				</div>
			</div>
		
			<div data-wow-delay="1.2s" class="wow fadeInDown gaps">
			<p>Password</p>	
                <input required type="password" onkeyup='check();' id="password" name="password" maxlength="100" placeholder=" ">
            </div>
             <div data-wow-delay="1.4s" class="wow fadeInDown gaps">
			 <p>Confirm Password</p>	
                <input required type="password" onkeyup='check();' id="confirm_password" name="confirm_password" maxlength="100" placeholder="">
            </div>
              <div class="input_wrapper password" id="message">
			</div>
			<div class="right-agileinfo same">
			
			<div class="clear"></div>
				<input data-wow-delay="1.6s" class="wow fadeInDown" type="submit" name="regstrion" value="Make Regstrion">
			</form>
		</div>
   </div>
   </div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				<script src="js/wow.min.js"></script>
    			<script>new WOW().init();</script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
						  var check = function() {
	if (document.getElementById('password').value ==
	  document.getElementById('confirm_password').value) {
	  document.getElementById('message').style.color = 'green';
	  document.getElementById('message').innerHTML = 'The password is match	';
	} else {
	  document.getElementById('message').style.color = 'red';
	  document.getElementById('message').innerHTML = 'Password does not match';
	}
  }
				  </script>
			<!-- //Calendar -->

</body>
</html>