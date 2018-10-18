<?php
	
	// Выводить все ошибки
	ini_set ('error_reporting', E_ALL);
	
	if( isset($_POST['submit']))
	{
		if ((!$_FILES['upload_file']['size'])) {
			echo 'Выберите файл для загрузки';							
		} else {			
			var_dump ($_FILES['upload_file']);
			copy($_FILES['upload_file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/adm/' . basename($_FILES['upload_file']['name']));
			$uploading_file = $_FILES['upload_file']['name'];			
			echo "<p><img src ='$uploading_file' width='10%' height='25%'></p>";
		}		
	}
?>
<title>Загрузка файла</title>
<p align='center'>Загрузка файла</p>
<form enctype="multipart/form-data" action="" method="POST">
	<input type="file" name="upload_file"><input type="submit" name="submit" value="Загрузить файл">
</form>