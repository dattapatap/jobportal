@extends('recruiter.layout.layout')
@section('content')
<style>
.table td, th {
    padding: 5px;
    vertical-align: top;
    text-align: center !important;
    border-top: 0;
}
.table thead th {
    color: #ffff;
}
.table thead  {
    background-color: #1650e2;
}
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Active Plans</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Plans</a></li>
                <li class="breadcrumb-item active" aria-current="page">History</li>
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
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div>
                            <table id="testSlots" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <!-- <th>Action</th> -->
                                        <th>Package Name</th>
                                        <th>Total Points</th>
                                        <th>Available Points</th>
                                        <th>Status</th>
                                        <th>Activated</th>
                                        <th>Expire Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($pack as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <!-- <td style="width:15%;">
                                            <div class="d-flex">
                                                <a href="{{route('admin.testslots.edit', $item->id)}}" class="btn btn-info btn-sm m-1"><i class="fa fa-edit"></i></a>
                                                @if($item->status=="Active")
                                                     <a href="{{url('admin/testslots/status', $item->id)}}" class="btn btn-sm btn-primary m-1">{{$item->status}}</a>
                                                @else
                                                    <a href="{{url('admin/testslots/status', $item->id)}}" class="btn btn-sm btn-danger m-1">{{$item->status}}</a>
                                                @endif

                                               
                                            </div>

                                        </td> -->
                                        <td>{{$item->package->name}}</td>
                                        <td>{{ (int)$item->package->amount }}</td>
                                        <td>{{$item->avl_points }}</td>
                                        <td>
                                            @if($item->package_status=="Active")
                                                 <label class="text-success">
                                                     {{$item->package_status}}
                                                 </label>
                                            @else
                                              <label class="text-danger">
                                                  {{$item->package_status}}
                                              </label>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($item->selected_date)->format('d-m-Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->expiry_date)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center"> Not Data Dound</td>
                                    </tr>

                                @endforelse
                                </tbody>
                            </table>
                            {!! $pack->links() !!}
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