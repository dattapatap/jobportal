@extends('recruiter.layout.layout')
@section('content')
<style>
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: .25rem;
        font-size: 87.5%;
        color: #ff382b;
    }
    .form-group {
        margin-bottom: 25px;
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Post New Job</h4>
        </div>
        <div class="row ">
            <div class="row row-cards">
                <div class="col-md-12 ">
                    <form class="card" action="{{ route('recruiter.createjob')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="card-header">
                              <h3 class="card-title">Add New Job</h3>
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
                                          <label class="form-label">Job Description</label>
                                          <input type="text" class="form-control" value=" {{ old('job_title') }} " name="job_title"  placeholder="Job Description">
                                          @error('job_title')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                          <label class="form-label">Job Role</label>
                                          <select name="job_role" class="form-control select2" style="width: 100%">
                                                <option value="" selected> select  </option>
                                                @foreach ($positions as $item)
                                                    <option value="{{ $item->id }}" @if(old('job_role')==$item->id) selected @endif >  {{ $item->name }} </option>
                                                @endforeach
                                        </select>
                                          @error('job_role')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{  $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                          <label class="form-label">Industry</label>
                                          <select name="job_industry" class="form-control select2" style="width: 100%">
                                                <option value="" selected> select  </option>
                                                @foreach ($industry as $item)
                                                    <option value="{{ $item->id }}" @if(old('job_industry')==$item->id) selected @endif >  {{ $item->name }} </option>
                                                @endforeach
                                          </select>
                                          @error('job_industry')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                          <label class="form-label">Job Type</label>
                                          <select name="job_type" id="job_type" class="form-control select2">
                                                <option value="" selected> select  </option>
                                                <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}> Full Time  </option>
                                                <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}> Part Time  </option>
                                                <option value="Freelancer" {{ old('job_type') == 'Freelancer' ? 'selected' : '' }}> Freelancer </option>
                                          </select>
                                          @error('job_type')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Salary Min/Max(In Thousand)</label>
                                        <div class="row gutters-xs">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input type="number" name="min_salary" value="{{ old('min_salary') }}" class="form-control" placeholder="Min Salary" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-inr tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    @error('min_salary')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input type="number" name="max_salary" value="{{ old('max_salary') }}" class="form-control" placeholder="Max Salary" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-inr tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    @error('max_salary')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Experiance Required (Min/Max)</label>
                                        <div class="row gutters-xs">
                                            <div class="col-6">
                                                <select class="form-control select2" name="min_exp" value={{ old('min_exp')}}  data-placeholder="Choose one (with searchbox)">
                                                    <option value="-1" selected>Year</option>
                                                    <option value="0" {{ old('min_exp') == 0 ? 'selected' : '' }}>0 Year</option>
                                                    <option value="1" {{ old('min_exp') == 1 ? 'selected' : '' }}>1 Year</option>
                                                    <option value="2" {{ old('min_exp') == 2 ? 'selected' : '' }}>2 Year</option>
                                                    <option value="3" {{ old('min_exp') == 3 ? 'selected' : '' }}>3 Year</option>
                                                    <option value="4" {{ old('min_exp') == 4 ? 'selected' : '' }}>4 Year</option>
                                                    <option value="5" {{ old('min_exp') == 5 ? 'selected' : '' }}>5 Year</option>
                                                    <option value="6" {{ old('min_exp') == 6 ? 'selected' : '' }}>6 Year</option>
                                                    <option value="7" {{ old('min_exp') == 7 ? 'selected' : '' }}>7 Year</option>
                                                    <option value="8" {{ old('min_exp') == 8 ? 'selected' : '' }}>8 Year</option>
                                                    <option value="9" {{ old('min_exp') == 9 ? 'selected' : '' }}>9 Year</option>
                                                    <option value="10" {{ old('min_exp') == 10 ? 'selected' : '' }}>10 Year</option>
                                                </select>
                                                @error('min-exp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="col-6">
                                                <select class="form-control select2" name="max_exp" value={{old('max_exp')}} data-placeholder="Choose one (with searchbox)">
                                                    <option value="-1" selected>Year</option>
                                                    <option value="1" {{ old('max_exp') == 1 ? 'selected' : '' }}>1 Year</option>
                                                    <option value="2" {{ old('max_exp') == 2 ? 'selected' : '' }}>2 Year</option>
                                                    <option value="3" {{ old('max_exp') == 3 ? 'selected' : '' }}>3 Year</option>
                                                    <option value="4"{{ old('max_exp') == 4 ? 'selected' : '' }}>4 Year</option>
                                                    <option value="5"{{ old('max_exp') == 5 ? 'selected' : '' }}>5 Year</option>
                                                    <option value="6"{{ old('max_exp') == 6 ? 'selected' : '' }}>6 Year</option>
                                                    <option value="7"{{ old('max_exp') == 7 ? 'selected' : '' }}>7 Year</option>
                                                    <option value="8"{{ old('max_exp') == 8 ? 'selected' : '' }}>8 Year</option>
                                                    <option value="9"{{ old('max_exp') == 9 ? 'selected' : '' }}>9 Year</option>
                                                    <option value="10"{{ old('max_exp') == 10 ? 'selected' : '' }}>10 Year</option>
                                                    <option value="11"{{ old('max_exp') == 11 ? 'selected' : '' }}>11 Year</option>
                                                    <option value="12"{{ old('max_exp') == 12 ? 'selected' : '' }}>12 Year</option>
                                                    <option value="13"{{ old('max_exp') == 13 ? 'selected' : '' }}>13 Year</option>
                                                    <option value="14"{{ old('max_exp') == 14 ? 'selected' : '' }}>14 Year</option>
                                                    <option value="15+"{{ old('max_exp') == '15+' ? 'selected' : '' }}>15+ Year</option>
                                                </select>
                                                @error('max_exp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="form-label">Location</label>
                                          <select name="job_location" class="form-control select2" style="width: 100%">
                                                <option value="" selected> select  </option>
                                                @foreach ($city as $item)
                                                    <option value="{{ $item->id }}" @if(old('job_location')==$item->id) selected @endif >  {{ $item->name }} </option>
                                                @endforeach
                                          </select>
                                          @error('job_location')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="form-label">Eligibility</label>
                                          <input type="text" name="job_eligibility" value="{{ old('job_eligibility') }}" class="form-control" placeholder="Any Graduate" >
                                          @error('job_eligibility')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">No of Positions(Opening)</label>
                                        <input type="number" name="job_tot_positions" value="{{ old('job_tot_positions') }}" class="form-control" placeholder="Total Positions" >
                                        @error('job_tot_positions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Job Descriptions</label>
                                        <textarea class="content form-control" value="{{ old('job_desc') }}" name="job_desc" id="job_desc"></textarea>
                                        @error('job_desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div class="card-footer text-right">
                              <button type="submit" class="btn btn-primary">Create Job</button>
                          </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
      CKEDITOR.replace('job_desc');
      CKEDITOR.instances['job_desc'].updateElement();


      $('.select2').select2();
</script>
@endsection
