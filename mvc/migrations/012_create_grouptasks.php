<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_grouptasks extends CI_Migration {
	public function up() {
		$this->dbforge->add_field(array(
			'grouptasksID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'group_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			),
			'date' => array(
				'type' => 'DATE',
				'null' => FALSE
			),
			'description' => array(
				'type' => 'TEXT',
				'constraint' => '255',
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('grouptasksID', TRUE);
		$this->dbforge->create_table('grouptasks');
	}

	public function down() {
		$this->dbforge->drop_table('grouptasks');
	}
}



/* End of file 006_create_grouptasks.php */

/* Location: .//E/Xampp/htdocs/ini_grouptasks/mvc/migrations/006_create_grouptasks.php */