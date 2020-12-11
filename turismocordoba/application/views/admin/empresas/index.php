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
                    <th>Nombre Empresa</th>
                    <th>Aprobada</th>
                    <th>Borrado</th>      
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';
            foreach ($empresas as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->nombre_empresa . "</td>";
                echo "<td>" . $row->aprobada . "</td>";
                if ($row->borrado == 0) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                }
                echo '
                <td>        
                <a href="' . base_url() . 'empresas_admin/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary"data-toggle="tooltip" data-placement="top" title="Editar la empresa">
                    <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'empresas_admin/borrar/' . $row->id . '">
                    <button type="button" class="btn btn-danger"data-toggle="tooltip" data-placement="top" title="Borrar la empresa">
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