<?php 

//Класс капчи
Class Captcha{
	
	public $imgDir = '/include/captcha/images/'; // директория где хранятся изображения

	public $length = '5'; // количество цифр в капче
	
	public function __construct(){		
		$this->keystring=array();		
		for($i=0;$i < $this->length;$i++){
			 $this->keystring[] .= mt_rand(0,9);
		}		
	}	
	
	public function draw(){
		$img = '';
		foreach($this->keystring as $keystring){
			$img .= '<img src="'.$this->imgDir.$keystring.'.gif" border="0">';
		}
		return $img;
	}	
	
	public function getKeyString(){
		return implode($this->keystring);
	}	
}

//Инициализируем капчу
$captcha = new Captcha();

$_SESSION['keystring'] = $captcha->getKeyString();

echo $captcha->draw();

?>