<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>他人の習慣化を参考にしましょう!!</h1>
    <div>
        <label>目標</label>
        <p>{{ $habit['task'] }}</p>
        <label>モチベーション</label>
        <p>{{ $habit['purpose'] }}</p>
        <label>目標期間</label>
        <p>{{ $habit['start_date'] }} ~ {{ $habit['finish_date'] }}</p>
    </div>
</body>
</html>
