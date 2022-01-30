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
        <form action="" method="post">
            @csrf
            <div class="form-item">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">現在のパスワード</span>
                </div>
                <div class="form-item__input-area">
                    <input type="text" name="current_pass" value="{{ old('current_pass') }}" class="form-item__email form-item__input">
                    @error('current_pass')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="form-item">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">新しいパスワード</span>
                </div>
                <div class="form-item__input-area">
                    <input type="password" name="new_pass" class="form-item__name form-item__input">
                    @error('new_pass')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">新しいパスワード<br>（確認用)</span>
                </div>
                <div class="form-item__input-area">
                    <input type="text" name="name" class="form-item__name form-item__input">
                    @error('new_pass_confirmation')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-item__btn-wrap">
                <button class="form-item__btn">保存する</button>
            </div>

        </form>
    </div>
</section>

@endsection
