<section>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end px-5 py-1">
            <?php
            echo '
                <a href="' . base_url() . 'dependientes_gerente/form">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Crear nuevo dependiente">
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
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Borrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
          <tbody>';

            foreach ($dependientes as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->username . "</td>";
                echo "<td>" . $row->nombre . "</td>";
                echo "<td>" . $row->apellidos . "</td>";
                echo "<td>" . $row->email . "</td>";
                echo "<td>" . $row->borrado . "</td>";
                echo '
                <td>';
                echo '    
                <a href="' . base_url() . 'dependientes_gerente/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar el dependiente">
                        <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'dependientes_gerente/editpass/' . $row->id . '">
                    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar password del dependiente">
                        <i class="fa fa-wrench"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'dependientes_gerente/borrar/' . $row->id . '">
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar el dependiente">
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