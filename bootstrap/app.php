<?php

use FastRoute\Dispatcher;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require_once APPLICATION_PATH . '/bootstrap/AppLogger.php';
$logger = AppLogger::getLogger();

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$routeDefinitionCallback = require APPLICATION_PATH . '/src/router.php';
$dispatcher = FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $logger->warning('Route not found: ' . $request->getUri()->getPath());
        $response = new JsonResponse(['error' => 'Not Found'], 404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $logger->warning('Method not allowed: ' . $request->getMethod() . ' for ' . $request->getUri()->getPath());
        $response = new JsonResponse(['error' => 'Method Not Allowed'], 405);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        list($class, $method) = explode('@', $handler);
        $controller = new $class($logger);
        $response = $controller->$method($request, $vars);
        break;
}

(new SapiEmitter)->emit($response);
