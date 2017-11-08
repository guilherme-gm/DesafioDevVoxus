<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public $user_id;
    public $oauth_provider;
    public $oauth_uid;
    public $nome;
    public $email;
    public $imagem;
    public $criado;

    public function get($userInfo = NULL) {
        if ($userInfo != NULL) {
            $query = $this->db->get_where('users', ['oauth_provider' => $userInfo['iss'], 'oauth_uid' => $userInfo['sub']], 1);
            return $query->row();
        }

        $query = $this->db->get('users');

        return $query->result();
    }

    public function insert($userData) {
        unset($this->user_id);
        unset($this->criado);
        $this->oauth_provider = $userData['iss'];
        $this->oauth_uid = $userData['sub'];
        $this->nome = $userData['name'];
        $this->email = $userData['email'];
        $this->imagem = $userData['picture'];

        $this->db->insert('users', $this);
    }

    public function exists($userInfo) {
        return $this->db->get_where(
                        'users', ['oauth_provider' => $userInfo['iss'], 'oauth_uid' => $userInfo['sub']], 1
                )->num_rows() > 0;
    }

}
