<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
     <title>Edit User</title>
     <style>
          body {
     margin: 0;
     padding: 0;
     background-color: #f4f4f4;
 }
 
 .container {
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     height: 80vh;
 }
 
 .form {
     background-color: #ffffff;
     padding: 30px;
     margin-top: 130px;
     border-radius: 20px;
     box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
     width: 355px;
     transition: box-shadow 0.35s ease, transform 0.5s ease, background-color 0.5s ease;
 }
 

 .form:hover {
     box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
     transform: scale(1.05);
 }
 
 .form:hover a{
     text-decoration-color: #333333;
 }
 
 .form h2 {
     margin-top: 0;
     margin-bottom: 30px;
     text-align: center;
     font-family: Lato, serif;
     color: #333333;
 }
 
 .form-group {
     margin-bottom: 25px;
 }
 
 .form-group label {
     margin-bottom: 10px;
     text-align: center;
     font-family: Montserrat, serif;
     color: #666666;
 }
 
 .form-group input {
     width: 95%; 
     padding: 12px;
     border: 1px solid #cccccc;
     border-radius: 8px;
     transition: border-color 0.3s ease;
     color: #555555;
 }
 
 .form-group input:focus {
     border-color: #4CAF50;
 }
 
 button {
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

button:hover {
    width: 100%;
    border-color: black;
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
}


 
 a{
     color: #666666;
 }
 
     </style>
</head>
<body>
     <div class="container">
         <form action="{{ route('save.edit.user', ['id' => $user->id]) }}" class="form" method="POST" id="registrationForm">
            @method('PUT')
             @csrf
             <h2 style="font-family: 'Montserrat', serif;font-weight:bold;">Редактирование</h2>
             @error('error')
             <div class="alert-danger" style="color: red;">{{ $message }} </div>
             @enderror
             <div class="form-group">
                 <label for="first_name">Имя</label>
                 <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}">
             </div>
             <div class="form-group">
                 <label for="last_name">Фамилия</label>
                 <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}">
             </div>
             <div class="form-group">
                 <label for="phone_number">Номер телефона</label>
                 <input type="tel" id="phone_number" name="phone_number" value="{{$user->phone_number}}">
                 <div id="phoneError" style="color: red;"></div>
             </div>
             <div class="form-group">
                <label for="status">Статус</label>
                <select id="status" name="status" class="form-control">
                    <option value="Пользователь" {{$user->status == 'Пользователь' ? 'selected' : ''}}>Пользователь</option>
                    <option value="Менеджер" {{$user->status == 'Менеджер' ? 'selected' : ''}}>Менеджер</option>
                </select>
            </div>
            
             <div class="form-group">
                 <label for="email">Почта</label>
                 <input type="email" id="email" name="email" value="{{$user->email}}">
             </div>
             <div class="form-group">
               <label for="balance">Баланс</label>
               <input type="text" id="balance" name="balance" value="{{$user->balance}}">
           </div>
             <button type="submit">Сохранить</button>
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
            var phoneRegex = /^\+380\d{9}$/;
            return phoneRegex.test(phone);
        }
        </script>
        
</body>
</html>
