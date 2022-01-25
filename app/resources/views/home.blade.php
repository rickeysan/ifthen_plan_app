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
        <p>user_id {{ session('user_id') }}</p>
        <a href="/habit/create">新しい習慣を作る</a>
    </div>
    <h2>登録した習慣</h2>
    {{-- <a href="{{ route("habit.edit", 2) }}">登録を編集する</a> --}}
    @if (count($habits) > 0)
        @foreach ($habits as $habit)
        <ul>
            <li>{{$habit->task}}</li>
            <li><a href="{{ route('habit.edit', $habit->id) }}">編集する</a></li>
            <li>
                <form action="{{ route('habit.destroy',$habit->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除する">
                </form>
            </li>
        </ul>
        @endforeach
    @else
        <p>登録されている習慣はありません</p>
    @endif
    <a href="/logout">ログアウトする</a>
    <a href="/password/change">パスワードを変更する</a>
    <a href="/profile">マイページ編集</a>
</body>
</html>
