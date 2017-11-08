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
            redirect('');
        }

        $this->prepare_fields($task);
        $this->render_page('dashboard/editar');
    }

    public function deletar($id) {
        $this->Task_model->delete($id);
        redirect();
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
    }

}
