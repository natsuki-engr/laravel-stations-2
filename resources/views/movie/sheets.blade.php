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
        @foreach ($sheets as $row)
            <tr>
                @foreach ($row as $sheet)
                    <td>
                        <a
                            href="{{ route('movie.sheets.reservations', ['movie_id' => $movie_id, 'schedule_id' => $schedule_id], false) . '?' . http_build_query(['date' => $date, 'sheetId' => $sheet['id']]) }}">{{ $sheet['row'] }}-{{ $sheet['column'] }}</a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>

</html>
