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
    <form action=" {{ route('search.store') }}" method="post">
        @csrf
        <label>キーワード</label>
        <input type="text" name="key_word">
        <label>カテゴリ</label>
        <select name="category_id" id="">
            <option value="1">No.1</option>
            <option value="2">No.2</option>
            <option value="3">No.3</option>
        </select>
        <button tupe="submit">検索する</button>
    </form>
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
