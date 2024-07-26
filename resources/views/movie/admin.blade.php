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
            <th>タイトル</th>
            <th>画像パス</th>
            <th>公開年</th>
            <th>概要</th>
            <th>上映中</th>
        </tr>
        {{-- @php
        dd($movieList);
        @endphp --}}

        @foreach($movieList as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->image_url }}</td>
                <td>{{ $movie->published_year }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
