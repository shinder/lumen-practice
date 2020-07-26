<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/qb01', function(){
    // bindings
    $result = DB::table('address_book')->get();
    return $result;
});

/*

# 取得所有內容
DB::table('address_book')->get();







 */

