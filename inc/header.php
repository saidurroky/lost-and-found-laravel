<?php
include ("config/config.php");
include ("lib/Database.php");
include ("helpers/Format.php");
include ('lib/Session.php');
Session::init();
?>
<?php
	$db = new Database();
	$fm = new Format();
?>	
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <section id="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-7 logo">
                    <a href="index.php"><img src="img/lostandfound-logo.png"></a>
                </div>
				
                <div class="col-md-5">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                
								<li class="nav-item active pull-right">
                                    <a class="nav-link" href="index.php">Home </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="report.php">REPORT</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="NoticeBoard.php">notice board</a>
                                </li>
								 <?php 
									if(isset($_GET['action']) && $_GET['action'] == "logout"){

										Session::destroy();
									}
								?>
								
								<?php if(Session::get('id')==true){?>
									<li class="nav-item active">
                                    <a class="nav-link" href="?action=logout">Sign out</a>
                                </li>
								<?php }?>
								
								
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>