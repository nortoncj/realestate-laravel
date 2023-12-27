@extends('admin.admin_dashboard')
@section('page-title','Listing')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Property</h6>

                            <form action="{{route('store.listing')}}" method="post" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1" class="form-label"> Property Name</label>
                                            <input type="text" name="property_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Sale Status</label>
                                            <select name="sale_status" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Sale Status</option>
                                                <option value="rent" class="">For Rent</option>
                                                <option value="sale" class="">For Sale</option>
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
                                                <input data-inputmask="'alias': 'currency', 'prefix':'$'" inputmode="decimal" placeholder="250000"  name="lowest_price"  class="form-control">
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
                                                <input type="text" name="highest_price" data-inputmask="'alias': 'currency', 'prefix':'$'" placeholder="25000000" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Main Thumbnail</label>
                                            <input type="file" id="image" name="property_thumbnail" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"></label>
                                            <img class="wd-80 rounded-circle" id="showImage" src="{{ (!empty($thumbnail->property_thumbnail)) ? url('upload/listing/'.$thumbnail->property_thumbnail) : url('upload/no_image.jpg') }}" alt="profile">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Images</label>
                                            <input type="file" multiple name="property_images" id="images" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"></label>
                                            <img class="wd-80 rounded-circle" id="showImages" src="{{ (!empty($images->property_images)) ? url('upload/listing/'.$images->property_images) : url('upload/no_image.jpg') }}" alt="profile">
                                        </div>
                                        {{--                                        <div class=" stretch-card">--}}
                                        {{--                                            <div class="card">--}}
                                        {{--                                                <div class="card-body">--}}
                                        {{--                                                    <h6 class="card-title">Images</h6>--}}

                                        {{--                                                    <div class="dropify-wrapper">--}}
                                        {{--                                                        <div class="dropify-message">--}}
                                        {{--                                                            <span class="file-icon">--}}
                                        {{--                                                                <p>Drag and drop a file here or click</p>--}}
                                        {{--                                                            </span>--}}
                                        {{--                                                            <p class="dropify-error">Ooops, something wrong appended.</p>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="dropify-loader"></div>--}}
                                        {{--                                                        <div class="dropify-errors-container"><ul></ul></div><input type="file" id="myDropify"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Bedrooms</label>
                                            <input type="number" name="bedrooms" placeholder="4" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Bathrooms</label>
                                            <input type="number" name="bathrooms" placeholder="3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Garage</label>
                                            <input type="text" name="garage" placeholder="double" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Garage Size</label>
                                            <input type="text" name="garage_size" placeholder="2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Address</label>
                                            <input type="text" name="address" placeholder="123 Example St" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">City</label>
                                            <input type="text" value="{{old('city')}}" name="city"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label" for="state">State</label>
                                            <select type="text" id='state' name="state" class="form-control">
                                                <option value="FL" @selected(old('version') == 'FL')>Florida</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Zip Code</label>
                                            <input type="text" name="zipcode" pattern="[0-9]{5}" title="5 digit zip code" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Size</label>
                                            <div class="input-group">
                                                <input type="number" name="property size" placeholder="2750" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">sqft</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Video</label>
                                            <input type="text" placeholder="youtube url" name="video" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Neighborhood</label>
                                            <input type="text" name="neighborhood" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Latitude</label>
                                            <input type="text" name="latitude" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Longitude</label>
                                            <input type="text" name="longitude" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Type</label>
                                            <select name="property_type" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Property Type</option>
                                                @foreach($type as $key => $item)
                                                    <option value="{{$key}}" class="">{{$item->type_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="mb-3" data-select2-id="26">
                                            <label class="form-label">Property Amenities</label>
                                            <select name="amenities" class="js-example-basic-multiple form-select select2-hidden-accessible" multiple="" data-width="100%" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                @foreach($amenity as $key => $item)
                                                    <option value="{{$key}}" data-select2-id="{{$key}}">{{$item->amenities_name}}</option>
                                                @endforeach


                                            </select>
                                        </div>




                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-3 card">
                                                <div class="card-body">
                                                    <label  class="form-label card-title">Short Description</label>
                                                    <textarea id="maxlength-textarea" class="form-control resize-none" maxlength="100" rows="4" style="resize: none" placeholder="This textarea has a limit of 100 chars."></textarea>
                                                </div></div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Long Description</h4>
                                                    <textarea class="form-control" name="long_text" id="easyMdeExample" rows="10" style="display: none;"></textarea>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 mb-4 flex">

                                            <div class="form-group mt-4">
                                                <label class="form-label row" for="checkInline3">
                                                    Featured Property
                                                </label>
                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">

                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mt-4">
                                                <label class="form-label row" for="checkInline3">
                                                    Hot Property
                                                </label>
                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <table class="table  table-sm" id="table">
                                                <caption>Multiple input fields for facilities and their distances</caption>
                                                <tr class="bg-primary table-dark">
                                                    <th>Facilities</th>
                                                    <th>Distance Miles</th>
                                                </tr>
                                                <tr>
                                                    <td> <input type="text" name="inputs[0][facilities]" placeholder="Gym,School,Mall..." class="form-control"></td>

                                                    <td class="input-group"> <input type="number" name="inputs[0][distance]" placeholder="2.." class="form-control" aria-describedby="basic=addon2">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">mi</span>
                                                        </div></td>
                                                    <td><button type="button"  name="add" class=" btn btn-sm btn-success " id="add">
                                                            Add More +
                                                        </button></td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-4" style=" display: flex; justify-content: flex-end; align-content: end">
                                            <button type="submit" class="btn btn-primary btn-lg " style="width: 200px;height: 50px;">Save Property</button>
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

        $(document).ready(function(){
            $('#images').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImages').attr('src',e.target.result);
                }
                for(i=0;i > e.target.files.length; i++){
                    reader.readAsDataURL(e.target.files[i]);
                }

            });
        });


    </script>
    <script>
        var i = 0;
        $('#add').click(function(){
            i++;
            $('#table').append(
                `<tr>
                    <td>
                        <input type="text" name="inputs['+i+'][facilities]" placeholder="Gym,School..." class="form-control" />
                    </td>
                     <td class="input-group">
                        <input type="number" name="inputs['+i+'][distance]" placeholder="2,4..." class="form-control" />
                            <div class="input-group-append">
                                <span class="input-group-text">mi</span>
                              </div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger btn-sm remove-table-row">-</button>
                    </td>
                   </tr>

                ` );
        });

        $(document).on('click','.remove-table-row', function (){
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    status_name: {
                        required : true,
                    },

                },
                messages :{
                    status_name: {
                        required : 'Please Enter status Name',
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



