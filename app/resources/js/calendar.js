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
        right:'',
    },
    buttonText: {
        today:    '今日',
    },
    locale: "ja",
    editable:false,
    eventDurationEditable:false,
    longPressDelay:0,
    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {
        console.log('日付がクリックされました');
        console.log(info);
        $('.calendar-input-form').show();

        var $date = info.startStr;

        axios
            .post('/schedule-judge',{
                start_date:$date,
                habit_id: habit_id,
            })
            .then((response) => {
                console.log('scheduleJudgeからの返り値');
                console.log(response.data);
                if(response.data.flg){
                    console.log('データはあります');
                    console.log('編集フォームを表示します');
                    $('#js-form').attr('action','/schedule-edit/'+habit_id);
                    $('.calendar-input-title').text('編集');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.js-textarea').val(response.data.text);
                    if(response.data.achivement_flg==0){
                        console.log('達成');
                        $('#rd0').prop('checked', true);
                    }else{
                        console.log('例外日');
                        $('#rd1').prop('checked', true);
                    }
                }else{
                    console.log('データはありません');
                    console.log('新規登録フォームを表示します');
                    $('#js-form').attr('action','/schedule-add/'+habit_id);
                    $('.calendar-input-title').text('新規作成');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.js-textarea').val('');
                }
            })
            .catch(() => {
                console.log("ajaxの通信に失敗しました");
            });

    },



    // イベントをクリックした時の動作
    eventClick: function(info) {
        console.log('クリックされました');
        console.log(info);
    },


    events: function (info, successCallback, failureCallback) {
        console.log('取得します');

        // Laravelのスケジュール取得処理の呼び出し
        axios
            .post("/schedule-get", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
                habit_id: habit_id,
            })
            .then((response) => {
                console.log('responseの中身');
                console.log(response);
                successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("取得に失敗しました");
            });
    },

});
calendar.render();


// 編集の処理
$('#btn-edit').click(function(){
    console.log('編集処理を開始します');
    var date = $('.calendar-input-date').val();
    console.log(date);
    var text = $('.js-textarea').val();
    console.log(text);
    var achivement_flg = $("input[name='achivement_flg']:checked").val();

    // Laravelの編集処理の呼び出し
    axios
        .post("/schedule-edit", {
            start_date: date,
            end_date: date,
            event_name: text,
            achivement_flg: achivement_flg,
            habit_id: habit_id,
        })
        .then(() => {
            console.log("編集に成功しました");
            // イベントの更新
            calendar.addEvent({
                title: text,
                start: date,
                end: date,
                allDay: true,
            });

            calendar.render();
            console.log('全ての処理が終了しました');
        })
        .catch(() => {
            // バリデーションエラーなど
            console.log("編集に失敗しました");
        });
})
