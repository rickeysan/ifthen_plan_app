<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>パスワード変更</h1>
    <form action="{{ route('change.store') }}" method="post">
        @csrf
        <label>現在のパスワード</label>
        <input type="text" name="current_pass">
        <label>新しいパスワード</label>
        <input type="text" name="new_pass">
        <label>新しいパスワード（再入力）</label>
        <input type="text" name="retype_new_pass">
        <input type="submit" vame="変更する">
    </form>
</body>
</html>
