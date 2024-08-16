<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; gap: 20px;">
        @foreach ($movieList as $movie)
            <div>
                <a href="{{ route('movie.index', ['id' => $movie->id], false) }}">
                    <h3>{{ $movie->title }}</h3>
                    <img src="{{ $movie->image_url }}" style="width: 200px; height: 200px;" />
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>
