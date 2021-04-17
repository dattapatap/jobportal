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
            <h4 class="page-title">Audits</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/country')}}">Audit List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Audit</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2">
                    <a href="{{route('admin.audit.index')}}" class="btn btn-primary"><i class="side-menu__icon fa fa-arrow-left" style="color:white"></i> Back </a>
                </div>
                <div class="col-md-6 offset-3">
                    <form class="card" action="{{ route('admin.audit.store')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add New Audit</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Select Country</label>
                                        <select name="country" id="country" class="form-control select2">
                                            @if(isset($countries))
                                                <option value="" selected> Select Country</option>
                                                @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}" @if( old('country')== $item->id) selected @endif > {{ $item->name  }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group pb-3">
                                        <label class="form-label">Audit Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name"  placeholder="Audit Name">
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
<script>
    $('#country').select2();
</script>
@endsection
