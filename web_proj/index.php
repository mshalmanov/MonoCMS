<?php	
    include_once dirname(dirname(__FILE__)) . '/include/config.php';	
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- favicon -->
	<link rel="shortcut icon" href="../favicon.png"/>
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- Normalize CSS -->
    <!-- <link href="../assets/css/normalize.css" rel="stylesheet"> -->
    	
	<!-- Custom CSS -->
	<link href="../assets/css/style.css" rel="stylesheet">
	
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
			<a class="navbar-brand" href="/"><img src="../assets/img/logo.svg" width="47px" height="42px"></a>
		  
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
					    <a class="dropdown-item" href="../web_proj/index.php">Web-проекты</a>
					    <a class="dropdown-item" href="../dev_app/index.php">Разработка приложений</a>				  
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../about.php">Об авторе</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contact.php">Контакты</a>
				</li>
			</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	
	<div class="main">
		<!-- Page Content -->
		<div class="container">

			<!-- Page Heading/Breadcrumbs -->
			<nav aria-label="breadcrumb"><br>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../index.php">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">Web-проекты</li>
				</ol>
			</nav>			

			<!-- Projects Row -->
			<div class="row">
			
				<?php
					$stmt = $db->prepare("SELECT * FROM articles WHERE section_id = 2 ORDER BY `articles`.`id` ASC;");
					$stmt->execute();

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				
				<div class="col-md-4 img-portfolio">
					<div class="fall-item fall-effect">
						<img src='<?php echo $row['artic_img']; ?>'>
						<div class="mask">
							<h2><?php echo $row['aric_title']; ?></h2>
							<p><?php echo $row['artic_description']; ?></p>
							Дата добавления: <?php echo $row['artic_data']; ?><br /><br />	
							<a href="<?php echo $row['artic_link']; ?>" target="_blank" class="btn btn-primary">Перейти на сайт</a>
						</div>				
					</div>
					<!-- <a href="portfolio-item.php?id=<?//= $row['id']; ?>">Перейти</a> -->
				</div>		
					
				<?php 
					}
				?>
					
			</div>			
			<!-- /.row -->

			<!-- Pagination -->
			<!-- <div class="row text-center">
				<div class="col-lg-12">
					<ul class="pagination">
						<li>
							<a href="#">&laquo;</a>
						</li>
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">5</a>
						</li>
						<li>
							<a href="#">&raquo;</a>
						</li>
					</ul>
				</div>
			</div> -->
			<!-- /.row -->	
				
		</div>
		<!-- /.container -->
	</div>	
	
	<!-- Footer -->		
	<footer>		
		<div class="col-lg-12 text-center lead">
			<p><a href="/">Персональный сайт-портфолио</a> 2011 - <?php echo date('Y'); ?> .г</p>
		</div>
	</footer>	
	<!-- /Footer -->
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>	
	
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>