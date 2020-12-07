<section class="container">
    <div class="row">

        <div class="col-sm-12">
            <a href="<?php echo base_url() ?>home"><b> Turismo Cordoba</b></a>
            <p class="login-box-msg"><?php echo $title ?></p>
            <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>
        </div>

        <div class="col-sm-12  my-3">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg"><?php echo $title ?></p>

                    <?php

                    $hidden = array('username' => $username);
                    echo form_open('', 'class="my_form" enctype="multipart/form-data"', $hidden); ?>

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
                            <?php echo form_submit('mysubmit', 'Editar', 'class="btn btn-primary"') ?>
                        </div>
                    </div>

                    <?php echo form_close() ?>

                </div>

            </div>
        </div>

    </div>
</section>