<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    /**
     * Controller para aplicar Migrações
     */
    public function index() {
        $this->load->library('migration');

        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        }
        
        $this->load->view('migrate');
    }

}
