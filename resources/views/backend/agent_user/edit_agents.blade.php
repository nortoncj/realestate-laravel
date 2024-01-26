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

                            <h6 class="card-title">Add Agent</h6>

                            <form method="POST" id="myForm" action="{{route('update.agent')}}"  class="forms-sample"  >
                                @csrf

                                <input type="hidden" name="id" value="{{$agent->id}}">

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Agent Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$agent->name}}"  >

                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Agent Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$agent->email}}" >

                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Agent Phone</label>
                                    <input type="tel" name="phone" class="form-control" value="{{$agent->phone}}" >

                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label">Agent Address</label>
                                    <input type="text" name="address" class="form-control" value="{{$agent->address}}"  >

                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Agent Edits</button>

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
                    email: {
                        required : true,
                    },
                    phone: {
                        required : true,
                    },
                    address: {
                        required : false,
                    },
                    password: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Agent Name',
                    },
                    email: {
                        required : 'Please Enter Agent Email',
                    },
                    phone: {
                        required : 'Please Enter Agent Phone',
                    },
                    password: {
                        required : 'Please Enter Agent Password',
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
