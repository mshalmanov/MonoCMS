<?php
	// Выводить все ошибки
	ini_set ('error_reporting', E_ALL);
	$title = "Загрузка файла";

    $uloadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
	$fileTypes = array('image/gif', 'image/png', 'image/jpeg');
	$uploadFileSize = 204800; // 200 КБ
	
	if( isset($_POST['submit']))
	{       		
		if (!in_array($_FILES['upload_file']['type'], $fileTypes)) {
            die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
        }

        if ($_FILES['upload_file']['size'] > $uploadFileSize) {
            die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
		}

		if (copy($_FILES['upload_file']['tmp_name'], $uloadDir . $_FILES['upload_file']['name'])) {
			echo 'Файл загружен';
            //$uploading_file = $_SERVER['HTTP_HOST'].'/uploads/'.$_FILES['upload_file']['name'];
            //echo "<p><img src ='$uploading_file' width='10%' height='25%'></p>";
		} else {
			echo 'Ошибка загрузки';
		}
	}
?>
<title><?php echo $title; ?></title>
    <p align='center'><?php echo $title; ?></p>
    <form action="" method="POST" enctype="multipart/form-data">
        Выберите файл для загрузки: <input type="file" name="upload_file">
        <input type="submit" name="submit" value="Загрузить файл">
    </form>