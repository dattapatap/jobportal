@extends('recruiter.layout.layout')
@section('content')
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Profile</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/employee')}}">Employee</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-5 col-xl-4">
                    <div class="card card-profile cover-image "
                        data-image-src="{{ asset('assets/images/photos/gradient3.jpg') }}">
                        <div class="card-body text-center">

                            @if ($user->user->avatar)
                            <img class="card-profile-img" src="{{ asset('storage/images/profiles/'. $user->user->avatar) }}" alt="img" style="max-width: 9rem;border-radius: 0%;margin-top: 8px;">
                            @else
                                <img class="card-profile-img" src="{{ asset('assets/images/users/male/25.jpg')}}" alt="img"  style="max-width: 9rem;border-radius: 0%;margin-top: 8px;">
                            @endif
                            <h3 class="mb-1 text-info">{{ $user->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <div class="table-responsive border">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-12 col-md-12 p5">
                                                <div class="col-12 p-1" style="text-align: center">
                                                    <h3 class="text-info mt-2"> Personal Info</h3>
                                                </div>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Name :</strong>
                                                        {{ $user->first_name . ' ' . $user->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>DOB :</strong> {{ $user->dob }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender :</strong> {{ $user->gender }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Email :</strong> {{ $user->user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone :</strong> {{ $user->user->mobile }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Address :</strong> {{ $user->address }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12">

                 <!-- Test Details  -->
                 <div class="card" style="margin-bottom:20px;">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title">Assessment Details</h3>
                    </div>
                    @if (isset($user->test) &&  !empty($user->test) )
                        <div class="cord-body">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <div class="table-responsive border">
                                        <div class="row-fluid">
                                            <ol>


                                               @forelse( $user->test->reverse() as $item )
                                                   <li>
                                                       <div class="col-md-12 mb-2 mt-2" style="height: 60px;">
                                                           <div class="row">
                                                               <div class="col-md-2 text-center" style="line-height: 50px;">
                                                                   <strong> {{ $loop->index +1 }} ATTEMPT</strong>
                                                               </div>
                                                               <div class="col-md-2 text-center">
                                                                    <strong> Test Date</strong>
                                                                    <br>
                                                                    <span>{{ $item->test_sheduled  }}</span>
                                                                </div>
                                                                <div class="col-md-2 text-center">
                                                                    <strong> Status </strong>
                                                                    <br>
                                                                    <span class="text-success"> {{ $item->status }} </span>
                                                                </div>
                                                              @if($item->status =="Scheduled")
                                                                   <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                       <span> ..... </span>
                                                                   </div>
                                                                   <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                        <span> ..... </span>
                                                                    </div>
                                                               @elseif($item->status =="Started")
                                                                   <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                        <span> ..... </span>
                                                                    </div>
                                                                    <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                        <span> ..... </span>
                                                                    </div>
                                                               @elseif($item->status =="Expired")
                                                                   <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                        <span> ..... </span>
                                                                    </div>
                                                                    <div class="col-md-3 text-center"  style="height: 60px;margin-top: 8px;">
                                                                        <span> ..... </span>
                                                                    </div>
                                                               @elseif($item->status =="Completed")
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
                                                        <p style="text-align: center">Looks like he have not given yet Test. </p>
                                                       </div>
                                                   </div>
                                               @endforelse
                                            </ol>
                                           </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="cord-body">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <p style="text-align: center">Looks like he have not given yet Test. </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>




                <!-- Career Details  -->
                <div class="card" style="margin-bottom:20px;">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title">Career Details</h3>
                    </div>
                    @if (isset($user->careers))
                        <div class="cord-body">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <div class="table-responsive border">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Industry :</strong> {{ $user->careers->industries->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Position :</strong> {{ $user->careers->positions->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>JOB Type :</strong> {{ $user->careers->job_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Location Prefered :</strong>
                                                        {{ $user->careers->locations->name }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Experience
                                                            :</strong> {{ $user->careers->experience_year . ' Years ' . $user->careers->experience_month . ' Months' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Current CTC :</strong>
                                                        {{ $user->careers->current_ctc . ' LPA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Expected CTC :</strong>
                                                        {{ $user->careers->expected_ctc . ' LPA' }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>

                <!-- Educations Details  -->
                <div class="card" style="margin-bottom:20px">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title"> Educations Details </h3>
                    </div>
                </div>
                @if (isset($user->educations))
                    @foreach ($user->educations as $item)
                        <div class="card mb-2" style="margin-top:-7px;">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <strong class="text-info" style="padding: 17px 0 0 10px;"> {{ $item->educ->name }}
                                    </strong>
                                    <div class="table-responsive border">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Education :</strong> {{ $item->educ->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Qualification :</strong> {{ $item->cour->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Specification :</strong> {{ $item->spec->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Institude :</strong> {{ $item->institude }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Course Type :</strong> {{ $item->coursetype }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Passing Year :</strong> {{ $item->passingyear }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tot Percent :</strong> {{ $item->percent }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- Experience Details --}}
                <div class="card" style="margin-bottom:20px;margin-top:30px">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title"> Working Experience </h3>
                    </div>
                </div>
                @if (isset($user->experience))
                    @foreach ($user->experience as $item)
                        <div class="card mb-2" style="margin-top:-7px;">
                            <div id="profile-log-switch">
                                <div class="fade show active ">
                                    <div class="table-responsive border">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Company : </strong> {{ $item->company_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Position : </strong> {{ $item->position }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Working From : </strong> {{ $item->from_date }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Working To : </strong>{{ $item->to_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Location : </strong>{{ $item->loations->name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- Skills --}}
                <div class="card" style="margin-bottom:20px;margin-top:30px">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title"> Expertise And Knowledge Details(Skills) </h3>
                    </div>
                    <div class="card-body">
                        @if(isset($user->userskills))
                            @foreach ($user->userskills as $item)
                                <i class="btn btn-outline-success mb-3"> {{ $item->userskills->description }} </a></i>&nbsp;&nbsp;&nbsp;
                            @endforeach
                        @endif
                    </div>
                </div>


                {{-- Resume Upload --}}
                <div class="card" style="margin-bottom:20px;margin-top:30px">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                    <div class="card-header ">
                        <h3 class="card-title"> Resume </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group resume-upload">
                            @if (isset($user->careers->resume))
                                <a class="fa fa-user"> {{ 'Resume' }}</a>
                                {{-- <a href="{{ URL::to('storage/files/resumes/' . $user->careers->resume) }}" target="_blank"
                                    class="float-right">
                                    <button class="btn"><i class="fa fa-download"></i> Download Resume</button>
                                </a> --}}
                                <a href="{{ url('recruiter/candidate/download/'.$user->id ) }}" class="text-dark float-right">
                                    <button class="btn btn-default mt-1 mb-1"><i class="fa fa-download"></i>&nbsp; Download Resume </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>
@endsection
