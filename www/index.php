<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require_once('config.php');
require_once('test_event_response.php');
require_once('vote.php');
require_once('EventsApiHandler.php');

$CONFIG = new Config\Config();

$app = new \Slim\App(['settings' => [
    // Slim Settings
    'determineRouteBeforeAppMiddleware' => true,
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,]]);

$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__."/templates", [
        'cache' => false
    ]);

    $basePath = rtrim(str_ireplace('index.php',
				   '',
				   $container['request']->getUri()->getBasePath()
				   ),
		      '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

$app->get('/home', function(Request $request, Response $response){
    return $this->view->render($response, 'default.html');
});

$app->get('/', function(Request $request, Response $response){
    return $this->view->render($response, 'default.html');
});
  
$app->get('/sports/{sport}', function($request, $response, $args) {
    global $CONFIG;
    if ($CONFIG->IsSport($args['sport'])) {
        return $this->view->render($response, 'sport.html', [
            'sport' => $args['sport']
        ]);
    } else {
      return $this->view->render($response, '404.html');
    }
})->setName('sport');

$app->get('/api/events/{sport}', function($request, $response, $args) {
    global $CONFIG;//, $TestDataResponse;
    if ($CONFIG->IsSport($args['sport'])){
      if ($args['sport'] == 'hockey') {
        $events_api = new EventsAPIHandler();
        $events = $events_api->GetEvents($args['sport']);
	    header("Content-Type: application/json");
	    return $response->withStatus(200)
	      ->withHeader('Content-type', 'application/json')
	      ->withJson($events);
	}
    } else {
      return $response->withStatus(404);
    }
});

$app->get('/login', function($request, $response, $args) {
    return $this->View->render($reponse, 'login.html', []);
});

$app->post('/login', function($request, $response, $args) {
    /*Stub*/
    $response->withStatus(200);
});

$app->get('/register', function($request, $response, $args) {
    return $this->view->render($response, 'register.html', []);
  })->setName('register');

$app->post('/register', function($request, $response, $args) {
    $data = $request->getBody();
    $response->withStatus(200);
});

$app->post('/api/vote/{option_id}', function($request, $response, $args) {
    $data = $request->getParsedBody(); //TODO get username here when implemented
    $user_id = null; // haven't implemented users yet
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $vote = new VoteRegister();
    $error = $vote->Vote($user_id, $args['option_id'], $data['event_id'], $_SERVER['REMOTE_ADDR']);
    if ($error === '') {
      return $response->withStatus(200);
    } else {
      return $response->withStatus(403)
	->withJson(array(
			 "error" => $error,
			 "option_id" => $args['option_id']
			 ));
    }
});

$app->run();