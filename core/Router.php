<?php

namespace App\Core;

class Router {

	public $routes = [

		'GET'  => ['name'],
		'POST' => ['age'],

	];

	public static function load($file) {

		$router = new static ;// or self

		require $file;

		return $router;

	}

	// public function define($routes) {

	// 	$this->routes = $routes;

	// }

	public function get($uri, $controller) {

		$this->routes['GET'][$uri] = $controller;

	}

	public function post($uri, $controller) {

		$this->routes['POST'][$uri] = $controller;

	}

	public function direct($uri, $requestType) {

		// die(var_dump($uri, $requestType));

		// elmob.com/about/culture
		if (array_key_exists($uri, $this->routes[$requestType])) {

			// return $this->routes[$requestType][$uri];
			// die($this->routes[$requestType][$uri]);

			// explode('@', $this->routes[$requestType][$uri]);
			return $this->callAction(

				...explode('@', $this->routes[$requestType][$uri])
			);

		}

		throw new Exception('There\'s no Route defined for the URI..');

	}

	protected function callAction($controller, $action) {

		// die(var_dump($controller, $action));
		$controller = "App\\Controllers\\{$controller}";

		$controller = new $controller;

		if (!method_exists($controller, $action)) {

			throw new Exception(
				"{$controller} doesn't respond to the {$action} action.."
			);
		}

		return $controller->$action();

	}
}
