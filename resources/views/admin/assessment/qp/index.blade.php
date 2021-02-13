@extends('admin.layout.layout')
@section('content');
<style>
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Question Papers</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/qp')}}">Question Paper</a></li>
                <li class="breadcrumb-item active" aria-current="page">Question Paper List</li>
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
                            <a href="{{url('admin/qp/create ')}}" class="btn btn-sm btn-primary"><i class="side-menu__icon fa fa-arrow-down" style="color:white"></i> Add Question Paper</a>
                        </div>                      
                        <div>
                            <table id="qp" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>                               
                                    <tr>
                                        <th> # </th>                                        
                                        <th>Action</th>
                                        <th>QP Name</th>
                                        <th>QP Category</th>
                                        <th>Tot Questions</th>
                                        <th>Max Time</th>
                                        <th>Max Marks</th>
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
    $('#qp').dataTable({           
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "/admin/qp/",
            type: "GET",
            error:function(err){
                console.log(err.responseText);
            }
        }, 
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            {data: 'action', name: 'Action', orderable: false, searchable: false},
            {data: 'description', name: 'Description'},
            {data: 'category', name: 'QP Category'},
            {data: 'no_questions', name: 'Tot Questions'},
            {data: 'max_time', name: 'Max Time'},
            {data: 'max_marks', name: 'Max Marks'},
            {data: 'created_at', name: 'Created Date'},
        ],
        'columnDefs': [
                        {
                            targets: [4,5,6],
                            className: "text-center"
                        }           
        ]
    });
</script>
@endsection