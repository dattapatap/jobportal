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
            <h4 class="page-title">Transactions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Payments</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Received</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="paymnts" class="responsive display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <!-- <th>Action</th> -->
                                        <th>Transaction Id</th>
                                        <th>Tax Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Transaction Method</th>
                                        <th>Package</th>
                                        <th>Recruiter Name</th>
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
    $('#paymnts').dataTable({
        processing: true,
        serverside: true,
        responsive: true,
        ajax:{
            url: "{{ route('admin.payments') }}",
            type: "GET",
            error:function(err){
                console.log(err.responseText);
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: '#'},
            // {data: 'action', name: 'Action', orderable: false, searchable: false},
            {data: 'payment_id', name: 'Transaction Id'},
            {data: 'payment_tax_id', name: 'Tax Id'},
            {data: 'payment_amount', name: 'Amount'},
            {data: 'status', name: 'Status'},
            {data: 'payment_date', name: 'Date'},
            {data: 'payment_method', name: 'Transaction Method'},

            {data: 'package_id', name: 'Package'},
            {data: 'rec_id', name: 'Recruiter'},
            {data: 'created_at', name: 'Created Date'},
        ],
    });
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

</script>
@endsection



