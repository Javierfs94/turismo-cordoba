<h2>Modificar usuario</h2>
<form action="" method="POST">
    <?php foreach ($mod as $fila) { ?>
        <input type="email" name="email" value="<?= $fila->email ?>" />
        <input type="text" name="password" value="<?= $fila->password ?>" />
        <input type="nombre" name="nombre" value="<?= $fila->nombre ?>" />
        <input type="apellido" name="apellido" value="<?= $fila->apellido ?>" />
        <input type="submit" name="submit" value="Modificar" />
    <?php } ?>
</form>
<a href="<? base_url() ?>">Volver</a>