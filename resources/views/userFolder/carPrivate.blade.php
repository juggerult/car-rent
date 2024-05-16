<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аренда автомобиля</title>
    <style>
        .container {
            display: flex;
        }
        .left-column {
            flex: 1;
            padding: 20px;
        }
        .right-column {
            flex: 1;
            padding: 20px;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2>{{$car['mark']}}</h2>
            <p>{{$car['description']}}</p>
            <div class="image-gallery">
               @foreach($car->images as $image)
                    <img src="/{{ $image->path }}">
               @endforeach
            </div>
            <h3>Детальная информация:</h3>
            <ul>
                <li>Год выпуска: 2023</li>
                <li>Пробег: 20 000 км</li>
                <li>Цвет: серебристый</li>
                <li>Двигатель: бензиновый, 2.5 литра</li>
            </ul>
        </div>
        <div class="right-column">
            <h2>Форма аренды автомобиля</h2>
            <form action="/submit_rental_form" method="POST">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="pickup_date">Дата получения:</label>
                <input type="date" id="pickup_date" name="pickup_date" required>
                <label for="return_date">Дата возврата:</label>
                <input type="date" id="return_date" name="return_date" required>
                <textarea name="message" id="message" rows="5" placeholder="Дополнительные комментарии"></textarea>
                <input type="submit" value="Отправить запрос">
            </form>
        </div>
    </div>
</body>
</html>
