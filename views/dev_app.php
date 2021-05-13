<?php
    include_once dirname(dirname(__FILE__)) . '/include/config.php';
    include_once 'header.php';
?>

	<div class="main">
		<!-- .container -->
		<div class="container">

			<!-- Page Heading/Breadcrumbs -->
			<nav aria-label="breadcrumb"><br>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">Разработка приложений</li>
				</ol>
			</nav>		

			<!-- Project One -->
			<?php
				$stmt = $dbConn->prepare("SELECT * FROM articles WHERE section_id = 3 ORDER BY `articles`.`id` ASC;");
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
			?>
			<div class="jumbotron">
			<div class="panel-body">
				<p> На данной странице я буду выкладывать программы разработанные мною. Данная страничка будет обновляться и дополняться по мере накопления и написания программ. Данные программы можно скачать и опробывать в ознакомительных целях.</br>
				Если вы хотите помочь автору в разработке и доработке данных программ или высказать какие нибуть пожелания по поводу программ опубликованных на данном сайте вы можете связаться со  мной по этой <a href="../about.php" style="color: #000;">ссылке</a>. Я не применно буду рад обсудуить с вами вопросы касательно разработанных программ.</p>			
			</div>
			
			<div class="row">
				<div class="col-md-7">                
						<img class="img-fluid img-hover" src="<?php echo $row['artic_img']; ?>" alt="">                
				</div>
				
				<div class="col-md-5">
					<h3><?php echo $row['artic_title']; ?></h3>                
					<p><?php echo $row['artic_description']; ?></br>
					Дата добавления: <?php echo $row['artic_data']; ?></p>								
					<a class="btn btn-primary" href="<?php echo $row['artic_link']; ?>" target="_blank">Скачать</i></a>
				</div>
			</div>
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