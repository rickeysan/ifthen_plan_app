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
        <h2 class="section-title">今日の記録をつけましょう</h2>
        <div class="habit-input__container">
            <form action="{{ route('habit.update',$habit['id']) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-item__columns-3">
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <p class="form-item__head-text">ジャンル</p>
                        </div>
                        <div class="form-item__body">
                            <select name="category_id" class="form-item__select">
                                <option class="form-item__select-item">選択して下さい</option>
                                @foreach ($categories as $category)
                                    @if($category['id'] == $habit['category_id'])
                                        <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                    @else
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endif
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
                            <input type="date" name="start_date" value="{{ $habit['start_date'] }}">
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
                            <input type="date" name="finish_date" value="{{ $habit['finish_date'] }}">
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
                        <textarea class="form-item__textarea" name="purpose">{{ $habit['purpose'] }}</textarea>
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
                        <textarea class="form-item__textarea" name="task">{{ $habit['task'] }}</textarea>
                        @error('task')
                            <span class="form-item__input-area__msg err-msg">入力必須です</span>
                        @enderror
                    </div>
                </div>
                <div class="plans__container">
                    <h3 class="container-title">If-Thenプランニングを作りましょう(習慣化の成功率が3倍に上がります)</h3>
                    <input type="text" name="plan_text" class="plans__form-input" value="{{ $habit->plan->plan_text }}">
                    @error('plan_text')
                        <span class="form-item__input-area__msg err-msg">入力必須です</span>
                    @enderror
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="form-input_btn">習慣を保存する</button>
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
@endsection



@section('js')
<script>
     const habit_id ='{{ $habit["id"] }}';
</script>
<script src="{{ asset('js/calendar.js')}}"></script>
@endsection
