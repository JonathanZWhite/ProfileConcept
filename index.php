<?php require('header.php'); ?>  
  <body>
  	<div class="bodyContainer">
  		<div class="boxContainer">
  			<h2 class="boxTitle">Create your profile</h2>
  			<div class="inputBox">
  				<ul>
  					<li><input name="userInfo" class="userInput" type="input" placeholder="Type in your desired username"></li>
  					<li class="arrow"></li>
  				</ul>
  			</div>
  			<div class="progress"><div class="progressBar"></div></div>
        <div class="confirmMessage"><p>Refresh the page to see your profile card!</p></div>
  		</div>
      <ul class="profiles">
        <?php require('scripts/DisplayProfiles.php'); ?>
      </ul>
  	</div>
  </body>
<?php require('footer.php'); ?>