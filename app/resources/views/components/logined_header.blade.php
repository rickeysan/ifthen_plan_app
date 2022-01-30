<header id="header">
    <div class="inner">
        <h1 class="logo">
            <a href=""><img src="{{ asset('img/site_logo.png') }}" alt="サイトロゴ"></a>
        </h1>
        <nav>
            <ul class="header__nav-list">
                <li class="logined-header__nav-item">
                    <a href="{{ route('home.index') }}">
                    <img class="logined-header__nav-item__img" src="img/top_banner.png" alt="">
                    </a>
                </li>
                <li><a href="">マイページ</a></li>
            </ul>
        </nav>
    </div>
</header>
