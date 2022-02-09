import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";


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
        $('.calendar-input-form').show();

        var $date = info.startStr;

        axios
            .post('/schedule-judge',{
                start_date:$date,
                habit_id: habit_id,
            })
            .then((response) => {
                if(response.data.flg){
                    $('.calendar-input__date-show').text(response.data.start_date);
                    $('.js-textarea').val(response.data.text);
                    if(response.data.achivement_flg==0){
                        $('.js-ok-tag').show();
                        $('.js-ng-tag').hide();
                        $('#rd0').prop('checked', true);
                    }else{
                        $('.js-ok-tag').hide();
                        $('.js-ng-tag').show();
                    }
                }else{
                    $('.calendar-input__date-show').text(response.data.start_date);
                    $('.js-textarea').val('');
                    $('.js-ok-tag').hide();
                    $('.js-ng-tag').hide();
                }
            })
            .catch(() => {
            });
    },

    // イベントをクリックした時の動作
    eventClick: function(info) {
        $('.calendar-input-form').show();

        var $date = info.event._instance.range.start;

        axios
            .post('/schedule-judge',{
                start_date:$date,
                habit_id: habit_id,
            })
            .then((response) => {
                if(response.data.flg){
                    $('#js-form').attr('action','/schedule-edit/'+habit_id);
                    $('.calendar-input-title').text('編集');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.js-textarea').val(response.data.text);
                    if(response.data.achivement_flg==0){
                        $('#rd0').prop('checked', true);
                    }else{
                        $('#rd1').prop('checked', true);
                    }
                }else{
                    $('#js-form').attr('action','/schedule-add/'+habit_id);
                    $('.calendar-input-title').text('新規作成');
                    $('.calendar-input-date').val(response.data.start_date);
                    $('.js-textarea').val('');
                }
            })
            .catch(() => {
            });
    },


    events: function (info, successCallback, failureCallback) {

        // Laravelのスケジュール取得処理の呼び出し
        axios
            .post("/schedule-get", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
                habit_id: habit_id,
            })
            .then((response) => {
                successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("取得に失敗しました");
            });
    },
});
calendar.render();

