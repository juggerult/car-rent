<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.semanticui.css">
    <style scoped>
        body {
            font-family: 'Roboto', sans-serif;
        }

        #example_wrapper {
            width: 900px;
            margin: 20px auto;
        }

        #example th,
        #example td {
            font-size: 14px;
            text-align: center;
        }

        .action-column {
            width: 100px;
        }

        .action-column button {
            margin-right: 5px;
            padding: 5px 10px;
            margin-top: 5px;
            width: 120px;
            cursor: pointer;
            border-radius: 3px;
        }

        .edit-button {
            background-color: #ffffff;
            border: 1px solid rgb(139, 139, 139);
            color: rgb(0, 0, 0);
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .edit-button:hover {
            background-color: #f0f0f0;
            border-color: #000000;
        }

        .restore-button {
            background-color: #ffffff;
            border: 1px solid rgb(139, 139, 139);
            color: rgb(0, 0, 0);
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .restore-button:hover {
            background-color: #f0f0f0;
            border-color: #000000;
        }
        .delete-button {
            background-color: #ffffff;
            border: 1px solid rgb(139, 139, 139);
            color: rgb(0, 0, 0);
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border-radius: 3px;
        }

        .delete-button:hover{
            background-color: #f0f0f0;
            border-color: #000000;
        }
        .infoDiv {
            width: 400px;
            margin: 100px auto;
            border-radius: 15px;
            border: 2px solid #ccc;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .infoDiv:hover {
            transform: scale(1.07);
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
        }
        img{
          height: 100px;
          width: 120px;
        }

    </style>
</head>
<body>
    <div class="infoDiv">
        <img src="https://png.pngtree.com/png-vector/20220711/ourmid/pngtree-automotive-car-logo-png-image_5837187.png" alt="Лицо" style="width: 50px; height: 50px; margin-right: 20px; vertical-align: middle; border-radius: 50%;">
        <span style="font-size: 20px;">Всего авто: {{ count($cars) }}</span>
    </div>
    
    

    <table id="example" class="ui celled table" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
        <thead>
            <tr>
                <th>Лого</th>
                <th>Описание</th>
                <th>Тип</th>
                <th>Марка</th>
                <th>Год</th>
                <th>Коробка передач</th>
                <th>Двигатель</th>
                <th>Цвет</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Арендатель</th>
                <th class="action-column">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td><img src="/{{$car->logo->path}}"></td>
                <td>{{ $car ['description'] }}</td>
                <td>{{ $car ['type'] }}</td>
                <td>{{ $car ['mark'] }}</td>
                <td>{{ $car ['year'] }}</td>
                <td>{{ $car ['gearbox'] }}</td>
                <td>{{ $car ['engine'] }}</td>
                <td>{{ $car ['color'] }}</td>
                <td>{{ $car ['price'] }}</td>
                <td>{{ $car ['isActive'] ? 'Активен' : 'Снят' }}</td>
                <td>{{ optional($car->user)->phone_number }}</td>
                <td class="action-column">
                    @if ($car['isActive'])
                        <button class="edit-button">Редактировать</button>
                        <button class="delete-button">Удалить</button>
                    @else
                        <button class="restore-button">Восстановить</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.semanticui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script>
        new DataTable('#example', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Russian.json'
            }
        });
    </script>
</body>
</html>