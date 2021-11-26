<?php
session_start();
// require "../functions/database_functions.php";

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    
    <link  rel="stylesheet" href="css/normalize.css" />
    <link  rel="stylesheet" href="css/fawsome.min.css" />
    <link  rel="stylesheet" href="css/googleicons.css" />
    <link type='text/css' rel='stylesheet' href='css/mainen.css' />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    

<div class="wrapper">
    <header class="main main_navigation">
<a href="javascript:;" data-menu-status="false" class="menu_switch "><i class="fa fa-bars"></i></a>
            <h1 class="navbar-left"><a href="index.php"><i class="fa fa-shopping-services"></i>Home</a></h1>
            <div class="user_menu_container">
                <a href="javascript:;" class="language_switch user">
                    <span>
                        <?php 

                        if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        }else{

                        } ?>
                    </span>
                </a>

       </div>
   </header>
 
       <nav class="main_navigation ">
        <ul class="app_navigation">
            <li class=""><a href="services.php"><i class="fa fa-dashboard"></i> Services</a></li>
            <li class=""><a href="customers.php"><i class="fa fa-dashboard"></i> Customers</a></li>
            <li class=""><a href="admin_catogres.php"><i class="fa fa-dashboard"></i>Catogres</a></li>
            
        </ul>
    </nav>


<div class="action_view ">
<div class="container">