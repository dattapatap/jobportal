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
                <div class="card dropify-image-avatar">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title">Skills Verification Test</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div id="content-wrapper" class="ic-Layout-contentWrapper">          
                                <div id="content" class="ic-Layout-contentMain" role="main">                          
                                                        
                                    <h2 class="text-info">
                                        Instructions
                                    </h2>
                                    <div class="row-fluid">
                                        <div id="quiz_details_wrapper" data-submitted-count=""></div>
                                    </div>
                                    <div class="row-fluid">                                                
                                            <base target="_top">
                                            <ul id="quiz_student_details">
                                                <li style="">
                                                <span class="title"> Total Questions </span> <span class="value"> 10 </span>
                                                </li> 
                                                <li>
                                                    <span class="title">Max Time Limit</span>
                                                        <span class="value">
                                                            10 Minutes
                                                        </span>
                                                </li>                                                            
                                            </ul>                        

                                            <div class="mt-5">
                                                <p>Before starting the test please update your profile with all category eg. career, educations, work exp., skills and resume with all requirements fields. becaus this test depend upon your skills and experience level</p>
                                                <p>Once test started, do not refresh the page, do not close the brouser.</p>
                    
                                                <p>This test consists of 10 multiple-choice questions.</p>
                                                <ul>
                                                    <li>
                                                    <strong>Multiple Attempts</strong> - You will have three attempts for this test with your highest score being recorded for next recruitment process.</li>
                                                    <li>
                                                    <strong>Timing</strong> - You will need to complete each of your attempts in one sitting, as you are allotted 10 minutes to complete each attempt.</li>
                                                    <li>
                                                    <strong>Questions</strong> - All Questions are mandatory. No negetive marks</li>
                                                </ul>
                                                <p class="mt-2">To start, click the <strong>"Satrt Test"</strong> button.</p>
                                            </div>
                                            
                                    </div>
                                    <p class="mt-2"> <input type="checkbox" id="terms" name="terms" class="form-contrtol"/> Accept terms and conditions  </p>        
                                    <div class="lock_explanation float-right">
                                        <a href="{{ url('employee/assessment/start')}}" id="btn-starttest" class="btn btn-primary disabled"> Start Test </a>
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


@endsection

@section('scripts')
<script>
    $("#terms").change(function() {       
        if($("#terms").prop('checked')){        
            console.log('checked');
            $("#btn-starttest").removeClass('disabled');
        }else{
            $("#btn-starttest").addClass('disabled');
        }
    });
</script>
@endsection
