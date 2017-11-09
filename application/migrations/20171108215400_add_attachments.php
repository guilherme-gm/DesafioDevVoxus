<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Attachments extends CI_Migration {

    public function up() {
        $this->dbforge->drop_table('attachments', TRUE);
        
        $this->dbforge->add_field(array(
            'attachment_id' => array(
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
            'task_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'nome_arquivo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'tamanho' => array(
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => FALSE
            ),
            'arquivo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'CONSTRAINT FOREIGN KEY (task_id) REFERENCES tasks(task_id) ON DELETE CASCADE',
        ));
        $this->dbforge->add_key('attachment_id', TRUE);
        $this->dbforge->add_key('task_id');
        $this->dbforge->create_table('attachments');
    }

    public function down() {
        $this->dbforge->drop_table('attachments');
    }

}
