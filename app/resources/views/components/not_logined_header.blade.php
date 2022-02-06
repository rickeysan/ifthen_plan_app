<header id="header">
    <div class="inner">
        <h1 class="logo">
            <a href="/"><img src="{{ asset('img/site_logo.png') }}" alt="サイトロゴ"></a>
        </h1>
        <nav>
            <ul class="header__nav-list">
                <li class="header__nav-item"><a href="{{ route('login.index') }}" class="header__nav-link">ログイン</a></li>
                <li class="header__nav-item"><a href="{{ route('register.index') }}" class="header__nav-link">会員登録</a></li>
            </ul>
        </nav>
    </div>
</header>
