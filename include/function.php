<?php
/**
 * function.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * Date: 06.02.2018
 */
include_once 'config.php';
 
//Определение города и старны по IP адрессу
function getCountryFromIP() {
    $getCountry = file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']);
    $getCountryParse = json_decode ($getCountry);
    return $getCountryParse;
}

//Вывод массива пользователей
function showUsers($db) {
	if ($stmt = $db->prepare("SELECT * FROM users")) {		
		$stmt->execute();		
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {			
			print_r ("<tbody><tr>
						<td>".$row['user_login']."</td>".
					   "<td>".$row['user_password']."</td>".
					   "<td>".$row['user_email']."</td>".
					   "<td><a href='#'>edit</a></td>".
					   "<td><a href='#'>delete</a></td>/<tr>
					  </tbody>");				
		}
	}
}
?>