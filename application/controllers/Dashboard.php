<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para a Dashboard
 *
 * @author guilh
 */
class Dashboard extends AuthenticatedController {

    public function __construct() {
        parent::__construct();

        $this->load->model('Task_model');
        $this->load->model('Attachment_model');

        $this->data['title'] = 'Dashboard';
    }

    /**
     * Página principal - lista de tasks
     */
    public function index() {
        $this->data['tasks'] = $this->Task_model->get();
        $this->render_page('dashboard/index');
    }

    /**
     * Criar uma task
     */
    public function nova() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->form_validation->run('tasks') != FALSE) {
            $this->Task_model->insert();

            redirect('');
            return;
        }

        $this->prepare_fields();
        $this->render_page('dashboard/nova');
    }

    /**
     * Editar uma task
     * @param type $id ID da task
     */
    public function editar($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->form_validation->run('tasks') != FALSE) {
            $this->Task_model->update($id);

            redirect('');
            return;
        }

        $task = $this->Task_model->get($id);
        if ($task == null) {
            redirect('dashboard');
        }

        $this->prepare_fields($task);
        $this->render_page('dashboard/editar');
    }

    public function deletar($id) {
        $this->Task_model->delete($id);
        redirect();
    }

    public function ver($task_id = 0) {
        $this->load->config('upload');
        $this->load->library('markdown');

        $task = $this->Task_model->get($task_id);
        if ($task == NULL) {
            redirect('dashboard');
        }

        $this->data['task'] = $task;
        $this->data['files'] = $this->Attachment_model->from_task($task_id);
        $this->render_page('dashboard/ver');
    }

    public function anexos($task_id) {
        $this->load->config('upload');
        $this->data['task'] = $this->Task_model->get($task_id);
        $this->data['files'] = $this->Attachment_model->from_task($task_id);
        $this->render_page('dashboard/anexos');
    }

    public function completar($task_id) {
        $this->Task_model->done($task_id);
        redirect('dashboard/ver/' . $task_id);
    }

    private function prepare_fields($task = null) {
        $this->data['input_titulo'] = [
            //'type' => 'text', // Setado pela interface
            'id' => 'titulo',
            'name' => 'titulo',
            'required' => 'required',
            'value' => (set_value('titulo') ?: ($task ? $task->titulo : '')),
            'placeholder' => 'Titulo',
            'class' => 'form-control',
        ];
        $this->data['input_descricao'] = [
            //'type' => 'textarea', // Setado pela interface
            'id' => 'descricao',
            'name' => 'descricao',
            'required' => 'required',
            'value' => (set_value('descricao') ?: ($task ? $task->descricao : '')),
            'placeholder' => 'Descrição',
            'class' => 'form-control',
        ];
        $this->data['prioridade'] = (set_value('prioridade') ?: ($task ? $task->prioridade : ''));
    }

}
