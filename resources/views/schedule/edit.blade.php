<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form id="mainForm" action="/admin/schedules/'{{ $schedule->id }}'/update" method="POST">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $schedule->movie_id }}">
        <div>
            <label>
                開始日:
                <input type="text" name="start_time_date" value="2024-08-08">
            </label>
        </div>
        <div>
            <label>
                開始時刻:
                <input type="text" name="start_time_time" value="08:00">
            </label>
        </div>
        <div>
            <label>
                終了日:
                <input type="text" name="end_time_date" value="2024-08-09">
            </label>
        </div>
        <div>
            <label>
                終了時刻:
                <input type="text" name="end_time_time" value="08:00">
            </label>
        </div>

        <button type="submit">保存</button>
    </form>
</body>
</html>
