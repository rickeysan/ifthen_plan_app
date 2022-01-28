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
                    <h2 class="section-title">今日の記録をつけましょう</h2>
                    <div class="habit-input__container">
                        <form action="{{ route('habit.update',$habit[0]['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-item__columns-3">
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">ジャンル</p>
                                    </div>
                                    <div class="form-item__body">
                                        <select class="form-item__select">
                                            <option class="form-item__select-item">選択して下さい</option>
                                            @foreach ($categories as $category)
                                                @if($category['id'] == $habit[0]['category_id'])
                                                    <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                                @else
                                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">開始日</p>
                                    </div>
                                    <div class="form-item__body">
                                        <input type="date" name="start_date" value="{{ $habit[0]['start_date'] }}">
                                    </div>
                                </div>
                                <div class="form-item form-item__columns-3__contents">
                                    <div class="form-item__head">
                                        <p class="form-item__head-text">終了日</p>
                                    </div>
                                    <div class="form-item__body">
                                        <input type="date" name="finish_date" value="{{ $habit[0]['finish_date'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="form-item__head">
                                    <p class="form-item__head-text">なんのために習慣化をしますか？</p>
                                </div>
                                <div class="form-item__body">
                                    <textarea class="form-item__textarea" name="purpose">{{ $habit[0]['purpose'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-item__head">
                                    <p class="form-item__head-text">目的達成のために何をしますか？</p>
                                </div>
                                <div class="form-item__body">
                                    <textarea class="form-item__textarea" name="tast">{{ $habit[0]['task'] }}</textarea>
                                </div>
                            </div>
                            <div class="btn-wrap">
                                <button type="submit" class="form-input_btn">習慣を始める</button>
                            </div>
                        </form>

                    </div>
                </section>
                <section class="calendar-section">
                    <div  class="calendar" id='calendar'></div>
                    <div class="calender-info__container">
                        <p class="calendar-info-title">記録の追加・編集フォーム</p>
                        <form action="" class="calendar-input-form" style="display: none;">
                            <p class="calendar-input-title"></p>
                            <p><input type="date" name="start_date" class="calendar-input-date" readonly></p>
                            <textarea class="calendar-input__textarea js-textarea" type="text" name="title" class="calendar-input-text" placeholder="上手くいったことや反省点を記入"></textarea>
                            <div class="calendar-input__radio-wrap">
                                <input class="calendaer-input__radio" type="radio" id="rd0" name="achivement_flg" value="0">達成
                                <input class="calendaer-input__radio" type="radio" id="rd1" name="achivement_flg" value="1">例外日
                            </div>
                        </form>
                        <div class="calendar-input__btn-wrap">
                            <button class="calendar-input__btn" id="btn-store" style="display: none;">登録</button>
                            <button class="calendar-input__btn" id="btn-edit" style="display: none;">編集</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <script>
        const habit_id = '{{ $habit[0]["id"] }}';
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

