@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
    @endphp

<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
    <div class="blog-sidebar">
        <div class="sidebar-widget post-widget">
            <div class="widget-title">
{{--                <h4>User Profile </h4>--}}
            </div>
            <div class="post-inner">
                <div class="post">
                    <figure class="post-thumb"><a href="blog-details.html">
                            <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('assets/images/news/post-1.jpg') }}" alt=""></a></figure>
                    <h5><a href="blog-details.html">{{$userData->username}} </a></h5>
                    <p>{{$userData->email}} </p>
                </div>
            </div>
        </div>

        <div class="sidebar-widget category-widget">
            <div class="widget-title">
{{--                <h4>Category</h4>--}}
            </div>
            <div class="widget-content">
                <ul class="category-list ">

                    <li class="current">  <a href="{{ route('user.profile') }}"><i class="fa-solid fa-gauge "></i> Dashboard </a></li>


                    <li><a href="{{ route('user.settings') }}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                    <li><a href="blog-details.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Buy credits<span class="badge badge-info">( 10 credits)</span></a></li>
                    <li><a href="blog-details.html"><i class="fa fa-list-alt" aria-hidden="true"></i> Properties </a></li>
                    <li><a href="blog-details.html"><i class="fa fa-indent" aria-hidden="true"></i> Add a Property  </a></li>
                    <li><a href="{{ route('user.change.password') }}"><i class="fa fa-key" aria-hidden="true"></i> Security </a></li>
                    <li><a href="{{ route('user.logout') }}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Logout </a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
