<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_install_login_control extends CI_Migration {
	private $table;

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();

		$this->load->config('login_control', TRUE);
		$this->table = $this->config->item('lc_tablename', 'login_control');
	}

	public function up() {
		// Drop table 'groups' if it exists
		$this->dbforge->drop_table($this->table, TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
			),
			'ip_address' => array(
				'type'       => 'VARCHAR',
				'constraint' => '45',
			),
			'time' => array(
				'type'      => 'timestamp',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->table);
		
		$this->db->query('ALTER TABLE `login_control` ADD FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;');
	}

	public function down() {
		$this->dbforge->drop_table($this->table, TRUE);
	}
}
