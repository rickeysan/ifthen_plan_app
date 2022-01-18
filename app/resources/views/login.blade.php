<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ログイン</h1>
    <div class="main-contents-wrap">
        <form action="/login" method="post">
            @csrf
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{old('email')}}">
            @error('email')
                <p>{{$message}}</p>
            @enderror
            <label>パスワード</label>
            <input type="text" name="password" value="{{old('password')}}">
            @error('password')
                <p>{{$message}}</p>
            @enderror
            <div class="submit-btn-wrap">
                <input type="submit" value="ログインする">
            </div>

        </form>
    </div>

</body>
</html>
