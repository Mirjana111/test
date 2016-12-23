<?php

	require 'config/init.php';
	require 'include/services/xss.php';
	require 'include/services/csrf.php';

?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kavomat</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="index.php">
                    Kavomat
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
					<?php
						if(!isset($_SESSION['user_id'])){
					?>
							<li><a href="index.php">Naslovna</a></li>
					<?php
						}
						else{
					?>		
							<li><a href="dashboard.php">Nadzorna ploča</a></li>
							<li><a href="coffee-machines.php">Kavomati</a></li>
					<?php
						}
					?>
					
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
					<?php
						if(!isset($_SESSION['user_id'])){
					?>
							<li><a type="button" class="btn" data-toggle="modal" data-target="#loginModal">Prijavi se</a></li>
					<?php
						}
						else{
					?>			
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<?php
									
										echo $_SESSION['user_name'];
									
									?>
                                     <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="include/logout.php?csrf=<?php echo $_SESSION['csrf'];?>"><i class="fa fa-btn fa-sign-out"></i>Odjavi se</a></li>
                                </ul>
                            </li>
					<?php
						}
					?>
                </ul>
            </div>
        </div>
    </nav>
