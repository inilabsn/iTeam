<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_settings extends CI_Migration {


	public function up() {
		$this->dbforge->add_field(array(
			'settingID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => FALSE
			),
			'phone' => array(
				'type' => 'text',
				'constraint' => '25',
				'null' => FALSE
			),
			'address' => array(
				'type' => 'text',
				'constraint' => '128',
				'null' => FALSE
			),
			'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE
			),
			'usertype' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE
			),
		));
		$this->dbforge->add_key('settingID', TRUE);
		$this->dbforge->create_table('settings');
		
	}

	public function down() {
		$this->dbforge->drop_table('settings');
	}

}

/* End of file 001_create_settings.php */
/* Location: .//E/Xampp/htdocs/ini_complain/mvc/migrations/001_create_settings.php */