@extends('layouts.main')
@section('page-title', 'DataDoor | Login')
@section('content')
    <body class="antialiased">
    <div class="min-h-screen flex flex-col  sm:justify-center items-center pt-6 sm:pt-0">


        <section class="ragister-section centred sec-pad">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                        <div class="sec-title">

                            <h2>Sign In With Data<span class="header__logo--title">Door</span></h2>
                        </div>
                        <div class="tabs-box ">
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons centred clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1">User</li>
                                    <li class="tab-btn " data-tab="#tab-2">Agent</li>
                                </ul>
                            </div>
                            <div class="tabs-content ">
                                <div class="tab active-tab " id="tab-1" style="display: block;">
                                    <div class="inner-box align-center justify-center  ">
                                        <h4>User Login</h4>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group">

                                                <x-input-label for="login" :value="__('Email/Name/Phone')" />
                                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                                            </div>
                                            <div class="form-group">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                              type="password"
                                                              name="password"
                                                              required autocomplete="current-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="form-group message-btn">

                                                <button type="submit" class="theme-btn btn-one">Login</button>
                                            </div>
                                        </form>
                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-start">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>


                                        <div class="othre-text">
                                            @if(Route::has('password.request'))
                                            <p>Don't have an account? <a href="{{route('register')}}">Register Now</a></p>
                                                @endif
                                        </div>

                                    </div>
                                    <div class="flex-end  justify-end mt-4 justify-content-end">


                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif


                                    </div>
                                </div>
                                <div class="tab" id="tab-2" style="display: none;">
                                    <div class="inner-box ">
                                        <h4>Agent Login</h4>

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group">

                                                <x-input-label for="login" :value="__('Email/Name/Phone')" />
                                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                                            </div>
                                            <div class="form-group">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                              type="password"
                                                              name="password"
                                                              required autocomplete="current-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="form-group message-btn">

                                                <button type="submit" class="theme-btn btn-one">Login</button>
                                            </div>
                                        </form>
                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-start">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>


                                        <div class="othre-text">
                                            @if(Route::has('password.request'))
                                                <p>Don't have an account? <a href="{{route('register')}}">Register Now</a></p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="flex-end  justify-end mt-4 justify-content-end">


                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif


                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



    </body>


@endsection
