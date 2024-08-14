<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>作品ID: {{ $schedule->movie_id }}</li>
        <li>開始時刻: {{ $schedule->start_time }}</li>
        <li>終了時刻: {{ $schedule->end_time }}</li>
        <li>作成日時: {{ $schedule->created_at }}</li>
        <li>変更日時: {{ $schedule->updated_at }}</li>
    </ul>
</body>
</html>
