<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Migration_Create_order extends CI_Migration {



	public function up() {

		$this->dbforge->add_field(array(

			'orderID' => array(

				'type' => 'INT',

				'constraint' => 11,

				'unsigned' => TRUE,

				'auto_increment' => TRUE

			),

			'productID' => array(

				'type' => 'INT',

				'constraint' => 11,

				'null' => FALSE

			),

			'customerID' => array(

				'type' => 'INT',

				'constraint' => 11,

				'null' => FALSE

			),

			'quantity' => array(

				'type' => 'INT',

				'constraint' => '11',

				'null' => FALSE

			),

			'total_amount' => array(

				'type' => 'FLOAT',

				'constraint' => '11',

				'null' => FALSE

			),

			'note' => array(

				'type' => 'TEXT',

				'null' => TRUE	

			),

			'status' => array(

				'type' => 'VARCHAR',

				'constraint' => '128',

				'null' => TRUE	

			),

			'createDate' => array(

				'type' => 'TIMESTAMP', 

				'constant' => 'CURRENT_TIMESTAMP'

			)

		));

		$this->dbforge->add_key('orderID', TRUE);

		$this->dbforge->create_table('order');

	}



	public function down() {

		$this->dbforge->drop_table('order');

	}



}



/* End of file 006_create_order.php */

/* Location: .//E/Xampp/htdocs/ini_order/mvc/migrations/006_create_order.php */