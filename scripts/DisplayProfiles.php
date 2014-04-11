<?php

require('DatabaseConnect.php');
require('Display.php');

class DisplayProfiles extends DatabaseConnect {
	private $errors 		= array();
	private $username		= "";
	private $gender			= "";
	private $age			= "";
	private $description	= "";

	public function __construct() {
		$this->dbRetrieve();
	}

	public function dbRetrieve() {
		if ($this->databaseConnection()) {
			$display_profile_query = "SELECT * FROM Profiles";
			$display_results = $this->db_connection->query($display_profile_query);

			if($display_results->num_rows > 0) {

				while($display_row = $display_results->fetch_array()) {
					$this->username = $display_row['username'];
					$this->gender = $display_row['gender'];
					$this->age = $display_row['age'];
					$this->description = $display_row['description'];

					$display = new Display($this->username, $this->gender, $this->age, $this->description);
				}
			} 

		} else {
			array_push($this->errors, 'Failed to connect to DB');
		}
	}
}

$displayProfile = new DisplayProfiles();

?>