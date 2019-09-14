<?php
/**
* Выход из панели управления
*/

error_reporting(E_ALL);
ini_set ('display_errors', 1);

session_start();
$_SESSION = array();
if (session_id() != "" || isset ($_COOKIE[session_name()]))
	setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
header("location: /index.php");

/*
session_start();
unset ($_SESSION['logSESS']);
session_destroy();
header("Location: /index.php");
exit(); */
?>