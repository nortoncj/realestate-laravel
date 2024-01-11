@extends('layouts.user')
@section('page-title','DataDoor | Profile')
@section('title',"Security")
@section('page-bg',"https://images.pexels.com/photos/8469937/pexels-photo-8469937.jpeg?auto=compress&cs=tinysrgb&w=1200")
@section('content')
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">

                @include('components.user.sidebar')

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">

                                <div class="lower-content">




                                    <form method="POST" action="{{route('user.update.password')}}"  class="default-form"  >
                                        @csrf

                                        <div class=" form-group mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" >
                                            @error('old_password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" >
                                            @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Confirm New Password</label>
                                            <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off" >

                                        </div>




                                        <button type="submit" class="theme-btn btn-one me-2">Change Password</button>

                                    </form>


                                </div>
                            </div>
                        </div>


                    </div>


                </div>


            </div>
        </div>
    </section>
    @include('components.subscribe')
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
@endsection
