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
            <h4 class="page-title">Courses</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/course/specifications')}}">Specification List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Course</li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 offset-3">                    
                    <form class="card" action="{{ route('admin.specification.process')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Course</h3>
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
                                        <label class="form-label">Course Name</label>
                                        <select class="form-control select2" name="course" id="course"  placeholder="select Course" width="100%">
                                            <option selected value=""> Select Course </option>
                                            @forelse ($courses as $cat)
                                                <option value="{{ $cat->id  }}"   @if( old('course', $result['course_id']) == $cat->id) selected @endif > {{ $cat->name }} </option> 
                                            @empty
                                                <option value=""> No Course Available</option>
                                            @endforelse
                                        </select>
                                        @error('course')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Specifications</label> 
                                        <input type="text" class="form-control" name="name"  value="{{ old('name', $result['name'] ) }}"  placeholder="State Name">
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
    $('#course').select2();
</script>   
@endsection