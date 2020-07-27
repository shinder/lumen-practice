<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyCustomized;

class TestController extends Controller
{

    public function __construct(Request $request)
    {
        echo "__construct: {$request->url()} <br>";
    }

    # 在 controllers 的方法以 Request 類型宣告即可取得 $request 物件
    # The current request instance will automatically be injected by the service container.
    public function getRequest01(Request $request) {
        return $request->url();
    }
    public function getRequest02(Request $request, $sid=12) {
        return $request->url();
    }
    public function getRequest03($sid=34, Request $request) {
        return $request->url();
    }

    # 使用路由名稱
    public function getRequest04() {
        return ['route()' => route('try04')];
    }

    # 使用依賴注入
    public function getRequest05(MyCustomized $my) {
        return $my->name;
    }

}
