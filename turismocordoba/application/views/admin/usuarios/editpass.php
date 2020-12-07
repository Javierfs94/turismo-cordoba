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
                                    'name' => 'password',
                                    'id' => 'password',
                                    'type' => 'password',
                                    'value' => '',
                                    'placeholder' => 'Password',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="password" class="col-sm-2 col-form-label">Password</label>';

                                echo form_input($text_input);

                                echo form_error('password', '<div class="text-error">', '</div>')
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