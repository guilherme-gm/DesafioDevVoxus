<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para anexos em Tasks
 *
 * @author guilh
 */
class Attachment extends AuthenticatedController {

    public function __construct() {
        parent::__construct();

        $this->load->model('Task_model');
        $this->load->model('Attachment_model');

        $this->data['title'] = 'Dashboard';
    }

    /**
     * Upload de um anexo
     * @param int $task_id Task que receberá o anexo
     */
    public function upload($task_id = 0) {
        if ($task_id == 0) {
            exit;
        }

        $this->load->library('upload');
        $ret = $this->Attachment_model->insert($task_id);
        $res = [];
        if (is_string($ret)) {
            $res['error'] = $ret;
        } else {
            $res['id'] = $ret;
        }

        echo json_encode($res);
        exit;
    }

    /**
     * Remove um anexo
     * @param int $attach_id id do anexo
     */
    public function remove($attach_id = 0) {
        if ($attach_id == 0) {
            exit;
        }

        $this->Attachment_model->delete($attach_id);
        echo "OK";
        exit;
    }

    /**
     * Gera um thumbnail falso
     * @param string $size tamanho ('small' ou 'big')
     * @param string $text texto
     */
    public function fake_thumbnail($size = '', $text = NULL) {
        if (empty($size) || $text == NULL) {
            exit;
        }

        $this->data['text'] = $text;
        $this->data['size'] = $size;
        $this->load->view('attachment/fake_thumbnail', $this->data);
    }

    /**
     * Faz o download de um anexo
     * @param integer $attach_id ID do anexo
     */
    public function download($attach_id = 0) {
        if ($attach_id == 0) {
            exit;
        }

        $this->load->config('upload');

        $attach = $this->Attachment_model->get($attach_id);
        $this->data['attachment'] = $attach;
        $this->data['path'] = FCPATH . $this->config->item('upload_path') . $attach->arquivo;
        $this->load->view('attachment/download', $this->data);
    }

}
