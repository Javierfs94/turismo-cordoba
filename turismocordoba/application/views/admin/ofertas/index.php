<table width="100%" style="text-align: center; border: 1px;" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Id</th>
    <th>Empresa</th>
    <th>Desc</th>
    <th>Tipo</th>
    <th>Codigos</th>
    <th style="text-align: center;">Actions</th>
  </tr>
  <?php
  foreach ($ofertas as $row) {
    echo "<tr>";
    echo "<td>" . $row->id . "</td>";
    echo "<td>" . $row->nombre . "</td>";
    echo "<td>" . $row->descripcion . "</td>";
    echo "<td>" . $row->tipo . "</td>";
    echo "<td>" . $row->codigos . "</td>";
    echo "<td><button class='btn btn-info btn-sm m-1'>Edit</button><button class='btn btn-danger btn-sm m-1'>Borrar</button></td>";
    echo "</tr>";
  }
  ?>
</table>