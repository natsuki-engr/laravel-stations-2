<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>タイトル</th>
            <th>画像パス</th>
            <th>公開年</th>
            <th>概要</th>
            <th>上映中</th>
            <th>ジャンル</th>
            <th>編集</th>
            <th>削除</th>
        </tr>

        @foreach($movieList as $movie)
            <tr>
                <td>
                    <a href="/admin/movies/{{ $movie->id}}">{{ $movie->id }}</a>
                </td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->image_url }}</td>
                <td>{{ $movie->published_year }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                <td>{{ $movie->genre_id }}</td>
                <td>
                    <a href="/admin/movies/{{ $movie->id }}/edit">編集</a>
                </td>
                <td>
                    <a href="/admin/movies/{{ $movie->id }}/delete">削除</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
