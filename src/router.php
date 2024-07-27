<?php

return function (FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/', 'App\Controller\HomeController@index');
};
