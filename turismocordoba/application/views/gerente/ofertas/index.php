<section>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end px-5 py-1">
            <?php
            echo '
                <a href="' . base_url() . 'ofertas_gerente/form">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Crear nueva oferta">
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
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Codigo</th>
                    <th>Nivel Requerido</th>
                    <th>Puntos</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>      
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';


            foreach ($ofertas as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->nombre_empresa . "</td>";
                echo "<td>" . $row->descripcion . "</td>";
                echo "<td>" . $row->tipo . "</td>";
                echo "<td>" . $row->codigo . "</td>";
                echo "<td>" . $row->nivel_requerido . "</td>";
                echo "<td>" . $row->puntos . "</td>";
                echo "<td>" . $row->fecha_inicio  . "</td>";
                echo "<td>" . $row->fecha_fin   . "</td>";
                if ($row->estado == 0) {
                    echo "<td>Desactivado</td>";
                } else {
                    echo "<td>Activado</td>";
                }     
                echo '
                <td>';
                if ($row->estado == 1) {
                    echo '<a href="' . base_url() . 'ofertas_gerente/desactivar/' . $row->id . '">
                        <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Desactivar la oferta">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </a>';
                } else {
                    echo '<a href="' . base_url() . 'ofertas_gerente/activar/' . $row->id . '">
                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Activar la oferta">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </a>';
                }

                echo '<a href="' . base_url() . 'ofertas_gerente/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar la oferta">
                        <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'ofertas_gerente/borrar/' . $row->id . '">
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