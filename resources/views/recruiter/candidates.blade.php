@extends('recruiter.layout.layout')
@section('content')
<style>
.select2{
    width: 100%;
    border: 1px solid #343a4082;
    border-radius: 3%;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4;
    border: 1px solid #e4e6f1;
    border-radius: 2px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 33px !important;
    border-radius: 0;
}
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Candidates</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Candidate Lists</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class=" mb-lg-0">
                    <div class="">
                        <div class="item2-gl">
                            <div class=" mb-0">
                                <div class="">
                                    <div class="p-2 bg-white col-md-12">
                                        @php
                                            if(isset($_GET['category'])){
                                                $arrCategory =  $_GET['category'];
                                            }else{
                                                $arrCategory =  '';                                            }
                                            if(isset($_GET['positions'])){
                                                $arrPositions =  $_GET['positions'];
                                            }else{
                                                $arrPositions =  '';
                                            }
                                            if(isset($_GET['skills'])){
                                                $arrSkills =  $_GET['skills'];
                                            }else{
                                                $arrSkills =  array();
                                            }
                                        @endphp

                                        <form id="empSearch" action="{{ url('recruiter/employee/search')}}" method="GET" class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Category</label>
                                                    <select name="category" id="category" class="form-control select2" style="width: 100%">
                                                        <option value="" selected> Select Category </option>
                                                        <option value="1" @if($arrCategory=='1') selected="selected"  @endif > Outstanding  </option>
                                                        <option value="2" @if($arrCategory=='2') selected="selected"  @endif > Excellent </option>
                                                        <option value="3" @if($arrCategory=='3') selected="selected"  @endif > Good  </option>
                                                        <option value="4" @if($arrCategory=='4') selected="selected"  @endif > Need Improvement </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Job Role</label>
                                                    <select  name="positions" id="positions" class="form-control select2" style="width: 100%">
                                                        <option value="" selected> Select Role</option>
                                                        @foreach ($positions as $item)
                                                            <option value="{{$item->id}}" @if($arrPositions==$item->id) selected="selected" @endif > {{ $item->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Skills</label>
                                                    <select class="form-control"  id="skills" name="skills[]" multiple="multiple" style="width: 100%">
                                                        @foreach ($skills as $item)
                                                                <option value="{{$item->id}}" {{ (in_array( $item->id, $arrSkills))?'selected':'' }} > {{ $item->description}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group p-5">
                                                    <button type="submit" class="btn btn-md btn-info"> Search </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content company-list">
                                <div class="tab-pane active" id="tab-11">
                                    <div class="row">
                                        @forelse ($candidates as $item)
                                            <div class="col-lg-6">
                                                <div class="card overflow-hidden br-0 overflow-hidden">
                                                    <div class="d-sm-flex card-body p-3">
                                                        <div class="p-0 m-0 mr-3  mt-md-2">
                                                            <div class="">
                                                                @isset($item->avatar)
                                                                <img src=" {{ URL::asset('storage/images/profiles/'.$item->avatar) }}" alt="img" class="w-9 h-9">
                                                                @else
                                                                <img src=" {{ asset('assets/images/users/male/25.jpg')}}" alt="img" class="w-9 h-9">
                                                                @endisset
                                                            </div>
                                                        </div>
                                                        <div class="item-card9  mt-md-1">
                                                            <a href="#" class="text-dark"><h5 class="font-weight-semibold mt-1">{{ $item->first_name .' '. $item->last_name}} </h5></a>
                                                            <div class="mt-1">
                                                                <a class="text-dark"><h6 class="font-weight-semibold mt-1"><span>Role : </span>{{ $item->position}} </h6></a>
                                                            </div>
                                                            <div class="mt-1">
                                                                <a class="text-dark"><h6 class="font-weight-semibold mt-1"><span>Exp : </span>{{ $item->experience_year.'.'.$item->experience_month }} Years </h6></a>
                                                            </div>
                                                            <div class="mt-1">
                                                                <a class="text-dark"><h6 class="font-weight-semibold mt-1"><span>Exp Salary : </span>{{ $item->expected_ctc }} LPA </h6></a>
                                                            </div>
                                                            @php $category ="";  @endphp
                                                            @if(isset($item->test[0]->test_category))
                                                                @php $category = $item->test[0]->test_category;  @endphp
                                                                @foreach ($item->test as $singTest)
                                                                    @php
                                                                        if($singTest->test_category < $category )
                                                                                $category = $singTest->test_category;
                                                                    @endphp
                                                                @endforeach
                                                            @endif
                                                            @php
                                                             $categoryType ='';
                                                              if($category==1)
                                                                  $categoryType='Outstanding';
                                                              if($category==2)
                                                                  $categoryType='Excellent';
                                                              if($category==3)
                                                                  $categoryType='Good';
                                                              if($category==4)
                                                                  $categoryType='Need Improvement';
                                                            @endphp
                                                            <div class="mt-1"><span>Category : @php echo $categoryType @endphp </span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
                                                        <div class="card-body table-responsive border-top">
                                                            <h4>Skills :</h4>
                                                            @foreach ($item->userskills as $item)
                                                                    {{ $item->skills->description}}
                                                                        @if (!$loop->last)
                                                                        ,
                                                                        @endif
                                                            @endforeach
                                                            <div class="mt-3">

                                                                @if(isset($intrest))
                                                                    @if(in_array($item->id, $intrest))
                                                                        <button class="btn btn-info mt-1 mb-1 float-right" disabled> <i class="fa fa-check"></i>&nbsp; Interested</button>
                                                                    @else
                                                                        <button class="btn btn-info mt-1 mb-1 float-right showInterest" id="{{$item->id}}"  >Show Interest</button>
                                                                    @endif
                                                                @else
                                                                    <button class="btn btn-info mt-1 mb-1 float-right showInterest" id="{{$item->id}}"  >Show Interest</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h4 class="page-title text-danger">No Candidate found, please try with another key</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center float-right">
                                <ul class="pagination mb-0">
                                    {{ $candidates->links('pagination::bootstrap-4') }}
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $(document).ready(function(){
        $('.select2').select2({ });
        $('#skills').select2({
            placeholder:'Select Skills',
        	 placeholder: " Search"
        })
    })
    $('.showInterest').click(function(e){
        var emp_id = $(this).attr('id');
        var btn = $(this).prop('disabled', true);
        e.preventDefault();
        $.ajax({
                url: "/recruiter/emp/showinterest",
                type:'POST',
                data: {data : emp_id },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success);
                        $(btn).hide();
                    }else{
                        toastr.warning(response.error);
                    }
                },
                error: (response) => {
                    console.log(response);
                }
        });

    })
</script>
@endsection
