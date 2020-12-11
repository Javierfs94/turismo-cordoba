<section class="perfil container">
  <?php
  echo '
      <div class="row">
        <div class="col-sm-12">
            <a  class="btn btn-default btn-flat" href="' . base_url() . 'perfiles/form/' . $datos->id . '">
              <button class="btn btn-primary">Editar Perfil <i class="fas fa-user-edit"></i></button>
            </a>
            <a  class="btn btn-default btn-flat" href="' . base_url() . 'perfiles/actpass/' . $datos->id . '">
              <button class="btn btn-primary">Editar Password <i class="fas fa-user-edit"></i></button>
            </a>
          </div>
      </div>

      <div class="row mt-3">
        <div class="col">';
        
  echo (!empty($datos->imagen)) ? '<img src=" '  . base_url() . 'uploads/perfiles/' . $datos->imagen . ' " class="img-circle" alt="Imagen de usuario" width="250" height="250"> ' : '<img src=" '  . base_url() . 'uploads/perfiles/default-user.jpg" class="img-circle" alt="Imagen de usuario" width="250" height="250"> ';
  
  echo '<small><h3>Nombre:</small> ' . $datos->nombre . ' ' . $datos->apellidos . '</h3>
              <small><h3>Usuario:</small> ' . $datos->username . '</h3>
              <small><h3>Correo:</small> ' . $datos->email . '</h3>';

  switch ($datos->perfil) {
    case 1: // turista
      foreach ($perfil as $row) {
        echo '<h1 class="nivel">Nivel ' . $row->nivel . '</h1>
        <div class="d-flex justify-content-end"><p>' . $row->puntos . '/100</p></div>        
        <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: ' . $row->puntos . '%" aria-valuenow="' . $row->puntos . '" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        ';
      }
      break;

    case 2: // dependiente
      echo '<small><h3>Perfil:</small> Dependiente</h3>';
      break;

    case 3: // gerente
      echo '<small><h3>Perfil:</small> Gerente</h3>';
      break;

    case 4: // admin
      echo '<small><h3>Perfil:</small> Administrador</h3>';
      break;

    default:

      break;
  }
  echo '
      </div>
      </div>
      ';
  ?>
</section>