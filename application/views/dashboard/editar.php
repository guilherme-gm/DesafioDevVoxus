<div class='panel panel-default'>
    <div class='panel-heading relative'>
        <a href="<?= site_url('dashboard') ?>" class='btn btn-danger btn-right'>Cancelar</a>
        <h3>Editando Task</h3>
    </div>
    <div class="panel-body">
        <?= form_open_multipart() ?>
        <?= ((!empty(validation_errors())) ? '<div class="alert alert-danger">' . validation_errors() . '</div>' : '') ?>
        <div class="form-group">
            <label>Título: <?= form_input($input_titulo) ?></label>
        </div>
        <div class="form-group">
            <label>Prioridade: <?= form_dropdown('prioridade', $this->Task_model::PRIORIDADES, $prioridade, ['class' => 'form-control']) ?></label>
        </div>
        <div class="form-group">
            <label>Descrição: <?= form_textarea($input_descricao) ?></label>
            <p>Você pode utilizar <a href="https://daringfireball.net/projects/markdown/" target="_blank">MarkDown</a> para formatar a descrição.</p>
        </div>

        <div id="submit-user">
            <?= form_submit(['name' => 'editar', 'value' => 'Editar', 'class' => 'btn btn-success']); ?>
        </div>
        <?= form_close() ?>
    </div>
</div>
