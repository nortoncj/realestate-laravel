@extends('admin.admin_dashboard')
@section('page-title','Edit Listing')


@section('admin')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property Listing</h6>

                            <form action="{{route('update.listing')}}" method="post" id="myForm" enctype="multipart/form-data">
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
                                            <label  class="form-label">Agent</label>
                                            <select name="agent_id" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Agent</option>
                                                @foreach($active_agent as $key => $item)
                                                    <option value="{{$key}}" {{$listing->agent_id == $key ? 'selected' : ''}} class="">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Type</label>
                                            <select name="property_type" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Property Type</option>
                                                @foreach($type as $key => $item)
                                                    <option value="{{$key}}" {{$listing->ptype_id == $key ? 'selected' : ''}} class="">{{$item->type_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">

                                        <div class="mb-3" data-select2-id="26">
                                            <label class="form-label">Property Amenities</label>
                                            <select name="amenities_id[]" class="js-example-basic-multiple form-select " multiple="multiple" data-width="100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                @foreach($amenity as $key)
                                                    <option value="{{$key->id}}" {{(in_array($key->id,$amenities)) ? 'selected' : ''}} data-select2-id="{{$key->id}}">{{$key->amenities_name}}</option>
                                                @endforeach


                                            </select>
                                        </div>




                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-3 card">
                                                <div class="card-body">
                                                    <label  class="form-label card-title">Short Description</label>
                                                    <textarea name="short_desc" id="maxlength-textarea" class="form-control resize-none" maxlength="100" rows="4" style="resize: none"  >
                                                        {{$listing->short_desc}}
                                                    </textarea>
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



                                        <div class="col-12" style=" display: flex; justify-content: flex-end; align-content: end">
                                            <button type="submit" class="btn btn-primary btn-lg " style="width: 200px;height: 50px; font-family: 'Poppins', serif;">Save Property</button>
                                        </div>
                                    </div>
                                </div>









                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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




