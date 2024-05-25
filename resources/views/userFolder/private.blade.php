<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style scoped>
        body {
            font-family: Montserrat, serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            font-weight: 100;
            color: #333333;
            margin-top: 0;
            text-align: center;
        }

        .profile, .current-rental, .rental-history {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            box-sizing: border-box;
        }

        .profile {
            flex: 0 0 40%;
            margin-right: 20px;
        }

        .current-rental {
            flex: 0 0 40%;
        }

        .rental-history {
            flex: 0 0 100%;
            margin-top: 40px;
        }

        .profile p, .current-rental p, .rental-history p {
            color: #666666;
            font-size: 18px;
        }

        .profile label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
            font-family: Montserrat, serif;
            color: #666666;
        }

        .profile input {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 10px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .profile input:focus {
            border-color: #4CAF50;
        }

        .profile button {
            width: 75%;
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

        .profile button:hover {
            width: 95%;
            border-color: black;
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
        }

        .rental-details {
            text-align: left;
        }

        .car-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .car-details li {
            font-size: 18px;
            color: #666666;
            list-style-type: none;
            margin: 10px 20px;
            width: 200px;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .car-image{
            width: 100%;
            height: 300px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .buttonType{
            width: 75%;
            padding: 12px;
            font-size: 15px;
            font-family: Montserrat, serif;
            border: none;
            border-radius: 8px;
            text-align: left;
            text-decoration: none;
            background-color: white;
            color: black;
            border: 1px solid #cccccc;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.5s ease, width 0.4s ease, box-shadow 0.7s ease;
        }
        .cancel-button{
            width: 100%;
            padding: 8px;
            font-size: 15px;
            font-family: Montserrat, serif;
            border: none;
            margin-top: 5px;
            border-radius: 8px;
            text-decoration: none;
            background-color: white;
            color: black;
            border: 1px solid #cccccc;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.5s ease, width 0.4s ease, box-shadow 0.7s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <h2>Контактная информация</h2>
            <form>
                <label for="name">Имя:</label>
                <input type="text" id="first_name" value="{{Auth::user()->first_name}}">
                <label for="name">Фамилия:</label>
                <input type="text" id="last_name" value="{{Auth::user()->last_name}}">
                <label for="email">Email:</label>
                <input type="email" id="email" value="{{Auth::user()->email}}">
                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" value="{{Auth::user()->phone_number}}">
                <button type="button">Применить изменения</button>
                <div class="alert-danger" style="color: red;">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                @endforeach
                </div>
            </form>
        </div>

        @php
            $activeRent = $rents->firstWhere('isActive', true);
            \Carbon\Carbon::setLocale('ru');
        @endphp

        @if($activeRent)
            <div class="current-rental">
                <h2>Текущая аренда автомобиля</h2>
                <div class="rental-details">
                    <p><strong>Марка:</strong> {{ $activeRent->car->mark }}</p>
                    <p><strong>Тип авто:</strong> {{ $activeRent->car->type }}</p>
                    <p><strong>Дата начала аренды:</strong> {{ \Carbon\Carbon::parse($activeRent->date_start)->translatedFormat('d F Y') }}</p>
                    <p><strong>Дата окончания аренды:</strong> {{ \Carbon\Carbon::parse($activeRent->date_end)->translatedFormat('d F Y') }}</p>
                    @if (!empty($activeRent->car->logo->path))
                        <img src="/{{ $activeRent->car->logo->path }}" alt="Автомобиль" class="car-image">
                    @else
                        <img src="https://i.pinimg.com/736x/60/6e/36/606e36ab077df99dd0f681ed074ebe05.jpg" alt="Вторая картинка" class="car-image">
                    @endif
                </div>
            </div>
        @else
          <div class="current-rental">
            <div class="rental-details" style="margin-top: 41%;">
                <h2>Машин в аренде нет</h2>
            </div>
          </div>
        @endif


        <div class="rental-history">
            <h2>История арендованных автомобилей</h2>
            <ul class="car-details">
                @if($rents->isEmpty())
                    <p>У вас пока нет истории аренды. <br><br><br> <a href="{{route('main')}}" class="buttonType">Посмотреть предложения</a></p>
                @else
                    @foreach ($rents as $rent)
                    <form action="{{route('cancel.rent' , ['id' => $rent->id])}}" method="POST">
                    @csrf
                    <li>
                        <strong>Марка:</strong> {{$rent->car->mark}}<br>
                        <strong>Тип:</strong> {{$rent->car->type}}<br>
                        <strong>Дата начала аренды:</strong> {{\Carbon\Carbon::parse($rent->date_start)->translatedFormat('d F Y')}}<br>
                        <strong>Дата окончания аренды:</strong> {{\Carbon\Carbon::parse($rent->date_end)->translatedFormat('d F Y')}}
                        @if($rent->isActive)
                            <button type="submit" class="cancel-button">Отменить аренду</button>
                        @endif
                    </li>
                    </form>
                    @endforeach
                @endif
            </ul>
        </div>
        
    </div>
</body>
</html>