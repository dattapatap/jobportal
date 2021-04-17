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
            <h4 class="page-title">Packages</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/package')}}">Packages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.packages.index')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>
                <div class="col-md-6 offset-3">
                    <form class="card" action="{{ route('admin.packages.update', $package->id ) }}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h3 class="card-title"> Edit Package </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id" value="{{$package->id}}"/>
                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Package Name</label>
                                        <input type="text" class="form-control" value="{{ old('name', $package->name) }}" name="name"  placeholder="Package Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Package Amount</label>
                                        <input type="number" class="form-control" value="{{ old('amount', $package->amount) }}" name="amount"  placeholder="Package Amount">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Package Valifity(Days)</label>
                                        <input type="number" class="form-control" value="{{ old('validity', $package->maxdays) }}" name="validity"  placeholder="Package Validity">
                                        @error('validity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Total Adds(Posts)</label>
                                        <input type="number" class="form-control" value="{{ old('adds',$package->maxads) }}" name="adds"  placeholder="Total Adds">
                                        @error('adds')
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
