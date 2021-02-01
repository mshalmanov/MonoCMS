<?php	
    include_once dirname(dirname(__FILE__)) . '/include/config.php';
    include_once 'header.php';
?>
	<div class="main">
		<!-- Page Content -->
		<div class="container">

			<!-- Page Heading/Breadcrumbs -->
			<nav aria-label="breadcrumb"><br>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>
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
							<h2><?php echo $row['artic_title']; ?></h2>
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

<?php
    include_once 'footer.php';
?>