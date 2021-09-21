<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolPress</title>
        <!-- collego con il foglio di style per bootstrap  -->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div id="root">

        </div>
        <!-- mi collego al file front.js  -->
        <script src="{{ asset('js/front.js')}}"></script>
    </body>
</html>
