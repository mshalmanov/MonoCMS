<?php
    session_start();
    include_once dirname(dirname(__FILE__)) . '/include/function.php';

    if (!isset($_SESSION['user_login']))
    {
        header("location: index.php");
        exit();
    }

    if ( isset($_POST['submit']) )
    {
        $password = trim($_POST['password']);
        $confirmPwd = trim($_POST['passwordConfirm']);

        // Сравниваем пароли
        if ($password == $confirmPwd) {
            $user_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users`(`user_login`, `user_email`, `user_password`, `user_createDate`) VALUES(?,?,?,?)";
            $stmt = $dbConn->prepare($sql);
            $stmt->execute([ trim($_POST['userLogin']), trim($_POST['userEmail']), $user_password, trim(date("Y-m-d H:i:s")) ]);
            $errorRegistartion = ('<h4 class= "alert alert-success text-center">Пользователь зарегистрирован!<h4>');
            header("location: users.php");
        } else {
            $errorRegistartion = ('<h4 class= "alert alert-danger text-center">Пароли не совпадают!<h4>');
            //header("location: users.php");
        }
    }

    include_once 'header.php';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/adm/" class="brand-link">
        <img src="img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Админ панель</span>
    </a>

    <!-- Sidebar -->
    <?php include_once 'sidebar.php'; ?>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/adm/">Главная</a></li>
                        <li class="breadcrumb-item active">Пользователи</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пользователи</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Логин</th>
                                    <th>E-mail</th>
                                </tr>
                                </thead>
                                <?php
                                $stmt = $dbConn->query("SELECT * FROM users");
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr><td><input type='checkbox' class='checkbox' name='check_user'></td>
                                        <td><?php echo $row['user_login']; ?></td>
                                        <td><?php echo $row['user_email']; ?></td>
                                        <td><a href="edit.php?id=<?php echo $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg></a></td>
                                        <td><a href="delete.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg></a></td>
                                    </tr>
                                    <?php
                                }
                                $stmt = null;
                                ?>
                            </table>

                            <div class="modal" id="modalUserForm">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Добавить пользователя</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="registerForm" method="post" accept-charset="UTF-8" novalidate>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="userLogin" id="name" class="form-control" placeholder="Имя" maxlength="100" required>
                                                    <div class="invalid-tooltip">Пожалуйста введите Ваше имя.</div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" name="userEmail" id="email" class="form-control" placeholder="Email" maxlength="100" required validate>
                                                    <div class="invalid-tooltip">Пожалуйста введите правильный Email.</div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="60" required>
                                                    <div class="invalid-tooltip">Пожалуйста введите пароль.</div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="password" name="passwordConfirm" id="password_confirmation" class="form-control"placeholder="Confirm Password" maxlength="60" required>
                                                    <div class="invalid-tooltip">Пожалуйста введите пароль ещё раз.</div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg">Добавить пользователя</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUserForm">Добавить пользователя</button>
                            <?php echo $errorRegistartion; ?>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'footer.php'; ?>