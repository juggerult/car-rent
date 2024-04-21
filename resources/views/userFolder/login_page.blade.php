<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Login User</title>
</head>
<body>
    <div class="container">
        <form class="form" action="{{route('api.user.login')}}" method="POST">
            @csrf
            <h2>Авторизация</h2>    
            @if($errors->any())
        <div class="alert-danger" style="color: red;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Войти</button><br><br>
            <label>Нет еще аккаунта ? - <a href="{{route('user.registration')}}">Регистрируй</a></label>
        </form>
    </div>
</body>
</html>