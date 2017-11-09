<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attachment_model extends CI_Model {

    public $task_id;
    public $nome_arquivo;
    public $tamanho;
    public $arquivo;

    /**
     * Retorna um attachment
     * @param type $id ID do attachment
     * @return type Attachment
     */
    public function get($id) {
        return $this->db
                        ->get_where('attachments', ['attachment_id' => $id])
                        ->row();
    }

    /**
     * Insere um attachment
     */
    public function insert($task_id) {
        if (!$this->upload->do_upload('file')) {
            return $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->task_id = $task_id;
            $this->nome_arquivo = $data['upload_data']['orig_name'];
            $this->tamanho = $data['upload_data']['file_size'];
            $this->arquivo = $data['upload_data']['file_name'];

            $this->db->insert('attachments', $this);
            return $this->db->insert_id();
        }
    }

    /**
     * Remove um attachment
     * @param type $attach_id ID do Attachment
     */
    public function delete($attach_id) {
        $this->config->load('upload');
        $attach = $this->db->get_where('attachments', ['attachment_id' => $attach_id])->row();
        unlink(realpath(APPPATH . '../' . $this->config->item('upload_path') . $attach->arquivo));
        $this->db->delete('attachments', ['attachment_id' => $attach_id]);

        return true;
    }

    public function from_task($task_id) {
        return $this->db->get_where('attachments', ['task_id' => $task_id])->result();
    }

}
