<?php
    session_start();

    if (!isset($_SESSION['user_login']))
    {
        header("location: index.php");
        exit();
    }
?>
	<?php
	include_once dirname(dirname(__FILE__)) . '/include/config.php';
	
	include_once 'header.php'; ?>

	<!-- sidebar menu -->
	<?php include_once 'menu.php'; ?>            
	<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="exit.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="img/logo.svg" alt=""><?php echo $_SESSION['user_login']; ?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#">Profile</a></li>
                    <li>
                      <a href="#">                        
                        <span>Settings</span>
                      </a>
                    </li>                    
                    <li><a href="exit.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">2</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
					<li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">          
          
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>All users</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>                   
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                <td><a href="edit.php?id=<?php echo $row['id'] ?>">редактировать</a></td>
                                <td><a href="delete.php?id=<?php echo $row['id']; ?>">удалить</a></td>
                            </tr>
                      <?php
					    }
                        $stmt = null;
					?>
				</table>	
				  
                </div>
              </div>
            </div>
						            			           
        </div>
	</div>
  </div>
</div>
<!-- /page content -->

	<?php include_once 'footer.php'; ?>
        