<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller básico para ser utilizado pelas classes do sistema
 *
 * @author guilh
 */
class MY_Controller extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->config->load('google');
    }

    /**
     * Carrega a view
     * @param type $view view a ser carregada
     * @param type $data dados passados para a view
     */
    protected function render_page($view, $data = null) {
        $viewdata = (empty($data)) ? $this->data : $data;

        $this->load->view("template/header", $viewdata);
        $this->load->view($view, $viewdata);
        $this->load->view("template/footer", $viewdata);
    }

}

class AuthenticatedController extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if ($this->session->user == NULL) {
            redirect('login');
        }
        
        $this->data['user'] = $this->session->user;
    }
    
    /**
     * Carrega a view
     * @param type $view view a ser carregada
     * @param type $data dados passados para a view
     */
    protected function render_page($view, $data = null) {
        $viewdata = (empty($data)) ? $this->data : $data;

        $this->load->view("template/header", $viewdata);
        $this->load->view("template/navbar", $viewdata);
        $this->load->view($view, $viewdata);
        $this->load->view("template/footer", $viewdata);
    }
    
}