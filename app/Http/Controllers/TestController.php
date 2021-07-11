<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()  
  {
     return "建物";
  }

  public function index2($room)  
  {
     return  "部屋番号" . $room;
  }
}
