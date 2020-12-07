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
                                    'name' => 'nombre_establecimiento',
                                    'id' => 'nombre_establecimiento',
                                    'type' => 'text',
                                    'value' => $nombre_establecimiento,
                                    'placeholder' => 'Nombre del establecimiento',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="nombre_establecimiento" class="col-sm-4 col-form-label">Nombre establecimiento</label>';

                                echo form_input($text_input);

                                echo form_error('nombre_establecimiento', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'direccion',
                                    'id' => 'direccion',
                                    'type' => 'text',
                                    'value' => $direccion,
                                    'placeholder' => 'Dirección del establecimiento',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="nombre_establecimiento" class="col-sm-4 col-form-label">Dirección</label>';

                                echo form_input($text_input);

                                echo form_error('direccion', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $options = array(
                                    'Restauracion' => 'Restauración',
                                    'Cultura' => 'Cultura',
                                    'Ocio' => 'Ocio'
                                );

                                echo '<label for="tipo" class="col-sm-4 col-form-label">Tipo</label>';

                                echo form_dropdown('tipo', $options, $tipo);

                                echo form_error('tipo', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $options = array(
                                    '0' => 'Cerrado',
                                    '1' => 'Abierto'
                                );

                                echo '<label for="estado" class="col-sm-4 col-form-label">Estado</label>';

                                echo form_dropdown('estado', $options, $estado);

                                echo form_error('estado', '<div class="text-error">', '</div>')
                                ?>

                            </div>


                            <div class="form-group row">
                                <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
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

                                    <?php echo $imagen != "" ? '<img class="img_post img-thumbnail img-presentation-small" style="width: 250px; height: 250px;" src="' . base_url() . 'uploads/establecimientos/' . $imagen . '">' : '<img src="' . base_url() . 'assets/img/logo.png" class="img-thumbnail" style="width: 250px; height: 250px;" alt="Imagen de usuario">';

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