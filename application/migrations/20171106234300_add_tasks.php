<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tasks extends CI_Migration {

    public function up() {
        $this->dbforge->drop_table('tasks', TRUE);

        $this->dbforge->add_field(array(
            'task_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
            'titulo' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            )
        ));
        $this->dbforge->add_key('task_id', TRUE);
        $this->dbforge->create_table('tasks');
    }

    public function down() {
        $this->dbforge->drop_table('tasks', TRUE);
    }

}
