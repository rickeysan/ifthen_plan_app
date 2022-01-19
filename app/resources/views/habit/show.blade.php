<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>新しい習慣を閲覧</h1>
    <form action="/habit" method="post">
        @csrf
        <label>ジャンルを選んでください</label>
        <select name="category_id" id="">
            <option value="1">勉強</option>
            <option value="2">運動</option>
            <option value="3">食事</option>
        </select>
        <label>なんのために習慣化しますか？</label>
        <textarea name="purpose" id="" cols="120" rows="4"></textarea>
        <label>そのために何をしますか？</label>
        <textarea name="task" id="" cols="120" rows="4"></textarea>
        <label>いつから、いつまでに習慣化しますか？</label>
        <span>開始日</span><input type="date" name="start_date">
        <span>終了日</span><input type="date" name="finish_date">
        <input type="submit" value="習慣化を開始する">
    </form>
</body>
</html>
