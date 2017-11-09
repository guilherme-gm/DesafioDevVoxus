<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tasks_Fields extends CI_Migration {

    public function up() {
        $fields = array(
            'descricao' => array(
                'type' => 'LONGTEXT',
                'default' => ''
            ),
            'prioridade' => array(
                'type' => 'TINYINT',
                'constraint' => '3',
                'default' => '0'
            ),
            'autor_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => FALSE
            ),
            'CONSTRAINT FOREIGN KEY (autor_id) REFERENCES user(user_id)',
        );
        $this->dbforge->add_column('tasks', $fields);
    }

    public function down() {
        $this->dbforge->drop_column('tasks', ['descricao', 'prioridade', 'autor']);
    }

}
