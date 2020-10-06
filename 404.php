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
    <div class="main">
		<!-- .container -->
		<div class="container">
			
			<!-- Page Heading/Breadcrumbs -->
			<nav aria-label="breadcrumb"><br>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">404</li>
				</ol>
			</nav>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="jumbotron">
						<h3>404 Страница не найдена</h3>
						<p>Возможно Вы попытались загрузить несуществующую или удаленную страницу.</br>
						Перейти на <a href="/">главную страницу</a></p>		
					</div>
				</div>
			</div>	
			
		</div>
		<!-- .container -->
	</div>	

<?php
	include_once 'footer.php';
?>