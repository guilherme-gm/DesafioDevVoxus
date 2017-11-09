<div class='panel panel-default'>
    <div class='panel-heading relative'>
        <a href="<?= site_url('dashboard/nova') ?>" class='btn btn-success btn-right'>Nova Task</a>
        <h3>Lista de Tasks</h3>
    </div>
    <div class="panel-body">
        <?php if (count($tasks) == 0): ?>
            <p>Nenhuma Task para ser exibida.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Autor</th>
                        <th>Prioridade</th>
                        <th style="width: 130px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><a href="<?= site_url('dashboard/ver/' . $task->task_id) ?>"><?= $task->titulo ?></a></td>
                            <td><?= $task->nome ?></td>
                            <td><?= $task->prioridade ?></td>
                            <td>
                                <a href="<?= site_url('dashboard/editar/' . $task->task_id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?= site_url('dashboard/deletar/' . $task->task_id) ?>" onclick="return deletar();"><i class="glyphicon glyphicon-erase"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>