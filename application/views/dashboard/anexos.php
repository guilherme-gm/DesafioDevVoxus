<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<div class='panel panel-default'>
    <div class='panel-heading relative'>
        <a href="<?= site_url('dashboard/ver/' . $task->task_id) ?>" class='btn btn-success panel-right'>Feito</a>
        <h3>Atualizando anexos da Task: <i><?= $task->titulo ?></i></h3>
    </div>
    <div class="panel-body">
        <form action="<?= site_url('attachment/upload/' . $task->task_id) ?>" enctype="multipart/form-data" class="dropzone" id="image-upload" method="POST">

        </form>
    </div>
</div>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        init: function () {
            let mockFiles = [
<?php foreach ($files as $file): ?>
                    {attach_id: <?= $file->attachment_id ?>, name: "<?= $file->nome_arquivo ?>", size: <?= $file->tamanho * 1000 ?>, server_name: "<?= $file->arquivo ?>"},
<?php endforeach; ?>
            ];
            for (index = 0; index < mockFiles.length; ++index) {
                let mockFile = mockFiles[index];
                this.emit("addedfile", mockFile);
                if (mockFile.name.endsWith('jpg') || mockFile.name.endsWith('gif') || mockFile.name.endsWith('png')) {
                    this.emit("thumbnail", mockFile, "<?= base_url($this->config->item('upload_path')) ?>" + mockFile.server_name);
                } else {
                    this.emit("thumbnail", mockFile, "<?= site_url('attachment/fake_thumbnail/small/') ?>" + mockFile.name.split('.').pop());
                }
                this.emit("complete", mockFile);
            }
        },
        maxFilesize: 1,
        addRemoveLinks: true,
        dictDefaultMessage: "Enviar Arquivos",
        dictFallbackMessage: "O navegador não suporta o upload de arquivos avançado",
        dictCancelUpload: "Cancelar Upload",
        dictRemoveFile: "Remover Anexo",
        complete: function (file) {
            if (file.hasOwnProperty("xhr")) {
                let json = JSON.parse(file.xhr.response);
                file.attach_id = json["id"];
            }
        },
        removedfile: function (file) {
            let url = "<?= site_url('attachment/remove/') ?>" + file.attach_id;
            console.log(url);
            $.post(url)
                    .done(function () {
                        $(document).find(file.previewElement).remove();
                    })
                    .fail(function () {
                        alert("Falha ao remover arquivo");
                    });
        }
    };
</script>