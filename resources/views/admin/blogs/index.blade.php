@extends('admin.layout.layout')
@section('content');
<style>
    #blogs td:nth-child(2) {
        text-align: right;
        width: 100px !important;
        /* display: flex; */
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Blogs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/audit')}}">Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="p-2 pull-right">
                            <a href="{{route('admin.blogs.create')}}" class="btn btn-sm btn-primary"><i class="side-menu__icon fa fa-arrow-down"
                                style="color:white"></i> Add Blogs </a>
                        </div>
                        <div>
                            <table id="blogs" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Action</th>
                                        <th>Header</th>
                                        <th>Blog Type</th>
                                        <th>Image</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap.switch.min.js')}}" data-turbolinks-track="true"></script>
<script>
    $('#blogs').dataTable({
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "{{ route('admin.blogs.index')}}",
            type: "GET",
        },
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            {data: 'action', name: 'Action', orderable: false, searchable: false },
            {data: 'header', name: 'Header'},
            {data: 'blog_type', name: 'Blog Type'},
            {data: 'image', name: 'Image'},
            {data: 'created_at', name: 'Created Date'},
        ],
        "fnDrawCallback": function() {
                $(".bt-switch input[type='checkbox']").bootstrapSwitch();
        },
    });
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

    $('#blogs').on('switchChange.bootstrapSwitch', '.blog_status', function(event, state) {
            event.preventDefault();
            var userid = $(this).attr("id");
            var userState = $(this).prop('checked') == true ? 'Active' : 'InActive' ;
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/admin/blog/status',
                data: { status: userState, id: userid },
                success: function(data) {
                    console.log(data);
                    if(data.success){
                        toastr.success(data.message);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            });
    });
</script>
@endsection
