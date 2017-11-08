<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration {

    public function up() {
        $this->dbforge->drop_table('users', TRUE);

        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
            'oauth_provider' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'oauth_uid' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'imagem' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'criado' => array(
                'type' => 'DATETIME',
                'null' => FALSE
            )
        ));
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->add_key('oauth_provider');
        $this->dbforge->add_key('oauth_uid');
        $this->dbforge->create_table('users');
        $this->db->query('ALTER TABLE `users` MODIFY COLUMN `criado` datetime NOT NULL DEFAULT NOW()');
    }

    public function down() {
        $this->dbforge->drop_table('users', TRUE);
    }

}
