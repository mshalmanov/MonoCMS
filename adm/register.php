<?php
/**
 *
 * register.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>.
 * Copyright (c) 12.08.2020
 */

include_once dirname(dirname(__FILE__)) . '/include/config.php';

if (isset($_POST['submit'])) {

	if(empty($_POST['user_login'])) {exit('Необходимо заполнить поле First Name');}
	if(empty($_POST['email'])) {exit('Необходимо заполнить поле Email');}
	if(empty($_POST['password'])) {exit('Необходимо заполнить поле Password');}
	if(empty($_POST['password1'])) {exit('Необходимо заполнить поле Password1');}
	
	$password = trim($_POST['password']);
	$password1 = trim($_POST['password1']);
	
	if ($password == $password1) {
		echo $password . " equals " . $password1 . "<br><br>";
		echo $user_password = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO `users`(`user_login`, `user_email`, `user_password`, `user_createDate`) VALUES(?,?,?,?)";
		$stmt = $db->prepare($sql);
		$stmt->execute([ trim($_POST['user_login']), trim($_POST['email']), $user_password, trim(date("Y-m-d H:i:s")) ]);					
	} else {
		echo $password ." not equals " . $password1;
	}	
}

?>
<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="user_login" value="" placeholder="First Name">    
    <input type="text" name="email" value="" placeholder="Email">
    <input type="password" name="password" value="" placeholder="Password">
	<input type="password" name="password1" value="" placeholder="Password">
    <button type="submit" name="submit">submit</button>
</form>