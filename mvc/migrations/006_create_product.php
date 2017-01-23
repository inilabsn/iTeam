<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_product extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'productID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'categoryID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'product' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE
			),
			'description' => array(
				'type' => 'text',
				'null' => TRUE	
			),
			'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => FALSE
			),
			'createDate' => array(
				'type' => 'TIMESTAMP', 
				'constant' => 'CURRENT_TIMESTAMP'
			)
		));
		$this->dbforge->add_key('productID', TRUE);
		$this->dbforge->create_table('product');
	}

	public function down() {
		$this->dbforge->drop_table('product');
	}

}

/* End of file 006_create_product.php */
/* Location: .//E/Xampp/htdocs/ini_product/mvc/migrations/006_create_product.php */