<section>
    <div class="row" data-aos="fade-down">
        <?php
        echo '
    <div class="col-sm-12 d-flex justify-content-center">
        <a class="p-1" href="' . base_url() . 'turista/ofertas">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Mostrar todas las ofertas">
                <i class="fa fa-home text-white"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'turista/ofertas/Ocio">
            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por ocio">
                <i class="fa fa-bowling-ball text-white"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'turista/ofertas/Restauracion">
            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por restauracion">
                <i class="fas fa-hamburger text-white"></i>
            </button>
        </a>        
        <a class="p-1" href="' . base_url() . 'turista/ofertas/Cultura">
            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por cultura">
                <i class="fas fa-archway text-white"></i>
            </button>
        </a>
    </div>
   ';
        ?>
    </div>

    <div class="row px-5" data-aos="fade-up">
        <?php
        foreach ($ofertas as $row) {
            switch ($row->tipo) {
                case 'Ocio':
                    echo '
                    <div class="card col-sm-3 col-md-4 bg-success">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Cultura"><i class="fas fa-bowling-ball"></i></small></h3>
                            <h2 class="card-subtitle text-white">' . $row->codigo . '</h2>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                            <h1 class="border bg-white border-danger rounded-pill p-2">' . $row->puntos . 'Pts</h1>
                        </div>
                    </div>
                    ';
                    break;
                case 'Cultura':
                    echo '
                    <div class="card col-sm-3 col-md-4  bg-warning ">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Ocio"><i class="fas fa-archway"></i></small></h3>
                            <h2 class="card-subtitle text-white">' . $row->codigo . '</h2>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                            <h1 class="border bg-white border-danger rounded-pill p-2">' . $row->puntos . 'Pts</h1>
                        </div>
                    </div>
                    ';
                    break;
                case 'Restauracion':
                    echo '
                    <div class="card col-sm-3 col-md-4  bg-danger">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Restauración"><i class="fas fa-hamburger"></i></small></h3>
                            <h2 class="card-subtitle text-white">' . $row->codigo . '</h2>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                            <h1 class="border bg-white border-danger rounded-pill p-2">' . $row->puntos . 'Pts</h1>
                        </div>
                    </div>
                    ';
                    break;

                default:
                    break;
            }
        }
        ?>
    </div>
</section>