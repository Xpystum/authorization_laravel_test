<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ config('app.locale') }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Аутенцификация</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="h-full">

    @yield('main.content')

</body>
</html>
