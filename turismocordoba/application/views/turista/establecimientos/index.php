<section>
    <div class="row">
        <?php
        echo '
    <div class="col-sm-12 d-flex justify-content-center">
        <a href="' . base_url() . 'turista/establecimientos">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Mostrar todos los establecimientos">
                <i class="fa fa-home"></i>
            </button>
        </a>
        <a href="' . base_url() . 'turista/establecimientos/Ocio">
            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar establecimientos por ocio">
                <i class="fa fa-bowling-ball"></i>
            </button>
        </a>
        <a href="' . base_url() . 'turista/establecimientos/Cultura">
            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Filtrar establecimientos por cultura">
                <i class="fas fa-hamburger"></i>
            </button>
        </a>
        
        <a href="' . base_url() . 'turista/establecimientos/Restauracion">
            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Filtrar establecimientos por restauracion">
                <i class="fas fa-archway"></i>
            </button>
        </a>
    </div>
   ';
        ?>
    </div>

    <div class="row">
        <?php
        foreach ($establecimientos as $row) {
            switch ($row->tipo) {
                case 'Ocio':
                    echo '
                    <div class="card col-sm-3 bg-success">
                        <div class="card-body">
                            <img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-fluid" style="width: 150px; height: 150px;" alt="Establecimiento Imagen"> 
                            <p class="card-text">' . $row->nombre_establecimiento . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Dirección: ' . $row->direccion . '</p>
                        </div>
                    </div>
                    ';
                    break;
                case 'Cultura':
                    echo '
                    <div class="card col-sm-3 bg-warning">
                        <div class="card-body">
                            <img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-fluid" style="width: 150px; height: 150px;" alt="Establecimiento Imagen"> 
                            <p class="card-text">' . $row->nombre_establecimiento . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Dirección: ' . $row->direccion . '</p>
                        </div>
                    </div>
                    ';
                    break;
                case 'Restauracion':
                    echo '
                    <div class="card col-sm-3 bg-danger justify-content-center">
                    <img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-fluid" style="width: 150px; height: 150px;" alt="Establecimiento Imagen"> 
                    <div class="card-body">
                            <p class="card-text">' . $row->nombre_establecimiento . '</p>
                            <p class="card-text">Tipo: ' . $row->tipo . '</p>
                            <p class="card-text">Dirección: ' . $row->direccion . '</p>
                        </div>
                    </div>
                    ';
                    break;

                default:
                    echo '
                <div class="card col-sm-3 bg-danger">
                    <div class="card-body">
                        <img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" class="img-fluid" style="width: 150px; height: 150px;" alt="Establecimiento Imagen">                            
                        <p class="card-text">' . $row->nombre_establecimiento . '</p>
                        <p class="card-text">Tipo: ' . $row->tipo . '</p>
                        <p class="card-text">Dirección: ' . $row->direccion . '</p>
                    </div>
                </div>
                ';
                    break;
            }


            //     echo '
            // <div class="card col-sm-3">
            //     <a href="prueba">
            //     <div class="card-body">
            //         <h5 class="card-title">Titulin</h5>
            //         <p class="card-text">' . $row->nombre_establecimiento . '</p>
            //         <p class="card-text">Tipo: ' . $row->tipo . '</p>
            //         <p class="card-text">Código: ' . $row->direccion . '</p>
            //     </div>
            //     </a>
            // </div>
            // ';
        }
        ?>
    </div>

</section>