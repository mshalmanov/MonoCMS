<?php
	
	// Выводить все ошибки
	ini_set ('error_reporting', E_ALL);
	
	$uloaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
	
	$file_types = array('image/gif', 'image/png', 'image/jpeg');
	
	if( isset($_POST['submit']))
	{        
		
		
		if (copy($_FILES['upload_file']['tmp_name'], $uloaddir . $_FILES['upload_file']['name'])) {
			echo 'Uploading';
		} else {
			echo 'Not uploading';
		}
		
		/*if ((!$_FILES['upload_file']['size'])) {
			echo 'Выберите файл для загрузки';
		} else {
			var_dump ($_FILES['upload_file']);
			copy($_FILES['upload_file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/uploads/' . basename($_FILES['upload_file']['name']));
			$uploading_file = $_SERVER['HTTP_HOST'].'/uploads/'.$_FILES['upload_file']['name'];
			echo "<p><img src ='$uploading_file' width='10%' height='25%'></p>";
		}*/
	}
?>
<title>Загрузка файла</title>
<p align='center'>Загрузка файла</p>
<form action="" method="POST" enctype="multipart/form-data">
Выберите файл для загрузки:<input type="file" name="upload_file">
    <input type="submit" name="submit" value="Загрузить файл">
</form>