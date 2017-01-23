<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Migration_Create_customer extends CI_Migration {





	public function up() {

		$this->dbforge->add_field(array(

			'customerID' => array(

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

			'orgName' => array(

				'type' => 'VARCHAR',

				'constraint' => '128',

				'null' => FALSE

			),

			'gender' => array(

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

		$this->dbforge->add_key('customerID', TRUE);

		$this->dbforge->create_table('customer');		

	}



	public function down() {

		$this->dbforge->drop_table('customer');

	}



}



/* End of file 003_create_customer.php */

/* Location: .//E/Xampp/htdocs/ini_complain/mvc/migrations/003_create_customer.php */