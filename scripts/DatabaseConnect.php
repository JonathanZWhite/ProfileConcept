<?php

class DatabaseConnect {
	protected $db_connection				= null;

	public function databaseConnection() {
		if($this->db_connection != null) {
			// If database is already connected
			return true;
		} else {
			$this->db_connection = new mysqli('*******', '*******', '*******', '*******');
			// Creates new mysqli object
			return true;
			// Returns true for database check

			if($this->db_connection->connect_errno()) {
				echo 'Failed to connect to MYSQL: ' . $this->db_connection->connect_error();
				return false;
			} 
		}
	}
}

?>