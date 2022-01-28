<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header id="header">
        <div class="inner">
            <h1 class="logo">
                <a href=""><img src="/app/public/img/top_banner.png" alt=""></a>
            </h1>
            <nav>
                <ul class="header__nav-list">
                    <li class="logined-header__nav-item">
                        <a href="">
                        <img class="logined-header__nav-item__img" src="/app/public/img/top_banner.png" alt="">
                        </a>
                    </li>
                    <li><a href="">マイページ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="main">
        <div class="main__inner columns-2">
            <nav class="dashbord-menu__list-nav">
                <ul class="dashbord-menu__list-ul">
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="fas fa-home"></i>HOME</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-calendar-plus"></i>新しい習慣</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="fas fa-search"></i>習慣を検索</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-id-card"></i>プロフィール</a></li>
                    <li class="dashbord-menu__list-item"><a class="dashbord-menu__list-item-link" href=""><i class="far fa-heart"></i>フォローリスト</a></li>
                </ul>
            </nav>

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
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function(){
        console.log('jqueryです');
        //drag&dropするエリアのドム
        var $dropArea = $('.js-droparea');
        //prev画面のドム
        var $inputFile = $('.js-show-image');

        $dropArea.on('dragover', function(e) {
            // console.log('ドラッグオーバーされました');
            //余計なイベントをキャンセルする
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border', '3px #ccc dashed');
        });
        $dropArea.on('dragleave', function(e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border', 'none');
        });

        //画像情報が入って(changeしたら)きたら
        $dropArea.on('change', function(e) {
            $(this).css('border', 'none');
            //　files配列にファイルが入っています
            //　ファイル情報を取得
            var file = this.files[0],
            //　ファイルを読み込むFileReaderオブジェクトを変数に
            fileReader = new FileReader();

            //　読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
            //　fileReaderの読み込みが完了した時のイベント
            fileReader.onload = function(event) {
                //　読み込んだデータをimgに設定
                //　最初非表示になってるimgを表示
                $inputFile.attr('src', event.target.result).show();
                $inputFile.css('opacity',1);
            };

            //  画像ファイル自体をデータURLとして読み込んでいる（画像のsrcへ挿入）
            fileReader.readAsDataURL(file);

        });
    })
    </script>
</html>