<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    const PRIORIDADES = [
        '1' => '1 - Muito Alta',
        '2' => '2 - Alta',
        '3' => '3 - Normal',
        '4' => '4 - Baixa',
        '5' => '5 - Muito Baixa'
    ];

    public $task_id;
    public $titulo;
    public $descricao;
    public $prioridade;
    public $autor_id;
    public $feito_id;

    /**
     * Retorna uma ou várias tasks
     * @param int $id ID da task a retornar (se não informado, todas)
     * @return Object Tasks
     */
    public function get($id = FALSE) {
        $query = $this->db
                ->select('tasks.*, autor.nome as autor, feito.nome as feito_por')
                ->from('tasks')
                ->join('`users` autor', 'tasks.autor_id = autor.user_id', 'left')
                ->join('`users` feito', 'tasks.feito_id = feito.user_id', 'left')
        ;

        if ($id !== FALSE) {
            return $query->get_where('', ['task_id' => $id], 1)
                            ->row();
        }

        return $query->order_by('feito_por', 'asc')
                        ->order_by('prioridade', 'asc')
                        ->get()
                        ->result();
    }

    /**
     * Insere uma task
     */
    public function insert() {
        $this->task_id = NULL;
        $this->titulo = $this->input->post('titulo');
        $this->descricao = $this->input->post('descricao');
        $this->prioridade = $this->input->post('prioridade');
        $this->autor_id = $this->session->user->user_id;

        $this->db->insert('tasks', $this);
    }

    /**
     * Atualiza uma task
     * @param int $task_id ID da Task
     */
    public function update($task_id) {
        unset($this->task_id);
        $this->titulo = $this->input->post('titulo');
        $this->titulo = $this->input->post('titulo');
        $this->descricao = $this->input->post('descricao');
        $this->prioridade = $this->input->post('prioridade');
        unset($this->autor_id);

        return $this->db->update('tasks', $this, ['task_id' => $task_id]);
    }

    /**
     * Remove uma task
     * @param int $task_id ID da Task
     */
    public function delete($task_id) {
        return $this->db->delete('tasks', ['task_id' => $task_id]);
    }

    /**
     * Completa uma task
     * @param int $task_id ID da Task
     * @return boolean TRUE em caso de sucesso, FALSE em caso de falha
     */
    public function done($task_id) {
        return
                $this->db->update(
                        'tasks', ['feito_id' => $this->session->user->user_id], ['task_id' => $task_id], 1
        );
    }

}
