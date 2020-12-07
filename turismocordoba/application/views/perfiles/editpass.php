<section class="container">
    <div class="row">

        <div class="col-sm-12">
            <a href="<?php echo base_url() ?>home"><b> Turismo Cordoba</b></a>
            <p class="login-box-msg"><?php echo $title ?></p>
            <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>
        </div>

        <div class="col-sm-12 my-3">

            <div class="card">
                <div class="card-body">

                    <?php

                    echo form_open('', 'class="my_form" enctype="multipart/form-data"'); ?>

                    <div class="form-group row">
                        <?php

                        $text_input = array(
                            'name' => 'newpass1',
                            'id' => 'newpass1',
                            'type' => 'password',
                            'value' => $newpass1,
                            'placeholder' => 'Nueva Password',
                            'class' => 'form-control input-lg',
                        );

                        echo '<label for="newpass1" class="col-sm-2 col-form-label">Nueva Password</label>';

                        echo form_input($text_input);

                        echo form_error('newpass1', '<div class="text-error">', '</div>')
                        ?>

                    </div>

                    <div class="form-group row">
                        <?php

                        $text_input = array(
                            'name' => 'newpass2',
                            'id' => 'newpass2',
                            'type' => 'password',
                            'value' => $newpass2,
                            'placeholder' => 'Repita la Password',
                            'class' => 'form-control input-lg',
                        );

                        echo '<label for="newpass2" class="col-sm-2 col-form-label">Repita Password</label>';

                        echo form_input($text_input);

                        echo form_error('newpass2', '<div class="text-error">', '</div>')
                        ?>

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