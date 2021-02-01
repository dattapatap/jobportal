@extends('website.layout')
@section('content')
<section class="sptb">
    <div class="container">
        <div class="row ">
          
            @include('employee.dashboardLayout')
            <style>
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
            </style>
            <div class="col-lg-9 col-md-12 col-md-12">
                    <!-- Personal Details -->
                    <div class="card dropify-image-avatar">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Personal Details</h3>
                            <div class="card-options">
                                <a class="editPersonal btn" id="{{$employee->id}}" ><i class="fe fe-edit "></i></a>
							</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    @if( Auth::user()->avatar)
                                       <input type="file" data-default-file="{{ asset('storage/images/profiles/'. Auth::user()->avatar) }}"
                                         class="dropify" name="avatar" id="avatar" data-height="180"/>
                                    @else
                                       <input type="file" class="dropify" name="avatar" id="avatar" data-height="180"/>
                                    @endif                                    
                                </div>
                                <div class="col-lg-9">
                                    @if($employee)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label text-dark">First Name</label>
                                                <input type="text" value="{{ $employee->first_name }}" class="form-control" placeholder="Your Name" id="txtfirstname" name="txtfirstname" tabindex="1"
                                                disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Date of Birth</label>
                                                <input type="date" class="form-control" value="{{ ($employee->dob) }}" name="txtproffession" id="txtproffession" placeholder="Job Profession" tabindex="3"
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
                                                <input type="text" value="{{ ($employee->last_name) }}" class="form-control" name="txtlastname" id="txtlastname" placeholder="Last Name" tabindex="2"
                                                readonly disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-dark">Gender</label>
                                                <select name="gender" id="gender" disabled class="form-control" tabindex="3"> 
                                                    <option selected ="" value="0">select</option>
                                                    <option selected ="@if($employee->gender == '1'){'selected'}else{''} @endif" value="1">Male</option>
                                                    <option selected ="@if($employee->gender == '2'){'selected'}else{''} @endif" value="2">Female</option>
                                                    <option selected ="@if($employee->gender == '3'){'selected'}else{''} @endif" value="3">Transgender</option>
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
                                                <textarea value="{{ ($employee->address) }}" placeholder="Address" class="form-control" tabindex="7"
                                                readonly disabled>{{ ($employee->address) }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                   <!-- Career Details  -->
                   <div class="card" style="margin-bottom:0px;">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Career Details</h3>
                            <div class="card-options">
							     <a class="btn btn-light btn-sm btn-addCareer" href="#"><i class="fa fa-plus"></i> Add </a>
                            </div>
                        </div>
                    </div>
                     @if(!empty($educations))                        
                            @forelse ($educations as $edu)
                                <tr educatiuonId="{{ ($edu->id) }}">
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Institude Name</label>
                                                        <input type="text" class="form-control" value="{{ ($edu->institude_name) }}" id="txtInstitude_{{$count}}"
                                                            name="txtInstitude_0"  placeholder="Institude Name" disabled readonly>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Qualification</label>
                                                        <input type="text" value="{{ ($edu->qualification) }}" class="form-control" name="txtQualification_{{$count}}"
                                                            id="txtQualification_{{$count}}" placeholder="Qualification" readonly disabled >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" value="{{ ($edu->frm_date) }}" name="txtFrom_{{$count}}" id="txtFrom_{{$count}}" class="form-control txtFrom" 
                                                        readonly disabled>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" value="{{ ($edu->to_date) }}" name="txtTo_{{$count}}" id="txtTo_{{$count}}" class="form-control txtTo" 
                                                        readonly disabled>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">University</label>
                                                        <input type="text" value="{{ ($edu->university) }}" id="board_{{$count}}" name="board_{{$count}}" class="form-control"
                                                        readonly disabled>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Total Percent</label>
                                                        <input type="number" value="{{ ($edu->percent) }}" id="percent_{{$count}}" name="percent_{{$count}}" step="0.01" max="99.99" 
                                                            class="form-control" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count++ ?>
                            @empty
                                <!-- <tr educatiuonId="-1">
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Institude Name</label>
                                                        <input type="text" class="form-control" id="txtInstitude_0"
                                                            name="txtInstitude_0"  placeholder="Institude Name">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Qualification</label>
                                                        <input type="text" class="form-control" name="txtQualification_0"
                                                            id="txtQualification_0" placeholder="Qualification" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" name="txtFrom_0" id="txtFrom_0" class="form-control txtFrom" >
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" name="txtTo_0" id="txtTo_0" class="form-control txtTo" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">University</label>
                                                        <input type="text" id="board_0" name="board_0" class="form-control">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Total Percent</label>
                                                        <input type="number" id="percent_0" name="percent_0" step="0.01" max="99.99" 
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>  -->
                            @endforelse
                    @endif
                    <!-- Educations  -->
                    <div class="card" style="margin-bottom:0px;">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Education</h3>
                            <div class="card-options">
                                 <!-- <a class="btn btn-light btn-sm btn-addEducation" href=""><i class="fa fa-edit"></i> Edit</a> -->
							     <a class="btn btn-light btn-sm btn-addEducation" href="#"><i class="fa fa-plus"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                     @if($educations)                        
                            @forelse ($educations as $edu)
                                <tr educatiuonId="{{ ($edu->id) }}">
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Institude Name</label>
                                                        <input type="text" class="form-control" value="{{ ($edu->institude_name) }}" id="txtInstitude_{{$count}}"
                                                            name="txtInstitude_0"  placeholder="Institude Name" disabled readonly>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Qualification</label>
                                                        <input type="text" value="{{ ($edu->qualification) }}" class="form-control" name="txtQualification_{{$count}}"
                                                            id="txtQualification_{{$count}}" placeholder="Qualification" readonly disabled >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" value="{{ ($edu->frm_date) }}" name="txtFrom_{{$count}}" id="txtFrom_{{$count}}" class="form-control txtFrom" 
                                                        readonly disabled>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" value="{{ ($edu->to_date) }}" name="txtTo_{{$count}}" id="txtTo_{{$count}}" class="form-control txtTo" 
                                                        readonly disabled>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">University</label>
                                                        <input type="text" value="{{ ($edu->university) }}" id="board_{{$count}}" name="board_{{$count}}" class="form-control"
                                                        readonly disabled>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Total Percent</label>
                                                        <input type="number" value="{{ ($edu->percent) }}" id="percent_{{$count}}" name="percent_{{$count}}" step="0.01" max="99.99" 
                                                            class="form-control" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count++ ?>
                            @empty
                                <!-- <tr educatiuonId="-1">
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Institude Name</label>
                                                        <input type="text" class="form-control" id="txtInstitude_0"
                                                            name="txtInstitude_0"  placeholder="Institude Name">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Qualification</label>
                                                        <input type="text" class="form-control" name="txtQualification_0"
                                                            id="txtQualification_0" placeholder="Qualification" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" name="txtFrom_0" id="txtFrom_0" class="form-control txtFrom" >
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" name="txtTo_0" id="txtTo_0" class="form-control txtTo" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">University</label>
                                                        <input type="text" id="board_0" name="board_0" class="form-control">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Total Percent</label>
                                                        <input type="number" id="percent_0" name="percent_0" step="0.01" max="99.99" 
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>  -->
                            @endforelse
                     @endif
                    
                    <!-- Work Experience -->
                    <div class="card" style="margin-bottom:0px;">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Working Experience</h3>
                            <div class="card-options">
							    <a class="btn btn-light btn-sm btn-addExperience" href="#"><i class="fa fa-plus"></i> Add More</a>       
                            </div>
                        </div>
                    </div>
                    @if($experience)     
                        @forelse ($experience as $exp)
                            <tr experiance="{{ $exp->id }}">
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="form-label text-dark">Company Name</label>
                                                    <input type="text" value="{{ $exp->company_name}}" id="txtCompanyName_{{$counteexp}}" name="txtCompanyName_{{$counteexp}}" class="form-control"
                                                    readonly disabled >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label text-dark">Position/Role</label>
                                                    <input type="text" value="{{ $exp->position}}" name="txtPositionName_{{$counteexp}}" id="txtPositionName_{{$counteexp}}" class="form-control" 
                                                    readonly disabled>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <div class="row">
                                                    <div class="form-group col-2">
                                                        <label class="form-label text-dark">Current Company ?</label>
                                                        <label class="custom-control custom-checkbox mt-2 ml-5">
                                                            <input type="checkbox" class="custom-control-input expCheckBox" name="isCurrent_{{$counteexp}}" id="isCurrent_{{$counteexp}}" {{ ($exp->is_current == 1 ? ' checked' : '') }} 
                                                            readonly disabled>
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-5">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" value="{{ $exp->from_date}}" name="txtExpFrom_{{$counteexp}}" id="txtExpFrom_{{$counteexp}}"  class="form-control txtExpFrom"
                                                        readonly disabled>
                                                    </div>
                                                    <div class="form-group col-5">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" value="{{ $exp->to_date}}" name="txtExpTo_{{$counteexp}}" id="txtExpTo_{{$counteexp}}" class="form-control txtExpTo"
                                                        readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label class="form-label text-dark">Location</label>
                                                    <input type="text" value="{{ $exp->location}}" name="txtExpLocation_{{$counteexp}}" id="txtExpLocation_{{$counteexp}}" class="form-control" 
                                                    readonly disabled>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $counteexp++ ?>
                        @empty
                            <!-- <tr experiance="-1">
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="form-label text-dark">Company Name</label>
                                                    <input type="text" id="txtCompanyName_0" name="txtCompanyName_0" class="form-control" >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label text-dark">Position/Role</label>
                                                    <input type="text" name="txtPositionName_0" id="txtPositionName_0" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 10px;">
                                                <div class="row">
                                                    <div class="form-group col-2">
                                                        <label class="form-label text-dark">Current Company ?</label>
                                                        <label class="custom-control custom-checkbox mt-2 ml-5">
                                                            <input type="checkbox" class="custom-control-input expCheckBox" name="isCurrent_0" id="isCurrent_0">
                                                            <span class="custom-control-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-5">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" name="txtExpFrom_0" id="txtExpFrom_0"  class="form-control txtExpFrom">
                                                    </div>
                                                    <div class="form-group col-5">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" name="txtExpTo_0" id="txtExpTo_0" class="form-control txtExpTo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label class="form-label text-dark">Location</label>
                                                    <input type="text" name="txtExpLocation_0" id="txtExpLocation_0" class="form-control" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                        @endforelse

                    @endif                          
                    <!-- Skills -->
                    <div class="card">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Expertise And Knowledge Details(Skills)</h3>
                            <div class="card-options">
                                <!-- <a class="btn btn-light btn-sm " href="#"><i class="fa fa-edit"></i> Edit</a> -->
                                 &nbsp;&nbsp;
							    <a class="btn btn-light btn-sm btn-addSkills" href="#"><i class="fa fa-plus"></i> Add More</a>       
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group" style="margin-bottom: 10px;">
                                <!-- <label class="form-label">Professional Skills</label> -->
                                <!-- <select class="form-control" name="skills" id="skills" multiple="multiple"> -->
                                    <div class="col-12 display-inline">
                                    <ul>
                                        <!-- @forelse($skills as $skill) 
                                            <li style="width:45%"> {{$skill->description}} </li>
                                        @empty
                                            <li> NO Skills </li>
                                        @endforelse  -->

                                    </ul>

                                    </div>
                                    
                                   
                                <!-- </select> -->
                            </div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-header ">
                            <h3 class="card-title">Resume</h3>
                            <div class="card-options">
							    <a class="btn btn-light btn-sm btn-addResume" href="#"><iclass="fa fa-plus"></iclass=> Add More</a>       
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="form-group resume-upload">
                                <form action="resumeUpload" >                                
                                    <input type="file" id="file-upload" name="file-resume"/>
                                    <label for="file-upload" class="file-upload mb-0">Upload Resume</label>
                                    <div id="file-upload-filename"></div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </form>
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
                                <label class="form-label" for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                <span id="first_nameError" class="alert-message"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">
                                <span id="last_nameError" class="alert-message"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="First Name">  
                                <span id="dobError" class="alert-message"></span>                            
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label"  for="exampleInputEmail1">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                    <option value="Other">Other</option>
                                </select>    
                                <span id="genderError" class="alert-message"></span>                         
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" readonly>
                            <span id="emailError" class="alert-message"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            <span id="mobileError" class="alert-message"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
                            <span id="addressError" class="alert-message"></span>
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
                <h5 class="modal-title" id="example-Modal3">Edit Career Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="frmcareerdetail">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-label"  for="industry">Industry</label>
                            <select name="" id="" class="form-control">
                                <option selected>select industry</option>
                                <option value="1">Information Technology</option>
                                <option value="2">Infrastructure</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Role</label>
                            <input type="text" class="form-control" id="name2" placeholder="Software Developer">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-label"  for="industry">Job Type</label>
                            <select name="" id="" class="form-control">
                                <option selected>select type</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label class="form-label"  for="exampleInputEmail1">Year</label>
                            <select name="" id="" class="form-control">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label class="form-label"  for="exampleInputEmail1">Month</label>
                            <select name="" id="" class="form-control">
                                <option selected value="0">0</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Current CTC</label>
                            <input type="text" class="form-control" id="name1" placeholder="Amount">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Expected CTC</label>
                            <input type="text" class="form-control" id="name1" placeholder="Amount">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label class="form-label"  for="exampleInputEmail1">Prefered Location</label>
                            <select name="" id="" class="form-control">
                                <option selected>select location</option>
                                <option value="Male">Bangalore/Bengaluru</option>
                                <option value="Female">Chennai</option>
                                <option value="Transgender">Hydrabad</option>
                                <option value="Other">Pune</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>			
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
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
            <form>
                <div class="modal-body">
                    <div class="form-row">                
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Education</label>
                                    <input type="text" class="form-control" placeholder="Institude Name" >
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Course</label>
                                    <input type="text" class="form-control" placeholder="Qualification" >
                                </div>
                        </div>
                        <div class="form-group col-12">
                                <div class="form-group">
                                    <label class="form-label text-dark">Specification</label>
                                    <input type="text"  class="form-control txtFrom" >
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Institude</label>
                                    <input type="text"  class="form-control txtTo" >
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Course Type</label>
                                    <select class="form-control" id="" name="">
                                        <option selected> select type </option>
                                        <option > Full Time </option>
                                        <option > Part Time </option>
                                        <option > Corresponding </option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Passing Year</label>
                                    <input type="date" class="form-control" id="pass_year">
                                </div>
                        </div>	
                        <div class="form-group col-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Total Percent</label>
                                    <input type="number"  step="0.01" max="99.99" class="form-control">
                                </div>
                        </div>			
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
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
            <form>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Company Name</label>
                                <input type="text" id="txtCompanyName_0" name="txtCompanyName_0" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-dark">Position/Role</label>
                                    <input type="text" name="txtPositionName_0" id="txtPositionName_0" class="form-control" >
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="form-label text-dark">Current Company ?</label>
                                <label class="custom-control custom-checkbox mt-2 ml-5">
                                    <input type="checkbox" class="custom-control-input expCheckBox" name="isCurrent_0" id="isCurrent_0">
                                    <span class="custom-control-label">Yes</span>
                                </label>
                            </div>
                            <div class="form-group col-4">
                                    <label class="form-label text-dark">From</label>
                                    <input type="text" name="txtExpFrom_0" id="txtExpFrom_0"  class="form-control txtExpFrom">
                            </div>
                            <div class="form-group col-4">
                                <label class="form-label text-dark">To</label>
                                <input type="text" name="txtExpTo_0" id="txtExpTo_0" class="form-control txtExpTo">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Location</label>
                                <select class="form-control" id="">
                                    <option selected> location </option>
                                    <option selected> Bengaluru/Bangalore </option>
                                    <option selected> Mumbai </option>
                                    <option selected> Chennai </option>
                                    <option selected> Pune </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> Add </button>
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
            <form>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <div class="form-group skillsDiv">


                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Location</label>
                                <select class="form-control" id="">
                                    <option selected> location </option>
                                    <option selected> Bengaluru/Bangalore </option>
                                    <option selected> Mumbai </option>
                                    <option selected> Chennai </option>
                                    <option selected> Pune </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> Add </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--Resume -->
<div class="modal fade" id="resume" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 650px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Skills</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <div class="form-group skillsDiv">


                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Location</label>
                                <select class="form-control" id="">
                                    <option selected> location </option>
                                    <option selected> Bengaluru/Bangalore </option>
                                    <option selected> Mumbai </option>
                                    <option selected> Chennai </option>
                                    <option selected> Pune </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> Add </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Profile Pic -->
<div class="modal fade" id="profilepic" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 650px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Skills</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <div class="form-group skillsDiv">


                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Location</label>
                                <select class="form-control" id="">
                                    <option selected> location </option>
                                    <option selected> Bengaluru/Bangalore </option>
                                    <option selected> Mumbai </option>
                                    <option selected> Chennai </option>
                                    <option selected> Pune </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> Add </button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<!-- <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script> -->
<script src="{{ asset('js/employee/profile.js')}}"></script>
<!-- Latest compiled and minified CSS -->
@endsection
