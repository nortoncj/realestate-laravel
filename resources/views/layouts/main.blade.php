<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataDoor</title>
    <link rel="stylesheet" href="{{mix('/scss/app.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/fontawesome-pro/css/all.css') }}">
    @vite([
                'resources/css/app.css',
                'resources/css/vendors/bootstrap-5.3.2-dist/css/bootstrap.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
            ])
</head>
<body>
<header class="header">
    <div class="container">
    <div class="header__logo">Data<span class="text-[#269ccc]">Door</span></div>
    <div class="header__menu">
        <a href="#" class="header__menu-link header__menu-link--active">About</a>
        <a href="#" class="header__menu-link">Properties</a>
        <a href="#" class="header__menu-link ">Community</a>
        <a href="#" class="header__menu-link ">Buyers</a>
        <a href="#" class="header__menu-link ">Sellers</a>
        <a href="#" class="header__menu-link ">Contact</a>
    </div>

    <div class="header__account">
        <div class="header__account-link"><i class="fa-solid fa-heart"> </i></div>
        <div class="header__account-link"><i class="fa-solid fa-user"></i></div>
{{--        <div class="header__account-link"></div>--}}
    </div>
    </div>
</header>
@yield('content')
</body>
</html>
