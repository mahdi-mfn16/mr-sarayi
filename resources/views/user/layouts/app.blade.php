<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.cdnfonts.com/css/iranian-sans" rel="stylesheet">
    <link rel="preconnect" href="//fdn.fontcdn.ir">
    <link rel="preconnect" href="//v1.fontapi.ir">
    <link href="https://v1.fontapi.ir/css/Yekan" rel="stylesheet">
    <!-- Styles -->
<!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

</head>
<style>
    body {
        width: 100%;
        direction: rtl;
        font-family: 'Yekan', sans-serif;
        /* font-family: 'Iranian Sans'; */
        background-color: rgba(0, 0, 0, 0.02);
    }

    button {
        /* font-family: 'Iranian Sans'; */
        font-family: 'Yekan', sans-serif;
    }

    a{
        text-decoration: none;
    }

    .container {
        width: 100%;
        float: right;
        height: auto;
    }

    .row {
        width: 90%;
        margin-right: 5%;
        float: right;
        background-color: #fff;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 5px 0;
    }
</style>

<body>
    <header>
        <nav></nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>

    </footer>

</body>

</html>