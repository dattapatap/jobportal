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
            <h4 class="page-title">Add Questions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/questions')}}">Questions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Questions</li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 offset-2">                    
                    <form class="card" action="{{ route('admin.questionCategory.process')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Add Question</h3>
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
                                        <label class="form-label">Question Category</label>
                                        <select class="form-control select2" name="question_category" id="question_category"  placeholder="select category">
                                            <option value=""> Select Category </option>
                                            @forelse ($category as $cat)
                                                <option value="{{ $cat->id }}"> {{ $cat->name }} </option>                                                
                                            @empty
                                                <option value=""> No Category Found</option>
                                            @endforelse
                                        </select>
                                        @error('question_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Question</label>
                                        <textarea type="textarea" class="form-control" name="question"  placeholder="Question Detail" rows="3">{{ $result["qc_name"], old('old_name') }}</textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Question</label>
                                        <textarea type="textarea" class="form-control" name="question"  placeholder="Question Detail" rows="3">{{ $result["qc_name"], old('old_name') }}</textarea>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>  




                                <input type="hidden" value="{{ $result['id'] }}" name="id" >                 
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
    $('#question_category').select2();

</script>   
@endsection