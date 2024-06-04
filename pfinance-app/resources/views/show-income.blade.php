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
        <style>
            a{
              text-decoration:none;

            }

            a:hover{
              text-decoration:none;
            }

            .main {
                display: flex;
                flex-direction: column;
                justify-content:center;
                align-items: center;
                row-gap: 12px;
                width: 100%;
                margin-top: 24px;
            }

            .incomeContainer {
                display: grid;
                grid-template-rows: 1fr 1fr;
                grid-template-columns: 1fr 1fr;
                column-gap: 200px;
                justify-items: center;
                align-items: center;
                padding: 12px 24px;
                box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.75);
                background-color: white;
                border-radius: 6px;
                width: 900px;
            }
            .incomeContainer span {
                color: green;
                justify-self: end;
            }

            .incomeContainer h3 {
                justify-self:start;
     
            }

            .incomeContainer h4 {
                justify-self:start;
                font-size: 16px;
            }

            .incomeContainer h6 {
                color: gray;
                justify-self: end;
            }
           
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <div class="main">
                @if (isset($incomes))
                @foreach ($incomes as $income)
                    <div class="incomeContainer">
                        <h3> {{$income->concept }} </h3>
                        <span><h5> +{{$income->amount }}</h5></span>
                        <h4> {{$income->category }}</h4>
                        <h6> {{$income->created_at}}</h6>
                    </div>
                @endforeach
                @else
                <h1> No income yet.</h1>
                @endif
            </div>
        </div>
    </body>
</html>
