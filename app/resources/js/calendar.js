import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

console.log('calendar.jsです');

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth",
    },
    locale: "ja",

    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {


        console.log('日付がクリックされました');
        console.log('日付データをajaxで送る');
        $('.calendar-input-form').show();
        // $('.calendar-info-title').attr('display','block');
        // console.log(info.start);
        // console.log(info.startStr);

        // 入力ダイアログ
        // const eventName = prompt("イベントを入力してください");
        // var $date = $('.input-date').val();
        var $date = info.startStr;
        console.log('$dateの中身');
        console.log($date);
        axios
            .post('/schedule-judge',{
                start_date:$date,
            })
            .then((response) => {
                console.log('scheduleJudgeからの返り値');
                // console.log(response);
                console.log(response.data);
                if(response.data.flg){
                    console.log('データはあります');
                    console.log('編集フォームを表示します');
                    $('.calendar-input-title').text('編集');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.calendar-input-text').val(response.data.text);
                    $('#btn-edit').show();
                    $('#btn-store').hide();
                }else{
                    console.log('データはありません');``
                    console.log('新規登録フォームを表示します');
                    $('.calendar-input-title').text('新規作成');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.calendar-input-text').val('');
                    $('#btn-edit').hide();
                    $('#btn-store').show();                }
            })
            .catch(() => {
                // バリデーションエラーなど
                console.log("ajaxの通信に失敗しました");
            });

    },



    // イベントをクリックした時の動作
    eventClick: function(info) {
        console.log('クリックされました');
        alert('Event: ' + info.event.title);

    },



    events: function (info, successCallback, failureCallback) {
        console.log('取得します');
        // Laravelのスケジュール取得処理の呼び出し
        axios
            .post("/schedule-get", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
            })
            .then((response) => {
                console.log('responseの中身');
                console.log(response);
                successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("登録に失敗しました");
            });
    },
});
calendar.render();

// $('.calendar-info-title').css('color','red');
$('#bt2').click(function(){
    console.log('新規登録画面が押されました');
    console.log('登録処理を開始します');
    // var formData = $('.calendar-input-form').serialize();
    // console.log(formData);
    var $date = $('.input-date').val();
    console.log($date);
    var $text = $('.input-text').val();
    console.log($text);

    // Laravelの登録処理の呼び出し
    axios
        .post("/schedule-add", {
            start_date: $date,
            end_date: $date,
            event_name: $text,
        })
        .then(() => {
            console.log("登録に成功しました");
            // イベントの追加
            calendar.addEvent({
                title: $text,
                start: $date,
                end: $date,
                allDay: true,
            });
            // calendar.render();
            console.log('全ての処理が終了しました');
        })
        .catch(() => {
            // バリデーションエラーなど
            console.log("登録に失敗しました");
        });
})
