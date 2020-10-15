<header id="header" class="d-flex align-items-center">
    <div class="container">

        <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
        <div class="logo d-block d-lg-none">
            <a href="index.php"><img src="assets/img/logo.png" alt="Imagen de logo" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul class="nav-inner">
                <li><a href="index.php">Home</a></li>             
                <li><a href="<?php base_url() ?>ofertas">Ofertas</a></li> <!-- Mostrar todas las ofertas disponibles -->
                <li><a href="<?php base_url() ?>establecimientos">Establecimientos</a></li> <!-- Mostrar todas las ofertas por establecimientos -->
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header>