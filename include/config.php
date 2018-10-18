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

/** Настройка соединение с БД через PDO **/
$dsn = 'mysql:host=localhost;dbname=u772829079_mydb';
$dbUser = 'u772829079_admin';
$dbPass = 'NuC*7TkPUx';
$dbCharset = 'utf8';

try {
    $db = new PDO($dsn, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names $dbCharset");
}
catch (PDOException $e) {
    echo 'Не удалось подключиться!</br>';
}
?>