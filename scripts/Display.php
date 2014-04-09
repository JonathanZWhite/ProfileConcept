<?php

/** 
 * Displays queried profiles 
 */

class Display {
	private $errors 		= array();
	private $username		= "";
	private $gender			= "";
	private $age			= "";
	private $description	= "";

	public function __construct($username, $gender, $age, $description) {
		$this->displayOutput($username, $gender, $age, $description);
	}

	public function displayOutput($username, $gender, $age, $description) {

		$this->username = $username;
		$this->gender = $gender;
		$this->age = $age;
		$this->description = $description;

		echo '
			<li>
				<section class="profileHeader"><img class="profileImg" src="img/profile.png"><h3 class="profileUsername"> ' . $this->username . ' </h3>
				</section>
				<section class="profileInfoBlock">
					<p class="profileInfo"><span class="bold">Age:</span> ' . $this->age . '</p>
					<p class="profileInfo"><span class="bold">Sex:</span> ' . $this->gender . '</p>
					<p class="profileDescription"><span class="bold">Description:</span> ' . $this->description . '</p>
				</section>
			</li>
		';
	}
}

?>