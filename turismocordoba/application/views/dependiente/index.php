<section>
    <div class="container">

        <?php

        echo '<p style="color: green">' . $mensaje . '</p>';

        echo form_open('', 'class="my_form" enctype="multipart/form-data"');

        echo '<div class="form-group"">';

        echo form_label('Email del usuario que recibirá los puntos', 'email');

        $text_input = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'value' => '',
            'placeholder' => 'correo@ejemplo.com',
            'class' => 'form-control input-lg',
        );

        echo form_input($text_input);

        echo form_error('email', '<div class="text-error">', '</div>');

        echo '</div>';

        echo '<div class="form-group"">';

        foreach ($ofertas as $row => $value) {
            $options[$value->codigo] = $value->codigo;
        }

        echo form_label('Código', 'codigo');

        echo form_dropdown('codigo', $options, '', 'class="form-control"');

        echo form_error('codigo', '<div class="text-error">', '</div>');

        echo '</div>';


        echo form_submit('mysubmit', 'Canjear', 'class="btn btn-primary"');

        echo form_close();


        ?>

    </div>
</section>