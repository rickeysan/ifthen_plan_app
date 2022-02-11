<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>習慣クック</title>
</head>
<body>
    <header id="header">
        <div class="inner">
            <h1 class="logo">
                <a href=""><img src="{{ asset('img/site_logo.png') }}" alt="サイトロゴ"></a>
            </h1>
            <nav>
                <ul class="header__nav-list">
                    <li class="header__nav-item"><a href="{{ route('login.index') }}" class="header__nav-link">ログイン</a></li>
                    <li class="header__nav-item"><a href="{{ route('register.index') }}" class="header__nav-link">会員登録</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <p class="js-show-msg">
    </p>

    <main id="main" style="margin-top:3px;">
        <div class="main__inner__welcome">
            <div id="mainvisual">
                <img class="mainvisual-img" src="img/mainvisual.jpg" alt="">
                <div class="mainvisual-text">
                    <p class="mainvisual-text__title">挫折はあなたの弱さじゃない</p>
                    <p class="mainvisual-text__title-sub"><span>If-Thenプランニングで新しい習慣を</span><span>手に入れよう</span></p>
                    <a class="mainvisual-link" href="{{ route('register.index') }}">習慣化を始める</a>
                </div>
            </div>
            <section class="welcome__content">
                <div class="mainvisual-link__wrap">
                    <a class="mainvisual-link__responsive" href="{{ route('register.index') }}">習慣化を始める</a>
                </div>

                <h2 class="content-title">今日から始めよう</h2>
                <p class="content__body">
                    If-Thenプランニングという手法をご存じでしょうか。
                    これは目標達成術の一つで、【if】Xしたら【then】Yするというものです。
                    このアプリは、If-Thenプランニングという手法を通して、人々から習慣化の挫折経験をなくしたいという思いで作りました。
                </p>
                <h2 class="content-title">鋼の意志と仕組み化</h2>
                <p class="content__body">
                    私はプログラミング学習の習慣化に挑戦していましたが、学習に詰まってしまうとやめてしまう時がありました。しかし「エラーに詰まったときは、
                    席を立って深呼吸する」というルールを決めたところ、勉強を放り出してしまう回数が減っていきました。
                </p>
                <h2 class="content-title">ピンチをチャンスに</h2>
                <p class="content__body">
                    このアプリの世界では、「今日は〜だったから、〇〇できなかった。」は失敗ではありません。
                    習慣化を妨げる要因（〜の部分）を冷静に分析し、対処法を考えることで、明日は出来るようになっているかもしれません。
                    もちろん、必ずうまくいく保証はありません。しかし、できなかった自分を闇雲に責めるのではなく、冷静に次の一手を考えることができるのは、
                    前進です。
                    1日30分の勉強を習慣にしようと思っても、人によって障害は様々です（ゲームがやりたい、時間が足りない、集中できない）
                    ぜひ、この世界で自分だけのIf-Thenプランニングを見つけてください。そして、多くの習慣を身につけ、人生を変えて欲しいと思います。
                </p>
            </section>
        </div>
    </main>

    <footer id="footer">
        <span class="footer_text">If-Thenプランニング</span>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js')}}"></script>
<script>
    $(function(){
        const plans = [
            {'task':'2時間勉強する','plan':'疲れたらその場でスクワットをする'},
            {'task':'朝に散歩する','plan':'起きたときに面倒に思ったら、ベランダに出てみる'},
            {'task':'お菓子を食べ過ぎるのはやめたい','plan':'お菓子を食べたくなったら、誰かと分け合う'},
        ];
        $('.js-btn').on('click',function(){
            get = plans[Math.floor(Math.random() * plans.length)];
            $('.js-task').text(get['task']);
            $('.js-plan').text(get['plan']);
        })
    })
</script>
{{-- URL（ページ）ごとの追加処理 --}}
@yield('js')
@include('components.toastr')
</html>
