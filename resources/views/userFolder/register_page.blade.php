<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <link href="style.css" rel="stylesheet">
     <title>Registration User</title>
</head>
<body>
     <body>
          <div class="container">
              <form action="{{route('api.registration')}}" class="form">
                  <h2>Регистрация</h2>
                  @error('message')
                  <div class="alert-danger">{{ $message }} </div>
                  @enderror
                  <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" id="first_name" name="first_name" required>
                  </div>
                  <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" id="last_name" name="last_name" required>
                 </div>
                 <div class="form-group">
                    <label for="phone_number">Номер телефона</label>
                    <input type="phone" id="phone_number" name="phone_number" required>
                 </div>
                  <div class="form-group">
                      <label for="email">Почта</label>
                      <input type="email" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                      <label for="password">Пароль</label>
                      <input type="password" id="password" name="password" required>
                  </div>
                  <button type="submit">Зарегистрироватся</button>
              </form>
          </div>
      </body>
</body>
</html>