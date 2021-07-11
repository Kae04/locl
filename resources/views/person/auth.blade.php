@extends('layouts.hello')

@section('title', 'auth.blade.php')

@section('content')
<p>{{$message}}</p>
   <form action="/person/ahth" method="post">
   <table>
     @csrf
     <tr><th>mail: </th><td><input type="text" name="email"></td></tr>
     <tr><th>pass: </th><td><input type="password" name="password"></td></tr>
     <tr><th><input type="submit" value="send"></th></tr>
   </table>
   </form>
@endsection