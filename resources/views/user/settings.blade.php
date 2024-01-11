@extends('layouts.user')
@section('page-title','DataDoor | Profile')
@section('title',"Settings")
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




                                    <form method="POST" action="{{route('user.profile.store')}}"  class="default-form " enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group ">
                                            <label>Username</label>
                                            <input class="text-dark" type="text" name="username"  value="{{$userData->username}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>Name</label>
                                            <input class="text-dark" type="text" name="name"  value="{{$userData->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input class="text-dark" type="email" name="email"  value="{{$userData->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone </label>
                                            <input class="text-dark" type="tel" name="phone"  value="{{$userData->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Address </label>
                                            <input class="text-dark" type="text" name="address"  value="{{$userData->address}}">
                                        </div>

                                        <div class="ml-4">
                                            <div class="form-label"></div>
                                            <img src="{{(!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo): url('assets/images/news/post-1.jpg')}}" id="showImage" alt="" class="wd-80 w-20 rounded-circle">
                                        </div>
                                        <div class="form-group p-4 border-gray-500">
                                            <label for="formFile" class="form-label block mb-2 ">Upload Photo</label>
                                            <input class="h-10 p-2 form-control block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-[#1e1b18] focus:bg-[#1e1b18] focus:text-[#fffaff]  focus:outline-none " type="file" id="image" name="photo">
                                        </div>


                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Save Changes </button>
                                        </div>
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
