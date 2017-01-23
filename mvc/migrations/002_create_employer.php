<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_employer extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'employerID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'dob' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE
			),
			'gender' => array(
				'type' => 'VARCHAR',
				'constraint' => '25',
				'null' => TRUE
			),
			'religion' => array(
				'type' => 'VARCHAR',
				'constraint' => '25',
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
				'null' => TRUE
			),
			'address' => array(
				'type' => 'text',
				'constraint' => '128',
				'null' => TRUE
			),
			'joinDate' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE	
			),
			'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => FALSE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'usertype' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
		));
		$this->dbforge->add_key('employerID', TRUE);
		$this->dbforge->create_table('employer');
	}

	public function down() {
		$this->dbforge->drop_table('employer');
	}

}

/* End of file 001_create_employer.php */
/* Location: .//E/Xampp/htdocs/ini_complain/mvc/migrations/001_create_employer.php */