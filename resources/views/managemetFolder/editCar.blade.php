<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Managemnt panel</title>
    <style scoped>
        body{
            margin-left: 450px;
        }
        .color-sample {
            width: 20px;
            height: 20px;
            display: inline-block;
            margin-right: 5px;
            border: 1px solid #999;
            vertical-align: middle;
        }
        form{
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            width: 1255px;
            transition: box-shadow 0.35s ease, transform 0.5s ease, background-color 0.5s ease;
        }
        form:hover {
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
        }
        button {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            border: none;
            border-radius: 8px;
            text-align: center;
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
        form label {
            margin-bottom: 10px;
            text-align: center;
            color: #666666;
        }
        h2{
            font-family: Lato, serif;
            font-family: 40px;
        }
        input, textarea, select, input {
            width: 95%; 
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            color: #555555;
        }
        .right-container{
            width: 600px;
        }
        .left-container{
            width: 600px;
            margin-left: 50px;
        }
        .container{
            display: inline-flex;
        }
        .infoDiv {
            width: 450px;
            margin-left: 410px;
            margin-top: 100px;
            margin-bottom: 100px;
            border-radius: 15px;
            border: 2px solid #ccc;
            font-family: 'Roboto', sans-serif;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }
        .infoDiv:hover {
            transform: scale(1.07);
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="infoDiv">
        <img src="https://png.pngtree.com/png-vector/20220711/ourmid/pngtree-automotive-car-logo-png-image_5837187.png" alt="Лицо" style="width: 50px; height: 50px; margin-right: 20px; vertical-align: middle; border-radius: 50%;">
        <span style="font-size: 20px;">Редактирование информации об автомобиле</span>
    </div>
    <form action="{{route('save.update.car', $car->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="right-container">
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" maxlength="255" required>{{ $car->description }}</textarea><br><br>
                <label for="type">Тип авто:</label><br>
                <select id="type" name="type">
                    <option value="Седан" {{ $car->type == 'Седан' ? 'selected' : '' }}>Седан</option>
                    <option value="Универсал" {{ $car->type == 'Универсал' ? 'selected' : '' }}>Универсал</option>
                    <option value="Хэтчбек" {{ $car->type == 'Хэтчбек' ? 'selected' : '' }}>Хэтчбек</option>
                    <option value="Лифтбек" {{ $car->type == 'Лифтбек' ? 'selected' : '' }}>Лифтбек</option>
                    <option value="Лимузин" {{ $car->type == 'Лимузин' ? 'selected' : '' }}>Лимузин</option>
                    <option value="Внедорожник" {{ $car->type == 'Внедорожник' ? 'selected' : '' }}>Внедорожник</option>
                    <option value="Кроссовер" {{ $car->type == 'Кроссовер' ? 'selected' : '' }}>Кроссовер</option>
                    <option value="Кабриолет" {{ $car->type == 'Кабриолет' ? 'selected' : '' }}>Кабриолет</option>
                </select><br><br>
                <label for="mark">Марка:</label><br>
                <select id="mark" name="mark">
                    <option value="Toyota" {{ $car->mark == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                    <option value="Ford" {{ $car->mark == 'Ford' ? 'selected' : '' }}>Ford</option>
                    <option value="Chevrolet" {{ $car->mark == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                    <option value="Mercedes" {{ $car->mark == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                    <option value="Honda" {{ $car->mark == 'Honda' ? 'selected' : '' }}>Honda</option>
                    <option value="Volkswagen" {{ $car->mark == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                    <option value="Nissan" {{ $car->mark == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                    <option value="BMW" {{ $car->mark == 'BMW' ? 'selected' : '' }}>BMW</option>
                </select><br><br>
                <label for="year">Год выпуска авто:</label><br>
                <select id="year" name="year">
                    <?php
                        $currentYear = date("Y");
                        for ($i = $currentYear; $i >= 1900; $i--) {
                            $selected = ($car->year == $i) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                    ?>
                </select><br><br>
                <label for="gearbox">Коробка передач:</label><br><br>
                <label for="automatic" style="margin-left:38%;">Автоматическая</label>
                <input type="radio" id="automatic" name="gearbox" value="Автоматическая" {{ $car->gearbox == 'Автоматическая' ? 'checked' : '' }}><br><br>
                <label for="manual" style="margin-left:40%;">Механическая</label>
                <input type="radio" id="manual" name="gearbox" value="Механическая" {{ $car->gearbox == 'Механическая' ? 'checked' : '' }}><br><br>
            </div>
            <div class="left-container">
                <label for="engine">Тип двигателя:</label><br>
                <select id="engine" name="engine">
                    <option value="Бензиновый" {{ $car->engine == 'Бензиновый' ? 'selected' : '' }}>Бензиновый</option>
                    <option value="Дизельный" {{ $car->engine == 'Дизельный' ? 'selected' : '' }}>Дизельный</option>
                    <option value="Гибридный" {{ $car->engine == 'Гибридный' ? 'selected' : '' }}>Гибридный</option>
                    <option value="Электрический" {{ $car->engine == 'Электрический' ? 'selected' : '' }}>Электрический</option>
                </select><br><br>
                <label for="color">Цвет:</label><br>
                <span class="color-sample" id="color-sample" style="background-color: {{ $car->color }};"></span>
                <select id="color" name="color" onchange="changeColor()" required>
                    <option value="white" {{ $car->color == 'white' ? 'selected' : '' }}>Белый</option>
                    <option value="black" {{ $car->color == 'black' ? 'selected' : '' }}>Черный</option>
                    <option value="grey" {{ $car->color == 'grey' ? 'selected' : '' }}>Серый</option>
                    <option value="red" {{ $car->color == 'red' ? 'selected' : '' }}>Красный</option>
                    <option value="blue" {{ $car->color == 'blue' ? 'selected' : '' }}>Синий</option>
                    <option value="green" {{ $car->color == 'green' ? 'selected' : '' }}>Зеленый</option>
                    <option value="yellow" {{ $car->color == 'yellow' ? 'selected' : '' }}>Желтый</option>
                </select><br><br>
                <label for="price">Цена:</label><br>
                <input type="number" id="price" name="price" value="{{ $car->price }}" required><br><br>
                <label for="logo">Фото-лого: (необязательно)</label><br>
                <input type="file" id="logo" name="logo"><br>
                <label for="images">Дополнительные картинки:</label><br>
                <input type="file" id="images" name="images[]" multiple><br><br>
            </div>
        </div>
        <button type="submit">Сохранить изменения</button>
    </form>
    <script>
        function changeColor() {
            var colorSelect = document.getElementById("color");
            var colorValue = colorSelect.value;
            var colorSample = document.getElementById("color-sample");
            colorSample.style.backgroundColor = colorValue;
        }
    </script>
</body>
</html>
