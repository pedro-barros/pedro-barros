<head>
    <link rel="stylesheet" href="css/cssDashboard.css">
    <script src="js/dashboardscript.js"></script>
    <script src="js/rightsidebar.js"></script>
</head>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- 3 traços da sidebar -->
    <div class="hamburger">
        <div class="cta">
            <div class="toggle-btn type14"></div>
        </div>
    </div>

    <!-- Brand/logo -->
    <a class="navbar-brand" href="pagina_principal.php">
        <img id="logo" src="img\logoredondo.png" alt="logo">
    </a>

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" onclick="openNav()"><i class="fas fa-user fa-2x"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog fa-2x"></i></a>
        </li>
        <li class="nav-item">
            <!--              <a class="nav-link" href="#" name="logout"><i class="fas fa-sign-out-alt fa-2x"></i>< /a>-->

            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
        </li>
    </ul>
</nav>


<section class="side-bar-warp">
    <div class="sidebar-menu small-side-bar flowHide">
        <nav class="">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pagina_principal.php">
                        <span class="sidebar-icon"><i class="fas fa-home fa-2x"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Página Principal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <span class="sidebar-icon"><i class="fas fa-tachometer-alt fa-2x"></i></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="opcoes.php">
                        <span class="sidebar-icon"><i class="fas fa-th-large fa-2x"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Opções</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_shopping.php">
                        <span class="sidebar-icon"><i class="fas fa-shopping-cart fa-2x"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Shopping</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_utilizadores.php">
                        <span class="sidebar-icon"><i class="</i> fas fa-users fa-2x"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Gestor Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <span class="sidebar-icon"><i class="fas fa-door-open fa-2x"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show">Sair</span>
                    </a>
                </li>
                <!--<li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-icon"><i class="fas fa-door-open fa-2x"></i></span>
                            <span class="fadeInRight animated nav-link-name name-hide tax-show">Log Out</span>
                        </a> 
                    </li>-->
            </ul>
        </nav>
    </div>

    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container" id="perfil-conteiner">
            <div class="row profile">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="img/logo.jpg" class="img-responsive" alt="logo">
                    </div>

                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <!--  <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Tasks </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- END MENU -->

                </div>
            </div>
        </div>
    </div>

</section>