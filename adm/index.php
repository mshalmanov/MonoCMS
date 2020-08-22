<?php
/**
 * Форма авторизаций
 *
 * Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2017
 */

    session_start();
    include_once dirname(dirname(__FILE__)) . '/include/config.php';
			
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
	
    //Проверка на авторизацию пользователя
    if (isset($_SESSION['user_login']))
    {
        header("location: dashboard.php");
        exit();
    } 
    elseif ( isset($_POST['submit']) )
    {
        //$login = trim($_POST['username']);
        $login = trim($_POST['email']);
					
        // Выводим из БД запись, у которой логин равен веденному
        $stmt = $db->prepare("SELECT user_email, user_password FROM users WHERE user_email = '$login'");        
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
        // Сравниваем пароли		
		if (password_verify( trim($_POST['password']), $row['user_password'])) {
			$_SESSION['user_login'] = $row['user_email'];
            header('Location: dashboard.php');
            exit();
		} else {
			echo $login_error = ('<h3 class= "alert alert-danger text-center">Не корректо введен логин или пароль!<h3>');			 
		}    
    }
	
	if (isset($_SESSION['user_login']))
    {
        header("location: dashboard.php");
        exit();
    } 
    elseif ( isset($_POST['submit']) )
    {
        //$login = trim($_POST['username']);
        $login = trim($_POST['email']);
					
        // Выводим из БД запись, у которой логин равен веденному
        $stmt = $db->prepare("SELECT user_email, user_password FROM users WHERE user_email = '$login'");        
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
        // Сравниваем пароли
        if ($row['user_password'] == md5(trim($_POST['password'])) )
        {
            //$_SESSION['user_login'] = $row['user_login'];
            $_SESSION['user_login'] = $row['user_email'];
            header('Location: dashboard.php');
            exit();
        } else {
            $login_error = ('<h3 class= "alert alert-danger text-center">Не корректо введен логин или пароль!<h3>');
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title>Форма входа</title>
	
	<!-- favicon -->
	<link rel="shortcut icon" href="../favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">
    <div class="row">
        <h1 align = "center">Форма входа</h1>		
        <form action="index.php" method="post" class="well">
            <?php echo $login_error; ?>
			<div class="form-group">
                <div class="input-group mb-2 mb-sm-0">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" name="email" placeholder="Логин">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2 mb-sm-0">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" name="submit">Войти</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>