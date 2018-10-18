<?php
/**
 * 404.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 */    
	include_once 'header.php';
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12"></br>
                <ol class="breadcrumb">
                    <li><a href="index.php">Главная</a></li>
                    <li class="active">404</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h3>404 Страница не найдена</h3>
                    <p>Возможно Вы попытались загрузить несуществующую или удаленную страницу.</br>
					Перейти на <a href="index.php">главную страницу</a></p>		
				</div>
            </div>
        </div>

        <hr>

<?php
	include_once 'footer.php';
?>