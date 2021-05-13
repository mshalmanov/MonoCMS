<?php
/**
 *
 * register.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>.
 * Copyright (c) 12.08.2020
 */

include_once dirname(dirname(__FILE__)) . '/include/config.php';
$title = "Форма регистрации";

if (isset($_POST['submit'])) {

	$Pwd = trim($_POST['Pwd']);
    $confirmPwd = trim($_POST['confirmPwd']);

	if ($Pwd == $confirmPwd) {
		$user_password = password_hash($Pwd, PASSWORD_DEFAULT);

		$sql = "INSERT INTO `users`(`user_login`, `user_email`, `user_password`, `user_createDate`) VALUES(?,?,?,?)";
		$stmt = $dbConn->prepare($sql);
		$stmt->execute([ trim($_POST['userLogin']), trim($_POST['Email']), $user_password, trim(date("Y-m-d H:i:s")) ]);
		echo "User " . $_POST['userLogin'] . " registered";
	} else {
		echo "Password not equals";
	}
}

?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- SRC attribute can be changed according to your preference or location of JS file -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <style type="text/css">
        /* Styles */
        * {
            box-sizing: border-box;
        }
        label {
            padding: 11px 12px 11px 2px;
            display: inline-block;
        }
        input[type=text], input[type=email], input[type=password] {
            border: 2px solid #ccc;
            resize: vertical
            padding: 12px;
            border-radius: 4px;
            width: 100%;
        }
        form {
            padding: 20px;
            background: #2c3e50;
            color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        /* Set a style for the submit button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        @media screen and (max-width: 560px) {
            .row {
                margin-top: 0;
                width: 100%;
            }
        }
        form .error {
            color: #ff0001;
        }
    </style>
</head>
<body style = "height: 100vh;">
<div class="container h-100 justify-content-center align-items-center">
    <form class="form" id="registerForm" method="post" action="">
        <fieldset>
            <h2 class="text-center"><?php echo $title; ?></h2>
            <div class="row">
                <label for="userLogin">First Name</label>
                <input id="userLogin" name="userLogin" type="text" minlength="2" placeholder="First Name">
            </div>
            <div class="row">
                <label for="Email">E-Mail</label>
                <input type="email" name="Email" id="Email" placeholder="E-Mail">
            </div>
            <div class="row">
                <label for="Pwd">Password</label>
                <input type="password" name="Pwd" id="Pwd" placeholder="Password">
            </div>
            <div class="row">
                <label for="Pwd">Confirm password</label>
                <input type="password" name="confirmPwd" id="confirmPwd" placeholder="Confirm password">
            </div>
            <div class="row">
                <input class="registerbtn" type="submit" name="submit" value="Register">
            </div>
        </fieldset>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#registerForm").validate({
            rules: {
                'userLogin': {
                    required: true,
                    minlength: 2
                },
                'Email':{
                    required: true,
                    email:true,
                },
                'Pwd':{
                    required: true,
                },
                'confirmPwd':{
                    required: true,
                },
            },
            messages: {
                'userLogin': "Please enter a valid First Name.",
                'Email': "Please enter Email in proper format.",
                'Pwd': "Please enter a Password",
                'confirmPwd': "Please enter a Confirm password",
            }
        });
    });
</script>
</body>
</html>