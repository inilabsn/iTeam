<?php

class Migration_create_notice extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'noticeID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE
			),
			'notice' => array(
				'type' => 'text',
				'null' => TRUE
				
			),
			'date' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE
			),
			'create' => array(
				'type' => 'TIMESTAMP', 
				'constant' => 'CURRENT_TIMESTAMP'
			)
		));
		$this->dbforge->add_key('noticeID', TRUE);
		$this->dbforge->create_table('notice');
	}

	public function down()
	{
		$this->dbforge->drop_table('notice');
	}
}