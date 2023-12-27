<header class="header">
    <div class="container">
        <a href="/" class="header__logo">Data<span class="text-[#3e92cc]">Door</span></a>
        <div class="header__menu">

            <a href="#" class="header__menu-link
             @if(request()->routeIs('about'))
              header__menu-link--active
              @endif">About</a>
            <a href="/home/for_sale/south-beach" class="header__menu-link
            @if(request()->routeIs('listings'))
              header__menu-link--active
              @endif">Properties</a>
            <a href="#" class="header__menu-link ">Community</a>
            <a href="#" class="header__menu-link ">Buyers</a>
            <a href="#" class="header__menu-link ">Sellers</a>
            <a href="#" class="header__menu-link ">Contact</a>
        </div>

        <div class="header__account">

            {{--        <div class="header__account-link"></div>--}}
            @if (Route::has('login'))

                    @auth
                        <a href="/account/saved" class="header__account-link"><i class="fa-solid fa-heart"> </i></a>
                        <a href="{{ url('/account') }}" class="header__account-link"><i class="fa-solid fa-user"></i></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="header__account-link--anchor" href="{{route('logout')}}" onclick="event.preventDefault();closest('form').submit();">Logout</a>

                    </form>
                    @else
                        <a href="{{ route('login') }}" class="header__account-link--anchor">Login</a>



                    @endauth

            @endif

        </div>
    </div>
</header>
