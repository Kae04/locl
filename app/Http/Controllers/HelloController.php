<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index', ['txt' => 'フォームを入力']);
    }
    
    public function post(Request $request)
    {
        $validata_rule = [
            'name' => 'required',
            'email' => 'email',
            'age' => 'numericlbetween:0,150'
        ];
        $this->validate($request, $validata_rule);
        return view('hello.index', ['txt' => '正しい入力です']);
    }
    
    
}