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
    editable:true,

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
                    $('.calendar-input__date-show').text(response.data.start_date);
                    $('.js-textarea').val(response.data.text);
                    if(response.data.achivement_flg==0){
                        console.log('達成');
                        $('.js-ok-tag').show();
                        $('.js-ng-tag').hide();
                        $('#rd0').prop('checked', true);
                    }else{
                        console.log('例外日');
                        $('.js-ok-tag').hide();
                        $('.js-ng-tag').show();
                    }
                }else{
                    console.log('データはありません');
                    $('.calendar-input__date-show').text(response.data.start_date);
                    $('.js-textarea').val('');
                    $('.js-ok-tag').hide();
                    $('.js-ng-tag').hide();
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

