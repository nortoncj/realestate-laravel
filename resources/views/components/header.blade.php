<header class="header" >
    <div class="container ">
        <a href="/" class="header__logo hidden xl:flex">Data<span class="text-[#3e92cc]">Door</span></a>

        <div class="header__menu hidden xl:flex z-10">

            <a href="/about" class="header__menu-link
             @if(request()->routeIs('about'))
              header__menu-link--active
              @endif">About</a>
            <a href="/home/for_sale/south-beach" class="header__menu-link
            @if(request()->routeIs('listings'))
              header__menu-link--active
              @endif">Properties</a>
            <a href="/blog" class="header__menu-link @if(request()->routeIs('blog'))
              header__menu-link--active
              @endif ">Community</a>
            <a href="#" class="header__menu-link ">Buyers</a>
            <a href="#" class="header__menu-link ">Sellers</a>
            <a href="/contact" class="header__menu-link
            @if(request()->routeIs('contact'))
              header__menu-link--active
              @endif">Contact</a>
        </div>

        <div class="header__account z-10">

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
        <div class="menu-area absolute right-[4rem] ">
            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler">
                <i class="icon-bar"></i>
                <i class="icon-bar"></i>
                <i class="icon-bar"></i>
            </div>
            <nav class="main-menu navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                    <ul class="navigation clearfix">
                        <li class="dropdown"><a href="index.html"><span>Home</span></a>
                            <ul>
                                <li><a href="index.html">Main Home</a></li>
                                <li><a href="index-2.html">Home Modern</a></li>
                                <li><a href="index-3.html">Home Map</a></li>
                                <li><a href="index-4.html">Home Half Map</a></li>
                                <li><a href="index-5.html">Home Agent</a></li>
                                <li><a href="index-onepage.html">OnePage Home</a></li>
                                <li><a href="index-rtl.html">RTL Home</a></li>
                                <li class="dropdown"><a href="index.html">Header Style</a>
                                    <ul>
                                        <li><a href="index.html">Header Style 01</a></li>
                                        <li><a href="index-2.html">Header Style 02</a></li>
                                        <li><a href="index-3.html">Header Style 03</a></li>
                                    </ul>
                                    <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                            </ul>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li class="dropdown"><a href="index.html"><span>Listing</span></a>
                            <ul>
                                <li><a href="agents-list.html">Agents List</a></li>
                                <li><a href="agents-grid.html">Agents Grid</a></li>
                                <li><a href="agents-details.html">Agent Details</a></li>
                            </ul>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li class="current dropdown"><a href="index.html"><span>Property</span></a>
                            <ul>
                                <li><a href="property-list.html">Property List</a></li>
                                <li><a href="property-grid.html">Property Grid</a></li>
                                <li><a href="property-list-2.html">Property List Full View</a></li>
                                <li><a href="property-grid-2.html">Property Grid Full View</a></li>
                                <li><a href="property-list-3.html">Property List Half View</a></li>
                                <li><a href="property-grid-3.html">Property Grid Half View</a></li>
                                <li><a href="property-details.html">Property Details 01</a></li>
                                <li><a href="property-details-2.html">Property Details 02</a></li>
                                <li><a href="property-details-3.html">Property Details 03</a></li>
                                <li><a href="property-details-4.html">Property Details 04</a></li>
                            </ul>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li class="dropdown"><a href="index.html"><span>Pages</span></a>
                            <div class="megamenu">
                                <div class="row clearfix">
                                    <div class="col-xl-4 column">
                                        <ul>
                                            <li><h4>Pages</h4></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="services.html">Our Services</a></li>
                                            <li><a href="faq.html">Faq's Page</a></li>
                                            <li><a href="pricing.html">Pricing Table</a></li>
                                            <li><a href="compare-roperties.html">Compare Properties</a></li>
                                            <li><a href="categories.html">Categories Page</a></li>
                                            <li><a href="career.html">Career Opportunity</a></li>
                                            <li><a href="testimonials.html">Testimonials</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-4 column">
                                        <ul>
                                            <li><h4>Pages</h4></li>
                                            <li><a href="gallery.html">Our Gallery</a></li>
                                            <li><a href="profile.html">My Profile</a></li>
                                            <li><a href="signin.html">Sign In</a></li>
                                            <li><a href="signup.html">Sign Up</a></li>
                                            <li><a href="error.html">404</a></li>
                                            <li><a href="agents-list.html">Agents List</a></li>
                                            <li><a href="agents-grid.html">Agents Grid</a></li>
                                            <li><a href="agents-details.html">Agent Details</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-4 column">
                                        <ul>
                                            <li><h4>Pages</h4></li>
                                            <li><a href="blog-1.html">Blog 01</a></li>
                                            <li><a href="blog-2.html">Blog 02</a></li>
                                            <li><a href="blog-3.html">Blog 03</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="agency-list.html">Agency List</a></li>
                                            <li><a href="agency-grid.html">Agency Grid</a></li>
                                            <li><a href="agency-details.html">Agency Details</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li class="dropdown"><a href="index.html"><span>Agency</span></a>
                            <ul>
                                <li><a href="agency-list.html">Agency List</a></li>
                                <li><a href="agency-grid.html">Agency Grid</a></li>
                                <li><a href="agency-details.html">Agency Details</a></li>
                            </ul>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li class="dropdown"><a href="index.html"><span>Blog</span></a>
                            <ul>
                                <li><a href="blog-1.html">Blog 01</a></li>
                                <li><a href="blog-2.html">Blog 02</a></li>
                                <li><a href="blog-3.html">Blog 03</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                            <div class="dropdown-btn"><span class="fas fa-angle-down"></span></div></li>
                        <li><a href="contact.html"><span>Contact</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</header>
