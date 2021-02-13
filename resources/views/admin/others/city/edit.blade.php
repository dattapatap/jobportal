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
            <h4 class="page-title">Cities</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/cities')}}">City List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage City</li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 offset-3">                    
                    <form class="card" action="{{ route('admin.cities.process')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">State</h3>
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
                                        <label class="form-label">State Name</label>
                                        <select class="form-control select2" name="state" id="state"  placeholder="select state" width="100%">
                                            <option selected value=""> Select State </option>
                                            @forelse ($state as $cat)
                                                <option value="{{ old('state_id',$cat->id ) }}"   @if( old('state', $result['state_id']) == $cat->id) selected @endif > {{ $cat->name }} </option>                                                
                                            @empty
                                                <option value=""> No Country Found</option>
                                            @endforelse
                                        </select>
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">City Name</label> 
                                        <input type="text" class="form-control" name="name"  value="{{ old('name', $result['name'] ) }}"  placeholder="City Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <input type="hidden" value="{{$result['id']}}" name="id" >                 
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
    $('#state').select2();
</script>   
@endsection
