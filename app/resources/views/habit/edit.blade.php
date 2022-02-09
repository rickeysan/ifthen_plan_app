@extends('layouts.layout-2-columns')

@section('title', '習慣の編集')

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
        <h2 class="section-title">習慣化の記録</h2>
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
                            <input type="date" name="begin_date" class="form-item__date" value="{{ $habit['begin_date'] }}">
                            @error('begin_date')
                                <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <p class="form-item__head-text">終了日</p>
                        </div>
                        <div class="form-item__body">
                            <input type="date" name="finish_date" class="form-item__date" value="{{ $habit['finish_date'] }}">
                            @error('finish_date')
                                <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
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
                            <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
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
                            <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="plans__container">
                    <h3 class="container-title">If-Thenプランニングを作りましょう(習慣化の成功率が3倍に上がります)</h3>
                    <input type="text" name="plan_text" class="plans__form-input" value="{{ $habit->plan->plan_text }}">
                    @error('plan_text')
                        <span class="form-item__input-area__msg err-msg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item">
                    <input name="is_open" type="checkbox" class="form-item__checkbox" value="true" {{ ($habit->is_open) ? 'checked' :'' }}>
                    <span class="form-item__checkbox__info">習慣を公開する</span>
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="form-input_btn">習慣を保存する</button>
                </div>
            </form>
            <div class="form-item form-item__helper">
                <span id="js-delete-show"><i class="far fa-trash-alt"></i></span>
                <div id="js-delete-form" class="delete-form">
                    <p class="delete-form__info">一度削除すると<br>元に戻せません。<br>本当に削除しますか？</p>
                    <form action="{{ route('habit.destroy',$habit['id']) }}" id="delete-form" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" type="submit" form="delete-form">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="calendar-section">
        <div  class="calendar" id='calendar'></div>
        <div class="calendar-info__container">
            <h3 class="calendar-info-title">記録の追加・編集フォーム</h3>
            <span class="calendar-info">記録したい日付をクリックしてください</span>
            <form action='/schedule-add/{{$habit['id']}}' id="js-form" method="post" class="calendar-input-form">
                @csrf
                <p class="calendar-input-title"></p>
                <p><input type="date" name="start_date" class="calendar-input-date" readonly></p>
                @error('start_date')
                    <span class="calendar-input__msg">{{ $message }}</span>
                @enderror
                <textarea class="calendar-input__textarea js-textarea" type="text" name="event_name" class="calendar-input-text" placeholder="上手くいったことや反省点を記入"></textarea>
                @error('event_name')
                    <span class="calendar-input__msg">{{ $message }}</span>
                @enderror
                <div class="calendar-input__radio-area">
                    <div class="calendar-input__radio-wrap">
                        <input class="calendaer-input__radio" type="radio" id="rd0" name="achivement_flg" value="0"><span class="calendar-input__radio__ok-tag">達成</span>
                    </div>
                    <div class="calendar-input__radio-wrap">
                        <input class="calendaer-input__radio" type="radio" id="rd1" name="achivement_flg" value="1"><span class="calendar-input__radio__ng-tag">例外日</span>
                    </div>
                </div>
                @error('achivement_flg')
                    <span class="calendar-input__msg">{{ $message }}</span>
                @enderror
                <div class="calendar-input__btn-wrap">
                    <button class="calendar-input__btn" type="submit">登録</button>
                </div>
            </form>
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
<script src="{{ asset('js/delete_msg.js') }}"></script>
@endsection
