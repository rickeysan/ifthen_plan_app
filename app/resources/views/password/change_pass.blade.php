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
                <a href=""><img src="img/top_banner.png" alt=""></a>
            </h1>
            <nav>
                <ul class="header__nav-list">
                    <li class="logined-header__nav-item">
                        <a href="">
                        <img class="logined-header__nav-item__img" src="img/top_banner.png" alt="">
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
        </div>
    </main>


</body>
</html>

