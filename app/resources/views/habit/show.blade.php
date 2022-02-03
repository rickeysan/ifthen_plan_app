@extends('layouts.layout-2-columns')

@section('header')
    @component('components/logined_header')
    @endcomponent
@endsection

@section('dashbord-menu')
    @component('components/habit-dashbord-menu',['habit'=>$habit])
    @endcomponent
@endsection

@section('main-contents')
<div class="main-sections__container">

    <section class="habit-input__section">
        <h2 class="section-title">参考になる部分を見つけましょう</h2>
        <div class="habit-input__container">
                <div class="form-item__columns-3">
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <p class="form-item__head-text">ジャンル</p>
                        </div>
                        <div class="form-item__body">
                            <select class="form-item__select" aria-readonly="false">
                                <option class="form-item__select-item">{{ $habit->category->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <p class="form-item__head-text">開始日</p>
                        </div>
                        <div class="form-item__body">
                            <input type="date" name="start_date" value="{{ $habit['start_date'] }}">
                        </div>
                    </div>
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <p class="form-item__head-text">終了日</p>
                        </div>
                        <div class="form-item__body">
                            <input type="date" name="finish_date" value="{{ $habit['finish_date'] }}">
                        </div>
                    </div>
                    <div class="form-item form-item__helper">
                        @if ($habit->is_liked_by_auth_user())
                            <a href="{{ route('removelike',['id'=>$habit['id']]) }}" class="like-btn__link">
                                <i class="fas fa-heart like-btn removelike-btn"></i>
                            </a>
                            <span class="fomr-item__like-count">{{ $habit->likes()->count() }}</span>
                            @else
                            <a href="{{ route('addlike',['id'=>$habit['id']]) }}" class="like-btn__link">
                                <i class="far fa-heart like-btn addlike-btn"></i>
                            </a>
                            <span class="fomr-item__like-count">{{ $habit->likes()->count() }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-item__head">
                        <p class="form-item__head-text">なんのために習慣化をしますか？</p>
                    </div>
                    <div class="form-item__body">
                        <textarea class="form-item__textarea" name="purpose" readonly>{{ $habit['purpose'] }}</textarea>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-item__head">
                        <p class="form-item__head-text">目的達成のために何をしますか？</p>
                    </div>
                    <div class="form-item__body">
                        <textarea class="form-item__textarea" name="tast" readonly>{{ $habit['task'] }}</textarea>
                    </div>
                </div>
                <div class="plans__container">
                    <h3 class="container-title">If-Thenプランニングを作りましょう(習慣化の成功率が3倍に上がります)</h3>
                    <input type="text" name="plan_text" class="plans__form-input" value="{{ $habit->plan->plan_text }}" readonly>
                </div>

        </div>
    </section>
    <section class="calendar-section">
        <div  class="calendar" id='calendar'></div>
        <div class="calender-info__container">
            <p class="calendar-info-title">記録フォーム</p>
            <form action="" class="calendar-input-form" style="display: none;">
                <p class="calendar-input-title" style="display:none"></p>
                <p><input type="date" name="start_date" class="calendar-input-date" readonly></p>
                <textarea class="calendar-input__textarea js-textarea" type="text" name="title" class="calendar-input-text" placeholder="記録がありません" readonly></textarea>
                <div class="calendar-input__radio-wrap">
                    <input class="calendaer-input__radio" type="radio" id="rd0" name="achivement_flg" value="0" readonly>達成
                    <input class="calendaer-input__radio" type="radio" id="rd1" name="achivement_flg" value="1" readonly>例外日
                </div>
            </form>

        </div>
    </section>
</div>
@endsection



@section('js')
<script>
     const habit_id ='{{ $habit["id"] }}';
</script>
<script src="{{ asset('js/calendar.js')}}"></script>
@endsection
