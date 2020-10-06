<?php
/**
 * header.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 */
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.png"/>
	
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- Normalize CSS -->
    <link href="assets/css/normalize.css" rel="stylesheet">
    	
	<!-- Custom CSS -->
	<link href="assets/css/style.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <title>Персональный сайт портфолио</title>
  </head>
  <body>
    
	<!-- Navigation -->	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
		<div class="container">	
			<a class="navbar-brand" href="/"><img src="assets/img/logo.svg" width="47px" height="42px"></a>
		  
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="top_menu">
			<ul class="navbar-nav ml-auto">			  			  
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Портфолио
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					    <a class="dropdown-item" href="web_proj/index.php">Web-проекты</a>
					    <a class="dropdown-item" href="dev_app/index.php">Разработка приложений</a>				  
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">Об авторе</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Контакты</a>
				</li>
			</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>