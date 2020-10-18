<table width="100%" style="text-align: center; border: 1px;" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>#</th>
    <th>Empresa</th>
    <th>Dependiente</th>
    <th>Nombre</th>
    <th>Localización</th>
    <th style="text-align: center;">Actions</th>
  </tr>
  <?php
  foreach ($establecimientos as $row) {
    echo "<tr>";
    echo "<td data-id='".$row->id."'>" . $row->id . "</td>";
    echo "<td>" . $row->nombre . "</td>";
    echo "<td>" . $row->username . "</td>";
    echo "<td>" . $row->nombre_establecimiento . "</td>";
    echo "<td><a href='" . $row->direccion . "'>Direccion</a></td>";
    echo "<td><button class='btn btn-info btn-sm m-1'>Edit</button><button class='btn btn-danger btn-sm m-1'>Borrar</button></td>";
    echo "</tr>";
  }
  ?>
</table>