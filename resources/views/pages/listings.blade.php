@extends('layouts.main')
@section('page-title', 'DataDoor | All Properties')

@section('content')
<div class="listings-page">
    <div class="listings-city">
        <img class="listings-city__img" src="https://images.pexels.com/photos/1486785/pexels-photo-1486785.jpeg?auto=compress&cs=tinysrgb&w=1200" />
        <h1 class="listings-city__title">Jacksonville</h1>
    </div>
    <div class="listings-filter">
        <div class="listings-filter__wrapper">
            <div class="listings-filter__option">
                Any Price
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="listings-filter__option">
                All Beds
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="listings-filter__option">
                Property Type
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="listings-filter__option">
                Property Status
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="listings-filter__button">
                Search
            </div>
        </div>

    </div>
    <div class="listings-properties">
        <div class="container">
            <div class="row">
                @for($i=0;$i<12 ; $i++)
                <div class="col-sm-6 col-lg-4 col-xl-3">

                    <a href="/listing/42-wallaby-way-sydney-aus/12" class="listings-properties__item">
                        <img src="https://images.pexels.com/photos/277667/pexels-photo-277667.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="">
                        <div class="listings-properties__saved">
                            <i class="fa-solid fa-heart "></i>
                        </div>
                        <span class="listings-properties__item-price">$250,000</span>
                        <span class="listings-properties__item-details"> <i class="fa-solid fa-bed-front"></i> 4  <i class="fa-solid fa-bath"></i> 3 <i class="fa-solid fa-ruler-triangle"></i> 2440 Sqft </span>
                        <span class="listings-properties__item-address"> P Sherman 42 Wallaby Way, <br> Sydney, Australia 23456</span>
                        <div class="listings-properties__item-line"></div>
                        <span class="listings-properties__item-owner">Bryant Realty </span>
                    </a>

                </div>
                @endfor
            </div>
        </div>


    </div>
</div>
@endsection
