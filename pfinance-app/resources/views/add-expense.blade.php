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
            .expenseFormContainer {
                position:absolute;
                left:50%;
                top:50%;
                transform: translate(-50%,-50%);
                display:flex;
                gap: 24px;
                flex-direction: column;
                justify-content: center;
                align-items: left;
            }

            .expenseFormContainer h1{
                padding: 12px 24px;
                align-self:center;
            }
            .form {
                display:flex;
                column-gap: 16px;
                align-items: center;
            }
        </style>
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <div class="expenseFormContainer">
                <h1> Add Expense </h1>
                    <form action="/setExpense" method="post"> 
                    @csrf
                    <div class="form">
                    <input name="userid" type="hidden" value="{{$user->id}}"/>
                    <label for="amount"> Amount: </label>
                    <input name="amount" type="number" id="amount"/>
                    <label for="concept"> Concept: </label>
                    <input name="concept" type="text" id="concept"/>
                    <label for="category"> Category: </label>
                        <select name="category" id="category">
                            <option value="">--Please choose a category--</option>
                            <option value="Rent">Rent</option>
                            <option value="Groceries">Groceries</option>
                            <option value="Transport">Transport</option>
                            <option value="Food">Food</option>
                            <option value="Investment">Investment</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Other">Other</option>
                        </select>
                        <button type="submit"> Save </button>
                        </div>
                    </form>
            </div>
   
        </div>
    </body>
</html>
