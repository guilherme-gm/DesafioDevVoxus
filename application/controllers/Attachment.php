<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para a Dashboard
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

    public function upload($task_id) {
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

    public function remove($attach_id) {
        $this->Attachment_model->delete($attach_id);
        echo "OK";
        exit;
    }

    public function fake_thumbnail($size, $text) {
        $this->data['text'] = $text;
        $this->data['size'] = $size;
        $this->load->view('attachment/fake_thumbnail', $this->data);
    }

    public function download($attach_id) {
        $this->load->config('upload');

        $attach = $this->Attachment_model->get($attach_id);
        $this->data['attachment'] = $attach;
        $this->data['path'] = FCPATH . $this->config->item('upload_path') . $attach->arquivo;
        $this->load->view('attachment/download', $this->data);
    }

}
