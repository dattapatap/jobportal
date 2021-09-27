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

    .iscorrect{
        height: 30px;
        width: 20px;
        margin-top: 3px;
    }
</style>

<div class="app-content">
    <div class="side-app" style="padding-top:6px;">
        <div class="page-header">
            <h4 class="page-title">Add Questions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/questions')}}">Questions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Questions</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                <div class="col-md-8 offset-2">
                    <form class="card" method="POST" enctype="multipart/form-data"
                        action="{{ url('admin/questions/import') }}">

                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Upload Question</h3>
                        </div>
                       
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Question Category</label>
                                        <select class="form-control select2" name="question_category" id="question_category"  placeholder="select category">
                                          
                                            <option value=" {{ old('question_category') }}"> Select Category </option>
                                            @forelse ($category as $cat)
                                                <option value="{{ $cat->id }}"
                                                  @if( $cat->id == old('question_category') )
                                                  selected 
                                                  @endif 

                                                > {{ $cat->description }} </option>
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
                                        <label class="form-label">Question Type</label>
                                        <select class="form-control select2" name="question_type" id="question_type"  placeholder="select exp" >
                                          <option value=""> Select question type </option>
                                          @foreach ($type as $item)
                                              <option value="{{ $item->id }}" 
                                                 @if( $item->id == old('question_type') )
                                                  selected 
                                                  @endif 
                                              > {{ $item->description }} 
                                              </option>
                                          @endforeach
                                        </select>
                                        @error('question_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Select File</label>
                                        <input type="file" name="file_question" id="file_question" >
                                        @error('file_question')
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
<script src="{{ asset('js/admin/question.js')}}"></script>
@endsection
