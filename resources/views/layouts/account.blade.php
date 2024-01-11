<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('page-title')</title>
    <link rel="stylesheet" href="{{mix('/scss/app.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/fontawesome-pro/css/all.css') }}">
    @vite([
                'resources/css/app.css',
                'resources/css/vendors/bootstrap-5.3.2-dist/css/bootstrap.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
            ])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
@include('components/header')
<div class="account-layout">
    <div class="listings-city">
        <img class="listings-city__img" src="@yield('page-bg')" />
        <h1 class="listings-city__title">@yield('title')</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="account__menu">
                        <h2>Menu</h2>
                        <a href="/account/saved">Saved Listings</a>
                        <a href="/account/show-status">Listing Request status</a>
                    </div>
                </div>

                <div class="col-md-9">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>




</div>

</body>
</html>
