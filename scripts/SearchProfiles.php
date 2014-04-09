<?php

require('DatabaseConnect.php');
require('Display.php');

/** 
 * Checks if search query matches username in database
 */

class SearchProfiles extends DatabaseConnect {

	public function __construct() {
		// Checks if search POST received
		if (isset($_POST['searchQuery'])) {
			$this->searchDB($_POST['searchQuery']);
		}
	}

	public function searchDB($search) {

		// Checks if connected to DB
		if($this->databaseConnection()) {
			$search = $this->db_connection->real_escape_string($search);
			$search_term = '[[:<:]]' . $search . '[[:>:]]';
			$searchQuery = "SELECT * FROM Profiles WHERE username REGEXP '$search_term'";
			$searchResults = $this->db_connection->query($searchQuery);

			if($searchResults->num_rows > 0) {

				while($displaySearch = $searchResults->fetch_array()) {
					$username = $displaySearch['username'];
					$gender = $displaySearch['gender'];
					$age = $displaySearch['age'];
					$description = $displaySearch['description'];

					// Creates new Display object that returns queried profiles
					$display = new Display($username, $gender, $age, $description);
				}
			} 

		}

	}

}

$searchProfiles = new SearchProfiles();

?>