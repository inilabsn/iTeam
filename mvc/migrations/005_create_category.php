<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_category extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'categoryID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'createDate' => array(
				'type' => 'TIMESTAMP', 
				'constant' => 'CURRENT_TIMESTAMP'
			)
		));
		$this->dbforge->add_key('categoryID', TRUE);
		$this->dbforge->create_table('category');
	}

	public function down() {
		$this->dbforge->drop_table('category');
	}

}

/* End of file 005_create_category.php */
/* Location: .//E/Xampp/htdocs/ini_category/mvc/migrations/005_create_category.php */