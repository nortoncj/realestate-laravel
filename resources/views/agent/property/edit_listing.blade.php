@extends('agent.agent_dashboard')
@section('page-title','Edit Listing')


@section('agent')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property Listing</h6>

                            <form action="{{route('agent.update.listing')}}" method="post" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$listing->id}}" >

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1" class="form-label"> Property Name</label>
                                            <input type="text" name="property_name" class="form-control" value="{{$listing->property_name}}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Status</label>
                                            <select name="property_status" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Status</option>
                                                <option value="rent" {{$listing->property_status == 'rent' ? 'selected' : ''}} class="">For Rent</option>
                                                <option value="buy" {{$listing->property_status == 'buy' ? 'selected' : ''}} class="">For Sale</option>
                                            </select>
                                        </div>
                                    </div> {{--          Col          --}}

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group  mb-3">
                                            <label  class="form-label">Lowest Price</label>
                                            <div class="input-group">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" data-inputmask="'alias': 'currency', 'prefix':'$'" inputmode="decimal" value="{{$listing->lowest_price}}"  name="lowest_price"  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Highest Price</label>
                                            <div class="input-group">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" name="highest_price" data-inputmask="'alias': 'currency', 'prefix':'$'" value="{{$listing->max_price}}" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Bedrooms</label>
                                            <input type="text" name="bedrooms" value="{{$listing->bedrooms}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Bathrooms</label>
                                            <input type="text" name="bathrooms" value="{{$listing->bathrooms}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Garage</label>
                                            <input type="text" name="garage" value="{{$listing->garage}}" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Garage Size</label>
                                            <div class="input-group">
                                                <input type="text" name="garage_size" value="{{$listing->garage_size}}" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">sqft</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Address</label>
                                            <input type="text" name="address" value="{{$listing->address}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">City</label>
                                            <input type="text" value="{{$listing->city}}" name="city"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label" for="state">State</label>
                                            <select type="text" id='state' name="state" class="form-control">
                                                <option value="FL" @selected(old('version') == 'FL')>Florida</option>
                                                <option value="NY" @selected(old('version') == 'NY')>New York</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Zip Code</label>
                                            <input type="text" name="zip" pattern="[0-9]{5}" title="5 digit zip code" class="form-control" value="{{$listing->zip}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label  class="form-label">Address Line 2</label>
                                        <div class="input-group">
                                            <input type="text" name="address2" value="{{$listing->address2}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-sm-3">

                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Size</label>
                                            <div class="input-group">
                                                <input type="text" name="property_size" value="{{$listing->property_size}}" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">sqft</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Neighborhood</label>
                                            <input type="text" name="neighborhood" class="form-control" value="{{$listing->neighborhood}}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Video</label>
                                            <input type="text" value="{{$listing->property_video}}" name="video" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Latitude</label>
                                            <input type="text" name="latitude" class="form-control"value="{{$listing->latitude}}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Find latitude here from address</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Longitude</label>
                                            <input type="text" name="longitude" class="form-control" value="{{$listing->longitude}}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Find longitude here from address</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Type</label>
                                            <select name="property_type" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Property Type</option>
                                                @foreach($type as $ptype)
                                                    <option value="{{ $ptype->id }}" {{$listing->ptype_id == ($ptype->id) ? 'selected' : ''}} class="">{{$ptype->type_name}} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">

                                        <div class="mb-3" data-select2-id="26">
                                            <label class="form-label">Property Amenities</label>
                                            <select name="amenities_id[]" class="js-example-basic-multiple form-select " multiple="multiple" data-width="100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                @foreach($amenity as $key)
                                                    <option value="{{$key->amenities_name}}" {{(in_array($key->amenities_name,$amenities)) ? 'selected' : ''}} data-select2-id="{{$key->id}}">{{$key->amenities_name}}</option>
                                                @endforeach


                                            </select>
                                        </div>




                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-3 card">
                                                <div class="card-body">
                                                    <label  class="form-label card-title">Short Description</label>
                                                    <textarea name="short_desc" id="maxlength-textarea" class="form-control resize-none" maxlength="100" rows="4" style="resize: none"  >{{$listing->short_desc}}</textarea>
                                                </div></div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 card">
                                        <div class="mb-3 card-body">
                                            <label for="" class="form-label card-title">Long Description</label>
                                            <textarea name="tinymce" id="tinymceExample" cols="30" rows="10" class="form-control">
                                                {!! $listing->long_desc !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    {{--                                    <div class="row">--}}
                                    {{--                                        <div class="col-md-12 grid-margin stretch-card">--}}
                                    {{--                                            <div class="card">--}}
                                    {{--                                                <div class="card-body">--}}
                                    {{--                                                    <h4 class="card-title">Long Description</h4>--}}
                                    {{--                                                    <textarea class="form-control" name="long_text" id="easyMdeExample" rows="10" style="display: none;"></textarea>--}}


                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-sm-3 mb-4 flex">

                                            <div class="form-group mt-4">
                                                <label class="form-label row" for="checkInline3">
                                                    Featured Property
                                                </label>
                                                <input type="checkbox" name="is_featured" class="form-check-input" id="checkInline3" value="1" {{$listing->is_featured == '1' ? 'checked' : ' '}} >

                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mt-4">
                                                <label class="form-label row" for="checkInline3">
                                                    Hot Property
                                                </label>
                                                <input type="checkbox" name="is_hot" class="form-check-input" value="1" id="checkInline3" {{$listing->is_hot == '1' ? 'checked' : ' '}}>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="row add_item">



                                            <div class="col-12 mb-3" style=" display: flex; justify-content: flex-end; align-content: end">
                                                <button type="submit" class="btn btn-primary btn-lg " style="width: 200px;height: 50px; font-family: 'Poppins', serif;">Save Property</button>
                                            </div>
                                        </div>
                                    </div>









                                </div>
                            </form>
                            <div class="row" style=";">
                                {{--                                        Property Main Thumbnail Image Update--}}
                                <div class="page-content" style="margin-top: -20px; ">
                                    <div class="col-md-12 col-xl-12 middle-wrapper" >
                                        <div class=" col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">Edit Thumbnail</h6>
                                                    <form method="post" action="{{route('agent.update.listing.thumbnail')}}" id="myForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $listing->id }}">

                                                        <input type="hidden" name="old_img" value="{{ $listing->property_thumbnail }}">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label  class="form-label">Main Thumbnail</label>
                                                                <input type="file" id="image" name="property_thumbnail" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label"></label>
                                                                <img class="wd-80 " id="showImage" src="{{ (!empty($thumbnail->property_thumbnail)) ? url('upload/listing/'.$thumbnail->property_thumbnail) :  asset($listing->property_thumbnail)  }}" alt="" >
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-sm " style=" font-family: 'Poppins', serif;">Save Thumbnail</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                {{--                                    Property Multi Images Update--}}

                                <div class="page-content">
                                    <div class="col-md-12 col-xl-12 middle-wrapper" style="">
                                        <div class="col-sm-12">
                                            <div class=" col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Edit Images</h6>
                                                        <form method="post" action="{{route('agent.update.listing.images')}}" id="myForm" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="table-responsive mb-3">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Serial</th>
                                                                        <th>Image</th>
                                                                        <th>Change Image</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($multiImage as $key => $img)
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                {{$key+1}}
                                                                            </td>
                                                                            <td><img class="rounded-0" style="width: 200px; height: 100px;" src="{{ asset($img->photo_name) }}" alt="image"> </td>
                                                                            <td>
                                                                                <div class="">
                                                                                    <input type="file" multiple name="multi_img[{{ $img->id }}]" id="multiImg" class="form-control" >
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="submit" class="btn btn-lg btn-info px-4" value="Update">
                                                                                <a href="{{ route('listing.delete.images', $img->id) }}" class="btn btn-danger " id="delete">Delete</a>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </form>
                                                        <div class="flex">
                                                            <form method="post" action="{{route('store.new.images')}}" id="myForm" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="image_id" value="{{ $listing->id }}">
                                                                <table class="table table-striped">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="file" class="form-control" name="multi_img">
                                                                        </td>
                                                                        <td>
                                                                            <input type="submit"
                                                                                   class="btn btn-primary px-4" value="Save Image">
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="mb-3 row" id="preview_img">

                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -400px">
                                {{--                                        Property Main Thumbnail Image Update--}}
                                <div class="page-content" style="">
                                    <div class="col-md-12 col-xl-12 middle-wrapper" >
                                        <div class=" col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">Edit Thumbnail</h6>
                                                    <form method="post" action="{{route('agent.update.listing.thumbnail')}}" id="myForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $listing->id }}">

                                                        <input type="hidden" name="old_img" value="{{ $listing->property_thumbnail }}">
                                                        <div class="col-sm-6">
                                                            <div class="form-group mb-3">
                                                                <label  class="form-label">Main Thumbnail</label>
                                                                <input type="file" id="image" name="property_thumbnail" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label"></label>
                                                                <img class="wd-80 " id="showImage" src="{{ (!empty($thumbnail->property_thumbnail)) ? url('upload/listing/'.$thumbnail->property_thumbnail) :  asset($listing->property_thumbnail)  }}" alt="" >
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-sm " style=" font-family: 'Poppins', serif;">Save Thumbnail</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                {{--                                    Property Multi Images Update--}}

                                <div class="page-content">
                                    <div class="col-md-12 col-xl-12 middle-wrapper" style="">
                                        <div class="col-sm-12">
                                            <div class=" col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Edit Listing Facilities</h6>
                                                        <form method="post" action="{{route('agent.update.listing.facilities')}}" id="myForm" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$listing->id}}">
                                                            @foreach($facilities as $item )
                                                                <div class="row add_item">
                                                                    <div class="row add_item whole_extra_item_add" id="whole_extra_item_add">
                                                                        <div class="row add_item whole_extra_item_delete" id="whole_extra_item_delete">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label for="facility_name" class="form-label">Facilities </label>
                                                                                    <select name="facility_name[]" id="facility_name" class="form-control">
                                                                                        <option value="">Select Facility</option>
                                                                                        <option value="Hospital" {{$item->facility_name == 'Hospital' ? ' selected' : ''}}>Hospital</option>
                                                                                        <option value="SuperMarket" {{$item->facility_name == 'SuperMarket' ? ' selected' : ''}}>Super Market</option>
                                                                                        <option value="School" {{$item->facility_name == 'School' ? ' selected' : ''}}>School</option>
                                                                                        <option value="Entertainment" {{$item->facility_name == 'Entertainment' ? ' selected' : ''}}>Entertainment</option>
                                                                                        <option value="Pharmacy" {{$item->facility_name == 'Pharmacy' ? ' selected' : ''}}>Pharmacy</option>
                                                                                        <option value="Airport" {{$item->facility_name == 'Airport' ? ' selected' : ''}}>Airport</option>
                                                                                        <option value="Railways" {{$item->facility_name == 'Railways' ? ' selected' : ''}}>Railways</option>
                                                                                        <option value="Bus Stop" {{$item->facility_name == 'Bus Stop' ? ' selected' : ''}}>Bus Stop</option>
                                                                                        <option value="Beach" {{$item->facility_name == 'Beach' ? ' selected' : ''}}>Beach</option>
                                                                                        <option value="Mall" {{$item->facility_name == 'Mall' ? ' selected' : ''}}>Mall</option>
                                                                                        <option value="Bank" {{$item->facility_name == 'Bank' ? ' selected' : ''}}>Bank</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="mb-3">
                                                                                    <label for="distance" class="form-label"> Distance </label>
                                                                                    <input type="text" name="distance[]" id="distance" class="form-control" value="{{$item->distance}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4" style="padding-top: 30px;">

                                                                                <span class="btn btn-success addeventmore"><i class="fa rounded-circle fa-plus"></i> </span>
                                                                                <span class="btn btn-danger removeeventmore"><i class="fa rounded-circle fa-minus"></i> </span>
                                                                            </div>
                                                                        </div>
                                                                    </div><!---end row-->
                                                                </div>
                                                            @endforeach
                                                            <button type="submit" class="btn btn-primary btn-lg " style="width: 200px;height: 50px; font-family: 'Poppins', serif;">Save Changes</button>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    Facilities--}}

    {{--    End Facilities--}}
    <!--========== Start of add multiple class with ajax ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="facility_name">Facilities</label>
                            <select name="facility_name[]" id="facility_name" class="form-control">
                                <option value="">Select Facility</option>
                                <option value="Hospital">Hospital</option>
                                <option value="SuperMarket">Super Market</option>
                                <option value="School">School</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Airport">Airport</option>
                                <option value="Railways">Railways</option>
                                <option value="Bus Stop">Bus Stop</option>
                                <option value="Beach">Beach</option>
                                <option value="Mall">Mall</option>
                                <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="distance">Distance</label>
                            <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (mi)">
                        </div>
                        <div class="form-group col-md-4" style="padding-top: 20px">
                            <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle"></i> Add</span>
                            <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle"></i> Remove</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----For Section-------->
    <script type="text/javascript">
        $(document).ready(function(){
            var counter = 0;
            $(document).on("click",".addeventmore",function(){
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click",".removeeventmore",function(event){
                $(this).closest("#whole_extra_item_delete").remove();
                counter -= 1
            });
        });
    </script>
    <!--========== End of add multiple class with ajax ==============-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>






    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    property_name: {
                        required : true,
                    },
                    property_status: {
                        required : true,
                    },
                    lowest_price: {
                        required : true,
                    },
                    highest_price: {
                        required : true,
                    },
                    property_thumbnail: {
                        required : true,
                    },
                    property_type: {
                        required : true,
                    },
                    multi_img: {
                        required : true,
                    },

                },
                messages :{
                    property_name: {
                        required : 'Please Enter Listing Name!',
                    },
                    property_status: {
                        required : 'Please Enter a Status!',
                    },
                    lowest_price: {
                        required : 'Please Enter a Minimum Price!',
                    },
                    highest_price: {
                        required : 'Please Enter a Maximum Price!',
                    },
                    property_thumbnail: {
                        required : 'Please Enter a Thumbnail.',
                    },
                    multi_img: {
                        required : 'Please Select some Images!',
                    },
                    property_type: {
                        required : 'Please Choose a Type!',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

@endsection




