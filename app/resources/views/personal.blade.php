@extends('layouts.layout-2-columns')

@section('header')
    @component('components/logined_header')

    @endcomponent
@endsection

@section('dashbord-menu')
    @component('components/dashbord-menu')

    @endcomponent
@endsection

@section('main-contents')
<section class="profile__section search__section">
    <h2 class="section-title">個人ページ</h2>
    <div class="my-profile__container">
        <div class="my-profile__img-wrap">
            <img src="{{ Storage::url($habits[0]->user->file_path) }}" alt="" class="my-profile__img">
        </div>
        <div class="my-profile__contents">
            <p class="my-profile__name">{{ $habits[0]->user->name }}</p>
            <p class="my-profile__text">{{ $habits[0]->user->introduction }}</p>
        </div>

    </div>
    <h2 class="section-title">習慣一覧</h2>
    <div class="search-section__habits-container my-habits-list">
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
@endsection
