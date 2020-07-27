<?php

/** @var \Laravel\Lumen\Routing\Router $router */

# 使用 controllers
$router->get('/try-controller01', 'TestController@getRequest01');
$router->get('/try-controller02[/{sid}]', 'TestController@getRequest02');
$router->get('/try-controller03[/{sid}]', 'TestController@getRequest03');

# 設定路由名稱
$router->get('/try-controller04', [
    'as' => 'try04',
    'uses' => 'TestController@getRequest04'
]);

$router->get('/try-controller05', 'TestController@getRequest05');
