    @extends('admin.layout.layout')
@section('content')
@section('style')
<style>
#emplist td:nth-child(2) {
    text-align: right;
    width: 100px !important;
    display: flex;
}
.btn-group-sm>.btn, .btn-sm {
    font-size: .75rem;
    width: 2rem;
}
</style>
@endsection
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Employee</h4>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.employee-export') }}" class="btn btn-success btn-md text-white" style="float-right"> Export </a></li>
                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                <li class="breadcrumb-item active" aria-current="page">Employee List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="emplist" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Action</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Registered Date</th>
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
    $('#emplist').dataTable({
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "{{ route('admin.employee') }}",
            type: "GET",
            error:function(err){
                console.log(err.responseText);
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            {data: 'action', name: 'Action', orderable: false, searchable: false},
            {data: 'first_name', name: 'First Name'},
            {data: 'last_name', name: 'Last Name'},
            {data: 'email', name: 'Email'},
            {data: 'mobile', name: 'Phone No'},
            {data: 'dob', name: 'DOB'},
            {data: 'gender', name: 'Gender'},
            {data: 'address', name: 'Address'},
            {data: 'status', name: 'Status'},
            {data: 'created_at', name: 'Registered Date'},
        ],
        "fnDrawCallback": function() {
                $(".bt-switch input[type='checkbox']").bootstrapSwitch();
        },
    });
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

    $('#emplist').on('switchChange.bootstrapSwitch', '.user_status', function(event, state) {
            event.preventDefault();
            var userid = $(this).attr("id");
            var userState = $(this).prop('checked') == true ? 'Active' : 'InActive' ;

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/admin/employee/status',
                data: { status: userState, id: userid },
                success: function(data) {
                    console.log(data);
                    if(data.success){
                        console.log(data.message);
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
