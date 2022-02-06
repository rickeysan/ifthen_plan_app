<header id="header">
    <div class="inner">
        <h1 class="logo">
            <a href="{{ route('home.index') }}"><img src="{{ asset('img/site_logo.png') }}" alt="サイトロゴ"></a>
        </h1>
        <nav>
            <ul class="header__nav-list">
                <li class="logined-header__nav-item">
                    <a href="{{ route('home.index') }}">
                    <img class="logined-header__nav-item__img" src="{{ asset( Storage::url(Auth::user()->file_path) ) }}" alt="">
                    </a>
                </li>
                <div class="openbtn"><span></span><span></span><span></span></div>
            </ul>
        </nav>
    </div>
    <nav id="g-nav">
        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
            <ul>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('home.index') }}"><i class="fas fa-home"></i>HOME</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('habit.create') }}"><i class="far fa-calendar-plus"></i>新しい習慣</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('search.index') }}"><i class="fas fa-search"></i>習慣を検索</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('profile.index') }}"><i class="far fa-id-card"></i>プロフィール</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="/like-show"><i class="far fa-heart"></i>お気に入り</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('change.index') }}"><i class="fas fa-key"></i>パスワード変更</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('logout.index') }}"><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
                <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href="{{ route('withdraw.index') }}">退会</a></li>
            </ul>
        </div>
    </nav>
</header>
