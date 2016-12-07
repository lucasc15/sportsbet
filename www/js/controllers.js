// Controller for events to allow for loading of events for a particular sport, and inputting votes
// Needs to be instatiated like controller.sport = sport to interact with the API
sportsBetApp.controller("EventController", function($scope, EventData) {
    $scope.events;
    $scope.status = null;
    GetEvents();

    function GetEvents() {
	//EventData.getEvents($scope.sport)
	EventData.getEvents('hockey')
	    .success(function (events) {
		$scope.events = events;
		$scope.status = null;
	    })
	    .error(function (error) {
		$scope.status = "Error";
	    });
    }

    $scope.vote = function (eventID, optionID) {
	EventData.Vote(eventID, optionID)
	    .success(function() {
		$scope.status = null;
	    })
	    .error(function (error) {
		$scope.status = "Error";
	    });
    }
});

sportsBetApp.controller("LoginController", function($scope, LoginData) {
    $scope.login = function(username, password) {
	LoginData.login(username, password)
	    .success(function() {
                $scope.status = null;
	    })
	    .error(function (error) {
		$scope.status = "Error logging in!";
	    });
    }

    $scope.logout = function(username, password) {
        LoginData.logout();
    }

    $scope.register = function(username, password) {
        LoginData.register(username, password)
	    .success(function(response) {
		if (response.errors) {
		    $scope.errors = errors;
		}
	    })
	    .error(function(error) {
		$scope.errors = ['Could not process request, please try again'];
	    });
    }
});

sportsBetApp.controller("LeaderboardController", function($scope, LeaderboardData) {
    $scope.errors = null;
    $scope.leaderboard = getLeaderboard();
    
    function GetLeaderboard() {
        LeaderboardData.getLeaderboard()
	    .success(function(response) {
		$scope.leaderboard = response.leaderboard;
	    })
	    .error(function(response){
		$scope.errors = response.errors;
	    });
    }	
});

		      
