@extends('admin.layout.layout')
@section('content');
<style>
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Test Slots</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/testslots')}}">Test Slots</a></li>
                <li class="breadcrumb-item active" aria-current="page">Test Slots</li>
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
                            <a href="{{route('admin.testslots.create')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-down" style="color:white"></i> Add Test Slot </a>
                        </div>                      
                        <div>
                            <table id="testSlots" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>                               
                                    <tr>
                                        <th> # </th>                                        
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Slot Timing</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($slots as $slot)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td style="width:15%;">
                                            <div class="d-flex">
                                                <a href="{{route('admin.testslots.edit', $slot->id)}}" class="btn btn-info btn-sm m-1"><i class="fa fa-edit"></i></a>
                                                @if($slot->status=="Active")
                                                     <a href="{{url('admin/testslots/status', $slot->id)}}" class="btn btn-sm btn-primary m-1">{{$slot->status}}</a>
                                                @else
                                                    <a href="{{url('admin/testslots/status', $slot->id)}}" class="btn btn-sm btn-danger m-1">{{$slot->status}}</a>
                                                @endif
    
                                                <form action="{{ route('admin.testslots.destroy', $slot->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-sm btn-danger m-1"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                        
                                        </td>                                        
                                        <td>{{$slot->description}}</td>
                                        <td>{{ Carbon\Carbon::parse($slot->from)->format('g:i A')." To ". Carbon\Carbon::parse($slot->to)->format('g:i A') }}</td>
                                        <td>{{$slot->created_at}}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center"> Not Data Dound</td>
                                    </tr>

                                @endforelse                             
                                </tbody>
                            </table>
                            {!! $slots->links() !!}
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