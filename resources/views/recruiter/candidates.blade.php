@extends('recruiter.layout.layout')
@section('content')
<style>
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
                                    <div class="p-5 bg-white col-md-12">
                                        <form id="empSearch" action="" method="POST" class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Category</label>
                                                    <select name="category" id="category" class="form-control" style="width: 100%" required>
                                                        <option value="" selected> Select Category </option>
                                                        <option value="1"> Outstanding  </option>
                                                        <option value="2"> Excellent </option>
                                                        <option value="3"> Good  </option>
                                                        <option value="4"> Need Improvement </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Job Role</label>
                                                    <select  name="positions" id="positions" class="form-control select2" style="width: 100%" required>
                                                        <option value="" selected> Select Role</option>
                                                        @foreach ($positions as $item)
                                                            <option value="{{$item->id}}"> {{ $item->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Skills</label>
                                                    <select class="form-control select2"  id="skills" name="skills" multiple style="width: 100%" required>
                                                        @foreach ($skills as $item)
                                                                <option value="{{$item->id}}"> {{ $item->description}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
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
                                        @foreach ($candidates as $item)
                                            <div class="col-lg-6">
                                                <div class="card overflow-hidden br-0 overflow-hidden">
                                                    <div class="d-sm-flex card-body p-3">
                                                        <div class="p-0 m-0 mr-3  mt-md-2">
                                                            <div class="">
                                                                <img src=" {{ URL::asset('storage/images/profiles/'.$item->avatar) }}" alt="img" class="w-9 h-9">
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
                                                            @if(isset($item->test))
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
                                                                <button class="btn btn-info mt-1 mb-1 float-right showInterest" id="{{$item->id}}"  >Show Interest</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
    $('#empSearch').submit(function(e){
        e.preventDefault();
        arraSearch = {};
        arraSearch['categopry'] = $('#category').val();
        arraSearch['position'] = $('#positions').val();
        arraSearch['skills'] = $('#skills').val();
        var searchData = JSON.stringify(arraSearch);
        console.log(searchData);
        $.ajax({
                url: "{{ route('recruiter.search.candidate') }}",
                type:'POST',
                data: {search:searchData },
                dataType:'json',
                success: function(response) {
                  console.log(response);
                },
                error: (response) => {
                    console.log(response.responseText);
                }
        });

    });


    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function(){
        $('.select2').select2();
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
