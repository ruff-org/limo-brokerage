<?php

	//error_reporting(-1); ini_set('display_errors', 1);

	define('DOCROOT', __DIR__);
	define('APPPATH', __DIR__.DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .'app'.DIRECTORY_SEPARATOR);
	define('COREPATH', __DIR__.DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .'lib' . DIRECTORY_SEPARATOR . 'fuel' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
	define('PKGPATH', __DIR__.DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .'lib' . DIRECTORY_SEPARATOR . 'fuel' . DIRECTORY_SEPARATOR . 'packages' . DIRECTORY_SEPARATOR);
	define('VENDORPATH', __DIR__.DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .'lib' . DIRECTORY_SEPARATOR . 'fuel' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);

	defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
	defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

	if ( ! file_exists(COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php')){ die('No composer autoloader.'); }

	require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';

	class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

	$routerequest = function($request = null, $e = false){
		Request::reset_request(true);

		$route = array_key_exists($request, Router::$routes) ? Router::$routes[$request]->translation : Config::get('routes.'.$request);

		if ($route instanceof Closure){ $response = $route(); if( ! $response instanceof Response){ $response = Response::forge($response); } } elseif ($e === false){ $response = Request::forge()->execute()->response(); }
		elseif ($route){ $response = Request::forge($route, false)->execute(array($e))->response(); }
		elseif ($request){ $response = Request::forge($request)->execute(array($e))->response(); }
		else{ throw $e; }

		return $response;
	};

	try { require APPPATH.'bootstrap.php';$response = $routerequest();} 
	catch (HttpBadRequestException $e) { $response = $routerequest('_400_', $e); }
	catch (HttpNoAccessException $e) { $response = $routerequest('_403_', $e); }
	catch (HttpNotFoundException $e) { $response = $routerequest('_404_', $e); }
	catch (HttpServerErrorException $e) { $response = $routerequest('_500_', $e); }

	$response->body((string) $response); $response->send(true);