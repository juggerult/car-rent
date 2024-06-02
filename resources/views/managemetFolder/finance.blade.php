<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #dailyChartContainer {
            margin-left: 500px; /* Отступ слева */
            width: 600px; /* Ширина графика */
            height: 300px; /* Высота графика */
        }
        #monthlyChartContainer {
            margin-left: 500px; /* Отступ слева */
            width: 600px; /* Ширина графика */
            height: 300px; /* Высота графика */
        }
        .financeDiv {
    background-color: #ffd700; /* Желтый цвет */
    margin-top: 20px;
    margin-left: 500px;
    text-align: center;
    height: 400px; /* Увеличил высоту до 300px */
    background-color: #ffffff;
    box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    width: 1000px;
}

.financeDiv h1 {
    font-family: Montserrat, serif;
    font-weight: 100;
    margin-bottom: 10px;
    color: #333333; /* Черный цвет */
}

.financeDiv p {
    font-family: Montserrat, serif;
    font-size: 22px;
    color: #666666;
}


.buttonCLs:hover {
    width: 100%;
    border-color: black;
    box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1);
}

    </style>
</head>
<body>
     <div class="financeDiv">
    <h1>Финансовая статистика</h1>
    <p>Доход за месяц: {{ $monthIncome }}</p>
    <p>Доход за неделю: {{ $weekIncome }}</p>
    <p>Доход за день: {{ $dayIncome }}</p>
    <p>Самые популярные авто</p>
     @foreach ($popularCars as $car)
          <p>{{$car->car->mark}} id {{$car->car->id}}</p>
     @endforeach
     </div>
    <div id="dailyChartContainer">
        <canvas id="dailyIncomeChart"></canvas>
    </div>

    <div id="monthlyChartContainer">
        <canvas id="monthlyIncomeChart"></canvas>
    </div>

    <script>
        // Daily Income Chart
        const dailyCtx = document.getElementById('dailyIncomeChart').getContext('2d');
        const dailyIncomes = @json($dailyIncomes);

        const dailyLabels = dailyIncomes.map(item => item.date);
        const dailyData = dailyIncomes.map(item => item.income);

        const dailyIncomeChart = new Chart(dailyCtx, {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Daily Income',
                    data: dailyData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false // Позволяет изменять размеры графика
            }
        });

        // Monthly Income Chart
        const monthlyCtx = document.getElementById('monthlyIncomeChart').getContext('2d');
        const monthlyIncomes = @json($monthlyIncomes);

        const monthlyLabels = monthlyIncomes.map(item => item.month);
        const monthlyData = monthlyIncomes.map(item => item.income);

        const monthlyIncomeChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Monthly Income',
                    data: monthlyData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false // Позволяет изменять размеры графика
            }
        });
    </script>
</body>
</html>
