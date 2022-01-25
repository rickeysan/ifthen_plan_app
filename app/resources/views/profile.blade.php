<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>プロフィール編集</h1>
    <div class="main-contents-wrap">
        <form action="/profile/{{  $user_info[0]['id'] }}" method="post">
            @csrf
            @method('PUT')
            <label>名前</label>
            <input type="text" name="name" value="{{  $user_info[0]['name'] }}">
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{  $user_info[0]['email'] }}">
            <label>自己紹介</label>任意
            <textarea name="introduction" cols="80" rows="5">{{ $user_info[0]['introduction'] }}</textarea>
            <input type="submit" value="変更する">
        </form>
    </div>
    <a href="/logout">ログアウトする</a>
    <a href="/password/change">パスワードを変更する</a>
</body>
</html>
