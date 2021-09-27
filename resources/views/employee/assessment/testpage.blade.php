@extends('website.layout')
@section('content')
<section class="sptb">
    <style>
   </style>
    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')
            <div class="col-lg-9 col-md-12 col-md-12">
                <div class="card dropify-image-avatar">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header">

                        <h3 class="card-title col-md-6">Skills Verification Test</h3>

                        <div class="col-md-3">
                            <div class="col-md-12" style="test-align:right;">
                                <span>This Question :  </span>
                                <span id="currentRemaining"> </span>
                            </div>
                         </div>
                        <div class="col-md-3">
                            <div class="col-md-12" style="test-align:right;">
                                <span>Time Remaining: </span>
                                <span id="timeRemaining"> @php printf("%d:%d" ,session()->get('rem_time')/60, session()->get('rem_time')%60); @endphp </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mt-4" style="width:100%">
                                <form id="nxtqn" method="POST" action="{{ route('employee.assessment.nextQuestion')}}"   >
                                    @csrf
                                    <div class="testContent">
                                        <ol class="quest-list" start="{{ session()->get('currQNo')  }}" style="font-size: 15px;font-weight: 400;">
                                            <li>
                                                <input type="hidden" name="QNO" value="{{ session()->get('currQNo')  }}">
                                                <span style="margin-bottom:10px;font-size: 15px;font-weight: 500;">{{ html_entity_decode($objQuest->name) }}</span>

                                                <ol class="alpha-list mt-3" style="list-style:none;" >
                                                   @foreach ($objQuest->options as $item)
                                                    <li class="mb-2">
                                                        <input type="radio" style="margin-right: 10px;" name="options" value="{{ $item->id}}" name="checked" />
                                                        {{  html_entity_decode($item->options) }}
                                                    </li>
                                                   @endforeach
                                                </ol>
                                            </li>
                                        </ol>
                                        <div class="col-md-12 float-right">
                                            &nbsp;&nbsp;&nbsp;
                                            <input id="next" type="submit" name="submit" class="btn btn-primary float-right"
                                             @if(session()->get('currQNo')== session()->get('maxQuestions'))
                                                 value="Finish" @else value="Next" @endif disabled  style="margin-top: 20px;" />
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('js/employee/assessment.js')}}" type="text/javascript"></script>
<script>
        var remTime = {!! Session::get('rem_time') !!};

        var currQRemTime  = 20;
        var timerID=startTimers(0.10);



</script>
@endsection
