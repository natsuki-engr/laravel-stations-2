<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>{{ $movie->title }}</h2>
    <img src="{{ $movie->image_url }}" style="width: 200px; height: 200px;">
    <div>
        <ul>
            <li>公開年: {{ $movie->published_year }}</li>
            <li>概要: {{ $movie->description }}</li>
            <li>上映中: {{ $movie->is_showing ? '上映中' : '上映予定' }}</li>
            <li>ジャンル: {{ $movie->genre_id }}</li>
        </ul>

        <ul>
            @foreach ($schedules as $schedule)
                <li>{{ $schedule->start_time->format('Y-m-d H:i:s') }}~{{ $schedule->end_time->format('Y-m-d H:i:s') }}
                    <a
                        href="{{ route('movie.sheets', ['movie_id' => $movie->id, 'schedule_id' => $schedule->id], false) . "?date=" . $schedule->start_time->format('Y-m-d') }}">座席を予約する</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
