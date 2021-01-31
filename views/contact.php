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
require_once dirname(dirname(__FILE__)).'/include/function.php';
require_once dirname(dirname(__FILE__)).'/include/validator.php';

$validator = new Validator();
$validator->set_error_delimiters('<div class="error">', '</div>');

//Задаем правила валидации
$rules = array(
    array(
        'field' => 'userName',
        'label' => 'Ваше имя',
        'rules' => array(
            'trim' => '', //Обрезаем пробелы по бокам
            'strip_tags' => '', // Удаляем HTML и PHP теги
            'required' => 'Поле %s обязательно для заполнения'
        )
    ),
    array(
        'field' => 'userEmail',
        'label' => 'Ваш e-mail адрес',
        'rules' => array(
            'trim' => '',
            'required' => 'Поле %s обязательно для заполнения',
            'valid_email' => 'Поле %s должно содержать правильный email-адрес'
        )
    ),
    array(
        'field' => 'userUrl',
        'label' => 'URL адрес сайта',
        'rules' => array(
            'trim' => '',
            'valid_url' => 'Поле %s должно содержать правильный URL адрес'
        )
    ),
    array(
        'field' => 'userText',
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
if($validator->run()) {

    //e-mail адрес на которую приходить уведомления с формы
    $to = 'darcman@mail.ru';

    //e-mail адрес с которой будут приходить уведомления
    $infoMail = "info@". $_SERVER['HTTP_HOST'];

    $from = "=?UTF-8?b?" . base64_encode($validator->postdata('userName')) . "?=";
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
    <!-- .container -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <nav aria-label="breadcrumb"><br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Об авторе</li>
            </ol>
        </nav>

        <div class="col-md-8 jumbotron">
            <h3>Контакты</h3>

            <?=(!empty($message))? '<div class="errors">'.$message.'</div>': ''?>
            <form action="" method="post" class="form">
                <div <?=(!empty($errors['userName']))? 'class="error_field"': '';?>
                    <label>Ваше имя:</label>
                    <input type="text" class = "text" name="userName" value="<?=$validator->postdata('userName');?>" />
                </div>
                <div <?=(!empty($errors['userEmail']))? 'class="error_field"': '';?><
                    <label>Ваш e-mail адрес:</label>
                    <input type="text" class = "text" name="userEmail" value="<?=$validator->postdata('userEmail');?>" />
                </div>
                <div <?=(!empty($errors['userUrl']))? 'class="error_field"': '';?>
                    <label>URL адрес сайта:</label>
                    <input type="text" class = "text" name="userUrl" value="<?=$validator->postdata('userUrl');?>" />
                </div>
                <div class="area<?=(!empty($errors['userText']))? ' error_field': '';?>">
                    <label>Текст сообщения:</label>
                    <textarea rows="5" maxlength="70" style="resize:none" class = "textarea" name="userText"><?=$validator->postdata('userText');?></textarea>
                </div>
                <div <?=(!empty($errors['keystring']))? 'class="error_field"': '';?>
                    <label class="captcha">Введите цифры изображенные на картинке:</label>
                    <div class="capth_images"><?php require 'include/captcha/captcha.php';?></div>
                    <input type="text" class = "captchaText" name="keystring" maxlength="5"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                </div>
            </form>
        </div>
    </div>
    <!-- .container -->
<?php
//Подключение подвала
include_once "footer.php";
?>