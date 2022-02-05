@extends('layouts.layout-1-column')

@section('header')
    @component('components/not_logined_header')

    @endcomponent
@endsection



@section('main-contents')
<section class="input-panel__container">
    <div class="input-panel">
        <form action="{{ route('login.store') }}" method="post">
        @csrf
        <h2 class="panel-title">ログイン</h2>

            <div class="form-item">
                <div class="form-item__head">
                    <p>メールアドレス</p>
                </div>
                <div class="form-item__body">
                    <input type="text" name="email" class="form-item__input"  value="{{old('email')}}">
                    @error('email')
                    <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item">
                <div class="form-item__head">
                    <p>パスワード</p>
                </div>
                <div class="form-item__body">
                    <input type="text" name="password" class="form-item__input">
                    @error('password')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            @if (!empty($msg))
                <p>{{ $msg }}</p>
            @endif
            <div class="input-panel-btn__wrap login-panel">
                <button type="submit" class="submit-btn">ログイン</button>
                <div class="login-btn__info">
                    <input type="checkbox" class="submit-checkbox"><span class="login-btn__info-msg">ログインしたままにする</span>
                </div>
                <a href="{{ route('forget-password.index') }}" class="submit-btn__link">パスワードを忘れた方はこちら</a>
            </div>

        </form>
    </div>
</section>
@endsection
