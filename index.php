<?php
/**
 *
 * index.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>.
 * Copyright (c) 05.08.2020
 */

//session_start();

require 'lib/autoload.php'; //управляющая логика от COMPOSER

/*if(! isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] !== '/login'){
    header('Location: /login');
    return;
} */

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {

    #- Переход на Главную
    $r->addRoute('GET', '/', function () {
		include_once 'views\home.php';
    });

    $r->addRoute('GET', '/about/', function () {
        include_once 'views\about.php';
    });

    $r->addRoute(['GET', 'POST'], '/contact/', function () {
        include_once 'views\contact.php';
    });
	
	$r->addRoute('GET', '/dev_app/', function () {
        include_once 'views\dev_app.php';
    });
	
	$r->addRoute('GET', '/web_proj/', function () {
        include_once 'views\web_proj.php';
    });
	
    $r->addRoute(['GET', 'POST'], '/adm/', function () {
        include_once 'adm';
    });

    $r->addRoute('GET', '/info/', function () {
        echo phpinfo();
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        include_once 'views/404.php';        
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo 'роут есть, а метода нет';
        break;

    case FastRoute\Dispatcher::FOUND:
        // ... call $handler with $vars
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        break;
		
    default:
        // ... 404 Not Found
        include_once 'views\404.php';
}