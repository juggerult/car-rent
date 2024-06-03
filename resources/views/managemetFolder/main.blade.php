<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style scoped>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-left: 100px;
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
            margin-top: 70px;
            margin-left: 190px;
            flex-wrap: wrap;
        }

        .stats-item {
            flex: 1 1 300px;
            margin: 10px;
            height: 250px;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            text-align: center;
            width: 100px;
        }

        .stats-item h2 {
            font-family: Montserrat, serif;
            font-weight: 100;
            margin-bottom: 10px;
        }

        .stats-item p {
            font-family: Montserrat, serif;
            font-size: 22px;
            color: #666666;
        }
        
        .financeDiv{
            background-color: yellow;
            margin-top: 20px;
            text-align: center;
            height: 250px;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            width: 1000px;
            height: 300px;
        }

        .financeDiv h2 {
            font-family: Montserrat, serif;
            font-weight: 100;
            margin-bottom: 10px;
        }

        .financeDiv p {
            font-family: Montserrat, serif;
            font-size: 22px;
            color: #666666;
        }

        .buttonCLs {
    width: 75%;
    text-decoration: none;
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

.buttonCLs:hover {
    width: 100%;
    border-color: black;
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
    <div class="container">
        <div class="stats-section">
            <div class="stats-item">
                <h2>Пользователи</h2>
                <p>Всего: {{ count($users) }}</p>
                <p>Активных: {{ $users->where('isActive', 1)->count() }}</p>
                <a class="buttonCLs" href="{{route('admin.users')}}">Перейти к пользователям</a>
            </div>
            <div class="stats-item">
                <h2>Автомобили</h2>
                <p>Всего: {{ count($cars) }}</p>
                <p>Доступных: {{ $cars->whereNull('tenant_id')->where('isActive', true)->count() }}</p>
                <a class="buttonCLs" href="{{route('admin.cars')}}">Перейти к автомобилям</a>
            </div>
            <div class="stats-item">
                <h2>Аренды</h2>
                <p>Активных: {{ $rents->whereNotNull('tenant_id')->where('isActive', true)->count() }}</p>
                <p>Завершенных: {{ $rents->where('isActive', false)->count() }}</p>
                <a class="buttonCLs" href="{{route('admin.sessions')}}">Перейти к сесиям</a>
            </div><br>
            <div class="financeDiv">
                <h2 style="font-size: 30px; font-family: Montserrat, serif; font-weight: 100; margin-bottom: 10px;">Финансы</h2>
                <p>Прибыль за месяц: {{$monthIncome}}</p>
                <p>Прибыль за неделю: {{$weekIncome}}</p>
                <p>Прибыль за день: {{$dayIncome}}</p>
                <a class="buttonCLs" href="{{route('finance.index')}}">Перейти к финансам</a>
            </div>
        </div>
    </div>
</body>
</html>
