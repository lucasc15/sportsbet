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
	    .error(function (reponse) {
		$scope.status = reponse.error;
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

		      
