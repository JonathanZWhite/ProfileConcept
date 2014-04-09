$(document).ready(function() {

	var userInfo = {
		userInputCount: 0,
		userInputArr: {},
		init: function() {
			this.sendInfo();
		},

		sendInfo: function() {
			$(".arrow").stop().click(function() {
				userInfo.eventAction();
			});
			$(".userInput").keypress(function(e) {
				if (e.which == 13) {
					e.preventDefault();
					userInfo.eventAction();
				}
			});
		},

		eventAction: function() {
			var userInput = $(".userInput").val();
			switch (userInfo.userInputCount) {
				case 0:
					userInfo.userInputArr['username'] = userInput; 
					$(".userInput").val("");
					$(".userInput").attr("placeholder", "Enter your gender");
					$(".progressBar").animate({width: "50%"});
					break;
				case 1:
					userInfo.userInputArr['gender'] = userInput;
					$(".userInput").val("");
					$(".userInput").attr("placeholder", "Enter your age");
					$(".progressBar").animate({width: "75%"});
					break;
				case 2:
					userInfo.userInputArr['age'] = userInput;
					$(".userInput").val("");
					$(".userInput").attr("placeholder", "Enter a short description about yourself");
					$(".progressBar").animate({width: "100%"});
					break;
				case 3: 
					userInfo.userInputArr['description'] = userInput;
					$(".confirmMessage").slideDown();
				case 4: 
					var jsonData = JSON.stringify(userInfo.userInputArr);

					$.ajax({
						url: "scripts/AddProfile.php",
						type: "POST",
						data: { data: jsonData },
						success: function(returnData) {
							// alert(returnData);
						}, 
						error: function() {
							console.log("AJAX call failed to send userInput");
						}
					});
					break;
			}


			userInfo.userInputCount++;
		}
	};

	var searchInfo = {
		init: function() {
			this.sendSearch();
		},

		sendSearch: function() {
			$(".arrow2").click(function() {
				searchInfo.eventAction();
			});
			$(".userInputSearch").keypress(function(e) {
				if (e.which == 13) {
					e.preventDefault();
					searchInfo.eventAction();
				}
			});
		},

		eventAction: function() {
			$(".progressBarSearch").animate({width: "100%"});
			var userSearch = $(".userInputSearch").val();
			$.ajax({
				url: "scripts/SearchProfiles.php",
				type: "POST",
				data: {searchQuery: userSearch},
				success: function(returnData) {
					$(".profiles").append(returnData);
				}, 
				error: function() {
					console.log("AJAX call failed to send userSearch");
				}
			});
		}
	};

	(function() {
		searchInfo.init();
		userInfo.init();
	}()); 

}); 
