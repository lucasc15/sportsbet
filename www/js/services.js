//Service tutorial: https://www.airpair.com/javascript/posts/services-in-angularjs-simplified-with-examples
//Services allow communication between controllers/RESTful APIs
var EventService = angular.module('EventService', [])
EventService.factory('EventData', ['$http', function($http) {

    var EventData = {};
    
    EventData.getEvents = function(sport){
	return $http.get('/api/events/' + sport);
    };

    EventData.Vote = function(eventID, optionID) {
	return $http.post("vote/", {"eventID": eventID, "optionID": optionID});
    }

    return EventData;
    
}]);

var LoginService = angular.module('LoginService', [])
LoginService.factory('LoginData', ['$http', '$localStorage', function ($http, $localStorage) {

    var LoginData = {};
    
    LoginData.login = function (username, password) {
	$http.post('login', {username: username, password: password})
	    .success(function (response) {
                if (response.token) {
		    $localStorage.token = reponse.token;
		    $localStorage.username = response.username;
		    $http.defaults.headers.common.Token = response.token;
		}
	    });
    }	     

    LoginData.logout = function() {
        delete $localStorage.token;
	delete $localStorage.username;
	$http.defaults.headers.common.Token = '';
	
    }

    LoginData.register = function(username, password) {
        $http.post('/register', {username: username, password: password})
	    .success(function(response) {
                if (!response.errors) {
                    $localStorage.token = response.token;
		    $localStorage.username = response.username;
		    $http.defaults.headers.common.Token = reponse.token;
		}
	    });
    }

    return LoginData;
}]);

var LeaderboardService = angular.module("LeaderboardService", [])
LeaderboardService.factory('LeaderboardData', ['$http', function($http, $localStorage) {
    var LeaderboardData = {};

    LeaderboardData.getLeaderBoard = function() {
        if ($localStorage.getItem('username') === null){
            var username = 'ananymous';
	} else {
	    var username = $localStorage.getItem('username');
	}
	return $http.get('/api/leaderboard/' + username);
    }
    return LeaderboardData;
}]);

