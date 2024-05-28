<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Dashboard</title>
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
        .left-column, .right-column {
            flex: 0 0 900px;
            padding: 20px;
            margin: 17px;
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            box-sizing: border-box;
        }
        .stats-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .stats-item {
            flex: 1 1 300px;
            margin: 10px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            text-align: center;
        }
        .stats-item h3 {
            font-family: Montserrat, serif;
            font-weight: 100;
            margin-bottom: 10px;
        }
        .stats-item p {
            font-family: Montserrat, serif;
            font-size: 22px;
            color: #666666;
        }
     </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            <h2>Информация о пользователях</h2>
            <div class="stats-section">
                <div class="stats-item">
                    <h3>Зарегистрированные пользователи</h3>
                    <p>10,234</p>
                </div>
                <div class="stats-item">
                    <h3>Активные пользователи</h3>
                    <p>8,765</p>
                </div>
            </div>
        </div>
        <div class="right-column">
            <h2>Информация об автомобилях</h2>
            <div class="stats-section">
                <div class="stats-item">
                    <h3>Всего автомобилей</h3>
                    <p>256</p>
                </div>
                <div class="stats-item">
                    <h3>Доступные автомобили</h3>
                    <p>198</p>
                </div>
            </div>
        </div>
        <div class="left-column">
            <h2>Финансовая информация</h2>
            <div class="stats-section">
                <div class="stats-item">
                    <h3>Общая прибыль</h3>
                    <p>$1,234,567</p>
                </div>
                <div class="stats-item">
                    <h3>Доход за последний месяц</h3>
                    <p>$123,456</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
