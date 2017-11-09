<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Markdown {

    private $parsedown;
    
    public function __construct() {
        require APPPATH . 'third_party/parsedown/Parsedown.php';
        
        $this->parsedown = new Parsedown();
    }
    
    public function text($text) {
        return $this->parsedown->text($text);
    }

}
