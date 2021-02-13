@extends('admin.layout.layout')
@section('content');
<style>
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Specifications</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/course/specifications')}}"> Specifications </a></li>
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
                            <a href="{{url('admin/course/specifications/manage ')}}" class="btn btn-sm btn-primary"><i class="side-menu__icon fa fa-arrow-down" 
                                style="color:white"></i> Add Specifications </a>
                        </div>                      
                        <div>
                            <table id="specifications" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>                               
                                    <tr>
                                        <th> # </th>                                        
                                        <th>Action</th>
                                        <th>Course</th>
                                        <th>Specification Name</th>
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
<script>
    $('#specifications').dataTable({           
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "/admin/course/specifications",
            type: "GET",
            error:function(err){
                console.log(err.responseText);
            }
        }, 
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            {data: 'action', name: 'Action', orderable: false, searchable: false},
            {data: 'courses', name: 'Course'},
            {data: 'name', name: 'Course Name'},
            {data: 'created_at', name: 'Created Date'},
        ],
    });
</script>
@endsection