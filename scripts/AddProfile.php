<?php

/** 
 * Adds profile to database
 */

require('DatabaseConnect.php');

class AddProfile extends DatabaseConnect {
	private $jsonData;
	private $userInput;
	private $errors 		= array();
	private $username		= "";
	private $gender			= "";
	private $age			= "";
	private $description	= "";

	public function __construct($jsonData) {
		$this->jsonData = $jsonData;
		$this->userInput = json_decode($this->jsonData);
		$this->username = $this->userInput->{ 'username' };
		$this->gender = $this->userInput->{ 'gender' };
		$this->age = $this->userInput->{ 'age' };
		$this->description = $this->userInput->{ 'description' };
	}

	public function dbInsert() {
		if ($this->databaseConnection()) {
			$this->description = $this->db_connection->real_escape_string($this->description);
			$add_profile_query = "INSERT INTO Profiles (username, gender, age, description) VALUES ('$this->username', '$this->gender', '$this->age', '$this->description')";
			$status = $this->db_connection->query($add_profile_query);
			if (!$status) {
				array_push($this->errors, 'Failed to add profile');
			}
		} else {
			array_push($this->errors, 'Failed to connect to DB');
		}
	}
}

$addProfile = new AddProfile($_POST['data']);
$addProfile->dbInsert();


?>