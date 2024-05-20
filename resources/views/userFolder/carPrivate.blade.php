<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Аренда автомобиля</title>
    <style>
        .container {
            display: flex;
        }
        h2{
            font-family: Lato, serif;
        }
        .left-column {
            flex: 0 0 900px;
            padding: 20px;
            text-align: center;
            background-color: yellow;
            box-sizing: border-box;
        }
        .right-column {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        .image-gallery-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .image-gallery {
            display: flex;
            flex-wrap: nowrap;
            overflow: hidden;
            width: 80%;
            justify-content: center;
        }
        .image-gallery img {
            width: 650px;
            height: 300px;
            margin: 5px;
            transition: transform 0.6s ease;
        }
        .image-gallery img:hover {
            transform: scale(1.1);
        }
        .arrow {
            cursor: pointer;
            font-size: 2em;
            user-select: none;
            color: #666666;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }
        .main-image {
            width: 100%;
            margin-bottom: 10px;
        }
        .description {
            
            width: 850px;
            font-family: Montserrat, serif;
            color: #666666;
            word-break: break-word;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2>{{$car['mark']}}</h2>
            <p class="description">{{$car['description']}}</p>
            <div class="image-gallery-container">
                <div class="arrow arrow-left" onclick="changeImage(-1)">&#9664;</div>
                <div class="image-gallery" id="imageGallery">
                    @foreach($car->images as $image)
                        <img src="/{{ $image->path }}" alt="Car image">
                    @endforeach
                </div>
                <div class="arrow arrow-right" onclick="changeImage(1)">&#9654;</div>
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
            <form action="/submit_rental_form" method="POST" oninput="calculateRentalAmount()">
                <label for="pickup_date">Дата начала аренды:</label>
                <input type="date" id="pickup_date" name="pickup_date" required>

                <label for="return_date">Дата окончания аренды:</label>
                <input type="date" id="return_date" name="return_date" required>

                <label for="rentalAmount">Сумма за аренду:</label>
                <output id="rentalAmountOutput">0</output> руб.

                <textarea name="message" id="message" rows="5" placeholder="Дополнительные комментарии"></textarea>
                <input type="submit" value="Отправить запрос">
            </form>
        </div>
    </div>
    <script>
        let currentImageIndex = 0;

        function changeImage(direction) {
            const gallery = document.getElementById('imageGallery');
            const images = gallery.getElementsByTagName('img');
            currentImageIndex += direction;

            if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            } else if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            }

            for (let i = 0; i < images.length; i++) {
                images[i].style.display = 'none';
            }
            images[currentImageIndex].style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', () => {
            changeImage(0);
        });

        function calculateRentalAmount() {
            const pickupDate = new Date(document.getElementById('pickup_date').value);
            const returnDate = new Date(document.getElementById('return_date').value);
            const rentalDays = (returnDate - pickupDate) / (1000 * 60 * 60 * 24);
            const carPrice = {{$car['price']}};
            const rentalAmount = rentalDays * carPrice;
            document.getElementById('rentalAmountOutput').textContent = rentalAmount.toFixed(2);
        }
    </script>
</body>
</html>