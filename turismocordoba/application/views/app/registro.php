<!-- PENDIENTE DE ACTUALIZAR CON CODE IGNITER -->
<section>
  <div class="container my-5 p-5">
    <div class="row">
      <div class="col">
        <div class="register-box">
          <div class="register-logo">
            <a href="<?php echo base_url() ?>home"><b>Turismo Cordoba</b></a>
          </div>
  
          <?php echo '<p style="color: red">' . $mensaje . '</p>'; ?>
  
          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg">Registro de usuario</p>
  
              <form action="" method="post">
                
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
  
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
  
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Usuario" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
  
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
  
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                  </div>
                </div>
  
              </form>
  
              <a href="<?php echo base_url() ?>home/login" class="text-center">Ya tengo una cuenta</a>
  
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>