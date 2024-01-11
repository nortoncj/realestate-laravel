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
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
    <link href="{{asset('assets/css/switcher-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    @vite([
                'resources/css/app.css',
                'resources/css/vendors/bootstrap-5.3.2-dist/css/bootstrap.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
            ])
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="boxed_wrapper">
    {{--preloader--}}
    @include('components/preloader')
    {{--    preloader end--}}
    @include('components/header')
    @include('components/mobile_menu')
    <section class="page-title centred" style="background-image: url(@yield('page-bg'));">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>@yield('title')</h1>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li><a href="index.html"></a></li>--}}
{{--                    <li> </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </section>

    @yield('content')
    <!-- main-footer -->
    @include('components.home.footer')
    <!-- main-footer end -->

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
</div>

<!-- jequery plugins -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/fontawesome-pro/css/all.css') }}">
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.js')}}"></script>
<script src="{{asset('assets/js/wow.js')}}"></script>
<script src="{{asset('assets/js/validation.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assets/js/appear.js')}}"></script>
<script src="{{asset('assets/js/scrollbar.js')}}"></script>
<script src="{{asset('assets/js/isotope.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jQuery.style.switcher.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/product-filter.js')}}"></script>

<!-- main-js -->
<script src="{{asset('assets/js/script.js')}}"></script>


</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code/code.js ') }}"></script>
<script src="{{ asset('backend/assets/js/code/validate.min.js ') }}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
</html>
