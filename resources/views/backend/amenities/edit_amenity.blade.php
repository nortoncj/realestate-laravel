@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Property Amenity</h6>

                            <form method="POST" id="myForm" action="{{route('update.amenity')}}"  class="forms-sample"  >
                                @csrf
                                    <input type="hidden" name="id" value="{{$amenities->id}}">
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Amenity Name</label>
                                    <input type="text" name="amenities_name" class="form-control " value="{{$amenities->amenities_name}}" >

                                </div>








                                <button type="submit" class="btn btn-primary me-2">Save Amenity</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    amenities_name: {
                        required : true,
                    },

                },
                messages :{
                    amenities_name: {
                        required : 'Please Enter Amenity Name',
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
