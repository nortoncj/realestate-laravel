@extends('admin.admin_dashboard')
@section('page-title', 'Listings')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Permission</h6>

                            <form method="POST" id="myForm" action="{{route('store.amenity')}}"  class="forms-sample"  >
                                @csrf

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Permission Name</label>
                                    <input type="text" name="name" class="form-control"  >

                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Group Name</label>
                                    <select name="group_name" id="exampleFormControlSelect1" class="form-select">
                                        <option selected="" disabled=""> Select Group</option>
                                        <option value="type" class="">Property Type</option>
                                        <option value="status" class="">Status</option>
                                        <option value="amenities">Amenities</option>
                                        <option value="property">Property</option>
                                        <option value="history">Package History</option>
                                        <option value="message">Property Message</option>
                                        <option value="testimonial">Testimonials</option>
                                        <option value="agent">Manage Agent</option>
                                        <option value="category">Blog Category</option>
                                        <option value="post">Blog Post</option>
                                        <option value="comment">Blog Comment</option>
                                        <option value="smtp">SMTP Setting</option>
                                        <option value="site">Site Setting</option>
                                        <option value="role">Role & Permission</option>
                                    </select>

                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Property Type</label>
                                    <select name="group_name" id="exampleFormControlSelect1" class="form-select">
                                        <option selected="" disabled=""> Select Group</option>
                                        <option value="rent" class="">For Rent</option>
                                        <option value="buy">For Sale</option>
                                    </select>

                                </div>





                                <button type="submit" class="btn btn-primary me-2">Save Permissions</button>

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
                    name: {
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
