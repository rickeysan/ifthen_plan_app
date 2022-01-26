<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>退会ページ</h1>
    <div class="main-contents-wrap">
        <form action="{{  route('withdraw.destroy',Auth::user()->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">退会する</button>
        </form>
    </div>
    
</body>
</html>
