@extends('layouts.layout-1-column')

@section('header')
    @component('components/not_logined_header')

    @endcomponent
@endsection



@section('main-contents')
<section class="input-panel__container">
    <div class="input-panel">
        <form action="{{ route('forget-password.store') }}" method="post">
        @csrf
        <h2 class="panel-title">パスワードリセット</h2>

            <div class="form-item">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
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
            </div>
            <div class="input-panel-btn__wrap">
                <button type="submit" class="submit-btn">パスワードをリセットする</button>
            </div>

        </form>
    </div>
</section>
@endsection
