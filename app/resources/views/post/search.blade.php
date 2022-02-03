@extends('layouts.layout-2-columns')

@section('header')
    @component('components/logined_header')

    @endcomponent
@endsection

@section('dashbord-menu')
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
@endsection

@section('main-contents')
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
                <img src="{{ Storage::url($habit->user->file_path) }}" alt="" class="habits-list__card-img">
                <span class="habits-list__card-name">{{ $habit->user->name }}</span>
            </div>
            <div class="habits-list__card-info">
                <span class="habits-list__card-flg">チャレンジ中</span>
                <span class="habits-list__card-like">
                    <span class="habits-list__card-like__mark"><i class="fas fa-heart icon-like"></i></span>
                    <span class="habits-list__card-list__amount">{{ $habit->likes()->count() }}</span>
                </span>
            </div>
        </a>
        @endforeach
    </div>
    <div class="pagination-wrap">
        {{ $habits->appends(request()->query())->links('vendor.pagination.simple-default')}}
    </div>
</section>
@endsection

@section('js')

@endsection
