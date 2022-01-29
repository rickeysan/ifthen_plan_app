<!DOCTYPE html>
<html lang="en">
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
    <header id="header">
        <div class="inner">
            <h1 class="logo">
                <a href=""><img src="/app/public/img/top_banner.png" alt=""></a>
            </h1>
            <nav>
                <ul class="header__nav-list">
                    <li class="logined-header__nav-item">
                        <a href="">
                        <img class="logined-header__nav-item__img" src="/app/public/img/top_banner.png" alt="">
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
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="fas fa-home"></i>HOME</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-calendar-plus"></i>新しい習慣</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="fas fa-search"></i>習慣を検索</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-id-card"></i>プロフィール</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-heart"></i>フォローリスト</a></li>
                </ul>
                <a href="" class="profile-card">
                    <img src="/app/public/img/top_banner.png"   alt="" class="profile-card__img">
                    <span class="profile-card__name">伊藤フミヤ</span>
                </a>
            </nav>

            <section class="profile__section search__section">
                <h2 class="section-title">個人ページ</h2>
                <div class="my-profile__container">
                    <div class="my-profile__img-wrap">
                        <img src="/app/public/img/top_banner.png" alt="" class="my-profile__img">
                    </div>
                    <div class="my-profile__contents">
                        <p class="my-profile__name">{{ $habits[0]->user->name }}</p>
                        <p class="my-profile__text">{{ $habits[0]->user->introduction }}</p>
                    </div>

                </div>
                <h2 class="section-title">習慣一覧</h2>
                <div class="search-section__habits-container my-habits-list">
                    // 習慣が０個だった時の処理を記述する
                    @foreach ($habits as $habit)
                    <a href="" class="habits-list__card">
                        <h3 class="habits-list__card-title">{{ $habit['task'] }}</h3>
                        <p class="habits-list__card-plan">もし帰ってきて疲れていたら、マッサージガンで首をマッサージする</p>
                        <div class="habits-list__card-profile">
                            <img src="/app/public/img/top_banner.png" alt="" class="habits-list__card-img">
                            <span class="habits-list__card-name">{{ $habit->user->name }}</span>
                        </div>
                        <div class="habits-list__card-info">
                            <span class="habits-list__card-flg">チャレンジ中</span>
                            <span class="habits-list__card-like">
                                <span class="habits-list__card-like__mark">○</span>
                                <span class="habits-list__card-list__amount">13</span>
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
        </div>
    </main>


</body>
</html>

