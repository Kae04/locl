<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<!-- @php
dd($index);
@endphp -->
 <p>[[$txt}}</p>
 <form action="/hello" mehod="POST">
  <table>
    @csrf
      <tr>
      <th>name:</th>
      <td>
      <input type="text" name="name">
      </td>
      </tr>
      <tr>
      <th>email:</th>
      <td>
       <input type="email" name="email">
       </td>
      </tr>
      <tr>
       <td>
        <input type="text" name="age">
       </td> 
      </tr>
      </table>
      <input type="submit" value="送信">
 </form>
</body>

</html>