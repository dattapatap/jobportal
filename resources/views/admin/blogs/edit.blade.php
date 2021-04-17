@extends('admin.layout.layout')
@section('content');
<style>
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: .25rem;
        font-size: 87.5%;
        color: #ff382b;
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Blogs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/blogs')}}">Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.blogs.index')}}" class="btn btn-primary btn-sm"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>
                <div class="col-md-12">
                    <form class="card" id="frmBlog" action="{{ route('admin.blogs.update', $blogs->id ) }}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Blog Header</label>
                                        <input type="text" class="form-control" value="{{ old('header',$blogs->header) }}"  name="header" id="header"  placeholder="Blog Header">
                                        @error('header')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Blog Type</label>
                                        <input type="text" class="form-control" value="{{ old('type',$blogs->blog_type) }}" name="type" id="type" placeholder="Blog Type">
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="blogimage" id="blogimage"  placeholder="Upload Image" accept="image/x-png,image/gif,image/jpeg" />
                                        @error('blogimage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Blog Descriptions</label>
                                        <textarea class="content form-control" name="blog_content" id="blog_content">
                                           {{ old('blog_content',$blogs->content) }}
                                        </textarea>
                                        @error('blog_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Create Blog</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
      CKEDITOR.replace('blog_content');
      CKEDITOR.instances['blog_content'].updateElement();
</script>
<script>
</script>?


@endsection
