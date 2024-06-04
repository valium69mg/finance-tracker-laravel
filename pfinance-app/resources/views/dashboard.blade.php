<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Year', 'Income', 'Expenses'],
            ['January',  1000,      400],
            ['February',  1170,      460],
            ['March',  660,       1120],
            ['April',  1030,      540]
          ]);
  
          var options = {
            title: 'Income vs Expenses',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    
       <!-- Dashboard -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Year', 'Income', 'Expenses'],
            ['January',  1000,      400],
            ['February',  1170,      460],
            ['March',  660,       1120],
            ['April',  1030,      540]
          ]);
  
          var options = {
            title: 'Income vs Expenses',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Expenses', 'Percentage'],
            ['Rent',    10 ],
            ['Transportation',    5 ],
            ['Food',  2],
            ['Entertainment', 2],
            ['Bills', 2],
            ['Investment', 2],
            ['Debt', 2],
            ['Other',    7]
          ]);
  
          var options = {
            title: 'My Expenses',
            pieHole: 0.4,
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          chart.draw(data, options);
        }
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <style>
            .dashboard {
              position:absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 24px;
                width: 1400px;
                height: 700px;
                background-color: white;
                box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.75);
                padding: 12px 24px;
            }

            .cards {
                display:flex;
                width: 100%;
                justify-content: space-around;
                column-gap: 24px;
                align-items: center;

            }

            .card {
                display:flex;
                flex-direction: column;
                justify-content: start;
                align-items: center;
                box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
                padding: 12px 24px;
                background-color: rgb(243 244 246);
                width: 25%;
            }

            .charts {
              width: 100%;
              display:flex;
              justify-content: center;
              padding: 12px 24px;
              align-items: start;
              column-gap: 78px;
            }

            .category {
              display: flex;
              justify-content: center;
              align-items: center;
              gap: 6px;

            }

            .dashboard > h1 {
              margin-top: 12px;
            }

            .chartContainer {
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
              gap: 6px;
              height: fit-content;
              width: auto;
              box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
              padding: 12px 24px;
              background-color: rgb(243 244 246);;
            }

            .logContainer {
              display: flex;
              flex-direction: column;
              justify-content: left;
              gap: 6px;
              height: fit-content;
              width: auto;
              padding: 12px 24px;
              background-color: rgb(243 244 246);;
              box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
            }
      </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <div class="dashboard">
                <h1> My Finances </h1>
                <div class="cards">
                <div class="card">
                    <div class="category">
                    <h2> Remaining</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                    </svg>
                    </div>
                    <p> Apr 04 - May 04, 2024</p>
                    <h1> $1200.20</h1>
                    <p> <span> +10% from last period </span></p>
                </div>
                    <div class="card">
                    <div class="category">
                    <h2> Income</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-arrow-down-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1H3.707L13.854 2.854a.5.5 0 0 0-.708-.708L3 12.293V7.5a.5.5 0 0 0-1 0z"/>
                    </svg>
                    </div>
                    <p> Apr 04 - May 04, 2024</p>
                    <h1> $8230.94</h1>
                    <p> <span> -14% from last period </span></p>
                </div>
                    <div class="card">
                    <div class="category">
                    <h2> Expenses </h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z"/>
                    </svg>
                    </div>
                    <p> Apr 04 - May 04, 2024</p>
                    <h1> $2384.83</h1>
                    <p> <span> -9% from last period </span></p>
                </div>
                </div>
                <div class="charts">
                    <div class="chartContainer">
                    <h1> Transactions </h1>
                    <div class="chartWrapper">
                    <div id="curve_chart" style="width: 400px; height: 250px"></div>
                    </div>
                    </div>  
                    <div class="chartContainer">
                    <h1> Expenses </h1>
                    <div class="chartWrapper">
                    <div id="donutchart" style="width: 400px; height: 250px;"></div>
                    </div>
                    </div>  
                    <div class="logContainer">
                    <h2> Log </h2>
                    <div class="chartWrapper">
                    <h3> $1200</h2>
                    <p> Bank of America - Mortgage </p>
                    </div>
                    <div class="chartWrapper">
                        <h3> $1200</h2>
                        <p> Bank of America - Mortgage </p>
                        </div>
                        <div class="chartWrapper">
                        <h3> $1200</h2>
                        <p> Bank of America - Mortgage </p>
                        </div>
                    </div>  
                </div>    
            </div>
   
        </div>
    </body>
</html>
