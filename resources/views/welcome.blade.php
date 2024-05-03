<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Аренда автомобиля</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            margin: 50px auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .sidebar {
            width: 300px;
            padding: 20px;
            position: sticky;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-right: 20px;
        }

        .sidebar h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .sidebar select, .sidebar button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
        }

        .sidebar button {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        .sidebar button:hover {
            background-color: #45a049;
        }

        .car-info {
            width: 400px;
            margin-bottom: 20px;
            margin-left: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.6s ease;
        }

        .car-info:first-child {
            margin-left: 0;
        }

        .car-info:hover {
            transform: scale(1.05);
        }

        .car-image {
            width: 100%;
            height: 50%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .car-details {
            padding: 20px;
        }

        .car-details h2 {
            margin-top: 0;
            font-size: 20px;
            text-align: center;
            font-family: Montserrat, serif;
            color: #333;
        }

        .car-details p {
            margin: 5px 0;
            font-size: 14px;
            font-family: Montserrat, serif;
            color: #666;
        }

        .car-details .price {
            font-size: 18px;
            color: #4CAF50;
        }

        .car-details button {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid rgb(139, 139, 139);
            color: rgb(0, 0, 0);
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .car-details button:hover {
            background-color: #f8f6f6;
            border-color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>Выберите автомобиль</h3>
            <select>
                <option value="" disabled selected>Тип</option>
                <option value="Седан">Седан</option>
                <option value="Хэтчбек">Хэтчбек</option>
                <option value="Внедорожник">Внедорожник</option>
                <option value="Купе">Купе</option>
            </select>
            <select>
                <option value="" disabled selected>Марка</option>
                <option value="Toyota">Toyota</option>
                <option value="BMW">BMW</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Audi">Audi</option>
            </select>
            <select>
                <option value="" disabled selected>Цвет</option>
                <option value="Черный">Черный</option>
                <option value="Белый">Белый</option>
                <option value="Серый">Серый</option>
                <option value="Синий">Синий</option>
            </select>
            <button>Поиск</button>
        </div>
        @foreach ($cars as $car)  
        <div class="car-info available-for-rent">
            <img src="/{{$car->logo->path}}" alt="Автомобиль" class="car-image">
            <div class="car-details">
                <h2><strong>Цена за сутки:</strong> <span class="price">{{$car ['price']}}</h2>
                <p><strong>Марка:</strong> {{$car ['mark']}}</p>
                <p><strong>Год выпуска:</strong> {{$car ['year']}}</p>
                <p><strong>Трансмиссия:</strong> {{$car ['gearbox']}}</p>
                <p><strong>Двигатель:</strong> {{$car ['engine']}}</p>
                <p><strong>Залог в размере :</strong> <span class="price">{{$car ['price'] * 8}}</span></p><br>
                <button>Забронировать</button>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
