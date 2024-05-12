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
            position: sticky;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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

        .sidebar button {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        .sidebar button:hover {
            background-color: #45a049;
        }


        .car-info {
            width: 400px;
            margin-bottom: 20px;
            margin-left: 40px;
            height: 500px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.6s ease;
            opacity: 0;
            animation: fadeIn 3.5s ease forwards;
        }

        .car-info:first-child {
            margin-left: 0;
        }

        .car-info:hover {
            transform: scale(1.05);
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
            margin: 5px 0;
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
            color: rgb(0, 0, 0);
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .car-details button:hover {
            background-color: #f8f6f6;
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
  position: absolute;
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  border-radius: 0 0 5px 5px;
  z-index: 1;
  width: calc(100% - 2px);
}

.select-items img{
    width: 25px;
    height: 20px;
    top: 0;
    margin-left: 85%;
}

.select-items div {
  padding: 10px;
  border: 1px solid;
  border-color: white;
  cursor: pointer;
}

.select-items div:hover {
  background-color: #f4f4f4;
  border-color: #696666;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>Выберите автомобиль</h3>
            <div class="custom-select">
                <div class="select-selected">Тип</div>
                <div class="select-items">
                    <div>Седан</div>
                    <div>Хэтчбек</div>
                    <div>Внедорожник</div>
                    <div>Купе</div>
                </div>
            </div>
            <div class="custom-select">
                <div class="select-selected">Марка</div>
                <div class="select-items">
                    <div>Toyota</a> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Toyota_EU.svg/1200px-Toyota_EU.svg.png"></div>
                    <div>Ford <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Ford_Motor_Company_Logo.svg/1024px-Ford_Motor_Company_Logo.svg.png"></div>
                    <div>Chevrolet <img src="https://upload.wikimedia.org/wikipedia/ru/7/7f/Chevrolet_new_logo.png"></div>
                    <div>Mercedes <img src="https://i.pinimg.com/474x/c8/aa/12/c8aa128a5f41d84b311386ce4f5302dc.jpg"></div>
                    <div>Honda <img src="https://upload.wikimedia.org/wikipedia/commons/1/12/Honda_Canada.webp"></div>
                    <div>Volkswagen <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Volkswagen_logo_2019.svg"></div>
                    <div>Nissan <img src="https://upload.wikimedia.org/wikipedia/commons/2/23/Nissan_2020_logo.svg"></div>
                    <div>BMW <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/768px-BMW.svg.png"></div>
                </div>
            </div>
            <div class="custom-select">
                <div class="select-selected">Цвет</div>
                <div class="select-items">
                    <div>Черный</div>
                    <div>Белый</div>
                    <div>Серый</div>
                    <div>Синий</div>
                </div>
            </div>
            <button id="filterBtn">Поиск</button>
        </div>
        @foreach ($cars as $car)
        <div class="car-info available-for-rent">
            @if (!empty($car->logo->path))
                <img src="/{{$car->logo->path}}" alt="Автомобиль" class="car-image">
            @else
                <img src="https://i.pinimg.com/736x/60/6e/36/606e36ab077df99dd0f681ed074ebe05.jpg" alt="Вторая картинка" class="car-image">
            @endif

            <div class="car-details">
                <h2><strong>Цена за сутки:</strong> <span class="price">{{$car['price']}}</span></h2>
                <p><strong>Марка:</strong> {{$car['mark']}}</p>
                <p><strong>Год выпуска:</strong> {{$car['year']}}</p>
                <p><strong>Трансмиссия:</strong> {{$car['gearbox']}}</p>
                <p><strong>Двигатель:</strong> {{$car['engine']}}</p>
                <p><strong>Тип авто:</strong> {{$car['type']}}</p>
                <button style="margin-top: 10px;">Забронировать</button>
            </div>
        </div>
        @endforeach
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
        const filterBtn = document.getElementById("filterBtn");
    if (filterBtn) {
        filterBtn.addEventListener("click", function () {
            const type = document.querySelector(".custom-select:nth-of-type(1) .select-selected").textContent.trim().toLowerCase();
            const brand = document.querySelector(".custom-select:nth-of-type(2) .select-selected").textContent.trim().toLowerCase();
            const color = document.querySelector(".custom-select:nth-of-type(3) .select-selected").textContent.trim().toLowerCase();

            const cars = document.querySelectorAll(".car-info");

            cars.forEach(function (car) {
                const carType = car.querySelector("p:nth-of-type(2)").textContent.split(": ")[1].trim().toLowerCase();
                const carBrand = car.querySelector("p:nth-of-type(1)").textContent.split(": ")[1].trim().toLowerCase();
                const carColor = car.querySelector("p:nth-of-type(5)").textContent.split(": ")[1].trim().toLowerCase();

                if ((type === "тип" || carType === type) &&
                    (brand === "марка" || carBrand === brand) &&
                    (color === "цвет" || carColor === color)) {
                    car.style.display = "block";
                } else {
                    car.style.display = "none";
                }
            });
        });
    }

    // Открытие/закрытие выпадающих списков
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
