@extends('admin.layout.layout')
@section('content');
<style>
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: .25rem;
        font-size: 87.5%;
        color: #ff382b;
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Test Slots</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/testslots')}}">Test Slot List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Test Slots</li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.testslots.index')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>  
                <div class="col-md-6 offset-3">                    
                    <form class="card" action="{{ route('admin.testslots.store')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add Test Slot</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" value="{{ old('desc') }}" name="desc"  placeholder="Slot Description">
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Slot Timing From</label>
                                        <input type="time" class="form-control" value="{{ old('from') }}" name="from"  placeholder="Slot Description">
                                        @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> To</label>
                                        <input type="time" class="form-control" value="{{ old('to') }}" name="to"  placeholder="Slot Description">
                                        @error('to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@endsection