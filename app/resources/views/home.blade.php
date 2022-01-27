<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header id="header">
        <div class="inner">
            <h1 class="logo">
                <a href=""><img src="img/top_banner.png" alt=""></a>
            </h1>
            <nav>
                <ul class="header__nav-list">
                    <li class="logined-header__nav-item">
                        <a href="">
                        <img class="logined-header__nav-item__img" src="img/top_banner.png" alt="">
                        </a>
                    </li>
                    <li><a href="">マイページ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">
        <div class="main__inner columns-2">
            <nav class="dashbord-menu__list-nav">
                <ul class="dashbord-menu__list-ul">
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i>HOME</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('habit.create') }}"><i class="far fa-calendar-plus"></i>新しい習慣</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('search.index') }}"><i class="fas fa-search"></i>習慣を検索</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('profile.index') }}"><i class="far fa-id-card"></i>プロフィール</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-heart"></i>フォローリスト</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('change.index') }}">パスワード変更</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('logout.index') }}">ログアウト</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('withdraw.index') }}">退会</a></li>

                </ul>
            </nav>

            <section class="my-habits__section">
                <h2 class="section-title">現在チャレンジ中の習慣</h2>
                <div class="my-habits__container">
                    @if (isset($habits))
                        @foreach ($habits as $habit)
                        <div class="my-habits__card">
                            <a href="{{ route('habit.edit',$habit->id) }}" class="my-habits__card-body">
                                <p class="my-habits__card-body__text">{{ $habit['task'] }}</p>
                            </a>
                            <div class="my-habits__card-foot">
                                <button class="my-habits__button">達成</button>
                                <button class="my-habits__button">例外日</button>
                            </div>
                        </div>
                        @endforeach
                    @else
                    チャレンジ中の習慣はありません
                    @endif
                </div>
            </section>
        </div>
    </main>



    <a href="/password/change">パスワードを変更する</a>
</body>
</html>
