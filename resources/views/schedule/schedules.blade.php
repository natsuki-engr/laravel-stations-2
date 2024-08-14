<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($movies as $movie)
        @if (count($movie->schedules))
            <h2>{{ $movie->id }}: {{ $movie->title }}</h2>
            @foreach ($movie->schedules as $schedule)
                <a href="/admin/schedules/{{ $schedule->id }}">
                    {{ $schedule->start_time->format('Y-m-d H:i') }}~{{ $schedule->end_time->format('Y-m-d H:i') }}<br>
                </a>
            @endforeach
        @endif
    @endforeach
</body>
</html>
