<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
     <title>CarRent</title>
     <style>
          body {
               background-color: #f4f4f4;
               font-family: 'Lato', sans-serif;
               color: #333;
               margin: 0;
               padding: 0;
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
          }

          .info {
               text-align: center;
          }

          h1 {
               font-family: 'Montserrat', sans-serif;
               font-size: 3rem;
               color: #333;
               margin-bottom: 20px;
               text-transform: uppercase;
          }

          p {
               font-size: 1.2rem;
               line-height: 1.6;
               color: #666;
               margin-bottom: 15px;
          }

          .info a {
               color: #000000;
               text-decoration: none;
               font-size: 1.9em;
               padding: 15px;
               cursor: pointer;
               border: 1px solid #f4f4f4;
               transition: background-color 0.3s ease, border-color 0.8s ease, box-shadow 0.7s ease;
               font-weight: bold;
          }

          .info a:hover {
               border-color: black;
               box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.2);
          }
     </style>
</head>
<body>
     <div class="info">
          <h1>Что-то пошло не так</h1>
          <p>Возможно, запрашиваемая страница не была найдена, или у вас нет доступа к ней.</p><br>
          <a href="{{route('main')}}">Вернуть в главное меню</a>
     </div>

     


</body>
</html>
