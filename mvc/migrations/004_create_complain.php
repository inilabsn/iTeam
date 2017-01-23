<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Migration_Create_complain extends CI_Migration {



	public function up() {

		$this->dbforge->add_field(array(

			'complainID' => array(

				'type' => 'INT',

				'constraint' => 11,

				'unsigned' => TRUE,

				'auto_increment' => TRUE

			),

			'customerID' => array(

				'type' => 'INT',

				'constraint' => 11,

				'null' => FALSE

			),

			'type' => array(

				'type' => 'VARCHAR',

				'constraint' => '128',

				'null' => FALSE

			),

			'title' => array(

				'type' => 'VARCHAR',

				'constraint' => '255',

				'null' => FALSE

			),

			'description' => array(

				'type' => 'text',

				'null' => TRUE

				

			),

			'status' => array(

				'type' => 'text',

				'constraint' => '25',

				'null' => FALSE

			),

			'employerNote' => array(

				'type' => 'text',

				'null' => TRUE

				

			),

			'createDate' => array(

				'type' => 'TIMESTAMP', 

				'constant' => 'CURRENT_TIMESTAMP'

			),

			'closingDate' => array(

				'type' => 'TIMESTAMP', 

				'constant' => 'CURRENT_TIMESTAMP'

			),

		));

		$this->dbforge->add_key('complainID', TRUE);

		$this->dbforge->create_table('complain');

	}



	public function down() {

		$this->dbforge->drop_table('complain');

	}



}



/* End of file 004_create_complain.php */

/* Location: .//E/Xampp/htdocs/ini_complain/mvc/migrations/004_create_complain.php */