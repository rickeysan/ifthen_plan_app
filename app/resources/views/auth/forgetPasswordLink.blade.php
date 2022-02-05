@extends('layouts.layout-1-column')

@section('header')
    @component('components/not_logined_header')

    @endcomponent
@endsection



@section('main-contents')
<section class="input-panel__container">
    <div class="input-panel">
        <form action="{{ route('reset-password.store') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h2 class="panel-title">パスワードリセット</h2>

            <div class="form-item">
                @if (Session::has('error'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="form-item__head">
                    <p>メールアドレス</p>
                </div>
                <div class="form-item__body">
                    <input type="text" name="email" class="form-item__input"  value="{{old('email')}}">
                    @error('email')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-item__head">
                    <p>新しいパスワード</p>
                </div>
                <div class="form-item__body">
                    <input type="password" name="password" class="form-item__input">
                    @error('password')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-item__head">
                    <p>新しいパスワード（確認用）</p>
                </div>
                <div class="form-item__body">
                    <input type="password" name="password_confirmation" class="form-item__input">
                    @error('password_confirmation')
                        <span class="form-item__body__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="input-panel-btn__wrap">
                <button type="submit" class="submit-btn">パスワードをリセットする</button>
            </div>

        </form>
    </div>
</section>
@endsection
