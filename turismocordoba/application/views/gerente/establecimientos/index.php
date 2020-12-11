<section>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end px-5 py-1">
            <?php
            echo '
                <a href="' . base_url() . 'establecimientos_gerente/form">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Crear nuevo establecimiento">
                        <i class="fa fa-plus"></i>
                    </button>
                </a>';
            ?>
        </div>
        <div class="col-sm-12">
            <?php
            echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre Empresa</th>
                    <th>Nombre Establecimiento</th>
                    <th>Imagen</th>
                    <th>Direccion</th>
                    <th>Estado</th>      
                    <th>Acciones</th>
                </tr>
            </thead>
          <tbody>';
            foreach ($establecimientos as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->nombre_empresa . "</td>";
                echo "<td>" . $row->nombre_establecimiento . "</td>";
                echo '<td><img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" style="width: 50px; height: 50px;"alt="Establecimientos Imagen"></td>';
                echo "<td>" . $row->direccion . "</td>";
                if ($row->estado == 0) {
                    echo "<td>Cerrado</td>";
                } else {
                    echo "<td>Abierto</td>";
                }
                echo '
                <td>';
                if ($row->estado == 1) {
                    echo '<a href="' . base_url() . 'establecimientos_gerente/cerrar/' . $row->id . '">
                        <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Desactivar el establecimiento">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </a>';
                } else {
                    echo '<a href="' . base_url() . 'establecimientos_gerente/abrir/' . $row->id . '">
                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Activar el establecimiento">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </a>';
                }

                echo '    
                <a href="' . base_url() . 'establecimientos_gerente/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar el establecimiento">
                        <i class="fa fa-pen"></i>
                    </button>
                </a>
 
                </td>            
            </tr>
            ';
            }
            echo "
        </tbody>
        </table>";
            ?>
        </div>
    </div>
    </div>
</section>