@extends('admin.layout.layout')
@section('content');
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Packages</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/packages')}}"> Packages </a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
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
                        <div class="p-2 pull-right">
                            <a href="{{route('admin.packages.create')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-down" style="color:white"></i> Add New Package </a>
                        </div>
                        <div>
                            <table id="packages" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Action</th>
                                        <th>Package Name</th>
                                        <th>Package Amount</th>
                                        <th>Validity(days)</th>
                                        <th>Tot Adds</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($package as $items)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td style="width:15%;">
                                            <div class="d-flex">
                                                <a href="{{route('admin.packages.edit', $items->id)}}" class="btn btn-info btn-sm m-1"><i class="fa fa-edit"></i></a>
                                                @if($items->status=="Active")
                                                     <a href="{{url('admin/packages/status', $items->id)}}" class="btn btn-sm btn-primary m-1">{{$items->status}}</a>
                                                @else
                                                    <a href="{{url('admin/packages/status', $items->id)}}" class="btn btn-sm btn-danger m-1">{{$items->status}}</a>
                                                @endif

                                                <form action="{{ route('admin.packages.destroy', $items->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-sm btn-danger m-1"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                        <td>{{$items->name}}</td>
                                        <td>{{$items->amount}}</td>
                                        <td>{{$items->maxdays}}</td>
                                        <td>{{$items->maxads}}</td>
                                        <td>{{$items->created_at}}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center"> Not Data Dound</td>
                                    </tr>

                                @endforelse
                                </tbody>
                            </table>
                            {!! $package->links() !!}
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
@endsection
