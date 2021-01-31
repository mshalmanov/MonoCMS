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
    <header id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slider/slider1.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/slider2.jpg" class="d-block w-100">
            </div>
        </div>

        <!--<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a> -->
    </header>

    <div class="main">
        <!-- .container -->
        <div class="container">

            <div class="row">
                <div class="col-lg-0">
                    <h1 class="page-header text-center">
                        <p>Добро пожаловать на персональный сайт-портфолио.</p>
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

        </div>
        <!-- .container -->
    </div>
<?php
include_once "footer.php";
?>