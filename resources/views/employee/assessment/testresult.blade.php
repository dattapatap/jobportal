@extends('website.layout')
@section('content')
<section class="sptb">
    <style>
       .alert-message {
            color: red;
        }
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: 87.5%;
            color: #ff382b;
        }
        .disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')
            <div class="col-lg-9 col-md-12 col-md-12">
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
                <div class="card dropify-image-avatar">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title">Take Skills Verification Test</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <h2 class="text-info">
                                       Your Test Result
                                    </h2>
                                    <br>
                                    <div class="row-fluid">
                                     <ol>
                                        @forelse ($testGiven->reverse() as $item)
                                            <li>
                                                <div class="col-md-12 mb-2 mt-2" style="height: 60px;">
                                                    <div class="row">
                                                        <div class="col-md-2 text-center" style="line-height: 50px;">
                                                            <strong> {{ $loop->index +1 }} ATTEMPT</strong>
                                                        </div>
                                                        @if($item->status =="Scheduled")
                                                            <div class="col-md-4 text-center">
                                                                <strong> Test Date</strong>
                                                                <br>
                                                                <span>{{ $item->test_sheduled .' '.Carbon\Carbon::parse($item->slots->from)->format('g:i A').' TO '.Carbon\Carbon::parse($item->slots->to)->format('g:i A') }}</span>
                                                            </div>
                                                            <div class="col-md-3 text-center">
                                                                <strong> Remaining Time </strong>
                                                                <br>
                                                                <span class="remTime"> {{$item->test_sheduled}} </span>
                                                            </div>
                                                            <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                <button href="#" class="btn btn-primary btn-sm  float-right" disabled> Take Test </button>
                                                            </div>
                                                        @elseif($item->status =="Started")
                                                                <div class="col-md-4 text-center">
                                                                    <strong> Test Date</strong>
                                                                    <br>
                                                                    <span>{{ $item->test_sheduled  }}</span>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <strong> Status </strong>
                                                                    <br>
                                                                    <span class="text-info"> {{  $item->status }} </span>
                                                                </div>
                                                                <div class="col-md-2 text-center" >
                                                                    <strong> Expire In </strong>
                                                                    <br>
                                                                    <span class="expiryIn"> {{ Carbon\Carbon::parse( $testGiven[0]->test_sheduled.' '.$testGiven[0]->slots->to)->format('Y-m-d h:i A')}}  </span>
                                                                </div>

                                                                <div class="col-md-2"  style="height: 60px;margin-top: 8px;">
                                                                    <a href="{{ url('employee/assessment/start') }}" class="btn btn-primary btn-sm  float-right"> Take Test </a>
                                                                </div>
                                                        @elseif($item->status =="Expired")
                                                                <div class="col-md-4 text-center">
                                                                    <strong> Test Date</strong>
                                                                    <br>
                                                                    <span>{{ $item->test_sheduled .' '.Carbon\Carbon::parse($item->slots->from)->format('g:i A').' TO '.Carbon\Carbon::parse($item->slots->to)->format('g:i A') }}</span>
                                                                </div>
                                                                <div class="col-md-3 text-center">
                                                                    <strong> Status </strong>
                                                                    <br>
                                                                    <span class="text-danger"> {{ $item->status }} </span>
                                                                </div>
                                                                <div class="col-md-3 text-center">

                                                                </div>
                                                        @elseif($item->status =="Completed")
                                                                <div class="col-md-2 text-center">
                                                                    <strong> Test Date</strong>
                                                                    <br>
                                                                    <span>{{ $item->test_sheduled }}</span>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <strong> Status </strong>
                                                                    <br>
                                                                    <span class="text-success"> {{ $item->status }} </span>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <strong> Tot Marks </strong>
                                                                    <br>
                                                                    @php $score=0;  @endphp
                                                                    @foreach ($item->testquestions as $opt)
                                                                           @php
                                                                            if(isset($opt->answeres->marks)){
                                                                                $score = $score + $opt->answeres->marks ;
                                                                            }
                                                                           @endphp
                                                                    @endforeach
                                                                    <span class="text-success"> {!! $score .'/20' !!} </span>
                                                                </div>
                                                                <div class="col-md-3 text-center">
                                                                    <strong> Ranking/Category </strong>
                                                                    <br>
                                                                    @php
                                                                        $totPercents = round(($score/20)*100 , 2);
                                                                        if($totPercents < 40 )
                                                                            $category = '<span class="text-danger">Need Improvement</span>';
                                                                        elseif($totPercents >= 40 && $totPercents < 65 )
                                                                            $category = '<span class="text-warning">Good</span>';
                                                                        elseif($totPercents >= 65 && $totPercents < 90 )
                                                                            $category = '<span class="text-info">Excellent</span>';
                                                                        elseif($totPercents >= 90  )
                                                                           $category = '<span class="text-success">Outstanding</span>';
                                                                    @endphp
                                                                    <span class="text-success"> {!! $category !!} </span>
                                                                </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <div class="col-md-12">
                                                <div class="mt-5 ml-10">
                                                    <p style="margin-left:-45px;">Looks like you have not given yet Test, Please update your profile and take the self assessment test for further process. </p>
                                                </div>
                                            </div>
                                        @endforelse
                                     </ol>
                                    </div>
                                    <br>
                                    <div class="lock_explanation float-right">
                                        @if(count($testGiven) < 3)
                                            @if(isset($totPercents))
                                                @if($totPercents <= 40)
                                                    @if( count($testGiven)==0||$testGiven[0]->status=="Expired"||$testGiven[0]->status=="Completed")
                                                        <button class="btn btn-primary btn-scheduleTest"> Schedule Test </button>
                                                    @endif
                                                @endif
                                            @else
                                                 @if( count($testGiven)==0||$testGiven[0]->status=="Expired"||$testGiven[0]->status=="Completed")
                                                        <button class="btn btn-primary btn-scheduleTest"> Schedule Test </button>
                                                    @endif

                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="schedule" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 500px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Schedule Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('employee/assessment/schedule')}}" id="frmSchedule">
                @csrf
                <div class="modal-body">
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Test Date</label>
                                <input type="date" name="testdate" id="testdate" class="form-control" value="{{ old('testdate')}}">
                                @error('testdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Test Slot Time</label>
                                <select class="form-control select2" id="testslot" name="testslot" >
                                    <option selected value=""> select test slot </option>
                                    @foreach ($testSlots as $item)
                                        <option value="{{ $item->id}}" @if( old('testslot')==$item->id)selected @endif > {{Carbon\Carbon::parse($item->from)->format('g:i A')." To ". Carbon\Carbon::parse($item->to)->format('g:i A') }}</option>
                                    @endforeach
                                </select>
                                @error('testslot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Schedule </button>
                </div>
            </form>
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
    $('.btn-scheduleTest').click(function(e){
        $('#schedule').modal('show');
    });
    @if(count($errors) > 0)
         $('#schedule').modal('show');
    @endif

        $(function(){
           setInterval(function(){
                        @if(isset($testGiven[0]->test_sheduled)  && $testGiven[0]->status=="Scheduled" )
                            date_future = new Date("{{Carbon\Carbon::parse( $testGiven[0]->test_sheduled.' '.$testGiven[0]->slots->from)->format('Y-m-d h:i A')}}");
                            date_now = new Date();
                            seconds = Math.floor((date_future - (date_now))/1000);
                            if(seconds <= 0){
                                var test = "{{$testGiven[0]->status}}";
                                if(test=="Scheduled"){
                                    updateTestStatus("Started");
                                }
                            }
                            minutes = Math.floor(seconds/60);
                            hours = Math.floor(minutes/60);
                            days = Math.floor(hours/24);
                            hours = hours-(days*24);
                            minutes = minutes-(days*24*60)-(hours*60);
                            seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);
                            $(".remTime").text(days.pad(2) + ":" + hours.pad(2) + ":" + minutes.pad(2) + ":" + seconds.pad(2));

                        @endif
                },1000);
        });

        $(function(){
            setInterval(function(){
                     @if(isset($testGiven[0]->test_sheduled)  && $testGiven[0]->status=="Started" )
                        date_future = new Date("{{ Carbon\Carbon::parse( $testGiven[0]->test_sheduled.' '.$testGiven[0]->slots->to)->format('Y-m-d h:i: A')}}");
                        date_now = new Date();
                        seconds = Math.floor((date_future - (date_now))/1000);
                        if(seconds <= 0){
                            var test = "{{$testGiven[0]->status}}";
                            if(test=="Started"){
                                updateTestStatus("Expired");
                            }
                        }
                        minutes = Math.floor(seconds/60);
                        hours = Math.floor(minutes/60);
                        days = Math.floor(hours/24);
                        hours = hours-(days*24);
                        minutes = minutes-(days*24*60)-(hours*60);
                        seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);
                        $(".expiryIn").text(hours.pad(2) + ":" + minutes.pad(2) + ":" + seconds.pad(2));
                    @endif
                },1000);
        });

        function updateTestStatus(val){
            $.ajax({
                type: "POST",
                url: '{{ URL::to('/employee/assessment/updateTestStatus')}}',
                data:{ status : val},
                cache: false,
                success: function(response) {
                    console.log(response);
                    if(response.status==true){
                        location.reload();
                    }
                } ,
                error:function(e){
                    console.log(e.responseText);
                }
             });
        }

        Number.prototype.pad = function(size) {
            var s = String(this);
            while (s.length < (size || 2)) {s = "0" + s;}
            return s;
        }
</script>
@endsection
