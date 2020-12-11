<section>
    <div class="row">
        <div class="col-sm-12">
            <?php
            echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre Establecimiento</th>
                    <th>Direccion</th>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Estado</th>      
                    <th>Borrado</th>      
                    <th>Acciones</th>
                </tr>
            </thead>
          <tbody>';
            foreach ($establecimientos as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->nombre_establecimiento . "</td>";
                echo "<td>" . $row->direccion . "</td>";
                echo '<td><img src="' . base_url() . 'uploads/establecimientos/' . $row->imagen . '" style="width: 50px; height: 50px;"alt="Establecimientos Imagen"></td>';
                echo "<td>" . $row->tipo . "</td>";
                if ($row->estado == 0) {
                    echo "<td>Cerrado</td>";
                } else {
                    echo "<td>Abierto</td>";
                }
                if ($row->borrado == 0) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                }
                echo '
                <td>        
                <a href="' . base_url() . 'establecimientos_admin/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar el establecimiento">
                    <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'establecimientos_admin/borrar/' . $row->id . '">
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar el establecimiento">
                        <i class="fa fa-trash"></i>
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