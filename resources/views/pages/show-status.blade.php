@extends('layouts.account')
@section('page-title', 'DataDoor | Status')
@section('title', 'Status')
@section('page-bg', "https://images.pexels.com/photos/12861721/pexels-photo-12861721.jpeg?auto=compress&cs=tinysrgb&w=1200")
@section('content')
<div class="request-list">
    <h2>All Requests</h2>
    @for($i = 0; $i<10; $i++)
        <div class="request-list__wrapper">
            <div class="">
                <h3>P Sherman 42 Wallaby Way  Sydney, Aus 34596</h3>
                <span class="request-list__details"><i class="fa-solid fa-bed-front"></i> 4  <i class="fa-solid fa-bath"></i> 3 <i class="fa-solid fa-ruler-triangle"></i> 2440 Sqft</span>

            </div>
            <div class="request-list__info">
                <span class="request-list__info-title">
                    Status
                </span>
                <div class="request-list__info-status
                request-list__info-status--success
                ">
                    Success
                </div>
            </div>
        </div>
    @endfor




</div>
@endsection
