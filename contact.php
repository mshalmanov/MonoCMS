<?php
/**
 * contact.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 **/

session_start();
 
//Подключение шапки
include_once "header.php";
require_once 'include/function.php';
<<<<<<< HEAD
require_once 'include/validator.php';
=======

session_start();

require_once 'lib/validator.php';
>>>>>>> parent of 98cd55f... Little change

$validator = new Validator();
$validator->set_error_delimiters('<div class="error">', '</div>');

//Задаем правила валидации
$rules = array(
	array(
		'field' => 'user_name',
		'label' => 'Ваше имя',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
	array(
		'field' => 'user_email',
		'label' => 'Ваш e-mail адрес',
		'rules' => array(
                        'trim' => '',
                        'required' => 'Поле %s обязательно для заполнения',
                        'valid_email' => 'Поле %s должно содержать правильный email-адрес'
					)
	),
	array(
		'field' => 'user_url',
		'label' => 'URL адрес сайта',
		'rules' => array(
                        'trim' => '',
                        'valid_url' => 'Поле %s должно содержать правильный URL адрес'
					)
	),    
    array(
		'field' => 'text',
		'label' => 'Текст сообщения',		
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)	
		),
    array(
		'field' => 'keystring',
		'label' => 'Капча',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'required' => 'Вы не ввели цифры изображенные на картинке',
    					'valid_captcha[keystring]' => 'Вы ввели не правильные цифры с картинки'
					)
	)
);
//Устанавливаем правила валидации
$validator->set_rules($rules);
$message = '';
//Запускаем валидацию POST данных
if($validator->run()){
	
	//e-mail адрес на которую приходить уведомления с формы	
	$to = 'darcman@mail.ru'; 
	
	//e-mail адрес с которой будут приходить уведомления
	$infoMail = "info@". $_SERVER['HTTP_HOST'];
	
	$from = "=?UTF-8?b?" . base64_encode($validator->postdata('user_name')) . "?=";
	$subject = "=?UTF-8?b?" . base64_encode ("Поступил новый ответ от формы обратной связи") . "?=";	
	
	$mail_body = "Вы из - " . getCountryFromIP()->{'country'} . ", город - " . getCountryFromIP()->{'city'}.".\r\nВаш IP-адрес: " . $_SERVER['REMOTE_ADDR']."\r\n";
	//Формируем текст сообщения
	foreach($rules as $rule){
		if($rule['field'] == 'keystring') continue;
		$mail_body .= $rule['label'].': '.$validator->postdata($rule['field'])."\r\n";
	}
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "From: " . $infoMail;
	
	//Отправка сообщения
	if(mail($to, $subject, $mail_body, $header)){
		$message = '<div class="success">Спасибо, ваше сообщение успешно отправлено!</div>';
		$validator->reset_postdata(); //Очищаем форму обратной связи
	}
	else{
		$message = '<div class="error">Ваше сообщение не отправлено!</div>';
	}
}
else{
    //Получаем сообщения об ошибках в виде строки
	$message = $validator->get_string_errors();	
    //Получаем сообщения об ошибках в виде массива
	$errors = $validator->get_array_errors();
}
?>
    <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12"></br>
            <ol class="breadcrumb">
                <li><a href="index.php">Главная</a>
                </li>
                <li class="active">Контакты</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
	
	<div class="col-md-8 well">
		<h3>Контакты</h3>

	    <?=(!empty($message))? '<div class="errors">'.$message.'</div>': ''?>
	    <form action="" method="post" class="form">
			<div <?=(!empty($errors['user_name']))? 'class="error_field"': '';?>>
				<label>Ваше имя:</label>
				<input type="text" class = "text" name="user_name" value="<?=$validator->postdata('user_name');?>" />
			</div>     
			<div <?=(!empty($errors['user_email']))? 'class="error_field"': '';?>>
				<label>Ваш e-mail адрес:</label>
				<input type="text" class = "text" name="user_email" value="<?=$validator->postdata('user_email');?>" />
			</div> 
			<div <?=(!empty($errors['user_url']))? 'class="error_field"': '';?>>
				<label>URL адрес сайта:</label>
				<input type="text" class = "text" name="user_url" value="<?=$validator->postdata('user_url');?>" />
			</div>			    
			<div class="area<?=(!empty($errors['text']))? ' error_field': '';?>">
				<label>Текст сообщения:</label>
				<textarea rows="5" maxlength="70" style="resize:none" class = "textarea" name="text"><?=$validator->postdata('text');?></textarea>
			</div>     
			<div <?=(!empty($errors['keystring']))? 'class="error_field"': '';?>>
				<label class="captcha">Введите цифры изображенные на картинке:</label>
				<div class="capth_images"><?php require 'lib/captcha/captcha.php';?></div>
				<input type="text" class = "captchaText" name="keystring" maxlength="5"/>
			</div> 
			<div>    	
				<button type="submit" class="btn btn-primary">Отправить сообщение</button>
			</div>	
		</form>
	</div>
<?php
//Подключение подвала
include_once "footer.php";
?>