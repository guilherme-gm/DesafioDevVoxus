<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public $task_id;
    public $titulo;

    /**
     * Retorna uma ou várias tasks
     * @param type $id ID da task a retornar (se não informado, todas)
     * @return type Tasks
     */
    public function get($id = FALSE) {
        if ($id != FALSE) {
            $query = $this->db->get_where('tasks', ['task_id' => $id]);
            return $query->row();
        }
        
        $query = $this->db->get('tasks');

        return $query->result();
    }

    /**
     * Insere uma task
     */
    public function insert() {
        $this->task_id = NULL;
        $this->titulo = $this->input->post('titulo');

        $this->db->insert('tasks', $this);
    }

    /**
     * Atualiza uma task
     * @param type $task_id ID da Task
     */
    public function update($task_id) {
        $this->task_id = NULL;
        $this->titulo = $this->input->post('titulo');

        $this->db->update('tasks', $this, ['task_id' => $task_id]);
    }

    /**
     * Remove uma task
     * @param type $task_id ID da Task
     */
    public function delete($task_id) {
        $this->db->delete('tasks', ['task_id' => $task_id]);
    }

}
