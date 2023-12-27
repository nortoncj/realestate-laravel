<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('page-title')</title>
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
@include('components/header')
@yield('content')
</body>
</html>
