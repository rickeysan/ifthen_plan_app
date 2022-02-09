@extends('layouts.layout-2-columns')

@section('title', 'プロフィール編集')

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
    <h2 class="section-title">プロフィール編集</h2>
    <div class="profile-edit__container">
        <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-item">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">メールアドレス</span><span class="form-item__title__batch batch-must">必須</span>
                </div>
                <div class="form-item__input-area">
                    <input type="text" name="email" value="{{  $user_info[0]['email'] }}" class="form-item__email form-item__input">
                    @error('email')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">ユーザー名</span><span class="form-item__title__batch batch-must">必須</span>
                </div>
                <div class="form-item__input-area">
                    <input type="text" name="name" value="{{  $user_info[0]['name'] }}" class="form-item__name form-item__input">
                    @error('name')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-item__image">
                <div class="form-item__info-wrap">  
                    <span class="form-item__title">アイコン画像</span><span class="form-item__title__batch batch-option">任意</span>
                </div>
                <div class="form-item__image-container">
                    <div class="form-item__image-wrap">
                        <input type="file" name="image" accept="image/png, image/jpeg" class="input-image js-droparea">
                        <img src="" class="drop-image js-show-image" alt="jsから来た画像">
                        @if(!empty($user_info[0]['file_path']))
                            <img class="show-db-image" src="{{ asset( Storage::url($user_info[0]['file_path'])) }}" alt="プロフィール画像">
                        @endif
                        ドラッグ＆ドロップ
                    </div>
                    @error('image')
                        <span class="form-item__input-area__msg-image err-msg">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="form-item__textarea">
                <div class="form-item__info-wrap">
                    <span class="form-item__title">自己紹介</span><span class="form-item__title__batch batch-option">任意</span>
                </div>
                <div class="form-item__input-area">
                    <textarea name="introduction" cols="80" rows="5" class="form-item__textarea__input">{{ $user_info[0]['introduction'] }}</textarea>
                    @error('introduction')
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

@section('js')
<script src="{{ asset('js/profile_img.js')}}"></script>
@endsection
