@extends('layouts.main')
@section('page-title', 'DataDoor | 42 Wallaby Way - Bryant Realty')

@section('content')
    <div class="single-listing-page">
    <div class="listing-top">
        <img src="https://images.pexels.com/photos/277667/pexels-photo-277667.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="property" class="listing-top__img">
        <div class="listing-top__form-wrapper">
            <div class="container">
                <form class="listing-top__form" action="">
                    <label class="listing-top__form-label">Schedule Tour</label>
                    <div class="listing-top__form-group--horizontal listing-top__form-group">
                        <div class="listing-top__form-option">In Person</div>
                        <div class="listing-top__form-option">Video</div>
                    </div>
                    <label class="listing-top__form-label">Date</label>
                    <div class=" listing-top__form-group">
                        <div class="listing-top__form-option">January 28</div>
                    </div>
                    <label class="listing-top__form-label">Time</label>
                    <div class=" listing-top__form-group">
                        <div class="listing-top__form-option">11:00 AM</div>
                    </div>
                    <label class="listing-top__form-label">Personal Info</label>
                    <div class=" listing-top__form-group">
                        <div class="listing-top__form-option">Enter Phone</div>
                    </div>

                    <div class=" listing-top__form-group">
                        <div class="listing-top__form-option">Enter Email</div>
                    </div>
                    <div class=" listing-top__form-group">
                        <button type="submit" class="listing-top__form-button">Schedule Tour</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
        <section class="listing-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>42 Wallaby Way<br>
                        Sydney, AUS 34832</h1>
                        <div class="listing-info__details">
                            <span class="listing-info__details-text"><i class="fa-solid fa-bed-front"></i> 4</span>
                            <span class="listing-info__details-text"><i class="fa-solid fa-bath"></i> 3</span>
                            <span class="listing-info__details-text"><i class="fa-solid fa-ruler-triangle"> 2440 Sqft</i></span>

                        </div>
                    </div>
                    <div class="col-md-5">
                        <span class="listing-info__agent-title">Agent</span>
                        <span class="listing-info__agent-name">Bryan Rada</span>
                        <p class="listing-info__agent-profile">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur doloremque ipsum nam quidem, reprehenderit sed suscipit ullam voluptas voluptatum? A accusantium asperiores beatae, cumque cupiditate eos esse facere labore recusandae.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="listing-extras">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="listing-extras__details">
                            <h2>More Info</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur assumenda aut beatae cupiditate dignissimos dolor earum enim esse explicabo facilis impedit magnam molestiae neque, officiis placeat ratione sint soluta!</p>
                            <h3>Details</h3>
                            <hr>
                            <ul >
                                    <li>Test</li>
                                    <li>10</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                    <li>Test</li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="listing-extras__gallery">
                            <h2>Images</h2>
                            <img src="https://images.pexels.com/photos/1080696/pexels-photo-1080696.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                            <img src="https://images.pexels.com/photos/1080696/pexels-photo-1080696.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                            <img src="https://images.pexels.com/photos/1080696/pexels-photo-1080696.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                            <img src="https://images.pexels.com/photos/1080696/pexels-photo-1080696.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                            <img src="https://images.pexels.com/photos/1080696/pexels-photo-1080696.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                        </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
@endsection
