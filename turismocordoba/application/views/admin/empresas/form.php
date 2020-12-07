<section>

    <div class="container my-5 p-5">
        <div class="row">
            <div class="col">
                <div class="register-box">
                    <div class="register-logo">
                        <a href="<?php echo base_url() ?>home"><b> Turismo Cordoba</b></a>
                    </div>

                    <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>

                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg"><?php echo $title ?></p>

                            <?php echo form_open('', 'class="my_form" enctype="multipart/form-data"'); ?>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'nombre_empresa',
                                    'id' => 'nombre_empresa',
                                    'type' => 'text',
                                    'value' => $nombre_empresa,
                                    'placeholder' => 'Nombre de la empresa',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="username" class="col-sm-2 col-form-label">Username</label>';

                                echo form_input($text_input);

                                echo form_error('nombre_empresa', '<div class="text-error">', '</div>')
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