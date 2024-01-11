@extends('layouts.main')
@section('page-title', 'DataDoor')

    @section('content')
        <section class="banner-section" style="height: 100vh;">
            @include('components.home.slider')
            <div class="auto-container">
                <div class="inner-container">
                    <div class="content-box centred">
                        <h2></h2>
                        <p></p>
                    </div>


                </div>

            </div>

        </section>

        {{--@include('components.hero')--}}
        <!-- category-section -->
        @include('components.home.category')

        <!-- category-section end -->


        <!-- feature-section -->
        @include('components.home.feature')
        <!-- feature-section end -->


        <!-- video-section -->
        @include('components.home.video')
        <!-- video-section end -->


        <!-- deals-section -->
        @include('components.home.deals')
        <!-- deals-section end -->


        <!-- testimonial-section end -->
        @include('components.home.testimonial')
        <!-- testimonial-section end -->


        <!-- chooseus-section -->
        @include('components.home.chooseus')
        <!-- chooseus-section end -->


        <!-- place-section -->
        @include('components.home.place')
        <!-- place-section end -->


        <!-- team-section -->
        @include('components.home.team')
        <!-- team-section end -->


        <!-- cta-section -->
        @include('components.home.cta')
        <!-- cta-section end -->


        <!-- news-section -->
        @include('components.home.news')
        <!-- news-section end -->




    @endsection

