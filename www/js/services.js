//Service tutorial: https://www.airpair.com/javascript/posts/services-in-angularjs-simplified-with-examples
//Services allow communication between controllers/RESTful APIs
var EventService = angular.module('EventService', [])
EventService.factory('EventData', ['$http', function($http) {

    EventData.getEvents = function(sport){
	return JSON.parse(
	    $http.get("events/" + sport)
	);
    };

    EventData.Vote = function(eventID, optionID) {
	return $http.post("vote/", {"eventID": eventID, "optionID": optionID});
    }
    
}]);

var LoginService = angular.module('LoginService', [])
LoginService.factory('LoginData', ['$http', '$localStorage', function ($http, $localStorage) {
    LoginData.login = function (username, password) {
	$http.post('login', {username: username, password: password})
	    .success(function (response) {
                if (response.token) {
		    $localStorage.token = reponse.token;
		    $localStorage.username = username;
		    $http.defaults.headers.common.Token = response.Token;
	    });
        }	     
    };

    LoginData.logout = function() {
        delete $localStorage.token;
	delete $localStorage.username;
	$http.defaults.headers.common.Token = '';
	
    }
}
