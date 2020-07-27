<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{

    public function __construct()
    {
    }

    # 搭配全域的 middlewares: GlobalBeforeMiddleware, GlobalAfterMiddleware
    public function middle01(Request $request) {
        $x_shin = $request->headers->get('X-Shin');
        $request->headers->set('X-Shin', $x_shin. 'controller-');

        return $request->headers->all();
    }

}
