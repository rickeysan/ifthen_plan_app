<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .habit-card-wrapp{
            display: flex;
        }
        .habit-card{
            width:600px;
            height: 300px;
            border:1px solid black;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>習慣を探す</h1>
    <div>
        <p>{{ $total_habits_amount }}件の習慣が見つかりました</p>
        
        <div class="habit-card-wrap">

            @foreach ($habits as $habit)
            <a href="" class='habit-card'>
                <label>目標</label>
                <p>{{ $habit['task'] }}</p>
                <label>モチベーション</label>
                <p>{{ $habit['purpose'] }}</p>
                <label>目標期間</label>
                <p>{{ $habit['start_date'] }} ~ {{ $habit['finish_date'] }}</p>
            </a>
            @endforeach
            {{ $habits->links('vendor.pagination.semantic-ui') }}
            {{-- {{  $habits->links('vendor.pagination.simple-bootstrap-4') }} --}}
        </div>
    </div>
</body>
</html>
