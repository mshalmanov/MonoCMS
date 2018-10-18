<?php
/**
 * Форма авторизаций
 */
    session_start();
	require dirname(dirname(__FILE__)) . '/include/config.php';   
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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
<?php
// Проверка на авторизацию пользователя
// if (isset($_SESSION['logSESS']))
if (isset($_SESSION['user_login']))
	{
		header("location: dashboard.php");
		exit();
	}

elseif ( isset($_POST['submit']) )
{
	$login = trim($_POST['username']);
	
    // Выводим из БД запись, у которой логин равен веденному
	$query = mysqli_query($mysql_conn, "SELECT user_login, user_password FROM users WHERE user_login = '$login' ");
	$data = mysqli_fetch_assoc($query);
	
	// Сравниваем пароли
	if ($data['user_password'] == md5(trim($_POST['password'])) )
	{		
		$_SESSION['user_login'] = $data['user_login'];
		header('Location: dashboard.php');
		exit();
	} else {
	      echo "<br /><h3 class='text-center text-danger'>Не корректо введен логин или пароль!<h3>";
	}
	
	mysqli_close($mysql_conn);
}
?>

<div align = "center" class="container">
	<h1 align = "center">Форма входа</h1>
	<form action="index.php" method="post">
	<div>
		<span class="glyphicon glyphicon-user"></span>
		<input class="" name="username" type="text" placeholder="Логин"/>
	</div>
	<div>
		<span class="glyphicon glyphicon-lock"></span>
		<input class="" name="password" type="password" placeholder="Пароль"/>
	</div>	
	<button class="btn btn-success" name="submit">Войти</button>
	</form>
</div>
</body>
</html>