@extends('layouts.account')
@section('title',"Saved Listings")
@section('page-title', "DataDoor | Saved Listings")
@section('page-bg',"https://images.pexels.com/photos/5713712/pexels-photo-5713712.jpeg?auto=compress&cs=tinysrgb&w=1200")
@section('content')
    <div class="listings-properties">

            <div class="row">
                <div class="col-sm-12 col-lg-4 col-xl-3">
                    <div class="listings-properties__item">
                        <img src="https://images.pexels.com/photos/277667/pexels-photo-277667.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="">
                        <div class="listings-properties__saved">
                            <i class="fa-solid fa-heart "></i>
                        </div>
                        <span class="listings-properties__item-price">$250,000</span>
                        <span class="listings-properties__item-details"> <i class="fa-solid fa-bed-front"></i> 4  <i class="fa-solid fa-bath"></i> 3 <i class="fa-solid fa-ruler-triangle"></i> 2440 Sqft </span>
                        <span class="listings-properties__item-address"> P Sherman 42 Wallaby Way, <br> Sydney, Australia 23456</span>
                        <div class="listings-properties__item-line"></div>
                        <span class="listings-properties__item-owner">Bryant Realty </span>
                    </div>
                </div>

            </div>



    </div>
@endsection
