<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
     <link href="style.css" rel="stylesheet">
     <title>Registration User</title>
</head>
<body>
     <div class="container">
         <form action="{{ route('post.registration') }}" class="form" method="POST" id="registrationForm">
             @csrf
             <h2 style="font-family: 'Montserrat', serif;font-weight:bold;">Регистрация</h2>
             @error('error')
             <div class="alert-danger" style="color: red;">{{ $message }} </div>
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
                 <input type="tel" id="phone_number" name="phone_number" required>
                 <div id="phoneError" style="color: red;"></div>
             </div>
             <div class="form-group">
                 <label for="email">Почта</label>
                 <input type="email" id="email" name="email" required>
             </div>
             <div class="form-group">
                 <label for="password">Пароль</label>
                 <input type="password" id="password" name="password" required>
                 <div id="passwordError" style="color: red;"></div>
             </div>
             <button type="submit">Зарегистрироваться</button>
         </form>
     </div>


     <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var phone = document.getElementById('phone_number').value;
        
            if (password.length < 8) {
                event.preventDefault();
                document.getElementById('passwordError').innerText = 'Пароль должен содержать не менее 8 символов';
            } else {
                document.getElementById('passwordError').innerText = '';
            }
        
            if (!validatePhoneNumber(phone)) {
                event.preventDefault();
                document.getElementById('phoneError').innerText = 'Номер телефона должен начинаться на +380 и быть длиной 10 цифр';
            } else {
                document.getElementById('phoneError').innerText = '';
            }
        });
        
        function validatePhoneNumber(phone) {
            var phoneRegex = /^\+380\d{7}$/;
            return phoneRegex.test(phone);
        }
        </script>
        
</body>
</html>
