<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

// var_dump($app);

// $router = new Router;

// require 'routes.php';

// $uri = trim($_SERVER['REQUEST_URI'], '/');

// require $router->direct($uri);

use App\Core\Request;
use App\Core\Router;

Router::load('app/routes.php')
	->direct(Request::uri(), Request::method());