<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="templates.css">
    <title>CarRent</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 50px;
            animation: fadeIn 1s ease;
        }
        h1, h2 {
            color: #333;
            font-family: 'Montserrat', sans-serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        main {
            padding-bottom: 20px;
        }
        section {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
            animation: slideIn 1s ease;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 5px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Добро пожаловать в CarRent</h1>
    <main>
        <section>
            <h2>Наша компания</h2>
            <p>Мы - ведущая компания по аренде автомобилей, предоставляющая своим клиентам широкий выбор автомобилей различных марок и классов.</p>
            <p>Наша миссия - сделать ваше путешествие комфортным и безопасным, предоставив качественные автомобили и высокий уровень сервиса.</p>
        </section>
        <section>
            <h2>Наши преимущества</h2>
            <ul>
                <li>Широкий выбор автомобилей для любых целей: от экономичных моделей до представительских автомобилей</li>
                <li>Гибкая система скидок для постоянных клиентов</li>
                <li>Круглосуточная поддержка клиентов по телефону и онлайн</li>
                <li>Быстрое и удобное онлайн-бронирование с возможностью оплаты при получении автомобиля</li>
                <li>Страхование и техническая поддержка включены в стоимость аренды</li>
                <li>Безлимитный пробег на всех автомобилях</li>
            </ul>
        </section>
        <section>
            <h2>Контакты</h2>
            <p>Адрес: г.Днепр ул.Уличная 52</p>
            <p>Телефон: +380 (987) 654-32-10</p>
            <p>Email: rentcars@gmail.com</p>
        </section>
    </main>
</div>
</body>
</html>
