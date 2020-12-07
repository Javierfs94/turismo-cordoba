   <!-- ======= Hero Section ======= -->
   <!-- <section id="hero">

     <div class="hero-container">
       <h1 data-aos="zoom-in">Turismo Córdoba</h1>
       <h2 data-aos="fade-up">Donde disfrutará de una visita mágica</h2>
       <a data-aos="fade-up" href="#about" class="btn-get-started scrollto">Comenzar</a>
     </div>
   </section> -->
   <!-- End Hero -->

   <?php
    if (isset($_SESSION["perfil"]) && ($_SESSION["baneado"] == 1)) {
      echo '
    <section>
    <div class="container">
      <div class="row">
        <div class="col" data-aos="fade-left">
          <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3 ">   
            <p>
              Su usuario está baneado y no puede acceder a la página.
            </p>
            <p>
              Se ha cerrado su sesión.
            </p>
            <p>
              Contacte con un administrador para solucionarlo.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>
    ';

      $this->session->sess_destroy();
    } elseif (isset($_SESSION["perfil"]) && ($_SESSION["borrado"] == 1)) {
      echo '
    <section>
    <div class="container">
      <div class="row">
        <div class="col" data-aos="fade-left">
          <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3 ">   
            <p>
              Su usuario ha sido eliminado, por lo que no puede acceder a la página.
            </p>
            <p>
              Se ha cerrado su sesión.
            </p>
            <p>
              Contacte con un administrador para solicitar su recuperación.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>
    ';

      $this->session->sess_destroy();
    } else {
      if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 4)) {
        echo '
      <section>
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Panel de control del administrador</h2>
        </div>
 
        <div class="row">
          <div class="col" data-aos="fade-left">
            <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3 ">   
              <p>
                Página Home del Administrador del sitio. 
              </p>
              <p>
                Puede realizar las gestiones correspondientes a través del menú.
              </p>
            </div>
          </div>
        </div>
 
      </div>
    </section>
      ';
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 3)) {
        if ($validacion_empresa->aprobada == "no") {
          echo '
          <section>
          <div class="container">
            <div class="row">
              <div class="col" data-aos="fade-left">
                <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3 ">   
                  <p>
                    Su empresa no está validada. Espere hasta que un administrado valdie su solicitud.
                  </p>
                  <p>
                    Se ha cerrado su sesión.
                  </p>
                  <p>
                    Contacte con un administrador para solucionarlo.
                  </p>
                </div>
              </div>
            </div>
      
          </div>
        </section>
          ';
          $this->session->sess_destroy();
        } else {
          echo '
      <section>
        <div class="container">
          <div class="row">
            <div class="col text-center" data-aos="fade-up">
              <div class="pt-4 pt-lg-0 pl-0 pl-lg-3 ">
                <h3>¡Bienvenido!</h3> 
                <p>Ha iniciado sesión como un gerente asociado a nuestro programa turístico.</p>
              </div>
            </div>
          </div>
   
        </div>
      </section>
        ';
        }
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 2)) {
        echo '
      <section>
      <div class="container">
      ';
        if (!isset($cantidad) || $cantidad <= 0) {
          echo '<form action="' . base_url() . 'dependiente/codigos" method="post">
        <div class="form-group">
          <label for="cantidad">Cantidad de códigos a meter</label>
          <input type="number" name="cantidad" placeholder="1" class="form-control" id="cantidad" value="1" min="1" max="9" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
        </form>';
        } else {

          echo form_open(base_url() . 'dependiente/canjear', 'class="my_form" enctype="multipart/form-data"');
          echo '<label for="cantidad">Email del usuario que recibirá los puntos</label>
          <input type="email" name="email" placeholder="correo@ejemplo.com" class="form-control" id="email" value="" required>
          ';

          for ($i = 1; $i < $cantidad + 1; $i++) {
            foreach ($ofertas as $row => $value) {
              $options[$value->codigo] = $value->codigo;
            }

            echo '<label for="codigo" class="col-sm-2 col-form-label">Código' . $i . '</label>';

            echo form_dropdown('codigo' . $i, $options);

            echo form_error('codigo', '<div class="text-error">', '</div>');
          }

          echo form_submit('mysubmit', 'Canjear', 'class="btn btn-primary"');

          echo form_close();
        }

        echo ' 
      </div>
      </section>
      ';
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 1) || !isset($_SESSION["perfil"])) {
        echo '
    <section>
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Sobre nosotros</h2>
        </div>
 
        <div class="row">
          <div class="col" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
              <p>En nuestra web podrá disfrutar de numerosas ofertas turísticas locales, ya sean de gastronomía, descuentos, sorteos o cualquier cosa que nuestros socios les ofrezcan para una mejor experiencia cultural.</p>
            </div>
          </div>
        </div>

      </div>
    </section>
      ';
      }
    }

    ?>