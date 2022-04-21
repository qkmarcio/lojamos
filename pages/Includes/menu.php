<!-- Navbar Start -->
<header class="navbar navbar-fixed">
    <!-- Navbar Header Start -->
    <div class="navbar--header">
        <!-- Logo Start -->
        <a href="index.html" class="logo">
            <img src="../assets/img/logo.png" alt="">
        </a>
        <!-- Logo End -->

        <!-- Sidebar Toggle Button Start -->
        <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Sidebar Toggle Button End -->
    </div>
    <!-- Navbar Header End -->

    <!-- Sidebar Toggle Button Start -->
    <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    <!-- Sidebar Toggle Button End -->

    <div class="navbar--nav ml-auto">
        <ul class="nav">
            <!-- Nav User Start -->
            <li class="nav-item dropdown nav--user online">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <img src="../assets/img/avatars/01_80x80.png" alt="" class="rounded-circle">
                    <span>Henry Foster</span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="profile.html"><i class="far fa-user"></i>Perfil</a></li>
                    <li><a href="mailbox_inbox.html"><i class="far fa-envelope"></i>Inbox</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i>Conf</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>
                    <li><a href="#"><i class="fa fa-power-off"></i>Sair</a></li>
                </ul>
            </li>
            <!-- Nav User End -->
        </ul>
    </div>
</header>
<!-- Navbar End -->

<!-- Sidebar Start -->
<aside class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Navigation Start -->
    <div class="sidebar--nav" style="padding: 0;" >
        <ul>
            <li>
                <ul>
                    <li class="active">
                        <a href="http://localhost/lojamos/pages/principal.php">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-wpforms"></i>
                            <span>Cadastro</span>
                        </a>

                        <ul>
                            <li><a href="cadastro_aluno.php">Alunos</a></li>
                            <li><a href="cadastro_professor.php">Professores</a></li>
                            <li><a href="cadastro_aula.php">Aulas</a></li>
                        </ul>
                        <ul>
                            <li class="active open">
                                <a href="#">
                                    <i class="fa fa-th"></i>
                                    <span>Page Layouts</span>
                                </a>

                                <ul>
                                    <li class="active"><a href="blank.html">Blank Page</a></li>
                                    <li><a href="page-light.html">Page Light</a></li>
                                    <li><a href="sidebar-light.html">Sidebar Light</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
    <!-- Sidebar Navigation End -->

</aside>
<!-- Sidebar End -->