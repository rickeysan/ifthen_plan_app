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
                <a href="{{ route('habit.edit',$habit->id) }}" class="my-habits__card">
                    <span class="my-habits__card-tag">やるべきこと</span><p class="my-habits__card-body__task my-habits__card-body__text">{{ $habit['task'] }}</p>
                    <span class="my-habits__card-tag">プランニング</span><p class="my-habits__card-body__plan my-habits__card-body__text">{{ $habit->plan->plan_text }}</p>
            </a>
            @endforeach
        @else
        チャレンジ中の習慣はありません
        @endif
</section>

@endsection


