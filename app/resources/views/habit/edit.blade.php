<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>習慣をカスタマイズ!!</h1>
    <form action="/habit/{{ $habit[0]['id'] }}" method="post">
        @csrf
        @method('PUT')
        <label>ジャンルを選んでください</label>
        <select name="category_id" id="">
            <option value="0">選択してください</option>
        @foreach ($categories as $category)
            @if($category['id'] == $habit[0]['category_id'])
                <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
            @else
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endif
        @endforeach
        </select>
        <label>なんのために習慣化しますか？</label>
        <textarea name="purpose" id="" cols="120" rows="4">{{ $habit[0]['purpose'] }}</textarea>
        <label>そのために何をしますか？</label>
        <textarea name="task" id="" cols="120" rows="4">{{ $habit[0]['task'] }}</textarea>
        <label>いつから、いつまでに習慣化しますか？</label>
        <span>開始日</span><input type="date" name="start_date" value="{{ $habit[0]['start_date'] }}">
        <span>終了日</span><input type="date" name="finish_date" value="{{ $habit[0]['finish_date'] }}">
        <input type="submit" value="習慣化を更新する">
    </form>
</body>
</html>
