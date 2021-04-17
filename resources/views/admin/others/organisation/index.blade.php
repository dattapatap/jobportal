@extends('admin.layout.layout')
@section('content');
<style>
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Organisations</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/organisation')}}">Organisations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Organisation List</li>
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
                            <a href="{{route('admin.organisation.create')}}" class="btn btn-sm btn-primary"><i class="side-menu__icon fa fa-arrow-down"
                                style="color:white"></i> Add Organisation </a>
                        </div>
                        <div>
                            <table id="organisations" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Action</th>
                                        <th>Name</th>
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
    $('#organisations').dataTable({
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "{{ route('admin.organisation.index')}}",
            type: "GET",
        },
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            {data: 'action', name: 'Action', orderable: false, searchable: false },
            {data: 'name', name: 'Name'},
            {data: 'created_at', name: 'Created Date'},
        ],
    });


    $(document).on('click', '.delete-confirm', function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });



</script>
@endsection
