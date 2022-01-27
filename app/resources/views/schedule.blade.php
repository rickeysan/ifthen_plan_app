<html>
<head>
    <style>
        .calendar{
            width:700px;
            height: 480px;
        }
        .calendar-wrap{
            display: flex;
        }
        .calendar-info-wrap{
            margin-left:40px;
        }
        .ok_class{
            background: red !important;
        }
        .ng_class{
            background: blue !important;
        }
    </style>
</head>
<body>
<div>
<div>
    <h1>カレンダーです</h1>
    <div class="calendar-wrap">
        <div  class="calendar" id='calendar'></div>
        <div class="calendar-info-wrap">
            <p class="calendar-info-title">記録の追加・編集フォーム</p>
            <form action="" class="calendar-input-form" style="display: none;">
                <p class="calendar-input-title"></p>
                <p><input type="date" name="start_date" class="calendar-input-date"></p>
                <p><input type="text" name="title" class="calendar-input-text" placeholder="タイトル入力"></p>
                <input type="radio" id="rd0" name="achivement_flg" value="0">達成
                <input type="radio" id="rd1" name="achivement_flg" value="1">例外日
            </form>
            <button id="btn-store" style="display: none;">登録</button>
            <button id="btn-edit" style="display: none;">編集</button>
        </div>
    </div>

</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>console.log('hello.blade.phpです')</script>
</body>
</html>
