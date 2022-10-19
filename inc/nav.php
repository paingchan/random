<?php




if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}

require_once './function/functions.php';

?>


<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>

                    </ul>
                </div>
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                            src="img/<?php echo $_SESSION['image']; ?>"
                            class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title"><?php echo $_SESSION['name']; ?>
                        </div>



                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item has-icon text-danger"> <i
                                class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                                class="logo-name">User</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown">
                            <a href="index.php" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <?php

if ($_SESSION['name']== '涂正刚') {
    ?>

                        <li class="dropdown">
                            <a href="group.php" class="nav-link"><i data-feather="users"></i><span>Group</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="user.php" class="nav-link"><i data-feather="user"></i><span>Members</span></a>
                        </li>


                        <?php
}

?>


                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">