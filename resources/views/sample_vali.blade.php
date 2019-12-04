<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>バリデーションのサンプル</title>
  <style>
    h1 { font-size: 16px; }
    .form_wrap { padding: 10px; }
    .errors {
      width: 300px;
      font-size: 12px;
      color: #e95353;
      border: 1px solid #e95353;
      background-color: #f2dede;
    }
    .complete {
      padding-left: 10px;
      width: 290px;
      font-size: 12px;
      color: #2a88bd;
      border: 1px solid #2a88bd;
      background-color: #a6e1ec;
    }
  </style>
</head>
<body>
<h1>サンプルフォーム</h1>
@if ($errors->any())
  <div class="errors">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@isset ($status)
  <div class="complete">
    <p>バリデーションを通過しました</p>
  </div>
@endisset
<div class="form_wrap">
  <form method="post" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
      <tr>
        <td>名前</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>性別</td>
        <td>
          <input type="radio" name="gender" value="1">男
          <input type="radio" name="gender" value="2">女
        </td>
      </tr>
      <tr>
        <td>年齢</td>
        <td><input type="text" name="age"></td>
      </tr>
      <tr>
        <td>ファイル</td>
        <td><input type="file" name="file"></td>
      </tr>
      <tr>
        <td>コメント</td>
        <td><textarea name="comment"></textarea></td>
      </tr>
    </table>
    <p>
      <input type="submit" value="送信">
    </p>
  </form>
</div>
</body>
</html>
