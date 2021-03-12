@extends('website.layout')
@section('content')
<section class="sptb">
    <style>
       .select2-results__option[aria-selected=true] {
        display: none;
        }
        .table td {
            padding: 0px;
        }
        .ms-choice{
            width: 0px !important;
            height: 0px !important;
        }
        .ms-drop ul>li.multiple {
            display: block;
            float: left;
            width: 50% !important;
        }
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



    </style>

    <div class="container">
        <div class="row ">
            @include('employee.dashboardLayout')
            <style>


            </style>
            <div class="col-lg-9 col-md-12 col-md-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-warning">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <!-- Personal Details -->
                    <div class="card dropify-image-avatar">
                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                            <div class="card-header ">
                                <h3 class="card-title">Personal Details</h3>
                                <div class="card-options">
                                    <a class="editPersonal btn" id="{{$user->employee->id}}" ><i class="fe fe-edit "></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 mb-4" style="text-align: center">

                                        @if(Auth::user()->avatar)
                                        <img class="card-profile-img" src="{{ asset('storage/images/profiles/'.Auth::user()->avatar) }}" alt="img" style="max-width: 9rem;">
                                        @else
                                            <img class="card-profile-img" src="{{ asset('assets/images/users/male/25.jpg')}}" alt="img" style="max-width: 9rem;">
                                        @endif
                                        <a href="#" class="btn btn-primary btn-sm mt-2 btnProfilePic"><i class="fa fa-pencil" aria-hidden="true"></i> Edit profile</a>
                                    </div>
                                    <div class="col-lg-9">
                                        @if($user->employee)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">First Name</label>
                                                    <input type="text" value="{{ $user->employee->first_name }}" class="form-control" placeholder="Your Name" id="txtfirstname" name="txtfirstname" tabindex="1"
                                                    disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Date of Birth</label>
                                                    <input type="date" class="form-control" value="{{ ($user->employee->dob) }}" name="txtproffession" id="txtproffession" placeholder="Job Profession" tabindex="3"
                                                    readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Email</label>
                                                    <input type="email" value="{{ (Auth::user()->email) }}" class="form-control" name="txnemail" id="txnemail" placeholder="Email"
                                                    tabindex="5" readonly disabled >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Last Name</label>
                                                    <input type="text" value="{{ ($user->employee->last_name) }}" class="form-control" name="txtlastname" id="txtlastname" placeholder="Last Name" tabindex="2"
                                                    readonly disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Gender</label>
                                                    <select name="gender" id="gender" disabled class="form-control" tabindex="3" readonly>
                                                        <option selected ="" value="0"> </option>
                                                        <option  @if($user->employee->gender == 'Male') selected @endif>Male</option>
                                                        <option  @if($user->employee->gender == 'Female') selected @endif>Female</option>
                                                        <option  @if($user->employee->gender == 'Transgender') selected @endif>Transgender</option>
                                                        <option  @if($user->employee->gender == 'Other') selected @endif>Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Phone Number</label>
                                                    <input type="number" value="{{ (Auth::user()->mobile) }}" class="form-control" name="txtphone" id="txtphone"
                                                    placeholder="Your Number" tabindex="6" readonly disabled >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Address</label>
                                                    <textarea value="{{ ($user->employee->address) }}" placeholder="Address" class="form-control" tabindex="7"
                                                    readonly disabled>{{ ($user->employee->address) }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- Career Details  -->
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Career Details</h3>
                            <div class="card-options">
                                @if(!$emp->careers)
							      <a class="btn btn-success btn-sm btn-addCareer"><i class="fa fa-plus"></i> Add </a>
                                @else
                                  <a class="editCareer btn" id="{{$emp->careers->id}}" ><i class="fe fe-edit "></i></a>
                                @endif
                            </div>
                        </div>
                        @if( isset($emp->careers))
                        <div class="cord-body">
                            <div id="profile-log-switch">
                                <div class="fade show active " >
                                    <div class="table-responsive border">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Industry :</strong> {{ $emp->careers->industries->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Position :</strong> {{ $emp->careers->positions->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>JOB Type :</strong> {{ $emp->careers->job_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Location Prefered :</strong> {{ $emp->careers->locations->name }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-2">
                                                <tr>
                                                    <td><strong>Experience :</strong>{{ $emp->careers->experience_year .'Yers '. $emp->careers->experience_month .' Months' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Current CTC :</strong> {{ $emp->careers->current_ctc .' LPA' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Expected CTC :</strong> {{ $emp->careers->expected_ctc .' LPA' }} </td>
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
                            <div class="card-options">
                                @if(!$emp->educations)
                                <a class="btn btn-sm btn-success btn-addEducation" ><i class="fa fa-plus"></i> Add </a>
                                @else
                                <a class="btn btn-sm btn-success btn-addEducation" ><i class="fa fa-plus"></i> Add More</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(isset($emp->educations))
                        @foreach ($emp->educations as $item)
                        <div class="card mb-2" style="margin-top:-7px;">
                            <div id="profile-log-switch">
                                <div class="fade show active " >
                                    <strong class="text-info" style="padding: 17px 0 0 10px;"> {{  $item->educ->name }}  </strong>
                                    <a class="btn btn-light btn-sm btn-editEducation pull-right" id="{{$item->id}}"><i class="fa fa-edit"></i></a>
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
                                                    <td><strong>Course Type :</strong>{{ $item->coursetype }}</td>
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
                            <div class="card-options">
                                @if(!$emp->experience)
                                   <a class="btn btn-sm btn-success btn-addExperience"><i class="fa fa-plus"></i> Add </a>
                                @else
                                   <a class="btn btn-sm btn-success btn-addExperience"><i class="fa fa-plus"></i> Add More</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(isset($emp->experience))
                       @foreach ($emp->experience as $item)
                       <div class="card mb-2" style="margin-top:-7px;">
                            <div id="profile-log-switch">
                                <div class="fade show active " >
                                    <a class="btn btn-light btn-sm btn-editExperience pull-right" id="{{$item->id}}"><i class="fa fa-edit"></i></a>
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
                            <div class="card-options">
                                @if(!$emp->skills)
                                   <a class="btn btn-sm btn-success btn-addSkills" ><i class="fa fa-plus"></i> Add </a>
                                @else
                                   <a class="btn btn-sm btn-success btn-addSkills" ><i class="fa fa-plus"></i> Add More</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($emp->userskills as $item)
                               <i class="btn btn-outline-success mb-3" >{{ $item->userskills->description }} <a id="{{ $item->id }}" class="fa fa-times skilldelete" style="position: relative;top: -10px;left: 7px;"></a></i>&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>


                    {{-- Resume Upload --}}
                    <div class="card" style="margin-bottom:20px;margin-top:30px">
                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title"> Resume </h3>
                            <div class="card-options">
                                @if(!isset($emp->careers->resume))
                                   <a class="btn btn-success btn-sm btn-addResume"><i class="fa fa-plus"></i> Add </a>
                                @else
                                   <a class="btn btn-success btn-sm btn-addResume" ><i class="fa fa-plus"></i> Add New</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group resume-upload">
                                @if(isset($emp->careers->resume))
                                   <a class="fa fa-user"> {{ "Resume"}}</a>
                                   <a href="{{URL::to('storage/files/resumes/'.$emp->careers->resume)}}" target="_blank" class="float-right" >
                                        <button class="btn"><i class="fa fa-download"></i> Download Resume</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>


<!-- Persanal Details -->
<div class="modal fade" id="personalDetails" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 600px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Personal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="frmProfile">
            @csrf
                <div class="modal-body">
                    <input type="hidden" id="emp_id" name="emp_id" value="-1">
                    <div  class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                <span class="invalid-feedback" role="alert" id="first_nameError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" class="form-control" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">
                                <span class="invalid-feedback" role="alert" id="last_nameError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="DoB">
                                <span class="invalid-feedback" role="alert" id="dobError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label"  for="exampleInputEmail1">Gender</label>
                                <select name="gender" id="gender" class="form-control" style="width: 100%">
                                    <option selected value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="genderError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" readonly>
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            <span class="invalid-feedback" role="alert" id="mobileError">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2"></textarea>
                            <span class="invalid-feedback" role="alert" id="addressError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-saveprofile">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Career Details -->
<div class="modal fade" id="careerDetails" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 600px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add Career Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="frmcareerdetail">
               @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" id="career_id" name="career_id" value="-1">

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label"  for="industry">Industry</label>
                                <select name="industry" id="industry" class="form-control" style="width: 100%">
                                    <option selected value="">select industry</option>
                                    @foreach ($industry as $item)
                                        <option value="{{ $item->id}}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="industryError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="position">Position</label>
                                <select name="position" id="position" class="form-control">
                                    <option selected value="">select position</option>
                                    @foreach ($positions as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="industryError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label"  for="JobType">Job Type</label>
                                <select name="jobtype" id="jobtype" class="form-control" width="100%">
                                    <option selected value="">select type</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Freelancer">Freelancer</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="industryError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label class="form-label"  for="year">Exp Year</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="" selected>Year</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="10+">10+</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="yearError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label class="form-label"  for="month">Exp Month</label>
                                <select name="month" id="month" class="form-control">
                                    <option selected value="">Months</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="12">11</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="monthError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="currctc">Current CTC</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="currctc" name="currctc" placeholder="Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            LPA
                                        </div>
                                    </div>
                                </div>
                                <span class="invalid-feedback" role="alert" id="currctcError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="expctc">Expected CTC</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="expctc" name="expctc" placeholder="Amount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            LPA
                                        </div>
                                    </div>
                                </div>
                                <span class="invalid-feedback" role="alert" id="expctcError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label"  for="location">Prefered Location</label>
                                <select name="location" id="location" class="form-control">
                                    <option selected value="">select location</option>
                                    @foreach ($city as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="locationError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnCareer"> Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Educations Details -->
<div class="modal fade" id="educationDetails" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 600px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Education Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="frmEducation"  >
                <div class="modal-body">
                    <input type="hidden" id="edu_id" name="edu_id" value="-1">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Education</label>
                                    <select name="education" id="education" class="form-control select2">
                                        <option selected value="">select education</option>
                                        @foreach ($education as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="educationError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Course</label>
                                    <select name="qualification" id="qualification" class="form-control select2">
                                        <option selected value="">select course</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="qualificationError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-12">
                                <div class="form-group">
                                    <label class="form-label text-dark">Specification</label>
                                    <select  name="specification" id="specification" class="form-control select2">
                                        <option selected value="">select specification</option>

                                    </select>
                                    <span class="invalid-feedback" role="alert" id="specificationError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Institude</label>
                                    <input type="text"  class="form-control" name="institude" id="institude" >
                                    <span class="invalid-feedback" role="alert" id="institudeError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Course Type</label>
                                    <select class="form-control" id="courseType" name="courseType">
                                        <option value="" selected> select type </option>
                                        <option value="Full Time" > Full Time </option>
                                        <option value="Part Time"> Part Time </option>
                                        <option value="Corresponding" > Corresponding </option>
                                    </select>
                                    <span class="invalid-feedback" role="alert" id="courseTypeError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Passing Year</label>
                                    <input type="text" class="form-control" id="passingyear" name="passingyear">
                                    <span class="invalid-feedback" role="alert" id="passingyearError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Total Percent</label>
                                    <div class="input-group">
                                        <input type="number" name="percent" id="percent" min="0" step="0.01" class="form-control">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                %
                                            </div>
                                        </div>

                                    </div>
                                    <span class="invalid-feedback" role="alert" id="percentError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btneducations"> Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Experience Details -->
<div class="modal fade" id="expDetails" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 600px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Experience Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="frmExp"  >
                <div class="modal-body">
                    <div class="form-row">

                        <input type="hidden" name="exp_id" value="-1" id="exp_id">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Company Name</label>
                                <input type="text" id="company" name="company" class="form-control" >
                                <span class="invalid-feedback" role="alert" id="companyError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Position/Role</label>
                                    <input type="text" name="expposition" id="expposition" class="form-control" >
                                    <span class="invalid-feedback" role="alert" id="exppositionError">
                                        <strong></strong>
                                    </span>
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="form-label text-dark">Current Company ?</label>
                                <label class="custom-control custom-checkbox mt-2 ml-5">
                                    <input type="checkbox" class="custom-control-input expCheckBox" name="iscutrrent" id="iscutrrent">
                                    <span class="custom-control-label">Yes</span>
                                </label>
                            </div>
                            <div class="form-group col-4">
                                    <label class="form-label text-dark">From</label>
                                    <input type="text" name="from" id="from"  class="form-control datepicker">
                                    <span class="invalid-feedback" role="alert" id="fromError">
                                        <strong></strong>
                                    </span>
                            </div>
                            <div class="form-group col-4">
                                <label class="form-label text-dark">To</label>
                                <input type="text" name="to" id="to" class="form-control datepicker">
                                <span class="invalid-feedback" role="alert" id="toError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                                <label class="form-label text-dark">Location</label>
                                <select class="form-control select2" id="explocation" name="explocation" aria-required="true">
                                    <option value="" selected>select location </option>
                                    @foreach ($city as $item)
                                       <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="explocationError">
                                    <strong></strong>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary addexp"> Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Skill Details -->
<div class="modal fade" id="skillDetails" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 650px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Skills</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="frmSkills">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Top Skills</label>
                                <select class="form-control select2" id="empskills" name="empskills"  multiple required>
                                    @foreach ($skills as $item)
                                        <option value="{{ $item->id}}"> {{ $item->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Add </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!--Resume -->
<div class="modal fade" id="resumeModel" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 650px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Upload Resume</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmResume" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Resume</label>
                                <input type="file" name="empresume" id="empresume" class="form-control" required>
                                <span class="invalid-feedback" role="alert" id="empresumeError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Upload </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Profile Pic -->
<div class="modal fade" id="profilepic" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 350px !important;min-width:300px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Upload Profile Pictute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="profileupload" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="">
                                <input type="file" name="profile_pic" id="profile_pic" class="dropify" data-height="180" required />
                                <span id="image-input-error" style="color: red;font-size:12px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"> Upload </button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<!-- <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/employee/profile.js')}}"></script>

@endsection
