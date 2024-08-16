<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($reservations as $reservation)
            <ul>
                <li>{{ $reservation->date }}</li>
                <li>{{ $reservation->name }}</li>
                <li>{{ $reservation->email }}</li>
                <li>{{ strtoupper($reservation->sheet->row.$reservation->sheet->column) }}</li>
            </ul>
        @endforeach
    </div>
</body>
</html>
