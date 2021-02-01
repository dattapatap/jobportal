@extends('admin.layout.layout')
@section('content');

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Recruiter</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Recruiter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Recruiter List</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="reclist" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">First name</th>
                                        <th class="wd-15p">Last name</th>
                                        <th class="wd-20p">Position</th>
                                        <th class="wd-15p">Start date</th>
                                        <th class="wd-10p">Salary</th>
                                        <th class="wd-25p">E-mail</th>
                                        <th class="wd-25p">E-mail</th>
                                        <th class="wd-25p">E-mail</th>
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
        $('#reclist').dataTable({
            processing: true,
            serverside: true,
            responsive: true,
            ajax:{
               url: "{{ route('admin.recruiter') }}",
               type: "GET",
               error:function(err){
                   console.log(err.responseText);
               }
            }, 
            columns: [
                {data: 'id', name: 'Sl No'},
                {data: 'first_name', name: 'First Name'},
                {data: 'last_name', name: 'Last Name'},
                {data: 'email', name: 'Email'},
                {data: 'mobile', name: 'Phone No'},
                {data: 'dob', name: 'DOB'},
                {data: 'gender', name: 'Gender'},
                {data: 'address', name: 'Address'},
                {data: 'status', name: 'Status'},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
            ],
        });
    </script>
@endsection