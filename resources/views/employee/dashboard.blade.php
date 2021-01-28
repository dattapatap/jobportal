@extends('website.layout')
@section('content')
<section class="sptb">
    <div class="container">
        <div class="row ">
      
             @include('employee.dashboardLayout')

            <div class="col-lg-9 col-md-12 col-md-12">
                <div class="card dropify-image-avatar">
                    <div class="card-header ">
                        <h3 class="card-title">Personal Data</h3>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
