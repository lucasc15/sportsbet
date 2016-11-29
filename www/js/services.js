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
