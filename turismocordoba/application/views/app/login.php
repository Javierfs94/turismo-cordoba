<section id="login-section">
  <div>

    <form action="" method="post">
      <div id="login">

        <h3>Entrar</h3>

        <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>

        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" name="email" placeholder="correo@ejemplo.com" class="form-control" id="email" value="" aria-describedby="emailHelp" required>
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" placeholder="tu contraseña" class="form-control" name="password" id="password" value="" required>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
        <small id="registroMessage" class="form-text text-muted"> <a href="<?php echo base_url() ?>home/registro">¿Todavía sin cuenta? Pulsa aquí</a></small>
      </div>

    </form>

  </div>
</section>