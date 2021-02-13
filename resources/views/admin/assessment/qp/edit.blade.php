@extends('admin.layout.layout')
@section('content');
@section('style')
<style>
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: .25rem;
        font-size: 87.5%;
        color: #ff382b;
    }
    div.scroll { 
        padding: 4px;
        width: 98%;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        border-top: 2px black solid;
    }
    .custom-control-label {
        font-size: 12px;
    } 
    .custom-control-label::after {
        width: 1.2rem;
        height: 1.2rem;
    }
    .custom-control-label::before {
        width: 1.2rem;
        height: 1.2rem;
    }
</style>
@endsection

<div class="app-content">
    <div class="side-app" style="padding-top:6px;">
        <div class="page-header">
            <h4 class="page-title">Edit Question Paper</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/qp')}}">Question Papers</a></li>
            </ol>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">                    
                    <form id="frmQP" class="card" action="{{ route('admin.qp.update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Edit Question Paper</h3>
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
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <input type="hidden" value="{{ $qp->id }}" name="qp_id">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Question Paper Category</label>
                                            <select class="form-control select2" name="qp_category" id="qp_category"  placeholder="select category" style="width:100%">
                                                <option value=" {{ old('qp_category') }}"> Select Category </option>
                                                @forelse ($category as $cat)
                                                    <option value="{{ $cat->id }}" @if(  $cat->id ==  $qp->id || old('qp_category') == $cat->id  ) selected @endif> {{ $cat->name }} </option>                                                
                                                @empty
                                                    <option value=""> No Category Found</option>
                                                @endforelse
                                            </select>
                                            @error('qp_category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" value="{{ $qp->description, old('description')  }}" class="form-control" placeholder="Description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>  
                                    <div class="form-row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label">Tot Questions</label>
                                                <input type="number" name="tot_questions" id="tot_questions" class="form-control" value="" readonly>
                                                @error('tot_questions')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>                                            
                                        </div> 
                                        <div class="col-md-6" style="margin-right:0px;">
                                            <div class="form-group mb-4">
                                                <label class="form-label">Tot Marks</label>
                                                <input type="text" name="max_marks"  id="max_marks" value="0" class="form-control" readonly>
                                                @error('max_marks')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label"> Max Test Time</label></label>
                                            <input type="text" name="test_time" id="test_time" value="{{ $qp->max_time,old('test_time') }}"  class="form-control" placeholder="HH:MM:SS" onkeypress="formatTime(this)" MaxLength="8" >
                                            @error('test_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: -3px;">
                                        <strong>Questions</strong>  
                                    </div>
                                    <div class="scroll">                                        
                                        @forelse ($questioncategory as $item)
                                            <i class="btn btn-outline-primary btn-pill filter-button" data-filter="{{'category_'.$item->id }}">{{ $item->name}}</i>
                                        @empty
                                              <span>  No Category Available, Please add question category </span>
                                        @endforelse
                                    </div>                                       
                                    
                                    <div class="col-md-12" style="max-height: 250px; overflow-y:auto;padding-top:10px;"> 
                                        <ul class="questions">
                                            @forelse ($questions as $item)
                                                @php 
                                                   $score = 0;
                                                   foreach ($item->options as $opt) {
                                                     $score = $score + $opt->marks;
                                                   }
                                                @endphp
                                                <label class="custom-control custom-checkbox filter {{ 'category_'.$item->category->id}}">
                                                    <input type="checkbox" class="custom-control-input qpcheckbox" name="questions[]" value="{{ $item->id }}" score="{{ $score }}"
                                                    @if(in_array($item->id, $qp->questions->pluck('q_id')->toArray()) || is_array(old('questions')) && in_array($item->id, old('questions'))) checked @endif >
                                                    <span class="custom-control-label">{{ html_entity_decode($item->name)  }}  </span>
                                                </label>
                                            @empty
                                              <span>  No Questions Available, Please add questions  </span>
                                            @endforelse
                                        </ul>
                                    </div>

                                </div>              
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" > Create New QP </button>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}"></script>
<script>
    $('#qp_category').select2();
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');        
        if(value == "all"){
            $('.filter').show('1000');
        } else {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });    
    if ($(".filter-button").removeClass("active")) {
         $(this).removeClass("active");
    }
    $(this).addClass("active");
</script>   
<script>
    $(document).ready(function(){
        $('.qpcheckbox').click(function(e){
            var totQ = 0;
            var existing_score = 0;            
            $('input[type=checkbox]').each(function () {
                if(this.checked){
                    totQ = totQ + 1;
                    existing_score = existing_score + parseInt($(this).attr('score'));
                }
            });
            $('#tot_questions').val(parseInt(totQ));
            $('#max_marks').val(parseInt(existing_score));
        })

        var totQ = 0;
        var existing_score = 0;            
        $('input[type=checkbox]').each(function () {
            if(this.checked){
                totQ = totQ + 1;
                existing_score = existing_score + parseInt($(this).attr('score'));
            }
        });
        $('#tot_questions').val(parseInt(totQ));
        $('#max_marks').val(parseInt(existing_score));

    });

    function formatTime(timeInput) {
        intValidNum = timeInput.value;
        if (intValidNum < 24 && intValidNum.length == 2) {
            timeInput.value = timeInput.value + ":";
            return false;  
        }
        if (intValidNum == 24 && intValidNum.length == 2) {
            timeInput.value = timeInput.value.length - 2 + "0:";
            return false;
        }
        if (intValidNum > 24 && intValidNum.length == 2) {
            timeInput.value = "";
            return false;
        }

        if (intValidNum.length == 5 && intValidNum.slice(-2) < 60) {
        timeInput.value = timeInput.value + ":";
        return false;
        }
        if (intValidNum.length == 5 && intValidNum.slice(-2) > 60) {
        timeInput.value = timeInput.value.slice(0, 2) + ":";
        return false;
        }
        if (intValidNum.length == 5 && intValidNum.slice(-2) == 60) {
        timeInput.value = timeInput.value.slice(0, 2) + ":00:";
        return false;
        }

        if (intValidNum.length == 8 && intValidNum.slice(-2) > 60) {
        timeInput.value = timeInput.value.slice(0, 5) + ":";
        return false;
        }
        if (intValidNum.length == 8 && intValidNum.slice(-2) == 60) {
        timeInput.value = timeInput.value.slice(0, 5) + ":00";
        return false;
        }
    } //end function



</script>
@endsection