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
            <h4 class="page-title">Country</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/organisation')}}">Organisation List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Organisation</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.organisation.index')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>
                <div class="col-md-6 offset-3">
                    <form class="card" action="{{ route('admin.organisation.update', $organisation->id ) }}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h3 class="card-title">Edit Organisation</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Organisation Name</label>
                                        <input type="text" class="form-control" value="{{old('name', $organisation->name)}}" name="name"  placeholder="Organisation Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary"> Update </button>
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
