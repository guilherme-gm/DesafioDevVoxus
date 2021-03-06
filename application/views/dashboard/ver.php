<div class='panel <?php if (!$task->feito_por): ?>panel-default<?php else: ?>panel-success<?php endif; ?>'>
    <div class='panel-heading relative'>
        <div class="panel-right">
            <?php if (!$task->feito_por): ?>
                <a href="<?= site_url('dashboard/completar/' . $task->task_id) ?>" class='btn btn-success'>Completar</a>
            <?php endif; ?>
            <a href="<?= site_url('dashboard') ?>" class='btn btn-default'>Voltar</a>
        </div>
        <h3>Visualizando Task: <i><?= $task->titulo ?></i></h3>
    </div>
    <div class="panel-body">
        <p><b>Criado por: </b> <?= $task->autor ?></p>
        <?php if ($task->feito_por != NULL): ?>
            <p><b>Completada por: </b> <?= $task->feito_por ?></p>
        <?php endif; ?>
        <p><b>Prioridade: </b> <?= $this->Task_model::PRIORIDADES[$task->prioridade] ?></p>
        <p><b>Descrição: </b></p>
        <p><?= $this->markdown->text(nl2br($task->descricao)) ?></p>
        <hr>
        <h4>Anexos <a href="<?= site_url('dashboard/anexos/' . $task->task_id) ?>" class="btn btn-success">Modificar</a></h4>
        <?php if (count($files) == 0): ?>
            <p><b>Esta task não possui anexos.</b></p>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($files as $file): ?>
                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe align-center">
                    <?php
                    $file_parts = pathinfo($file->nome_arquivo);
                    switch ($file_parts['extension']) {
                        case 'jpg':
                        case 'gif':
                        case 'png':
                        case 'bmp':
                            $img = base_url($this->config->item('upload_path') . $file->arquivo);
                            break;

                        default:
                            $img = site_url('attachment/fake_thumbnail/big/' . $file_parts['extension']);
                            break;
                    }
                    ?>
                    <img src="<?= $img ?>" class="img-responsive"/><br />
                    <a href="<?= site_url('attachment/download/' . $file->attachment_id) ?>"><?= $file->nome_arquivo ?></a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
