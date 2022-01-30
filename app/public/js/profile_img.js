$(function(){
    //drag&dropするエリアのDOM
    var $dropArea = $('.js-droparea');
    //prev画面のDOM
    var $inputFile = $('.js-show-image');

    $dropArea.on('dragover', function(e) {
        //余計なイベントをキャンセルする
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', '3px #ccc dashed');
    });
    $dropArea.on('dragleave', function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('border', 'none');
    });

    //画像情報が入って(changeしたら)きたら
    $dropArea.on('change', function(e) {
        $(this).css('border', 'none');
        //　files配列にファイルが入っています
        //　ファイル情報を取得
        var file = this.files[0],
        //　ファイルを読み込むFileReaderオブジェクトを変数に
        fileReader = new FileReader();

        //　読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
        //　fileReaderの読み込みが完了した時のイベント
        fileReader.onload = function(event) {
            //　読み込んだデータをimgに設定
            //　最初非表示になってるimgを表示
            $inputFile.attr('src', event.target.result).show();
            $inputFile.css('opacity',1);
        };

        //  画像ファイル自体をデータURLとして読み込んでいる（画像のsrcへ挿入）
        fileReader.readAsDataURL(file);

    });
})
