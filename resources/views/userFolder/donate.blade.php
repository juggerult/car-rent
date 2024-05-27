<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donate</title>
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
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            width: 355px;
            transition: box-shadow 0.35s ease, transform 0.5s ease, background-color 0.5s ease;
        }
        
        .form:hover {
            box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }
        
        .form:hover a {
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
        
        a {
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form" action="{{route('donate.post')}}" method="POST">
          @csrf
            <h2 style="font-family: Montserrat, serif;">Пополнение</h2>
            <div class="form-group">
                <label for="card-number">Номер карты</label>
                <input type="text" id="card-number" placeholder="1234 5678 9012 3456">
            </div>
            <div class="form-group">
                <label for="cardholder-name">Имя владельца</label>
                <input type="text" id="cardholder-name" placeholder="John Doe">
            </div>
            <div class="form-group expiry-cvv">
                <label for="expiry-date">Дата окончания</label>
                <input type="text" id="expiry-date" placeholder="MM/YY">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" placeholder="123">
            </div>
            <div class="form-group">
                <label for="amount">Сумма</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount" min="1" required>
            </div>
            <button type="submit">Пополнить</button>
            <div class="alert-danger" style="color: red;">
               @foreach ($errors->all() as $error)
                   {{ $error }}<br>
           @endforeach
           </div>
        </form>
    </div>
</body>
</html>
