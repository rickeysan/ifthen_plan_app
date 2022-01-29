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
                <a href=""><img src="{{ asset('img/top_banner.png')}} " alt=""></a>
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

            <div class="main-sections__container">

                <section class="habit-input__section">
                    <h2 class="section-title">新しい習慣を始めましょう</h2>
                    <div class="habit-input__container">
                        <form action="{{ route('habit.store') }}" method="post">
                            @csrf
                            <div class="form-item__columns-3">
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">ジャンル</p>
                                    </div>
                                    <div class="form-item__body">
                                        <select name="category_id" class="form-item__select">
                                            <option value="0" class="form-item__select-item">選択して下さい</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span>入力してください</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">開始日</p>
                                    </div>
                                    <div class="form-item__body">
                                        <input type="date" name="start_date">
                                        @error('start_date')
                                            <span class="form-item__input-area__msg err-msg">入力必須です</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">終了日</p>
                                    </div>
                                    <div class="form-item__body">
                                        <input type="date" name="finish_date">
                                        @error('finish_date')
                                            <span class="form-item__input-area__msg err-msg">入力必須です</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="form-item__head">
                                    <p class="form-item__head-text">なんのために習慣化をしますか？</p>
                                </div>
                                <div class="form-item__body">
                                    <textarea class="form-item__textarea" name="purpose">{{ old('purpose') }}</textarea>
                                    @error('purpose')
                                        <span class="form-item__input-area__msg err-msg">入力必須です</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-item__head">
                                    <p class="form-item__head-text">目的達成のために何をしますか？</p>
                                </div>
                                <div class="form-item__body">
                                    <textarea class="form-item__textarea" name="task">{{ old('task') }}</textarea>
                                    @error('task')
                                        <span class="form-item__input-area__msg err-msg">入力必須です</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="plans__container">
                                <h3 class="container-title">If-Thenプランニングを作りましょう(習慣化の成功率が3倍に上がります)</h3>
                                <input type="text" name="plan_text" class="plans__form-input" value="{{ old('plan') }}">
                                @error('plan_text')
                                    <span class="form-item__input-area__msg err-msg">入力必須です</span>
                                @enderror
                            </div>
                            <div class="btn-wrap">
                                <button type="submit" class="form-input_btn">習慣を始める</button>
                            </div>
                        </form>

                    </div>
                </section>

            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
