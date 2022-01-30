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
<section class="profile-edit__section">
    <h2 class="section-title">パスワード変更</h2>
    <div class="profile-edit__container">
        <form action="{{  route('withdraw.destroy',Auth::user()->id) }}" method="post">
            @csrf
            @method('delete')
            <p>本当に退会しますか？</p>
            <div class="form-item__btn-wrap">
                <button class="form-item__btn">退会する</button>
            </div>

        </form>
    </div>
</section>

@endsection
