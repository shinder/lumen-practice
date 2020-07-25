<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/db01', function(){
    // bindings
    $result = DB::SELECT("SELECT * FROM address_book WHERE sid=?",
        [7]);
    return $result;
});

$router->get('/db02', function(){
    // using named bindings
    $result = DB::SELECT("SELECT * FROM address_book WHERE sid=:sid",
        ['sid'=>2]);
    return $result;
});

$router->get('/db03', function(){
    $affected = DB::update("UPDATE `address_book` SET `name`=? WHERE sid=?",
        ['帥哥', 6]);
    return $affected;  // int
});

$router->get('/db04', function(){
    $deleted = DB::delete("DELETE FROM `address_book` WHERE sid=?",
        [34]);
    return $deleted;  // int
});

$router->get('/db05', function(){
    $inserted = DB::insert("INSERT INTO `address_book` (`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES
    (?, ?, ?, ?, ?, NOW());",
        ['健康的郭', '546@gmail.com', '0918111222', '1990-05-07', '台南市']);
    return $inserted;  // int
});



