<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <title>CarRent</title>
    <style scoped>
.header {
    background-color: #ffffff;
    color: #333333;
    padding: 20px;
    height: 50px;
    box-shadow: 5px 5px 15px 0px rgba(0, 0, 0, 0.1);
    transition: background-color 0.7s ease, transform 0.7s ease;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    width: 100%;
}

.logo a {
    color: #333333;
    font-size: 2.2rem;
    text-decoration: none;
    font-family: 'Lato', serif;
    font-weight:bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li a {
    color: #333333;
    text-decoration: none;
    font-size: 1.2rem;
    font-family: 'Montserrat', serif;
    transition: color 0.3s ease;
}

.nav-links li a:hover {
    color: #ff6347;
}

</style>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="{{route('main')}}">Главная</a></li>
                <li><a href="#">О нас</a></li>
                @if(Auth::check())
                    <li><a href="#">{{Auth::user()->first_name}}</a></li>
                    <li><a href="{{route('logout')}}">Выйти</a></li>
                @else
                    <li><a href="{{route('user.private')}}">Личный кабинет</a></li>
                @endif
            </ul>
        </nav>
    </header>
</body>
</html>
