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
                <li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.blogs.index')}}" class="btn btn-primary btn-sm"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>
                <div class="col-md-12">
                    <form class="card" id="frmBlog" method="POST"  enctype="multipart/form-data" >
                        <div class="card-header">
                            <h3 class="card-title">Add New Blog</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Blog Header</label>
                                        <input type="text" class="form-control"  name="header" id="header"  placeholder="Blog Header">
                                        <span id="header-input-error" style="color: red;font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Blog Type</label>
                                        <input type="text" class="form-control" name="type" id="type" placeholder="Blog Type">
                                        <span id="type-input-error" style="color: red;font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="blogimage" id="blogimage"  placeholder="Upload Image" accept="image/x-png,image/gif,image/jpeg" />
                                        <span id="blogimage-input-error" style="color: red;font-size:12px;"></span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Blog Descriptions</label>
                                        <textarea class="content form-control" name="blog_content" id="blog_content">
                                        </textarea>
                                        <span id="blog_content-input-error" style="color: red;font-size:12px;"></span>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#frmBlog').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#image-input-error').text('');
        $('#blog_content-input-error').text('');
        $('#type-input-error').text('');
        $('#header-input-error').text('');

        $.ajax({
           type:'POST',
           url: "{{route('admin.blogs.store')}}",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
              console.log(response);
              if (response.success) {
                this.reset();
                toastr.success(response.success);
                location.reload();
              }else{
                 toastr.warning(response.error);
              }
            },
            error: function(response){
                 console.log(response);
                 $('#image-input-error').text(response.responseJSON.errors.image);
                 $('#blog_content-input-error').text(response.responseJSON.errors.blog_content);
                 $('#type-input-error').text(response.responseJSON.errors.type);
                 $('#header-input-error').text(response.responseJSON.errors.header);
            }
        });
    });

</script>?


@endsection
