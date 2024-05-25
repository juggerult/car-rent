<!DOCTYPE html>
<html lang="ru">
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
            flex-wrap: wrap;
            justify-content: center;
        }
        h2 {
            font-family: Montserrat, serif;
            font-weight: 100;
        }
        .left-column {
            flex: 0 0 900px;
            padding: 20px;
            margin-top: 17px;
            margin-left: 100px;
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            box-sizing: border-box;
        }
        .right-column {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        .image-gallery-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .main-image {
            width: 650px;
            height: 300px;
            margin-bottom: 10px;
            transition: transform 0.6s ease;
        }
        .main-image:hover {
            transform: scale(1.04);
        }
        .thumbnail-gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .thumbnail-gallery img {
            width: 150px;
            height: 75px;
            margin: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .thumbnail-gallery img:hover {
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
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }
        .description {
            width: 850px;
            font-size: 22px;
            font-family: Montserrat, serif;
            color: #666666;
            word-break: break-word;
            margin-bottom: 20px;
        }
        .form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            width: 355px;
            transition: box-shadow 0.35s ease, transform 0.8s ease, background-color 0.5s ease;
            margin: 0 auto;
        }
        .form:hover {
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
        }
        .form h2 {
            margin-top: 0;
            margin-bottom: 30px;
            text-align: center;
            font-family: Montserrat, serif;
            color: #333333;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
            font-family: Montserrat, serif;
            color: #666666;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            color: #555555;
            box-sizing: border-box;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #4CAF50;
        }
        .form-group output {
            display: block;
            font-family: Montserrat, serif;
            color: #555555;
            margin-top: 10px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .form-group .payment-method {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .form-group .payment-method input {
            width: auto;
            margin-right: 10px;
        }
        .form-group .payment-method label {
            margin: 0;
            font-family: Montserrat, serif;
            color: #666666;
        }

        button {
            width: 75%;
            padding: 12px;
            font-size: 15px;
            font-family: Montserrat, serif;
            border: none;
            border-radius: 8px;
            text-align: left;
            background-color: white;
            color: black;
            border: 1px solid #cccccc;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.5s ease, width 0.4s ease, box-shadow 0.7s ease;
        }

        button:hover {
            width: 100%;
            border-color: black;
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
        }
        
        .car-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .car-details li {
            font-family: Montserrat, serif;
            font-size: 18px;
            color: #666666;
            list-style-type: none;
            margin: 10px 20px;
            width: 200px;
        }
        .color-circle {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 5px;
    border: 1px solid #000; /* Черная обводка для контраста */
    vertical-align: middle; /* Выравнивание по вертикали */
}

    </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2 class="description">{{$car['description']}}</h2>
            <div class="image-gallery-container">
                <div class="arrow arrow-left" onclick="changeImage(-1)">&#9664;</div>
                <img id="mainImage" class="main-image" src="/{{ $car->images[0]->path }}" alt="Main Car Image">
                <div class="arrow arrow-right" onclick="changeImage(1)">&#9654;</div>
            </div>
            <div class="thumbnail-gallery" id="thumbnailGallery">
                @foreach($car->images as $image)
                    <img src="/{{ $image->path }}" alt="Car image" onclick="setMainImage(this.src)">
                @endforeach
            </div>
            <ul class="car-details">
                <li>Год: {{ $car['year'] }}</li>
                <li>Коробка передач <img src="https://cdn4.iconfinder.com/data/icons/tabler-vol-4/24/manual-gearbox-256.png" style="width: 30px; height:30px; vertical-align: middle; "> {{ $car['gearbox'] }}</li>
                <li>Тип: {{ $car['type'] }}</li>
                <li>Цвет: <span class="color-circle" style="background-color: {{ $car['color'] }}"></span></li>
            </ul>
        </div>
        <div class="right-column">
            <form class="form" action="{{ route('get.rent', ['id' => $car->id]) }}" method="POST" oninput="calculateRentalAmount()">
                @csrf
                <h2>Форма аренды</h2>
                <div class="form-group">
                    <label for="start_date">Дата начала аренды:</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">Дата окончания аренды:</label>
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label for="rentalAmount">Сумма за аренду:</label>
                    <output id="rentalAmountOutput">0 грн</output> <output>с учетом {{ $car['price'] * 7 }} залога</output>
                </div>
                <div class="form-group payment-method">
                    <label>Способ оплаты:</label>
                    <div>
                        <label for="cash" style="text-align: center;">Наличными</label>
                        <input type="radio" id="cash" name="payment_method" value="cash" required>
                    </div>
                    <div>
                        <label for="card" style="text-align: center;">Балансом аккаунта - скидка 10%</label>
                        <input type="radio" id="card" name="payment_method" value="card" required>
                    </div>
                    <input type="hidden" id="price" name="price">
                </div>
                <div class="form-group">
                    @if ($car['tenant_id'])
                        <h2>Авто в аренде</h2>
                    @else
                        <button type="submit">Забронировать</button>
                    @endif
                    <div class="alert-danger" style="color: red;">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                    @endforeach
                    </div>
                </div>                
            </form>
        </div>
    </div>
    <script>
        let currentImageIndex = 0;

        function changeImage(direction) {
            const gallery = document.getElementById('thumbnailGallery');
            const images = gallery.getElementsByTagName('img');
            currentImageIndex += direction;

            if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            } else if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            }

            setMainImage(images[currentImageIndex].src);
        }

        document.addEventListener('DOMContentLoaded', () => {
            changeImage(0);
        });

        function setMainImage(src) {
            document.getElementById('mainImage').src = src;
        }

        function calculateRentalAmount() {
            const pickupDate = new Date(document.getElementById('start_date').value);
            const returnDate = new Date(document.getElementById('end_date').value);
            const rentalDays = (returnDate - pickupDate) / (1000 * 60 * 60 * 24);
            const carPrice = {{$car['price']}};
            const deposit = carPrice * 7;
            const rentalAmount = rentalDays * carPrice + deposit;
            document.getElementById('rentalAmountOutput').textContent = rentalAmount.toFixed(2);
            document.getElementById('price').value = rentalAmount.toFixed(2);
        }

        const today = new Date().toISOString().split('T')[0];
        const pickupDateInput = document.getElementById('start_date');
        const returnDateInput = document.getElementById('end_date');

        pickupDateInput.setAttribute('min', today);
        returnDateInput.setAttribute('min', today);

        pickupDateInput.addEventListener('change', function() {
            const startDate = this.value;
            returnDateInput.setAttribute('min', startDate);

            if (returnDateInput.value && returnDateInput.value < startDate) {
                returnDateInput.value = '';
            }
        });
    </script>
</body>
</html>
