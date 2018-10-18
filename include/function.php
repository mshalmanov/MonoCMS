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
function showUsers($mysql_conn) {	
	if ($result = mysqli_query($mysql_conn, "SELECT * FROM users")) {		
		
		while ($row = mysqli_fetch_assoc($result)) {				 
			print_r ("<tbody><tr>
						<td>".$row['user_login']."</td>".
					   "<td>".$row['user_password']."</td>".
					   "<td>".$row['user_email']."</td>/<tr>
					  </tbody>");
		}
		mysqli_free_result($result);
		mysqli_close($mysql_conn);
	} 
}
?>