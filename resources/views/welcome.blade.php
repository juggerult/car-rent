<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chiza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Аренда автомобиля</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            margin: 50px auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .sidebar {
            width: 300px;
            padding: 20px;
            border: 1px solid rgb(146, 146, 146);
            border-radius: 10px;
            position: sticky;
            background-color: #fff;
            margin-right: 20px;
        }

        .sidebar h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .sidebar select, .sidebar button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
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

        .car-info {
            width: 400px;
            margin-bottom: 20px;
            margin-left: 40px;
            height: 500px;
            background-color: #fff;
            border: 1px solid rgb(146, 146, 146);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.6s ease;
            opacity: 0;
            animation: fadeIn 4.5s ease forwards;
        }

        .car-info:first-child {
            margin-left: 0;
        }

        .car-info:hover {
            transform: scale(1.03);
        }

        .car-image {
            width: 100%;
            height: 50%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .car-details {
            padding: 20px;
        }

        .car-details h2 {
            margin-top: 0;
            font-size: 20px;
            text-align: center;
            font-family: Montserrat, serif;
            color: #333;
        }

        .car-details p {
            margin: 7px 0;
            font-size: 14px;
            font-family: Montserrat, serif;
            color: #666;
        }

        .car-details .price {
            font-size: 18px;
            color: #4CAF50;
        }

        .car-details button {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid rgb(139, 139, 139);
            font-size: 14px;
            color: rgb(0, 0, 0);
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .car-details button:hover {
            border-color: #000000;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .custom-select {
            position: relative;
            margin-bottom: 10px;
        }

        .select-selected {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
        }

        .select-selected:after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        .select-items {
            display: none;
            font-family: Montserrat, serif;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 5px 5px;
            z-index: 1;
            width: calc(100% - 2px);
        }

        .select-items div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid white;
            cursor: pointer;
        }

        .select-items div:hover {
            background-color: #f4f4f4;
            border-color: #696666;
        }

        .select-items img {
            height: 20px;
            width: 30px;
            margin-left: 10px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 69px;
            height: 32px;
        }

        .switch input { 
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .switch-container {
            display: flex;
            align-items: center;
        }

        .switch-container span {
            margin-right: 10px;
            font-family: Montserrat, serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3 style="font-family: Montserrat, serif;">Выберите автомобиль</h3>
            <div class="custom-select">
                <div class="select-selected" style="font-family: Montserrat, serif;">Тип</div>
                <div class="select-items">
                    <div>Седан</div>
                    <div>Универсал</div>
                    <div>Хэтчбек</div>
                    <div>Лифтбек</div>
                    <div>Лимузин</div>
                    <div>Внедорожник</div>
                    <div>Кроссовер</div>
                    <div>Кабриолет</div>
                </div>
            </div>
            <div class="custom-select">
                <div class="select-selected" style="font-family: Montserrat, serif;">Марка</div>
                <div class="select-items">
                    <div><span>Toyota</span> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Toyota_EU.svg/1200px-Toyota_EU.svg.png"></div>
                    <div><span>Ford</span> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/1024px-Ford_Motor_Company_Logo.svg.png"></div>
                    <div><span>Chevrolet</span> <img src="https://upload.wikimedia.org/wikipedia/ru/7/7f/Chevrolet_new_logo.png"></div>
                    <div><span>Mercedes</span> <img src="https://i.pinimg.com/474x/c8/aa/12/c8aa128a5f41d84b311386ce4f5302dc.jpg"></div>
                    <div><span>Honda</span> <img src="https://upload.wikimedia.org/wikipedia/commons/1/12/Honda_Canada.webp"></div>
                    <div><span>Volkswagen</span> <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Volkswagen_logo_2019.svg"></div>
                    <div><span>Nissan</span> <img src="https://upload.wikimedia.org/wikipedia/commons/2/23/Nissan_2020_logo.svg"></div>
                    <div><span>BMW</span> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/768px-BMW.svg.png"></div>
                </div>
            </div>
            <div class="custom-select">
                <div class="select-selected" style="font-family: Montserrat, serif;">Год выпуска</div>
                <div class="select-items">
                    <div>Минимальный год: <input type="number" id="minYear" min="1900" max="2100" step="1" value="1900"></div>
                </div>
            </div>
            <div class="custom-select">
                <div class="select-selected" style="font-family: Montserrat, serif;">Тип двигателя</div>
                <div class="select-items">
                    <div>Бензиновый <img src="https://cdn0.iconfinder.com/data/icons/zondicons/20/location-gas-station-512.png"></div>
                    <div>Дизельный <img src="https://cdn2.iconfinder.com/data/icons/car-parts-11/256/Fuel-256.png"></div>
                    <div>Гибридный <img src="https://cdn2.iconfinder.com/data/icons/green-energy-initiative-1/100/factory-512.png"></div>
                    <div>Электрический <img src="https://cdn2.iconfinder.com/data/icons/electro-cars-icostory-black-and-white/64/button-charging-energy-power-electro_car-256.png"></div>
                </div>
            </div>
            <div class="switch-container">
                <span>автоматическая коробка</span>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div><br>
            
            <button id="filterBtn">Поиск</button>
            <button id="clearFiltersBtn">Очистить</button>
        </div>
        <?php foreach ($cars as $car): ?>
        <div class="car-info available-for-rent">
            <?php if (!empty($car->logo->path)): ?>
                <img src="/<?=$car->logo->path?>" alt="Автомобиль" class="car-image">
            <?php else: ?>
                <img src="https://i.pinimg.com/736x/60/6e/36/606e36ab077df99dd0f681ed074ebe05.jpg" alt="Вторая картинка" class="car-image">
            <?php endif; ?>

            <form action="/user/rent/car/<?=$car['id']?>" method="GET">
                <div class="car-details">
                    <h2><strong>Цена за сутки:</strong> <span class="price"><?=$car['price']?></span></h2>
                    <p><strong>Марка:</strong> <?=$car['mark']?></p>
                    <p><strong>Год выпуска:</strong> <?=$car['year']?></p>
                    <p><strong>Трансмиссия:</strong> <?=$car['gearbox']?></p>
                    <p><strong>Двигатель:</strong> <?=$car['engine']?></p>
                    <p><strong>Тип авто:</strong> <?=$car['type']?></p>
                    <?php if (!$car['tenant_id']): ?>
                        <button style="margin-top: 10px;" type="submit">Забронировать</button>
                    <?php else: ?>
                        <button style="margin-top: 10px; border-color:white; font-size:17px;" disabled>В аренде</button>
                    <?php endif; ?>
                </div>
            </form>
            
        </div>
        <?php endforeach; ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const filterBtn = document.getElementById("filterBtn");
        const clearFiltersBtn = document.getElementById("clearFiltersBtn");

        if (filterBtn) {
            filterBtn.addEventListener("click", function () {
                filterCars();
            });
        }

        if (clearFiltersBtn) {
            clearFiltersBtn.addEventListener("click", function () {
                const selects = document.querySelectorAll(".custom-select .select-selected");
                const initialOptions = ["Тип", "Марка", "Год выпуска", "Тип двигателя"];
        
                selects.forEach(function (selected, index) {
                selected.textContent = initialOptions[index];
            });

            const switches = document.querySelectorAll(".switch input");
            switches.forEach(function (input) {
                input.checked = false;
            });

                filterCars(); 
            });
        }


    function filterCars() {
        const type = document.querySelector(".custom-select:nth-of-type(1) .select-selected").textContent.trim().toLowerCase();
        const brand = document.querySelector(".custom-select:nth-of-type(2) .select-selected").textContent.trim().toLowerCase();
        const year = document.querySelector(".custom-select:nth-of-type(3) .select-selected").textContent.trim().toLowerCase();
        const engineType = document.querySelector(".custom-select:nth-of-type(4) .select-selected").textContent.trim().toLowerCase();
        const automatic = document.querySelector(".switch input").checked;

        const cars = document.querySelectorAll(".car-info");

        cars.forEach(function (car) {
            const carType = car.querySelector("p:nth-of-type(5)").textContent.split(": ")[1].trim().toLowerCase();
            const carBrand = car.querySelector("p:nth-of-type(1)").textContent.split(": ")[1].trim().toLowerCase();
            const carYear = car.querySelector("p:nth-of-type(2)").textContent.split(": ")[1].trim().toLowerCase();
            const carEngine = car.querySelector("p:nth-of-type(4)").textContent.split(": ")[1].trim().toLowerCase();
            const carAutomatic = car.querySelector("p:nth-of-type(3)").textContent.split(": ")[1].trim().toLowerCase() === "автоматическая";

            if ((type === "тип" || carType === type) &&
                (brand === "марка" || carBrand === brand) &&
                (year === "год выпуска" || carYear === year) &&
                (engineType === "тип двигателя" || carEngine === engineType) &&
                (!automatic || carAutomatic)) {
                car.style.display = "block";
            } else {
                car.style.display = "none";
            }
        });
    }

    // Обработка событий для открытия/закрытия выпадающих списков
    const selects = document.querySelectorAll(".custom-select");
    selects.forEach(function (select) {
        const selected = select.querySelector(".select-selected");
        const items = select.querySelector(".select-items");
        selected.addEventListener("click", function () {
            items.style.display = items.style.display === "block" ? "none" : "block";
        });
        const options = items.querySelectorAll("div");
        options.forEach(function (option) {
            option.addEventListener("click", function () {
                selected.textContent = option.textContent;
                items.style.display = "none";
            });
        });
    });

    // Закрытие выпадающих списков при клике за пределами списка
    document.addEventListener("click", function (e) {
        selects.forEach(function (select) {
            if (!select.contains(e.target)) {
                select.querySelector(".select-items").style.display = "none";
            }
        });
    });
});
    </script>
</body>
</html>
