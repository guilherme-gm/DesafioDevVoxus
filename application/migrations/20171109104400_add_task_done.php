<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Task_Done extends CI_Migration {

    public function up() {
        $fields = array(
            'feito_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
            'CONSTRAINT FOREIGN KEY (feito_id) REFERENCES user(user_id)',
        );
        $this->dbforge->add_column('tasks', $fields);
    }

    public function down() {
        $this->dbforge->drop_column('tasks', ['feito_id']);
    }

}
