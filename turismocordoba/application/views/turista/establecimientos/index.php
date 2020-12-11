<section>
    <div class="row p-3">
        <?php
        echo '
    <div class="col-sm-12 d-flex justify-content-center">
        <a class="p-1" href="' . base_url() . 'turista/establecimientos">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Mostrar todos los establecimientos">
                <i class="fa fa-home"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'turista/establecimientos/Ocio">
            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar los establecimientos por ocio">
                <i class="fa fa-bowling-ball"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'turista/establecimientos/Restauracion">
            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Filtrar los establecimientos por restauracion">
                <i class="fas fa-hamburger"></i>
            </button>
        </a>        
        <a class="p-1" href="' . base_url() . 'turista/establecimientos/Cultura">
            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Filtrar los establecimientos por cultura">
                <i class="fas fa-archway"></i>
            </button>
        </a>
    </div>
   ';
        ?>
    </div>

    <div class="row p-3">
        <?php
        foreach ($establecimientos as $row) {
            switch ($row->tipo) {
                case 'Ocio':
                    echo '
                    <div class="card col-sm-3 bg-success m-1">
                        <div class="card-body  text-center">';
                    if (empty($row->imagen)) {
                        echo '<img src="' . base_url() . 'assets/img/logo.png" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    } else {
                        echo '<img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    }
                    echo ' 
                            <h1 class="card-text text-white">' . $row->nombre_empresa . '</h1>
                            <h2 class="card-text">' . $row->nombre_establecimiento . '</h2>
                            <h2 class="card-text text-white" data-toggle="tooltip" data-placement="top" title="Ocio"><i class="fa fa-bowling-ball"></i> </h2>
                            <h3 class="card-text bg-light rounded-pill p-1">' . $row->direccion . '</h3>
                        </div>
                    </div>
                    ';
                    break;
                case 'Cultura':
                    echo '
                    <div class="card col-sm-3 bg-warning m-1">
                        <div class="card-body  text-center">';
                    if (empty($row->imagen)) {
                        echo '<img src="' . base_url() . 'assets/img/logo.png" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    } else {
                        echo '<img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    }
                    echo ' 
                            <h1 class="card-text text-white">' . $row->nombre_empresa . '</h1>
                            <h2 class="card-text">' . $row->nombre_establecimiento . '</h2>
                            <h2 class="card-text  text-white" data-toggle="tooltip" data-placement="top" title="Cultura"><i class="fa fa-archway"></i> </h2>
                            <h3 class="card-text bg-light rounded-pill p-1">' . $row->direccion . '</h3>
                        </div>
                    </div>
                    ';
                    break;
                case 'Restauracion':
                    echo '
                    <div class="card col-sm-3 bg-danger m-1">
                        <div class="card-body  text-center">';
                    if (empty($row->imagen)) {
                        echo '<img src="' . base_url() . 'assets/img/logo.png" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    } else {
                        echo '<img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">';
                    }
                    echo ' 
                            <h1 class="card-text text-white">' . $row->nombre_empresa . '</h1>
                            <h2 class="card-text">' . $row->nombre_establecimiento . '</h2>
                            <h2 class="card-text text-white" data-toggle="tooltip" data-placement="top" title="Restauracion"><i class="fa fa-hamburger"></i> </h2>
                            <h3 class="card-text bg-light rounded-pill p-1">' . $row->direccion . '</h3>
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