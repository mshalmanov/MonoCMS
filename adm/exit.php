<?php
/**
* Выход из панели управления
 *
 * Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2017
 */

session_start();
$_SESSION = array();
if (session_id() != "" || isset ($_COOKIE[session_name()]))
	setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
header("location: /");

?>