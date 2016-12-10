// Controller for events to allow for loading of events for a particular sport, and inputting votes
// Needs to be instatiated like controller.sport = sport to interact with the API
sportsBetApp.controller("EventController", function($scope, $timeout, EventData) {
    $scope.events;
    $scope.sport="hockey";
    $scope.errors = {};
    $scope.statuses = {};
    GetEvents();

    function GetEvents() {
	//EventData.getEvents($scope.sport)
	EventData.getEvents('hockey')
	    .success(function (events) {
		$scope.events = events;
		$scope.error = null;
	    })
	    .error(function (reponse) {
		$scope.error = true;
	    });
    }

    $scope.vote = function (eventID, optionID) {
	EventData.Vote(eventID, optionID)
	    .success(function() {
		$scope.status = null;
	    })
	    .error(function (response) {
		var option_id = String(response.option_id);
		$scope.errors[option_id] = true;
		$scope.statuses[option_id] = response.error;
		$timeout(function() { $scope.errors[option_id] = false; }, 2000);
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
});

		      
