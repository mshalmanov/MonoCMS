<?php
    session_start();
	
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	
    if (!isset($_SESSION['user_login']))
    {
        header("location: index.php");
        exit();
    }
	
	if ( isset($_POST['submit']) )
    {
        $password = trim($_POST['password']);
        $password_confirmation = trim($_POST['password_confirmation']);
		
		// Сравниваем пароли	
		if ($password == $password_confirmation) {
			echo $password . " equals " . $password1 . "<br><br>";
			echo $user_password = password_hash($password, PASSWORD_DEFAULT);
		
			$sql = "INSERT INTO `users`(`user_login`, `user_email`, `user_password`, `user_createDate`) VALUES(?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([ trim($_POST['user_login']), trim($_POST['user_email']), $user_password, trim(date("Y-m-d H:i:s")) ]);
		} else {
            echo "Password not equals";
		}	
		
    }

	include_once dirname(dirname(__FILE__)) . '/include/function.php';
	include_once 'header.php';
?>
	
	<!-- sidebar menu -->
	<?php include_once 'menu.php'; ?>            
	<!-- /sidebar menu -->
          </div>
        </div>

	<!-- top navigation -->
	<?php include_once 'topNavigation.php'; ?>        
	<!-- /top navigation -->
	
	<script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('registerForm');
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
    </script>
	
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel tile fixed_height_320">
					<div class="x_title">
					<h2>Пользователи</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.22 9.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L8 6.06 4.28 9.78a.75.75 0 01-1.06 0z"></path></svg></a>
						</li>                
						<li><a class="close-link">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>								
				<div class="x_content">
					<table class="table">
						<thead>
						<tr>
							<th></th>
							<th>Логин</th>
							<th>E-mail</th>
						</tr>
						</thead>
						<?php //showUsers($mysql_conn);
						$stmt = $db->query("SELECT * FROM users");
						$stmt->execute();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
							<tr><td><input type='checkbox' class='checkbox' name='check_user'></td>
								<td><?= $row['user_login']; ?></td>
								<td><?=$row['user_email']; ?></td>
								<td><a href="edit.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg></a></td>
								<td><a href="delete.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg></a></td>
							</tr>
							<?php
						}
						$stmt = null;
						?>
					</table>
										
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUserForm">Добавить пользователя</button>					
					<div class="modal" id="modalUserForm">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title font-weight-bold">Добавить пользователя</h4>
								</div>							
								<div class="modal-body">
									<form id="registerForm" method="post" accept-charset="UTF-8" novalidate>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path></svg>
                                            </span>
                                            <input id="name" class="form-control input-lg" placeholder="Имя" maxlength="100" type="text" name="user_login" required>
                                            <div class="invalid-tooltip">Пожалуйста введите Ваше имя.</div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg>
                                            </span>
                                            <input id="email" class="form-control input-lg" placeholder="Email" maxlength="100" type="email" name="user_email" required validate>
                                            <div class="invalid-tooltip">Пожалуйста введите правильный Email.</div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.5 5.5a4 4 0 112.731 3.795.75.75 0 00-.768.18L7.44 10.5H6.25a.75.75 0 00-.75.75v1.19l-.06.06H4.25a.75.75 0 00-.75.75v1.19l-.06.06H1.75a.25.25 0 01-.25-.25v-1.69l5.024-5.023a.75.75 0 00.181-.768A3.995 3.995 0 016.5 5.5zm4-5.5a5.5 5.5 0 00-5.348 6.788L.22 11.72a.75.75 0 00-.22.53v2C0 15.216.784 16 1.75 16h2a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V14h.75a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V12h.75a.75.75 0 00.53-.22l.932-.932A5.5 5.5 0 1010.5 0zm.5 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                                            </span>
                                            <input id="password" class="form-control input-lg" placeholder="Password" maxlength="60" type="password" name="password" required>
                                            <div class="invalid-tooltip">Пожалуйста введите пароль.</div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.5 5.5a4 4 0 112.731 3.795.75.75 0 00-.768.18L7.44 10.5H6.25a.75.75 0 00-.75.75v1.19l-.06.06H4.25a.75.75 0 00-.75.75v1.19l-.06.06H1.75a.25.25 0 01-.25-.25v-1.69l5.024-5.023a.75.75 0 00.181-.768A3.995 3.995 0 016.5 5.5zm4-5.5a5.5 5.5 0 00-5.348 6.788L.22 11.72a.75.75 0 00-.22.53v2C0 15.216.784 16 1.75 16h2a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V14h.75a.75.75 0 00.53-.22l.5-.5a.75.75 0 00.22-.53V12h.75a.75.75 0 00.53-.22l.932-.932A5.5 5.5 0 1010.5 0zm.5 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                                            </span>
                                            <input id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" maxlength="60" type="password" name="password_confirmation" required>
                                            <div class="invalid-tooltip">Пожалуйста введите пароль ещё раз.</div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg">Добавить пользователя</button>
                                        </div>
									</form>								
								</div>								
							</div>		
						</div>
					</div>
					
				</div>
			  </div>
            </div>
						            			           
        </div>
	</div>
  </div>
</div>
<!-- /page content -->

<?php include_once 'footer.php'; ?>
        