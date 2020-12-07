<section>

    <div class="container my-5 p-5">
        <div class="row">
            <div class="col">
                <div class="register-box">
                    <div class="register-logo">
                        <a href="<?php echo base_url() ?>home"><b> Turismo Córdoba</b></a>
                    </div>

                    <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>

                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg"><?php echo $title ?></p>

                            <?php echo form_open('', 'class="my_form" enctype="multipart/form-data"'); ?>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'username',
                                    'id' => 'username',
                                    'type' => 'text',
                                    'value' => $username,
                                    'placeholder' => 'Nombre de usuario',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="username" class="col-sm-2 col-form-label">Username</label>';

                                echo form_input($text_input);

                                echo form_error('username', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'nombre',
                                    'id' => 'nombre',
                                    'type' => 'text',
                                    'value' => $nombre,
                                    'placeholder' => 'Nombre',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>';

                                echo form_input($text_input);

                                echo form_error('nombre', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'apellidos',
                                    'id' => 'apellidos',
                                    'type' => 'text',
                                    'value' => $apellidos,
                                    'placeholder' => 'Apellidos',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>';

                                echo form_input($text_input);

                                echo form_error('apellidos', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'email',
                                    'id' => 'email',
                                    'type' => 'email',
                                    'value' => $email,
                                    'placeholder' => 'Email',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="email" class="col-sm-2 col-form-label">Email</label>';

                                echo form_input($text_input);

                                echo form_error('email', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                foreach ($establecimientos as $row => $value) {
                                    $options[$value->id] = $value->nombre_establecimiento;
                                }
          
                                echo '<label for="establecimientos_empresa" class="col-sm-2 col-form-label">Establecimientos de la empresa</label>';

                                echo form_dropdown('establecimientos_empresa', $options, $establecimientos_empresa);

                                echo form_error('establecimientos_empresa', '<div class="text-error">', '</div>')
                                ?>

                            </div>


                            <div class="form-group row">
                                <?php

                                $options = array(
                                    '0' => 'Disponible',
                                    '1' => 'Borrado'
                                );

                                echo '<label for="borrado" class="col-sm-2 col-form-label">Borrado</label>';

                                echo form_dropdown('borrado', $options, $borrado);

                                echo form_error('borrado', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-10">
                                    <?php
                                    $text_input = array(
                                        'name' => 'avatar',
                                        'id' => 'avatar',
                                        'type' => 'file',
                                        'value' => '',
                                        'class' => 'form-control input-lg',
                                    );

                                    echo form_input($text_input);
                                    ?>

                                    <?php echo $imagen != "" ? '<img class="img_post img-thumbnail img-presentation-small" style="width: 250px; height: 250px;" src="' . base_url() . 'uploads/perfiles/' . $imagen . '">' : '<img src="' . base_url() . 'assets/img/logo.png" class="img-thumbnail" style="width: 250px; height: 250px;" alt="Imagen de usuario">';

                                    echo form_error('avatar', '<div class="text-error">', '</div>');
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <?php echo form_submit('mysubmit', 'Guardar', 'class="btn btn-primary"') ?>
                                </div>
                            </div>

                            <?php echo form_close() ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>