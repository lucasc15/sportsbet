#Sportsbet
A site that allows for registered and anonymous users to bet on outcomes of sports games.

#Install/Environment
Requries `PHP > 5.5.x` and `composer`. To install dependencies run `composer update` and then `composer install`. To add a new package, install with composer: `composer require package/name`.

To run the project, `cd` to the directory `.../sportsbet/www` and type `php -S localhost:8000`. You can then navigate to routes in the `index.php` by going to `http://localhost:8000/route/name/{var}`

#Event API
A `POST` request to `events/{sport}` should return the events for the current day/ near future. The Format for the response should be:

  JSON = {"date":
            [
	      { "eventID": eventid,
	        "title": "eventTitle",
	        "options": [{
	                     "optionID": optionID,
			     "text": optionText,
			     "image": "http://domain.com/url/to/image",
			     "voteCount": voteCount,
			     }, ...
			   ],
	      }...
	    ]
	    ...
	 }

Angular will then iterate over dates -> Events and need a way to display an event title, the options, and dynamically update the click end point urls for voting to include eventID and optionID.