<?php
/**
 * index.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 */	
	include_once "header.php";
?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <!-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">                
                <div class="fill" style="background-image:url('assets/img/slider/slider1.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <!-- <div class="item">
                <div class="fill" style="background-image:url('assets/img/slider/slider2.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('assets/img/slider/slider3.jpg');"></div>
                <div class="carousel-caption">                    
                </div>
            </div> -->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-0">
                <h1 class="page-header text-center">
                    Добро пожаловать на персональный сайт-портфолио
                </h1>
            </div>
            <div class="col-md-0">
                <div class="panel panel-default">                    
                    <div class="panel-body">
                        <p class="lead">Здравствуйте я Марат Шалманов и это мой сайт-портфолио. Идея на создание персонального сайта-портфолио меня натолкнула мысль о том, что человек может все, что он захочет и его возможности безграничные.
						Все началось в студенческие годы когда я учился по специальности информационные системы. На уроке web-технологии в то время я только начал изучать такие web-технологий как: HTML, CSS, JavaScript и многие другие. Мне пришла в голову идея создать свою страничку в интернете, где я смог бы показать всем свои таланты, разработки и достижения в моих увлечениях связанные с интернетом и программированием.</p>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <!-- <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header text-center">Portfolio Heading</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div> -->
        <!-- /.row -->
		
        <hr>

<?php
	include_once "footer.php";
?>