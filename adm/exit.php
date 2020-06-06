<?php
/**
* Выход из панели управления
 *
 * Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2017
 */

error_reporting(E_ALL);
ini_set ('display_errors', 1);

session_start();
$_SESSION = array();
if (session_id() != "" || isset ($_COOKIE[session_name()]))
	setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
header("location: /index.php");

?>