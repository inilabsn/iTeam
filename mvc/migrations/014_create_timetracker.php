<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_timetracker extends CI_Migration {
	public function up() {
		$this->dbforge->add_field(array(
			'timetrackerID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'date' => array(
				'type' => 'DATE',
				'null' => FALSE
			),
			'timehour' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'projectID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'taskID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'userID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => FALSE
			),
			'usertype' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			)
		));
		$this->dbforge->add_key('timetrackerID', TRUE);
		$this->dbforge->create_table('timetracker');
	}

	public function down() {
		$this->dbforge->drop_table('timetracker');
	}
}



/* End of file 006_create_grptaskslist.php */

/* Location: .//E/Xampp/htdocs/ini_grptaskslist/mvc/migrations/006_create_grptaskslist.php */