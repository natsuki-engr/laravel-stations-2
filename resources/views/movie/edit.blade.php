<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script>
        window.onload = function() {
            const form = document.getElementById('mainForm');
            form.onsubmit = function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const token = formData.get('_token')
                console.log('token', token)

                fetch(form.action, {
                    method: 'patch',
                    redirect: 'follow',
                    body: formData
                }).then(res => console.log('res', res));
            }
        }
    </script>
</head>

<body>
    <form id="mainForm" action="/admin/movies/{{ $movie->id }}/update" method="post">
        @csrf
        <label style="display: block;">映画タイトル:
            <input required type="text" name="title" value="{{ $movie->title }}">
        </label>
        <label style="display: block;">画像URL:
            <input required type="text" name="image_url" value="{{ $movie->image_url }}">
        </label>
        <label style="display: block;">公開年:
            <input required type="text" name="published_year" value="{{ $movie->published_year }}">
        </label>
        <label style="display: block;">公開中かどうか:
            <input type="checkbox" name="is_showing" @if ($movie->is_showing) checked @endif>
        </label>
        <label style="display: block;">概要:
            <textarea required name="description" id="" cols="30" rows="10">{{ $movie->description }}</textarea>
        </label>
        <label style="display: block">ジャンル:
            <input type="text" value="{{ $movie->genre->name }}">
        </label>

        <button type="submit">保存</button>
    </form>
</body>

</html>
