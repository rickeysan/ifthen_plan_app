<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .change-image-wrap {
        position: relative;
        border: 3px dotted black;
        line-height: 150px;
        text-align: center;
        width: 150px;
        height: 150px;}
        .input-image{
            opacity: 0;
        }
        .drop-image{
            opacity: 0;
        }
  .input-image,
  .drop-image,
  .show-db-image {
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
  }
  .input-image {
    z-index: 3;
  }
  .drop-image {
    z-index: 1;
  }
  .show-db-image {
    z-index: 0;
  }
}
    </style>
</head>
<body>
    <h1>プロフィール編集</h1>
    <div class="main-contents-wrap">
        <form action="/profile/{{  $user_info[0]['id'] }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>名前</label>
            <input type="text" name="name" value="{{  $user_info[0]['name'] }}">
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{  $user_info[0]['email'] }}">
            <label>プロフィール画像</label>
            <div class="change-image-wrap">
                <input type="file" name="image" accept="image/png, image/jpeg" class="input-image js-droparea">
                <img src="" class="drop-image js-show-image" alt="jsから来た画像">
                @if(!empty($user_info[0]['file_path']))
                    <img class="show-db-image" src="{{ asset( Storage::url($user_info[0]['file_path'])) }}" alt="プロフィール画像">
                @endif
                ドラッグ＆ドロップ
            </div>
            <label>自己紹介</label>任意
            <textarea name="introduction" cols="80" rows="5">{{ $user_info[0]['introduction'] }}</textarea>
            <input type="submit" value="変更する">
        </form>
    </div>
    <a href="/logout">ログアウトする</a>
    <a href="/password/change">パスワードを変更する</a>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function(){
        console.log('jqueryです');
        //drag&dropするエリアのドム
        var $dropArea = $('.js-droparea');
        //prev画面のドム
        var $inputFile = $('.js-show-image');
        
        $dropArea.on('dragover', function(e) {
            // console.log('ドラッグオーバーされました');
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
    </script>
</html>
