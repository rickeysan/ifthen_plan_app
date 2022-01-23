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
                <p>新規作成</p>
                <p><input type="date" name="start_date" class="input-date"></p>
                <p><input type="text" name="title" class="input-text" placeholder="タイトル入力"></p>
            </form>
            <button id="bt2">登録</button>
            {{-- <p class="calendar-info-body">日付</p> --}}
        </div>
    </div>

</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>console.log('hello.blade.phpです')</script>
</body>
</html>
