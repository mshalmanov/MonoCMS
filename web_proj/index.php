<?php	
    include_once dirname(dirname(__FILE__)) . '/include/config.php';
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
	<link rel="shortcut icon" href="../favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">

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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img src="../assets/img/logo.png" width="47px" height="42px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">               
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Портфолио <b class="caret"></b></a>
                        <ul class="dropdown-menu">                            
                             <li>
                                <a href="../web_proj/index.php">Web-проекты</a>
                            </li> 
							<li>
                                <a href="../dev_app/index.php">Разработка приложений</a>
                            </li>	
                        </ul>
                    </li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.php">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.php">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.php">Blog Post</a>
                            </li>
                        </ul>
                    </li> -->                    
					<li>
                        <a href="../about.php">Об авторе</a>
                    </li>
					<li>
                        <a href="../contact.php">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->  
		<div class="row">
            <div class="col-lg-12"></br>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Главная</a>
                    </li>
                    <li class="active">Web-проекты</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

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
					<a href="<?php echo $row['artic_link']; ?>" target="_blank" class="btn btn-default">Перейти на сайт</a>
				</div>				
            </div>
<!--            <a href="portfolio-item.php?id=--><?//= $row['id']; ?><!--">Перейти</a>-->
		</div>		
			
		<?php 
			}
		?>
				
		</div>			
        <!-- /.row -->        

        <hr>

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

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center lead">                    
					<p><a href="../index.php">Персональный сайт-портфолио</a> 2011 - <?php echo date('Y'); ?> .г</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../assets/bootstrap/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>