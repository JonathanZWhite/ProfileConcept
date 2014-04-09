<?php

ini_set('display_errors', true);
error_reporting( E_ALL );

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
					$username = $display_row['username'];
					$gender = $display_row['gender'];
					$age = $display_row['age'];
					$description = $display_row['description'];

					$username = $this->db_connection->real_escape_string($username);
					$gender = $this->db_connection->real_escape_string($gender);
					$age = $this->db_connection->real_escape_string($age);
					$description = $this->db_connection->real_escape_string($description);


					$display = new Display($username, $gender, $age, $description);
				}
			} 

		} else {
			array_push($this->errors, 'Failed to connect to DB');
		}
	}
}

$displayProfile = new DisplayProfiles();

?>