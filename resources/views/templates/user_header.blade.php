<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <title>CarRent</title>
    <link rel="icon" type="image/png" href="https://clipartcraft.com/images/car-logo-transparent-background-4.png">
    <style scoped>
        body{
            margin: 0;
        }
        .header {
            background-color: #ffffff;
            color: #333333;
            padding: 20px;
            height: 45px;
            box-shadow: 5px 5px 15px 0px rgba(0, 0, 0, 0.1);
            transition: background-color 0.7s ease, transform 0.7s ease, box-shadow 0.7s ease;
            width: 98%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header:hover {
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 35px;
            height: 40px;
            margin-bottom: 5px;
            margin-right: 10px;
        }

        .logo a {
            color: #333333;
            font-size: 1.6rem;
            text-decoration: none;
            font-family: 'Montserrat', serif;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            color: #333333;
            border: 1px solid white;
            text-decoration: none;
            padding: 10px;
            font-size: 1.2rem;
            font-family: 'Montserrat', serif;
            transition: color 0.3s ease, border-color 1.2s ease;
        }

        .nav-links li a:hover {
            border-color: black;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="https://cdn4.iconfinder.com/data/icons/multimedia-75/512/multimedia-08-256.png" alt="Logo">
                <a href="{{route('main')}}">г.Днепр ул.Уличная 52</a>
            </div>
            <ul class="nav-links">
                <li><a href="{{route('main')}}">Главная</a></li>
                <li><a href="#">О нас</a></li>
                @if(Auth::check())
                    <li><a href="#">{{Auth::user()->first_name}}</a></li>
                    <li><a>Баланс: {{Auth::user()->balance}}</a></li>
                    <li><a href="{{route('logout')}}">Выйти</a></li>
                @else
                    <li><a href="{{route('user.private')}}">Личный кабинет</a></li>
                @endif
            </ul>
        </nav>
    </header>
</body>
</html>
