<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_grptaskslist extends CI_Migration {
	public function up() {
		$this->dbforge->add_field(array(
			'grptaskslistID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'groupID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'tasksID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			)
		));
		$this->dbforge->add_key('grptaskslistID', TRUE);
		$this->dbforge->create_table('grptaskslist');
	}

	public function down() {
		$this->dbforge->drop_table('grptaskslist');
	}
}



/* End of file 006_create_grptaskslist.php */

/* Location: .//E/Xampp/htdocs/ini_grptaskslist/mvc/migrations/006_create_grptaskslist.php */