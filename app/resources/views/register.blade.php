@extends('layouts.layout-1-column')

@section('title', '会員登録j')

@section('header')
    @component('components/not_logined_header')

    @endcomponent
@endsection



@section('main-contents')
<section class="input-panel__container">
    <div class="input-panel">
        <form action="{{ route('register.store') }}" method="post">
        @csrf
        <h2 class="panel-title">新規会員登録</h2>

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
                    <p>ユーザー名</p>
                </div>
                <div class="form-item__body">
                    <input type="text" name="name" class="form-item__input"  value="{{old('name')}}">
                    @error('name')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item">
                <div class="form-item__head">
                    <p>パスワード（英数字８文字以上）</p>
                </div>
                <div class="form-item__body">
                    <input type="password" name="password" class="form-item__input"  value="{{old('password')}}">
                    @error('password')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item">
                <div class="form-item__head">
                    <p>確認用パスワード</p>
                </div>
                <div class="form-item__body">
                    <input type="password" name="password_confirmation" class="form-item__input" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="input-panel-btn__wrap">
                <button type="submit" class="submit-btn">会員登録する</button>
                <a href="" class="submit-btn__link">アカウントをお持ちの方はこちら</a>
            </div>

        </form>
    </div>
</section>
@endsection
