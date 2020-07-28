<?php
/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/middle01', 'MiddlewareController@middle01');

$router->get('/middle02', [
    'middleware' => 'my_try:shinder',
    'uses' => 'MiddlewareController@middle02'
]);

