@extends('admin.layout.layout')
@section('content');
<style>
    table td[class*=col-], table th[class*=col-] {
    position: static;
    display: table-cell;
    float: none;
}
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Employee</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                <li class="breadcrumb-item active" aria-current="page">Employee List</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
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
                {data: 'id', name: '#'},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
                {data: 'first_name', name: 'First Name'},
                {data: 'last_name', name: 'Last Name'},
                {data: 'email', name: 'Email'},
                {data: 'mobile', name: 'Phone No'},
                {data: 'dob', name: 'DOB'},
                {data: 'gender', name: 'Gender'},
                {data: 'address', name: 'Address'},
                {data: 'status', name: 'Status'},
            ],
            "columnDefs": [
                    { width:'10%' , targets: 0 },{ width:'50%' , targets: 2 },{ width:'50%' , targets: 3 },
                ],
        });

        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

    </script>
@endsection