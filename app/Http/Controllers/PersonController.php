<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
   
    
    public function add(Request $request)
    {
        return view('add');
    }
    public function create(Request $request)
    {
        $param =[
            'name' => $request->name,
            'age' => $request->age
        ];
        DB::table('people')->insert($param);
        return redirect('/h');
    }
    public function edit(Request $request)
    {
       
        $item = DB::table('people')->where('id', $request->id)->first();
        
        return view('edit', ['form' => $item]);
    }
    public function update(Request $request)
    {
        $param =[
        
        'name' => $request->name,
        'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        
        
        $item = DB::table('people')->where('id',$request->id)->first();
        return view('delete',['form' => $item[0]]);
    }
    public function remove(Request $request)
    {
        
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/');
    }
    public function show(Request $request)
    {
       
        $page = $request->max;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('show',['items' => $items]);
    }
    public function find(Request $request)
    {
        return view('find', ['input' => '']);
   }
   public function search(Request $request)
    {
        $item = Person::nameEqual($request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
   }
  public function boards(){
      return $this->hasMany('App\Models\Board');
  }
  public function index(Request $request)
  {
    $user = Auth::user();
    if(!$request->sort) {
        $sort = 'id';
    } else {
        $sort = $request->sort;
    }
    $items = Person::orderBy($sort, 'asc')->paginate(5);
    $param = ['items' => $items, 'sort' => $sort, 'user' =>$user];
    return view('index', $param);
}
public function getAuth(Request $request)
{
$param = ['message' => 'ログインしてください。'];
return view('person.auth', $param);
}

public function postAuth(Request $request)
{
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $mag = 'ログインしました。('. Auth::user()->name . ')';
        
    } else {
        $msg = 'ログインに失敗しました。';
    }
    return view('person.auth', ['message' => $msg]);
}
}

