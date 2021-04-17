@extends('website.layout')
@section('content')
<style>
    .breadcrumb-item a {
        color: rgb(255 255 255);
    }

</style>

    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="../assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Blogs</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-12 d-block mx-auto">
                    <!--Job Lists-->
                    <div class="row">

                        @forelse ($blogs as $item)
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="row no-gutters blog-list">
                                        <div class="col-xl-4 col-lg-12 col-md-12">
                                            <div class="item7-card-img">
                                                <a href="{{ url('blog/'. $item->id .'/details') }}"></a>
                                                <img src="{{ asset('storage/images/blogs/'. $item->image ) }}" alt="img" class="cover-image">
                                                <div class="item7-card-text">
                                                    <span class="badge badge-info">{{ $item->blog_type}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-12 col-md-12">
                                            <div class="card-body">
                                                <div class="item7-card-desc d-flex mb-1">
                                                    <a href="javascript:void(0);"><i class="fa fa-calendar-o text-muted mr-2"></i> {{  \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }} </a>
                                                    <a href="javascript:void(0);"><i class="fa fa-user text-muted mr-2"></i> {{ $item->user->name}}</a>
                                                    <div class="ml-auto">
                                                        {{-- <a class="mr-0"  href="#"><i class="fa fa-comment-o text-muted mr-2"></i>2 Comments</a> --}}
                                                    </div>
                                                </div>
                                                <a href="{{ url('blog/'. $item->id .'/details') }}" class="text-dark"><h4 class="font-weight-semibold mb-4">  {{  substr($item->header, 0,200)  }}</h4></a>
                                                <p class="mb-1">{!! substr($item->content, 0,200)  !!}    </p>
                                                <a href="{{ url('blog/'. $item->id .'/details') }}" class="btn btn-primary btn-sm mt-4">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="row no-gutters blog-list">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="col-md-12 text-center" >
                                                <h2 class="text-warning">No Blogs Available</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforelse
                    </div>
                    <div class="center-block text-center" style="float: right !important;">
                        <ul class="pagination mb-0">
                            {{ $blogs->links()}}
                        </ul>
                    </div>
                </div>
                <!--/Job Lists-->
            </div>
        </div>
    </section>


@endsection
