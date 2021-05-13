<?php
/*
 * config.php
 *
 * Файл настроек сайта.
 *
 * Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2017
 */

//корневой путь к cms
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/');

//показывать ошибки
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

/** Настройка соединение с БД через PDO **/
$dsn = 'mysql:host=localhost;dbname=u275787326_mydb';
$dbUser = 'u275787326_admin';
$dbPass = 'NuC*7TkPUx';
$dbCharset = 'utf8';

try {
    $dbConn = new PDO($dsn, $dbUser, $dbPass);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbConn->exec("set names $dbCharset");
}
catch (PDOException $e) {
    echo 'Не удалось подключиться!</br>';
}
?>