<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para Autenticação
 *
 * @author guilh
 */
class Auth extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['title'] = 'Auth';

        $this->load->library('google');
        $this->load->model('User_model');
    }

    /**
     * Pagina inicial/Login
     */
    public function index() {
        $this->data['title'] = 'Login';

        if ($this->session->user != NULL) {
            redirect('dashboard');
        }

        if ($this->input->get('code')) {
            $token = $this->google->authenticate($this->input->get('code'));
            $this->session->token = $token;
            $user = $this->google->getData();

            if ($this->User_model->exists($user) == FALSE) {
                $this->User_model->insert($user);
            }

            $this->session->user = $this->User_model->get($user);

            redirect('dashboard');
        }

        $this->data['loginURL'] = $this->google->loginURL();

        $this->render_page('auth/index');
    }

    /**
     * Logout
     */
    public function logout() {
        $this->session->unset_userdata('google_token');
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();

        redirect('auth');
    }

}
