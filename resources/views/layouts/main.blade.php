<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <style>
        .logo {
            width: 30px;
        }

        nav {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        footer {
            margin-top: 50px;
            height: 80px;
            width: auto;
            background-color: #a0aec0;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="wrapper container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="logo" src="https://cdn.icon-icons.com/icons2/179/PNG/128/news_128x128-32_22252.png"
             alt="">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/">Рубрики</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about/">О проекте</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/order/">Заказ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/feedback/">Обратная связь</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login/">Вход</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')

</div>

<footer>
    какие то контактные данные
</footer>

</body>
</html>
