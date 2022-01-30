<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @yield('header')
    <p id="js-show-msg" class="msg-slide">
        習慣の登録に成功しました
    </p>

    <main id="main">
        <div class="main__inner columns-2">

            @yield('dashbord-menu')

            @yield('main-contents')

        </div>
    </main>

    <footer id="footer">
        <span class="footer_text">If-Thenプランニング</span>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js')}}"></script>
{{-- URL（ページ）ごとの追加処理 --}}
@yield('js')
</html>
