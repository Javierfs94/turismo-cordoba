<header id="header" class="d-flex align-items-center">
    <div class="container ">

        <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
        <div class="logo d-block d-lg-none">
            <a href="<?php echo base_url() ?>home"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="Imagen de logo" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul class="nav-inner">
                <?php
                $home = ($activeTab == "home") ? "active" : "";
                echo '<li class="' . $home . '"><a href="' . base_url() . 'home">Home</a></li>';
                ?>

                <!-- <li><a href="<?php echo base_url() ?>home"><img style="width: 3em; height:3em;" src="<?php echo base_url() ?>assets/img/logo.png" alt="logo"></a></li> -->
                <?php

                if (isset($_SESSION['perfil']) && ($_SESSION["baneado"] == 0)) {

                    $ofertas = ($activeTab == "ofertas") ? "active" : "";
                    $establecimientos = ($activeTab == "establecimientos") ? "active" : "";
                    $usuarios = ($activeTab == "usuarios") ? "active" : "";
                    $empresas = ($activeTab == "empresas") ? "active" : "";
                    $solicitudes = ($activeTab == "solicitudes") ? "active" : "";
                    $dependientes = ($activeTab == "dependientes") ? "active" : "";
                    $canjear = ($activeTab == "canjear") ? "active" : "";

                    switch ($_SESSION['perfil']) {
                        case 1: // turista
                            echo '<li class="' . $ofertas . '"><a href="' . base_url() . 'turista/ofertas">Ofertas</a></li>';
                            echo '<li class="' . $establecimientos . '"><a href="' . base_url() . 'turista/establecimientos">Establecimientos</a></li>';
                            break;

                        case 2: // dependiente
                            echo '<li class="' . $canjear . '"><a href="' . base_url() . 'dependiente/canjear">Canjear</a></li>';
                            break;

                        case 3: // gerente
                            echo '<li class="' . $ofertas . '"><a href="' . base_url() . 'gerente/ofertas">Ofertas</a></li>';
                            echo '<li class="' . $establecimientos . '"><a href="' . base_url() . 'gerente/establecimientos">Establecimientos</a></li>';
                            echo '<li class="' . $dependientes . '"><a href="' . base_url() . 'gerente/dependientes">Dependientes</a></li>';
                            break;

                        case 4: // administrador
                            echo '<li class="' . $usuarios . '"><a href="' . base_url() . 'admin/usuarios">Usuarios</a></li>';
                            echo '<li class="' . $empresas . '"><a href="' . base_url() . 'admin/empresas">Empresas</a></li>';
                            echo '<li class="' . $ofertas . '"><a href="' . base_url() . 'admin/ofertas">Ofertas</a></li>';
                            echo '<li class="' . $establecimientos . '"><a href="' . base_url() . 'admin/establecimientos">Establecimientos</a></li>';
                            echo '<li class="' . $solicitudes . '"><a href="' . base_url() . 'admin/solicitudes">Solicitudes</a></li>';
                            break;

                        default:
                            break;
                    }

                    echo '
                        <li class="dropdown user user-menu justify-content-end">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            ';
                    echo (empty($_SESSION['imagen'])) ? '<img src="' . base_url() . 'uploads/perfiles/default-user.jpg" style="width: 30px; height: 30px;" class="user-image" alt="User Image">' : '<img src="' . base_url() . 'uploads/perfiles/' . $_SESSION['imagen'] . '" style="width: 30px; height: 30px;" class="user-image" alt="User Image">';
                    echo '<span class="hidden-xs">' . $_SESSION['username'] . '</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header text-center">
                            ';
                    echo (empty($_SESSION['imagen'])) ? '<img src="' . base_url() . 'uploads/perfiles/default-user.jpg" style="width: 150px; height: 150px;" class="user-image" alt="User Image">' : '<img src="' . base_url() . 'uploads/perfiles/' . $_SESSION['imagen'] . '" style="width: 150px; height: 150px;" class="user-image" alt="User Image">';
                    echo '
                                <p class="my-3 text-success">
                                    ' . $_SESSION['username'] . '
                                </p>
                            </li>
      
                            <li class="user-footer">
                                <div class="pull-left text-center">
                                    <a href="' . base_url() . 'perfiles/perfil/' . $_SESSION["id"] . '" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-left text-center">
                                    <a  class="btn btn-default btn-flat" href="' . base_url() . 'perfiles/form/' . $_SESSION['id'] . '">Editar perfil</a>
                                </div>
                                <div class="pull-left text-center">
                                    <a  class="btn btn-default btn-flat" href="' . base_url() . 'perfiles/actpass/' . $_SESSION['id'] . '">Editar Contraseña</a>
                                </div>
                                <hr>
                                <div class="pull-right text-center">
                                    <a href="' . base_url() . 'home/logout">Salir</a>
                                </div>
                            </li>
                        </ul>
                        </li>
                        ';
                } else {
                    $solicitud = ($activeTab == "solicitud") ? "active" : "";
                    $login = ($activeTab == "login") ? "active" : "";
                    $registro = ($activeTab == "registro") ? "active" : "";

                    echo '<li class="' . $login  . '"><a href="' . base_url() . 'home/login">Iniciar Sesión</a></li>';
                    echo '<li class="' . $registro . '"><a href="' . base_url() . 'home/registro">Registrarse</a></li>';
                    echo '<li class="' . $solicitud . '"><a href="' . base_url() . 'home/solicitud">Solicitud de empresa</a></li>';
                }

                ?>

        </nav>
    </div>
</header>