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
            <h4 class="page-title">Add Question Paper Category</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/qpcategory')}}">Question Paper Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add QP Category</li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 offset-3">                    
                    <form class="card" action="{{ route('admin.qpcategory.process')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Question Paper Category</h3>
                        </div>
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>                        
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>                        
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control" value="{{ $qc_name, old('old_name') }}" name="name"  placeholder="QP Category Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <input type="hidden" value="{{$id}}" name="id" >                 
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
