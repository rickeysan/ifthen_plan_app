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
                <div class="form-item">
                    <input name="is_open" type="checkbox" class="form-item__checkbox" value="true">
                    <span class="form-item__checkbox__info">習慣を公開する</span>
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="form-input_btn">習慣を始める</button>
                </div>
            </form>

        </div>
        <div class="plan-helper">
            <h3 class="plan-helper__title">ランダムジェネレータ</h3>
            <p class="plan-helper__info">ランダムでIf-Thenプランニングを作成します</p>
            <table class="plan-helper__table">
                <tbody>
                    <tr>
                        <td>If（もし〜なら）</td>
                        <td>Then（〜する）</td>
                    </tr>
                    <tr>
                        <td><p id="js-if-get-area"></p></td>
                        <td><p id="js-then-get-area"></p></td>
                    </tr>
                    <tr>
                        <td><button class="plan-helper__btn" id="js-if-get-btn">取得</button></td>
                        <td><button class="plan-helper__btn" id="js-then-get-btn">取得</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/example_show.js')}}"></script>
@endsection
