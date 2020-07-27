<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyCustomized;

class RequestController extends Controller
{

    public function __construct()
    {
    }

    # 取得 query string (GET 參數)
    public function getQueryString(Request $request) {
        $all = $request->all();
        $only_a_b = $request->only(['a', 'b']);
        $except_a = $request->except(['a']);
        $s_name = $request->input('s.name');
        return [
            '$all' => $all,
            '$only_a_b' => $only_a_b,
            '$except_a' => $except_a,
            '$s_name' => $s_name,
        ];
    }

    # 取得 POST 參數
    public function getPost(Request $request) {
        $all = $request->all();
        $only_a_b = $request->only(['a', 'b']);
        $except_a = $request->except(['a']);
        $s_name = $request->input('s.name');
        return [
            '$all' => $all,
            '$only_a_b' => $only_a_b,
            '$except_a' => $except_a,
            '$s_name' => $s_name,
        ];
    }

    public function getPostJson(Request $request) {
        return $request->getContent(); // 取得原始資料，例如 JSON
        // return file_get_contents('php://input');
    }

    # 上傳單一檔案
    public function upload01(Request $request) {
        $folder = __DIR__. '/../../../public/imgs';
        $output = [];
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if($file->isValid()){
                $output = [
                    'mimetype' => $request->file('avatar')->getClientMimeType(),
                    'size' => $request->file('avatar')->getSize(),
                    'originalName' => $request->file('avatar')->getClientOriginalName(),
                ];
                $file->move($folder, $output['originalName']);  // 移動檔案
            }
        }
        return $output;
    }

    # 上傳多個檔案
    public function upload02(Request $request) {
        $output = [];
        foreach($request->file('photo') as $file){
            if($file->isValid()) {
                $output[] = [
                    'mimetype' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                    'originalName' => $file->getClientOriginalName(),
                ];
            }
        }
        return $output;
    }

}
