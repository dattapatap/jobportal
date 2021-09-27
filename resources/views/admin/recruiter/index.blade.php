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
                            <table id="reclist" class="responsive display nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-25p">Action</th>
                                        <th class="wd-15p">Company</th>
                                        <th class="wd-15p">Contact Person</th>
                                        <th class="wd-20p">Email</th>
                                        <th class="wd-15p">Mobile</th>
                                        <th class="wd-10p">Address</th>
                                        <th class="wd-25p">Status</th>

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
                {data: 'DT_RowIndex', name: 'Sl No'},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
                {data: 'name', name: 'Company'},
                {data: 'contact_person', name: 'Contact Person'},
                {data: 'email', name: 'Email'},
                {data: 'mobile', name: 'Phone No'},
                {data: 'location', name: 'Address'},
                {data: 'status', name: 'Status'},

            ],
            "fnDrawCallback": function() {
                $(".bt-switch input[type='checkbox']").bootstrapSwitch();
            },
        });
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
        $('#reclist').on('switchChange.bootstrapSwitch', '.user_status', function(event, state) {
            event.preventDefault();
            var userid = $(this).attr("id");
            var userState = $(this).prop('checked') == true ? 'Active' : 'InActive' ;

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '{{ URL::to('/admin/recruiter/status')}}',
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
