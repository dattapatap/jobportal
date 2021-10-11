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
    <div class="side-app" style="padding-top: 10px;">
        <div class="page-header">
            <h4 class="page-title">Points Setting</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/package')}}">Points Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Setting</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 offset-3">
                    <form class="card" action="{{ route('admin.packagesetting.update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Points Setting</h3>
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
                                        <label class="form-label">Post Job</label>
                                        <input type="number" class="form-control" value="{{ old('post_job', $settings->post_job) }}" name="post_job"  placeholder="Post Job Points">
                                        @error('post_job')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Profile View</label>
                                        <input type="number" class="form-control" value="{{ old('prof_view',  $settings->prof_view) }}" name="prof_view"  placeholder="Profile View Points">
                                        @error('prof_view')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"> Download Resume </label>
                                        <input type="number" class="form-control" value="{{ old('prof_download',  $settings->prof_download) }}" name="prof_download"  placeholder="Profile Download Points">
                                        @error('prof_download')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Show Interest</label>
                                        <input type="number" class="form-control" value="{{ old('prof_interest',  $settings->prof_interest) }}" name="prof_interest"  placeholder="Profile Interest Points">
                                        @error('prof_interest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" value="1" name="id" >
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
<script>
    $('#country').select2();
</script>
@endsection
