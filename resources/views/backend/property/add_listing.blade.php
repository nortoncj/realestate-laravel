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
                                            <select name="sale_type" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Sale Status</option>
                                                <option value="rent" class="">For Rent</option>
                                                <option value="buy" class="">For Buy</option>
                                            </select>
                                        </div>
                          </div> {{--          Col          --}}

                                </div>



                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Address</label>
                                            <input type="text" name="address" placeholder="123 Example St" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Address Line 2</label>
                                            <input type="text" name="address2" placeholder="Building B #332" class="form-control">
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
                                            <input type="text" name="zip_code" pattern="[0-9]{5}" title="5 digit zip code" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Property Type</label>
                                            <select name="property_types" id="exampleFormControlSelect1" class="form-select">
                                                <option selected disabled> Select Property Type</option>
                                                @foreach($type as $key => $item)
                                                    <option value="{{$key}}" class="">{{$item->type_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">






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
                                            <label  class="form-label">Property Size</label>
                                            <div class="input-group">
                                                <input type="number" name="property_size" placeholder="2750" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">sqft</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-4" >
                                    <button type="submit" class="btn btn-primary btn-lg " style="width: 200px;height: 50px;">Save Property</button>
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
@endsection
