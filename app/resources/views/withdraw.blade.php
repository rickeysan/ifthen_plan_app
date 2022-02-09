@extends('layouts.layout-2-columns')

@section('title', '退会')

@section('header')
    @component('components/logined_header')

    @endcomponent
@endsection

@section('dashbord-menu')
    @component('components/dashbord-menu')

    @endcomponent
@endsection

@section('main-contents')
<section class="withdraw__section">
    <h2 class="section-title">退会申し込み</h2>
    <div class="withdraw__container">
        <form action="{{  route('withdraw.destroy',Auth::user()->id) }}" method="post">
            @csrf
            @method('delete')
            <p class="withdraw-form__info">本当に退会しますか？</p>
            <div class="form-item__btn-wrap">
                <button class="form-item__btn">退会する</button>
            </div>

        </form>
    </div>
</section>

@endsection
