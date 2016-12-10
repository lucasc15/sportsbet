
var sportsBetApp = angular.module('sportsBetApp', ['EventService', 'LoginService']);
angular.module('sportsBetApp').value('$anchorScroll', angular.noop);

//custom directive for specifying sport on the html web page
//followed answer/fiddle here: http://stackoverflow.com/questions/16796341/set-angular-scope-variable-in-markup
//use like: <div spa-sport app-sport="%sport_name_here%"/>
sportsBetApp.directive('spaSport', function() {
    return {
	scope: {
	    sport: '@appSport',
	}
    }
    

});

    sportsBetApp.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
    });

