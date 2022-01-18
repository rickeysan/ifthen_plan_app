<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>会員登録</h1>
    <div class="main-contents-wrap">
        <form action="/register" method="post">
            @csrf
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{old('email')}}">
            @error('email')
                <p>{{$message}}</p>
            @enderror
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <p>{{$message}}</p>
            @enderror
            <label>パスワード（英数字８文字以上）</label>
            <input type="text" name="password" value="{{old('password')}}">
            @error('password')
                <p>{{$message}}</p>
            @enderror
            <label>パスワード（再入力）</label>
            <input type="text" name="retype_pass" value="{{old('retype_pass')}}">
            @error('retype_pass')
                <p>{{$message}}</p>
            @enderror
            <div class="submit-btn-wrap">
                <input type="submit" value="会員登録する">
            </div>



        </form>
    </div>

</body>
</html>
