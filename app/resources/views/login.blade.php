<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
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
                    <li class="header__nav-item"><a href="" class="header__nav-link">ログイン</a></li>
                    <li class="header__nav-item"><a href="" class="header__nav-link">会員登録</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">
        <div class="main__inner">
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
                            <a href="" class="submit-btn__link">パスワードを忘れた方はこちら</a>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </main>

</body>
</html>
