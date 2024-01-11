@extends('layouts.user')
@section('page-title','DataDoor | Profile')
@section('title',"Account")
@section('page-bg',"https://images.pexels.com/photos/8469937/pexels-photo-8469937.jpeg?auto=compress&cs=tinysrgb&w=1200")
@section('content')
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            @include('components.user.sidebar')

            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">
                                <h3>Including Animation In Your Design System.</h3>





                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-body px-4 py-4" style="background-color: #3e92cc;">
                                            <h1 class="card-title text-2xl font-bold" style="color: white; ">0</h1>
                                            <h5 class="card-text" style="color: white;"> Approved properties</h5>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-body px-4 py-4" style="background-color: #1e1b18;">
                                            <h1 class="card-title text-2xl font-bold " style="color: white; ">0</h1>
                                            <h5 class="card-text" style="color: white;"> Pending approval</h5>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="card-body px-4 py-4" style="background-color: #0a2463;">
                                            <h1 class="card-title text-2xl font-bold" style="color: white; ">0</h1>
                                            <h5 class="card-text" style="color: white; "> Rejected properties</h5>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">
                                <h3>Activity Logs</h3>
                                <hr>






                            </div>
                        </div>
                    </div>


                </div>






            </div>


        </div>
    </div>
</section>
    @include('components.subscribe')
@endsection
