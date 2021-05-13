<?php
/**
 * function.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * Date: 06.02.2018
 */
include_once "config.php";

//Определение города и старны по IP адрессу
function getCountryFromIP() {
    $getCountry = file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']);
    $getCountryParse = json_decode ($getCountry);
    return $getCountryParse;
}

function getUsers($dbConn) {
	$stmt = $dbConn->query('SELECT * FROM users GROUP BY id');
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>