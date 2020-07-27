<?php
/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;

# 使用 Response 類別
$router->get('/try-response01', function(){
    return new Response(
        '{"name":"shin"}',
        200,
        [
            'Content-Type' => 'application/json',
            'X-Header-One' => '測試的檔頭',
        ]
    );
});

$router->get('/try-response02', function(){
    $res = new Response();
    $res->setContent('{"name":"der"}');
    $res->setStatusCode(200);
    $res->withHeaders([
        'Content-Type' => 'application/json',
        'X-Header-One' => '測試的檔頭2',
    ]);
    // $res->header('Content-Type', 'text/plain'); // 設定單項檔頭
    return $res;
});

# 使用 response() helper
$router->get('/try-response03', function(){
    return response(
        '{"name":"lin"}',
        200,
        [
            'Content-Type' => 'application/json',
            'X-Header-One' => '測試的檔頭3',
        ]
    );
});

# JSON
$router->get('/try-response04', function(){
    return response()->json([
        'name' => 'shin',
        'age' => '25',
    ]);
});

# 下載檔案
$router->get('/try-response05', function(){
    return response()->download(
        __DIR__. '/../public/shin.json',
        'download-name.json'
    );
});

# 轉向
// return redirect('home/dashboard');
// return redirect()->route('profile', ['id' => 1]);




