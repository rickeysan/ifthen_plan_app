<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>マイページ</h1>
    <div class="main-contents-wrap">
        <p>こんにちは！{{ session('name') }}</p>
        <p>login_limit {{ session('login_limit') }}</p>
        <p>login_date {{ session('login_date') }}</p>

    </div>

    <a href="/logout">ログアウトする</a>
</body>
</html>
