<div class='panel panel-default'>
    <div class='panel-heading relative'>
        <a href="<?= site_url() ?>" class='btn btn-danger btn-right'>Cancelar</a>
        <h3>Editando Task</h3>
    </div>
    <div class="panel-body">
        <?= form_open() ?>
        <?= ((!empty(validation_errors())) ? '<div class="alert alert-danger">' . validation_errors() . '</div>' : '') ?>
        <div class="form-group">
            <label>Título: <?= form_input($input_titulo) ?></label>
        </div>
        <div id="submit-user">
            <?= form_submit(['name' => 'editar', 'value' => 'Editar', 'class' => 'btn btn-success']); ?>
        </div>
        <?= form_close() ?>
    </div>
</div>
