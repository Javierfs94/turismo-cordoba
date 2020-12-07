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
                                    'name' => 'descripcion',
                                    'id' => 'descripcion',
                                    'type' => 'text',
                                    'value' => $descripcion,
                                    'placeholder' => 'Descripción de la oferta',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>';

                                echo form_input($text_input);

                                echo form_error('descripcion', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'puntos',
                                    'id' => 'puntos',
                                    'type' => 'number',
                                    'value' => $puntos,
                                    'placeholder' => 'puntos',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="puntos" class="col-sm-2 col-form-label">Puntos</label>';

                                echo form_input($text_input);

                                echo form_error('puntos', '<div class="text-error">', '</div>')
                                ?>

                            </div>
                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'fecha_inicio',
                                    'id' => 'fecha_inicio',
                                    'type' => 'date',
                                    'value' => $fecha_inicio,
                                    'placeholder' => 'fecha_inicio',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha Inicio</label>';

                                echo form_input($text_input);

                                echo form_error('fecha_inicio', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'fecha_fin',
                                    'id' => 'fecha_fin',
                                    'type' => 'date',
                                    'value' => $fecha_fin,
                                    'placeholder' => 'fecha_fin',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="fecha_fin" class="col-sm-2 col-form-label">Fecha Fin</label>';

                                echo form_input($text_input);

                                echo form_error('fecha_fin', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $options = array(
                                    'Ocio' => 'Ocio',
                                    'Restauracion' => 'Restauracion',
                                    'Cultura' => 'Cultura'
                                );

                                echo '<label for="tipo" class="col-sm-2 col-form-label">Tipo</label>';

                                echo form_dropdown('tipo', $options, $tipo);

                                echo form_error('tipo', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $options = array(
                                    '0' => 'Desactivada',
                                    '1' => 'Activa'
                                );

                                echo '<label for="estado" class="col-sm-2 col-form-label">Estado</label>';

                                echo form_dropdown('estado', $options, $estado);

                                echo form_error('estado', '<div class="text-error">', '</div>')
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