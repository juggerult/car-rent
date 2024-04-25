<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<title>Management-panel</title>
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
    width: 200px; 
    overflow-y: auto;
}

.vertical-header h1 {
    color: #333333;
    font-size: 34px;
    text-decoration: none;
    font-family: 'Lato', serif;
    font-weight:bold;
}

.vertical-header nav ul {
    list-style-type: none;
    padding: 0;
    margin: 20px 0;
}

.vertical-header nav ul li {
    margin-bottom: 10px;
}

.vertical-header nav ul li a {
    color: #fff;
    text-decoration: none;
    color: #dbd2d2;
    font-size: 18px;
}

.vertical-header nav ul li a:hover {
    color: #ff6347;
}

.content {
    margin-left: 220px;
    padding: 20px;
}

</style>
</head>
<body>

<header class="vertical-header">
    <h1>PanelControl</h1>
    <nav>
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">Автопарк</a></li>
            <li><a href="#">Пользователи</a></li>
            <li><a href="#">Выход</a></li>
        </ul>
    </nav>
</header>

<div class="content">    
</div>

</body>
</html>
