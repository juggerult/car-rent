<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    </style>
</head>
<body>
    <div class="infoDiv">
        <img src="https://www.freeiconspng.com/thumbs/login-icon/user-login-icon-14.png" alt="Лицо" style="width: 50px; height: 50px; margin-right: 20px; vertical-align: middle; border-radius: 50%;">
        <span style="font-size: 20px;">Всего менеджеров: {{ count($managers) }}</span>
    </div>
    
    

    <table id="example" class="ui celled table" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Почта</th>
                <th>Номер телефона</th>
                <th>Баланс</th>
                <th>Роль</th>
                <th>Статус</th>
                <th class="action-column">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($managers as $manager)
            <tr>
                <td>{{ $manager['first_name'] }}</td>
                <td>{{ $manager['last_name'] }}</td>
                <td>{{ $manager['email'] }}</td>
                <td>{{ $manager['phone_number'] }}</td>
                <td>{{ $manager['balance'] }}</td>
                <td>{{ $manager['status'] }}</td>
                <td>{{ $manager['isActive'] ? 'Активен' : 'Неактивен' }}</td>
                <td class="action-column">
                    @if ($manager['isActive'])
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
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.semanticui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>
