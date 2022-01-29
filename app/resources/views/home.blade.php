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
</section>
</div>

@endsection
