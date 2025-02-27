<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Car List</h1>
    <ul>
        @foreach($cars as $car)
        <li>
            <strong>Name:</strong> {{ $car->name }}<br>
            <strong>Model:</strong> {{ $car->model }}<br>
            <strong>Company:</strong> {{ $car->company }}<br>
            <strong>price per hour :</strong> {{ $car->price_per_hour }}<br>
            <strong>price per day :</strong> {{ $car->price_per_day }}<br>
            <strong>price per month :</strong> {{ $car->price_per_month }}<br>
            <strong>Year:</strong> {{ $car->year }}<br>
            <br>
            <strong>Created by:</strong> {{ $car->user->name }}<br>
            <strong>Image:</strong><br>
            <div style="display: flex; flex-wrap: wrap;">
                @foreach ($car->images as $image)
                <img src="{{ asset($image->path) }}" alt="{{ $car->name }}" style="margin-right: 10px;"><br>
                @endforeach
            </div>

            @foreach ($car->reservations as $reservation)
            <strong>Start Reservation:</strong> {{ $reservation->start_date }}<br>
            <strong>End Reservation:</strong> {{ $reservation->end_date }}<br>
            @endforeach

            <br>
        </li>
        <hr>
        @endforeach
    </ul>
    </ul>


</body>

</html>