@extends('website.layout')
@section('content')
<style>
    .breadcrumb-item a {
        color: rgb(255 255 255);
    }
    .footerimg img {
        width: 95px;
        height: 74px;
    }
</style>

<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">Blog-Details</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('blogs')}}">Blog</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Blog-Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Breadcrumb-->

<!--Job listing-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="item7-card-img">
                            <img src="{{ asset('storage/images/blogs/'. $blog->image )}}" alt="img" class="w-100">
                            <div class="item7-card-text">
                                <span class="badge badge-pink">{{ $blog->blog_type }}</span>
                            </div>
                        </div>
                        <div class="item7-card-desc d-flex mb-2 mt-3">
                            <a href="#"><i class="fa fa-calendar-o text-muted mr-2"></i> {{  \Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }} </a>
                            <a href="#"><i class="fa fa-user text-muted mr-2"></i>  {{ $blog->user->name }}</a>
                            <div class="ml-auto">
                                {{-- <a class="mr-0"  href="#"><i class="fa fa-comment-o text-muted mr-2"></i>2 Comments</a> --}}
                            </div>
                        </div>
                        <a href="#" class="text-dark"><h3 class="font-weight-semibold">{{ $blog->header }}</h3></a>

                        <p>  {!! $blog->content !!} </p>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comments</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="media mt-0 p-5">
                            <div class="d-flex mr-3">
                                <a href="#"><img class="media-object brround" alt="64x64" src="../assets/images/users/male/1.jpg"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold">Joanne Scott
                                    <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                    <span class="fs-14 ml-2"> 4.5 <i class="fa fa-star text-yellow"></i></span>
                                </h5>
                                <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st  <i class=" ml-3 fa fa-clock-o"></i> 13.00  <i class=" ml-3 fa fa-map-marker"></i> Brezil</small>
                                <p class="font-13  mb-2 mt-2">
                                    On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue
                                </p>
                                <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                <a href="" class="mr-2" data-toggle="modal" data-target="#Comment"><span class="">Comment</span></a>
                                <a href="" class="mr-2" data-toggle="modal" data-target="#report"><span class="">Report</span></a>
                                <div class="media mt-5">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/female/2.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-semibold">Rose Slater <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h5>
                                        <small class="text-muted"><i class="fa fa-calendar"></i> Dec 22st  <i class=" ml-3 fa fa-clock-o"></i> 6.00  <i class=" ml-3 fa fa-map-marker"></i> Brezil</small>
                                        <p class="font-13  mb-2 mt-2">
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris   commodo Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur consequat.
                                        </p>
                                        <a href="" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media p-5 border-top mt-0">
                            <div class="d-flex mr-3">
                                <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/male/3.jpg"> </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-semibold">Edward
                                <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                <span class="fs-14 ml-2"> 4 <i class="fa fa-star text-yellow"></i></span>
                                </h5>
                                <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st  <i class=" ml-3 fa fa-clock-o"></i> 16.35  <i class=" ml-3 fa fa-map-marker"></i> UK</small>
                                <p class="font-13  mb-2 mt-2">
                                    On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue
                                </p>
                                <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                <a href="" class="mr-2" data-toggle="modal" data-target="#Comment"><span class="">Comment</span></a>
                                <a href="" class="mr-2" data-toggle="modal" data-target="#report"><span class="">Report</span></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card mb-lg-0">
                    <div class="card-header">
                        <h3 class="card-title">Write Your Comments</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name1" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Write Your Comment"></textarea>
                        </div>
                        <a href="#" class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>

            <!--Rightside Content-->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card mb-10">
                    <div class="card-header">
                        <h3 class="card-title"> Related Blogs </h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="vertical-scroll">
                            @forelse ($relBlogs as $item)
                                <li class="item2">
                                    <div class="footerimg mt-0 mb-0 row">
                                        <div class="col-md-4  mb-0">
                                            <img src="{{ asset('storage/images/blogs/'.$item->image )}}" alt="image" class="card-profile-img" style="max-width: 9rem;border-radius: 0%;">
                                        </div>
                                        <div class="col-md-8  ml-0">
                                            <div class="col-md-12">
                                                <a href="{{ url('blog/'. $item->id .'/details') }}" class="time-title p-0 leading-normal mt-2">  {{ substr($item->header, 0,35) }}</a>
                                            </div>
                                           <a href="{{ url('blog/'. $item->id .'/details') }}" class="btn btn-info btn-sm float-right">Read</a>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <h4 class="text-danger text-center"> No Related Blogs Found </h4>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Jobs</h3>
                    </div>
                    <div class="card-body">
                        <div class="product-tags clearfix">
                            <ul class="list-unstyled mb-0">
                                @if(isset($reletedcategory))
                                    @foreach ($reletedcategory as $item)
                                        <li><a href="{{ url('jobs/category', $item->name)}}">{{ $item->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Rightside Content-->
        </div>
    </div>
</section>
<!--/Job listing-->

@endsection

