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
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Codigo</th>
                    <th>Puntos</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>      
                    <th>Borrado</th>      
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';
            foreach ($ofertas as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->descripcion . "</td>";
                echo "<td>" . $row->tipo . "</td>";
                echo "<td>" . $row->codigo . "</td>";
                echo "<td>" . $row->puntos . "</td>";
                echo "<td>" . $row->fecha_inicio  . "</td>";
                echo "<td>" . $row->fecha_fin   . "</td>";
                echo "<td>" . $row->estado   . "</td>";
                echo "<td>" . $row->borrado   . "</td>";
                echo '
                <td>        
                <a href="' . base_url() . 'ofertas_admin/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar la oferta">
                    <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'ofertas_admin/borrar/' . $row->id . '">
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar la oferta">
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