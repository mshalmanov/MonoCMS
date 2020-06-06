<?php
/**
 * header.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Персональный сайт портфолио</title>
	
	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top_menu ">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="assets/img/logo.svg" width="47px" height="42px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top_menu">
                <ul class="nav navbar-nav navbar-right">               
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Портфолио <b class="caret"></b></a>
                        <ul class="dropdown-menu">                            
                             <li>
                                <a href="web_proj/index.php">Web-проекты</a>
                            </li>
							<li>
                                <a href="dev_app/index.php">Разработка приложений</a>
                            </li>		
                        </ul>
                    </li>
                    
					<li>
                        <a href="about.php">Об авторе</a>
                    </li>
					<li>
                        <a href="contact.php">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>