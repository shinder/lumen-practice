<?php
/** @var \Laravel\Lumen\Routing\Router $router */


# *** 若要使用 PSR-7 Requests 需求先安裝以上兩個套件：
# composer require symfony/psr-http-message-bridge
# composer require nyholm/psr7 // zendframework/zend-diactoros 捨棄不用了
use Psr\Http\Message\ServerRequestInterface;

# 使用 requests
$router->get('/try-request01', function(ServerRequestInterface $request){
    return $request->getUri();
});

# 取得 query string (GET 參數)
$router->get('/try-qs01', 'RequestController@getQueryString');
// http://localhost:8000/try-qs01?a=1&b=2&id=A007
// http://localhost:8000/try-qs01?c[]=4&c[]=5&c[]=6
// http://localhost:8000/try-qs01?s[name]=shinder&s[age]=32


# 取得 POST 參數 (使用 Postman 測試)
$router->post('/try-post01', 'RequestController@getPost');


# 取得 raw data (使用 Postman 測試)
$router->post('/try-post02', 'RequestController@getPostJson');


# 上傳檔案 (使用 Postman 測試)
# 一欄單一檔案
$router->post('/upload01', 'RequestController@upload01');
# 一欄多個檔案
$router->post('/upload02', 'RequestController@upload02');





