<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<title>Management-panel</title>
<link rel="icon" type="image/png" href="https://clipartcraft.com/images/car-logo-transparent-background-4.png">
<style scoped>
     body {
     margin: 0;
    }

.vertical-header {
    background-color: #ffffff;
    color: #000000;
    box-shadow: 5px 0px 15px 0px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 300px; 
    transition: background-color 0.7s ease, transform 0.7s ease;
}

.vertical-header:hover {
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
}

.vertical-header h1 {
    color: #333333;
    font-size: 34px;
    text-decoration: none;
    font-family: 'Lato', serif;
    font-weight:bold;
}

.vertical-header .arrow-symbol {
    font-size: 18px;
    vertical-align: middle;
}

.vertical-header nav ul {
    list-style-type: none;
    padding: 0;
    margin: 20px 0;
}

.vertical-header nav ul li {
    margin-bottom: 10px;
    margin-top: 35px;
}

.vertical-header nav ul li a {
    text-decoration: none;
    font-size: 1.6rem;
    font-family: 'Montserrat', serif;
    transition: color 0.3s ease;
    color: #333333;
}

.vertical-header nav ul li a:hover {
    color: #ff6347;
}

.content {
    margin-left: 220px;
    padding: 20px;
}

.sub-menu {
    display: none;
    margin: 0;
}
</style>
</head>
<body>

<header class="vertical-header">
    <h1>PanelControl</h1>
    <nav>
        <ul>
            <li><a href="{{route('admin.private')}}">Главная</a></li>
            <li>
                <a href="#" id="autopark-btn">Автопарк <span id="autopark-arrow-symbol" class="arrow-symbol">&#8595;</span></a>
                <ul class="sub-menu" id="autopark-submenu">
                    @if(Auth::user()->status == "Администратор")
                    <li><a href="{{route('add.new.car')}}" style="font-size: 16px; color: rgb(117, 111, 111);">Добавить авто</a></li>
                    @endif
                    <li><a href="{{route('admin.cars')}}" style="font-size: 16px; color: rgb(117, 111, 111);">Обзор</a></li>
                </ul>   
            </li>
            <li>
                <a href="#" id="users-btn">Пользователи <span id="users-arrow-symbol" class="arrow-symbol">&#8595;</span></a>
                <ul class="sub-menu" id="users-submenu">
                    <li><a href="{{route('admin.users')}}" style="font-size: 16px; color: rgb(117, 111, 111);">Клиенты</a></li>
                    @if(Auth::user()->status == "Администратор")
                    <li><a href="{{route('admin.managers')}}" style="font-size: 16px; color: rgb(117, 111, 111);">Менеджеры</a></li>
                    @endif
                </ul>
            </li>
            <li><a href="{{route('admin.sessions')}}">Аренда</a></li>
            <li><a href="{{route('reviews.index')}}">Отзывы</a></li>
            <li><a href="{{route('admin.sessions')}}">Финансовая статистика</a></li>
            <li><a href="{{route('logout')}}">Выход</a></li>
        </ul>
    </nav>
</header>

<script>
    const autoparkBtn = document.getElementById('autopark-btn');
    const autoparkSubmenu = document.getElementById('autopark-submenu');
    const autoparkArrowSymbol = document.getElementById('autopark-arrow-symbol');
    const usersBtn = document.getElementById('users-btn');
    const usersSubmenu = document.getElementById('users-submenu');
    const usersArrowSymbol = document.getElementById('users-arrow-symbol');

    autoparkBtn.addEventListener('click', function() {
        if (autoparkSubmenu.style.display === 'block') {
            autoparkSubmenu.style.display = 'none';
            autoparkArrowSymbol.innerHTML = '&#8595;'; 
        } else {
            autoparkSubmenu.style.display = 'block';
            autoparkArrowSymbol.innerHTML = '&#8593;';
        }
    });

    usersBtn.addEventListener('click', function() {
        if (usersSubmenu.style.display === 'block') {
            usersSubmenu.style.display = 'none';
            usersArrowSymbol.innerHTML = '&#8595;';
        } else {
            usersSubmenu.style.display = 'block';
            usersArrowSymbol.innerHTML = '&#8593;';
        }
    });
</script>

</body>
</html>
