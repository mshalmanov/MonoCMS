<div class="sidebar">

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/adm/" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

<!--            <li class="nav-item menu-open">-->
<!--                <a href="#" class="nav-link">-->
<!--                    <i class="nav-icon fas fa-tachometer-alt"></i>-->
<!--                    <p>-->
<!--                        Dashboard-->
<!--                        <i class="right fas fa-angle-left"></i>-->
<!--                    </p>-->
<!--                </a>-->
<!--                <ul class="nav nav-treeview">-->
<!--                    <li class="nav-item">-->
<!--                        <a href="/adm/" class="nav-link">-->
<!--                            <i class="far fa-circle nav-icon"></i>-->
<!--                            <p>Dashboard</p>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Пользователи
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/adm/users.php" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>