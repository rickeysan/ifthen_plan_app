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
                <li><a href="">マイページ</a></li>
            </ul>
        </nav>
    </div>
</header>
