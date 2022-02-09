@extends('layouts.layout-2-columns')

@section('title', '習慣の閲覧')

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
                            <span class="form-item__head-text">ジャンル</span>
                        </div>
                        <div class="form-item__body">
                            <span class="form-item__show-category form-item__show">{{ $habit->category->name }}</span>
                        </div>
                    </div>
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <span class="form-item__head-text">開始日</span>
                        </div>
                        <div class="form-item__body">
                            <span class=" form-item__show-date form-item__show">{{ date('Y年m月d日',strtotime($habit['start_date'])) }}</span>
                        </div>
                    </div>
                    <div class="form-item form-item__columns-3__contents">
                        <div class="form-item__head">
                            <span class="form-item__head-text">終了日</span>
                        </div>
                        <div class="form-item__body">
                            <span class=" form-item__show-date form-item__show">{{ date('Y年m月d日',strtotime($habit['start_date'])) }}</span>
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
                        <p class="form-item__textarea">{{ $habit['purpose'] }}</p>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-item__head">
                        <p class="form-item__head-text">目的達成のために何をしますか？</p>
                    </div>
                    <div class="form-item__body">
                        <p class="form-item__textarea">{{ $habit['task'] }}</p>
                    </div>
                </div>
                <div class="plans__container">
                    <h3 class="container-title">If-Thenプランニングを作りましょう(習慣化の成功率が3倍に上がります)</h3>
                    <p type="text" class="plans__form-input">{{ $habit->plan->plan_text }}</p>
                </div>

        </div>
    </section>
    <section class="calendar-section">
        <div  class="calendar" id='calendar'></div>
        <div class="calendar-info__container">
            <p class="calendar-info-title">記録フォーム</p>
            <div class="calendar-input-form">
                <p style="display: inline-block;vertical-align: middle;" class="calendar-input__date-show"></p><span class="calendar-show__tag js-ok-tag" style='display:none;'>達成</span><span class="calendar-show__tag js-ng-tag" style='display: none;'>例外日</span>
                <textarea class="calendar-input__textarea js-textarea" type="text" name="title" class="calendar-input-text" placeholder="記録がありません" readonly></textarea>
                <a href="{{ route('profile.show', $habit->user->id) }}" class="profile-card">
                    <img src="{{ asset( Storage::url($habit->user->file_path)) }}"   alt="" class="profile-card__img">
                    <span class="profile-card__name">{{ $habit->user->name }}</span>
                </a>
            </div>

        </div>
    </section>
</div>
@endsection


@section('js')
<script>
     const habit_id ='{{ $habit["id"] }}';
</script>
<script src="{{ asset('js/calendar_show.js')}}"></script>
@endsection
