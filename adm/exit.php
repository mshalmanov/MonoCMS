<?php
/**
* Выход из панели управления
*/

session_start();
unset ($_SESSION['logSESS']);
session_destroy();
header("Location: /index.php");
exit();
?>