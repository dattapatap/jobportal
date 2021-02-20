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
                        <h3 class="card-title">Take Skills Verification Test</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">          
                                <div class="col-md-12">    
                                    <h2 class="text-info text-center">
                                        <br><br>
                                        Thank you for taking the test.
                                    </h2>
                                    <br>
                                    <p>
                                        <center>Our HR will get in touch with you. </center>
                                    </p>
                                   
                                    <br>                               
                                    <div class="lock_explanation float-right">
                                        <a href="{{ url('employee/assessment')}}" id="btn-starttest" class="btn btn-primary"> Back To Result</a>
                                    </div>
                                    <br>
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
