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
<section class="search__section">
    <h2 class="section-title">お気に入り一覧</h2>
    <div class="search-section__habits-container">
        @if (!($user->likes->isEmpty()))
            @foreach ($user->likes as $like)
            <a href="{{ route('habit.show',$like->habit['id']) }}" class="habits-list__card">
                <h3 class="habits-list__card-title">{{ $like->habit['task'] }}</h3>
                <p class="habits-list__card-plan">{{ $like->habit->plan->plan_text }}</p>
                <div class="habits-list__card-profile">
                    <img src="{{ Storage::url($like->habit->user->file_path) }}" alt="" class="habits-list__card-img">
                    <span class="habits-list__card-name">{{ $like->habit->user->name }}</span>
                </div>
                <div class="habits-list__card-info">
                    <span class="habits-list__card-flg">チャレンジ中</span>
                    <span class="habits-list__card-like">
                        <span class="habits-list__card-like__mark"><i class="fas fa-heart icon-like"></i></span>
                        <span class="habits-list__card-list__amount">{{ $like->habit->likes()->count() }}</span>
                    </span>
                </div>
            </a>
            @endforeach
        @else
            <p>お気に入りはありません</p>
        @endif
    </div>
</section>

@endsection


