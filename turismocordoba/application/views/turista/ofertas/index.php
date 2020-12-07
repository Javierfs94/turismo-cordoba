<section>
    <div class="row">
        <?php
        echo '
    <div class="col-sm-12 d-flex justify-content-center">
        <a href="' . base_url() . 'turista/ofertas">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Mostrar todas las ofertas">
                <i class="fa fa-home"></i>
            </button>
        </a>
        <a href="' . base_url() . 'turista/ofertas/Ocio">
            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por ocio">
                <i class="fa fa-bowling-ball"></i>
            </button>
        </a>
        <a href="' . base_url() . 'turista/ofertas/Cultura">
            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por cultura">
                <i class="fas fa-hamburger"></i>
            </button>
        </a>
        
        <a href="' . base_url() . 'turista/ofertas/Restauracion">
            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por restauracion">
                <i class="fas fa-archway"></i>
            </button>
        </a>
    </div>
   ';
        ?>
    </div>

    <div class="row">
        <?php
        foreach ($ofertas as $row) {
            switch ($row->tipo) {
                case 'Ocio':
                    echo '
                    <div class="card col-sm-3 bg-success">
                        <div class="card-body">
                            <p class="card-text">' . $row->descripcion . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Código: ' . $row->codigo . '</p>
                            <p class="card-text">Puntos otorgados: ' . $row->puntos . '</p>
                            <p class="card-text">Nivel req: ' . $row->nivel_requerido . '</p>
                            <p class="card-text">Fecha inicio: ' . $row->fecha_inicio . '</p>
                            <p class="card-text">Fecha fin: ' . $row->fecha_fin . '</p>
                        </div>
                    </div>
                    ';
                    break;
                case 'Cultura':
                    echo '
                    <div class="card col-sm-3">
                        <div class="card-body bg-warning">
                            <p class="card-text">' . $row->descripcion . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Código: ' . $row->codigo . '</p>
                            <p class="card-text">Puntos otorgados: ' . $row->puntos . '</p>
                            <p class="card-text">Nivel req: ' . $row->nivel_requerido . '</p>
                            <p class="card-text">Fecha inicio: ' . $row->fecha_inicio . '</p>
                            <p class="card-text">Fecha fin: ' . $row->fecha_fin . '</p>
                        </div>
                    </div>
                    ';
                    break;
                case 'Restauracion':
                    echo '
                    <div class="card col-sm-3">
                        <div class="card-body bg-danger">
                            <p class="card-text">' . $row->descripcion . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Código: ' . $row->codigo . '</p>
                            <p class="card-text">Puntos otorgados: ' . $row->puntos . '</p>
                            <p class="card-text">Nivel req: ' . $row->nivel_requerido . '</p>
                            <p class="card-text">Fecha inicio: ' . $row->fecha_inicio . '</p>
                            <p class="card-text">Fecha fin: ' . $row->fecha_fin . '</p>
                        </div>
                    </div>
                    ';
                    break;

                default:
                    echo '
                <div class="card col-sm-3">
                    <div class="card-body">
                        <p class="card-text">' . $row->descripcion . '</p>
                        <p class="card-text">Tipo: ' . $row->tipo . '</p>
                        <p class="card-text">Código: ' . $row->codigo . '</p>
                        <p class="card-text">Puntos otorgados: ' . $row->puntos . '</p>
                        <p class="card-text">Nivel req: ' . $row->nivel_requerido . '</p>
                        <p class="card-text">Fecha inicio: ' . $row->fecha_inicio . '</p>
                        <p class="card-text">Fecha fin: ' . $row->fecha_fin . '</p>
                    </div>
                </div>
                ';
                    break;
            }
        }
        ?>
    </div>
</section>