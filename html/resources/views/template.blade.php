<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Insurance Ledger</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <div id="app" class="app">
            
            <div class="container">

                <h1 class="title">Insurance Ledger</h1>

                <div class="columns">
                    <div class="column is-4">
                        
                        @include('menu')

                    </div>

                    <div class="column">

                      @yield('content')

                    </div>

                </div>
            </div>
            
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>


        <script src="https://use.fontawesome.com/7a03768c54.js"></script>

    </body>
</html>
