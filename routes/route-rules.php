<?php
/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Http\Request;

# 選擇性的參數
$router->get('/hello[/{name}]', function($name='Shinder'){
    # 回傳陣列會變成傳回 JSON
    return ['name' => $name];
});

# 正規表示法
$router->get('/m/{mobile:09\d{2}-?\d{3}-?\d{3}}', function($mobile){
    return [
        'mobile' => preg_replace('/-/', '', $mobile)
    ];
});

# 設定路由的名稱
$router->get('/hi[/{name}]', [
    'as' => 'say_hi',
    function($name=''){
        return [
            'name' => $name,
            'route' => route('say_hi')
        ];
}]);

# 轉向
$router->get('/say-hello', function(){
    // return redirect()->route('say_hi');
    return redirect()->route('say_hi', ['name'=>'David']);
});

## 路由群組: 中介軟體、名稱空間、前置路由
# 前置路由
$router->group(['prefix'=>'abc'], function() use ($router){
    $router->get('def', function(){
        return '/abc/def';
    });
    $router->get('ghi', function(){
        return '/abc/ghi';
    });
});







