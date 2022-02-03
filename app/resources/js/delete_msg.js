$(function(){
    console.log('delete_msgです');
    $('#js-delete-show').on('click',function(){
        console.log('削除ボタンが押されました ');
        $('#js-delete-form').toggle();
    })
})
