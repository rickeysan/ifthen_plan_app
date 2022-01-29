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
            <nav class="search-menu__list-nav">
                <form action="{{ route('search.show',['key_word','category_id']) }}" method="get">
                    @csrf
                    <div class="search-menu__item-head">
                        <p class="search-menu__item-head__text">キーワード</p>
                    </div>
                    <div class="search-menu__item-foot">
                        <input type="text" name="key_word" value="{{ isset($key_word) ? $key_word :'' }}" class="search-menu__item-foot__input">
                    </div>
                    <div class="search-menu__item-head">
                        <p class="search-menu__item-head__text">カテゴリー</p>
                    </div>
                    <div class="search-menu__item-foot">
                        <select name="category_id"class="search-menu__item-foot__select">
                            <option value="" class="search-menu__item-foot__option">選択してください</option>
                            @foreach ($categories as $category)
                            @if(isset($category_id) && $category['id'] == $category_id)
                                <option value="{{ $category['id'] }}" class="search-menu__item-foot__option" selected>{{ $category['name'] }}</option>
                            @else
                                <option value="{{ $category['id'] }}" class="search-menu__item-foot__option">{{ $category['name'] }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="search-menu__item-btn__wrap">
                        <button class="search-menu__item-btn">検索する</button>
                    </div>
                </form>
            </nav>

            <section class="search__section">
                <h2 class="section-title">習慣を探す</h2>
                <div class="section-info">
                    <p class="section-info__amount">{{ $total_habits_amount }}件の習慣が見つかりました</p>
                    <p class="section-info__page">３ページ目　21-30件を表示</p>
                </div>
                <div class="search-section__habits-container">
                    @foreach ($habits as $habit)
                    <a href="{{ route('habit.show',$habit['id']) }}" class="habits-list__card">
                        <h3 class="habits-list__card-title">{{ $habit['task'] }}</h3>
                        <p class="habits-list__card-plan">もし帰ってきて疲れていたら、マッサージガンで首をマッサージする</p>
                        <div class="habits-list__card-profile">
                            <img src="{{ asset('img/top_banner.png') }}" alt="" class="habits-list__card-img">
                            <span class="habits-list__card-name">伊藤フミヤ</span>
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
                <div class="pagination-wrap">
                    {{ $habits->appends(request()->query())->links('vendor.pagination.simple-default')}}
                </div>

            </section>
        </div>
    </main>


</body>
</html>

