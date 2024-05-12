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
        <span style="font-size: 20px;">Добавления нового авто в автопарк</span>
    </div>
    <form action="{{route('post.add.new.car')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="right-container">
                <label for="description">Описание:</label><br>
                <textarea id="description" name="description" required></textarea><br><br>
                <label for="type">Тип авто:</label><br>
                <select id="type" name="type">
                    <option value="Седан">Седан</option>
                    <option value="Универсал">Универсал</option>
                    <option value="Хэтчбек">Хэтчбек</option>
                    <option value="Лифтбек">Лифтбек</option>
                    <option value="Лимузин">Лимузин</option>
                    <option value="Внедорожник">Внедорожник</option>
                    <option value="Кроссовер">Кроссовер</option>
                    <option value="Кабриолет">Кабриолет</option>
                </select><br><br>
                <label for="mark">Марка:</label><br>
                <select id="mark" name="mark">
                    <option value="Toyota">Toyota</option>
                    <option value="Ford">Ford</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Honda">Honda</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Nissan">Nissan</option>
                    <option value="BMW">BMW</option>
                </select><br><br>
                <label for="year">Год выпуска авто:</label><br>
                <select id="year" name="year">
                    <?php
                        $currentYear = date("Y");
                        for ($i = $currentYear; $i >= 1900; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select><br><br>
                <label for="gearbox">Коробка передач:</label><br><br>
                <label for="automatic" style="margin-left:38%;">Автоматическая</label>
                <input type="radio" id="automatic" name="gearbox" value="Автоматическая" required><br><br>
                <label for="manual" style="margin-left:40%;">Механическая</label>
                <input type="radio" id="manual" name="gearbox" value="Механическая" required><br><br>
            </div>
            <div class="left-container">
                <label for="engine">Тип двигателя:</label><br>
                <select id="engine" name="engine">
                    <option value="Бензиновый">Бензиновый</option>
                    <option value="Дизельный">Дизельный</option>
                    <option value="Гибридный">Гибридный</option>
                    <option value="Электрический">Электрический</option>
                </select><br><br>
                <label for="color">Цвет:</label><br>
                <span class="color-sample" id="color-sample" style="background-color: white;"></span>
                <select id="color" name="color" onchange="changeColor()" required>
                    <option value="white">Белый</option>
                    <option value="black">Черный</option>
                    <option value="grey">Серый</option>
                    <option value="red">Красный</option>
                    <option value="blue">Синий</option>
                    <option value="green">Зеленый</option>
                    <option value="yellow">Желтый</option>
                </select><br><br>
                <label for="price">Цена:</label><br>
                <input type="number" id="price" name="price" required><br><br>
                <label for="logo">Фото-лого: (необязательно)</label><br>
                <input type="file" id="logo" name="logo"><br>
                <label for="images">Дополнительные картинки:</label><br>
                <input type="file" id="images" name="images[]" multiple required><br><br>
            </div>
        </div>
        <button type="submit">Добавить</button>
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
