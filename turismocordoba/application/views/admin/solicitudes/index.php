<section>
    <div class="row">
        <div class="col">
            <?php
            echo '<div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';
            foreach ($solicitudes as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->nombre_empresa . "</td>";
                echo "<td>" . $row->aprobada . "</td>";
                echo '
                <td>
                <a href="' . base_url() . 'admin/solicitudes/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Validar la empresa">
                        Validar
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
</section>