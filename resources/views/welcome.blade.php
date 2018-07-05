<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel React application</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2 style="text-align: center"> Laravel and React application </h2>
    <div id="example"></div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>
