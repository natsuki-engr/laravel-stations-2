<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/admin/movies/store" method="post">
        @csrf
        <label style="display: block;">映画タイトル:
            <input required type="text" name="title">
        </label>
        <label style="display: block;">画像URL:
            <input required type="text" name="image_url">
        </label>
        <label style="display: block;">公開年:
            <input required type="text" name="published_year">
        </label>
        <label style="display: block;">公開中かどうか:
            <input required type="checkbox" name="is_showing">
        </label>
        <label style="display: block;">概要:
            <textarea required name="description" id="" cols="30" rows="10"></textarea>
        </label>

        <button type="submit">保存</button>
    </form>
</body>
</html>
