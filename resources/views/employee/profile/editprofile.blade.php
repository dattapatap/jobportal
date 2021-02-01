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

            </style>
            <div class="col-lg-9 col-md-12 col-md-12">
                <form class="frmProfile" method="post" enctype="multipart/form-data" >
                @csrf
                    <!-- Personal Details -->
                    <div class="card dropify-image-avatar">
                        <div class="card-header ">
                            <h3 class="card-title">Personal Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    @if( Auth::user()->avatar)
                                       <input type="file" data-default-file="{{ asset('storage/images/profiles/'. Auth::user()->avatar) }}"
                                         class="dropify" name="avatar" id="avatar" data-height="180" required/>
                                    @else
                                       <input type="file" class="dropify" name="avatar" id="avatar" data-height="180" required/>
                                    @endif                                    
                                </div>
                                <div class="col-lg-9">
                                    @if($employee)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Name</label>
                                                    <input type="text" value="{{ $employee->first_name }}" class="form-control" placeholder="Your Name" id="txtfirstname" name="txtfirstname" tabindex="1"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Job Profession</label>
                                                    <input type="text" class="form-control" value="{{ ($employee->proffession) }}" name="txtproffession" id="txtproffession" placeholder="Job Profession" tabindex="3"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Email</label>
                                                    <input type="email" value="{{ ($user->email) }}" class="form-control" name="txnemail" id="txnemail" placeholder="Email" tabindex="5" >
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label text-dark">Current CTC</label>
                                                    <input type="text" value="{{ ($employee->current_ctc) }}"  class="form-control" name="txtcurrentctc" id="txtcurrentctc"  placeholder="In LPA" tabindex="7"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Location Prefered</label>
                                                    <input type="text" value="{{ ($employee->location_prefered) }}" class="form-control" name="txtlocationprefered" id="txtlocationprefered" placeholder="Prefered Location" tabindex="9"
                                                        >
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Last Name</label>
                                                    <input type="text" value="{{ ($employee->last_name) }}" class="form-control" name="txtlastname" id="txtlastname" placeholder="Last Name" tabindex="2"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Experience</label>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select style="width:100%" name="expYear"
                                                                class="form-control custom-select select2-show-search" tabindex="4"
                                                                value="{{ ($employee->experience_year) }}"  data-placeholder="Choose one (with searchbox)" id="expYear">
                                                                <option selected ="@if($employee->experience_year=='-1'){'selected'}else{''} @endif"  value="-1">Year</option>
                                                                <option selected ="@if($employee->experience_year=='0'){'selected'}else{''} @endif" value="0">0</option>
                                                                <option selected ="@if($employee->experience_year=='1'){'selected'}else{''} @endif" value="1">1</option>
                                                                <option selected ="@if($employee->experience_year=='2'){'selected'}else{''} @endif" value="2">2</option>
                                                                <option selected ="@if($employee->experience_year=='3'){'selected'}else{''} @endif" value="3">3</option>
                                                                <option selected ="@if($employee->experience_year=='4'){'selected'}else{''} @endif" value="4">4</option>
                                                                <option selected ="@if($employee->experience_year=='5'){'selected'}else{''} @endif" value="5">5</option>
                                                                <option selected ="@if($employee->experience_year=='6'){'selected'}else{''} @endif" value="6">6</option>
                                                                <option selected ="@if($employee->experience_year=='7'){'selected'}else{''} @endif" value="7">7</option>
                                                                <option selected ="@if($employee->experience_year=='8'){'selected'}else{''} @endif" value="8">8</option>
                                                                <option selected ="@if($employee->experience_year=='9'){'selected'}else{''} @endif" value="9">9</option>
                                                                <option selected ="@if($employee->experience_year=='10'){'selected'}else{''} @endif" value="10">10</option>
                                                                <option selected ="@if($employee->experience_year=='11'){'selected'}else{''} @endif" value="11">11</option>
                                                                <option selected ="@if($employee->experience_year=='12'){'selected'}else{''} @endif" value="12">12</option>
                                                                <option selected ="@if($employee->experience_year=='13'){'selected'}else{''} @endif" value="13">13</option>
                                                                <option selected ="@if($employee->experience_year=='14'){'selected'}else{''} @endif" value="14">14</option>
                                                                <option selected ="@if($employee->experience_year=='15'){'selected'}else{''} @endif" value="15">15</option>
                                                                <option selected ="@if($employee->experience_year=='16'){'selected'}else{''} @endif" value="15">16</option>
                                                                <option selected ="@if($employee->experience_year=='17'){'selected'}else{''} @endif" value="15">17</option>
                                                                <option selected ="@if($employee->experience_year=='18'){'selected'}else{''} @endif" value="15">18</option>
                                                                <option selected ="@if($employee->experience_year=='19'){'selected'}else{''} @endif" value="15">19</option>
                                                                <option selected ="@if($employee->experience_year=='20'){'selected'}else{''} @endif" value="15">20</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select style="width:100%" name="expMonth"
                                                                class="form-control custom-select select2-show-search"
                                                                data-placeholder="Choose one (with searchbox)" id="expMonth">
                                                                <option selected ="@if($employee->experience_month=='-1'){'selected'}else{''} @endif" value="-1">Month</option>
                                                                <option selected ="@if($employee->experience_month=='0'){'selected'}else{''} @endif" value="0">0</option>
                                                                <option selected ="@if($employee->experience_month=='1'){'selected'}else{''} @endif" value="1">1</option>
                                                                <option selected ="@if($employee->experience_month=='2'){'selected'}else{''} @endif" value="2">2</option>
                                                                <option selected ="@if($employee->experience_month=='3'){'selected'}else{''} @endif" value="3">3</option>
                                                                <option selected ="@if($employee->experience_month=='4'){'selected'}else{''} @endif" value="4">4</option>
                                                                <option selected ="@if($employee->experience_month=='5'){'selected'}else{''} @endif" value="5">5</option>
                                                                <option selected ="@if($employee->experience_month=='6'){'selected'}else{''} @endif" value="6">6</option>
                                                                <option selected ="@if($employee->experience_month=='7'){'selected'}else{''} @endif" value="7">7</option>
                                                                <option selected ="@if($employee->experience_month=='8'){'selected'}else{''} @endif" value="8">8</option>
                                                                <option selected ="@if($employee->experience_month=='9'){'selected'}else{''} @endif" value="9">9</option>
                                                                <option selected ="@if($employee->experience_month=='10'){'selected'}else{''} @endif" value="10">10</option>
                                                                <option selected ="@if($employee->experience_month=='11'){'selected'}else{''} @endif" value="11">11</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Phone Number</label>
                                                    <input type="number" value="{{ ($user->mobile) }}" class="form-control" name="txtphone" id="txtphone" placeholder="Your Number" tabindex="6"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Expected CTC</label>
                                                    <input type="text" value="{{ ($employee->expected_ctc) }}" class="form-control" name="txtexpectedctc" id="txtexpectedctc" placeholder="Expected CTC" tabindex="8"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Notice Period</label>
                                                    <select style="width:100%"  name="txtnoticeperiod" id="txtnoticeperiod" tabindex="10" aria-placeholder="Select Notice Period" class="form-control" > 
                                                            <option selected ="@if($employee->notice_period=='30'){'selected'}else{''} @endif" value="30">30 Days</option>
                                                            <option selected ="@if($employee->notice_period=='45'){'selected'}else{''} @endif" value="45">45 Days</option>
                                                            <option selected ="@if($employee->notice_period=='90'){'selected'}else{''} @endif" value="90">90 Days</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Name</label>
                                                    <input type="text" class="form-control" placeholder="Your Name" id="txtfirstname" name="txtfirstname" tabindex="1"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Job Profession</label>
                                                    <input type="text" class="form-control" name="txtproffession" id="txtproffession" placeholder="Job Profession" tabindex="3"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Email</label>
                                                    <input type="email"  class="form-control" name="txnemail" id="txnemail" placeholder="Email" tabindex="5" >
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label text-dark">Current CTC</label>
                                                    <input type="text"  class="form-control" name="txtcurrentctc" id="txtcurrentctc"  placeholder="In LPA" tabindex="7"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Location Prefered</label>
                                                    <input type="text"  class="form-control" name="txtlocationprefered" id="txtlocationprefered" placeholder="Prefered Location" tabindex="9"
                                                        >
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Last Name</label>
                                                    <input type="text"  class="form-control" name="txtlastname" id="txtlastname" placeholder="Last Name" tabindex="2"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Experience</label>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select style="width:100%" name="expYear"
                                                                class="form-control custom-select select2-show-search" tabindex="4"
                                                                data-placeholder="Choose one (with searchbox)" id="expYear">
                                                                <option   value="-1">Year</option>
                                                                <option  value="0">0</option>
                                                                <option  value="1">1</option>
                                                                <option  value="2">2</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <select style="width:100%" name="expMonth"
                                                                class="form-control custom-select select2-show-search"
                                                                data-placeholder="Choose one (with searchbox)" id="expMonth">
                                                                <option  value="-1">Month</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Phone Number</label>
                                                    <input type="number" class="form-control" name="txtphone" id="txtphone" placeholder="Your Number" tabindex="6"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Expected CTC</label>
                                                    <input type="text" class="form-control" name="txtexpectedctc" id="txtexpectedctc" placeholder="Expected CTC" tabindex="8"
                                                        >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-dark">Notice Period</label>
                                                    <select style="width:100%"  name="txtnoticeperiod" id="txtnoticeperiod" tabindex="10" aria-placeholder="Select Notice Period" class="form-control" > 
                                                            <option  value="30">30 Days</option>
                                                            <option  value="45">45 Days</option>
                                                            <option  value="90">90 Days</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Educations  -->
                    <div class="card" style="margin-bottom:0px;">
                        <div class="card-header ">
                            <h3 class="card-title">Education</h3>
                            <div class="card-options">
                                <a class="btn btn-light btn-sm btn-addeducation" href="javascript(0);"><i
                                        class="fa fa-plus"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <table class="table educations">
                        <tbody>
                        <?php $count = 0 ?>
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
                                                            name="txtInstitude_0"  placeholder="Institude Name">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Qualification</label>
                                                        <input type="text" value="{{ ($edu->qualification) }}" class="form-control" name="txtQualification_{{$count}}"
                                                            id="txtQualification_{{$count}}" placeholder="Qualification" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">From</label>
                                                        <input type="text" value="{{ ($edu->frm_date) }}" name="txtFrom_{{$count}}" id="txtFrom_{{$count}}" class="form-control txtFrom" >
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">To</label>
                                                        <input type="text" value="{{ ($edu->to_date) }}" name="txtTo_{{$count}}" id="txtTo_{{$count}}" class="form-control txtTo" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">University</label>
                                                        <input type="text" value="{{ ($edu->university) }}" id="board_{{$count}}" name="board_{{$count}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label text-dark">Total Percent</label>
                                                        <input type="number" value="{{ ($edu->percent) }}" id="percent_{{$count}}" name="percent_{{$count}}" step="0.01" max="99.99" 
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count++ ?>
                            @empty
                                <tr educatiuonId="-1">
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
                                </tr> 
                            @endforelse
                      
                        @else
                          <tr educatiuonId="-1">
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
                          </tr> 
                        @endif
                        </tbody>
                    </table>

                    <!-- Work Experience -->
                    <div class="card" style="margin-bottom:0px;">
                        <div class="card-header ">
                            <h3 class="card-title">Working Experience</h3>
                            <div class="card-options">
                                <a class="btn btn-light btn-sm addExperiance" href="javascript(0);"><i class="fa fa-plus"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <table class="table profile-experience">
                        <tbody>
                            <?php $counteexp = 0 ?>    
                            
                            @if($experience)
                                @forelse ($experience as $exp)
                                    <tr experiance="{{ $exp->id }}">
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label class="form-label text-dark">Company Name</label>
                                                            <input type="text" value="{{ $exp->company_name}}" id="txtCompanyName_{{$counteexp}}" name="txtCompanyName_{{$counteexp}}" class="form-control" >
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label class="form-label text-dark">Position/Role</label>
                                                            <input type="text" value="{{ $exp->position}}" name="txtPositionName_{{$counteexp}}" id="txtPositionName_{{$counteexp}}" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                        <div class="row">
                                                            <div class="form-group col-2">
                                                                <label class="form-label text-dark">Current Company ?</label>
                                                                <label class="custom-control custom-checkbox mt-2 ml-5">
                                                                    <input type="checkbox" class="custom-control-input expCheckBox" name="isCurrent_{{$counteexp}}" id="isCurrent_{{$counteexp}}" {{ ($exp->is_current == 1 ? ' checked' : '') }} >
                                                                    <span class="custom-control-label">Yes</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-5">
                                                                <label class="form-label text-dark">From</label>
                                                                <input type="text" value="{{ $exp->from_date}}" name="txtExpFrom_{{$counteexp}}" id="txtExpFrom_{{$counteexp}}"  class="form-control txtExpFrom">
                                                            </div>
                                                            <div class="form-group col-5">
                                                                <label class="form-label text-dark">To</label>
                                                                <input type="text" value="{{ $exp->to_date}}" name="txtExpTo_{{$counteexp}}" id="txtExpTo_{{$counteexp}}" class="form-control txtExpTo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label class="form-label text-dark">Location</label>
                                                            <input type="text" value="{{ $exp->location}}" name="txtExpLocation_{{$counteexp}}" id="txtExpLocation_{{$counteexp}}" class="form-control" >
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $counteexp++ ?>
                                @empty
                                    <tr experiance="-1">
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
                                    </tr>
                                @endforelse
                            @else
                            <tr experiance="-1">
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
                                    </tr>
                            @endif

                        </tbody>

                    </table>


                    <!-- Skills -->
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Expertise And Knowledge Details(Skills)</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group" style="margin-bottom: 10px;">
                                <label class="form-label">Professional Skills</label>
                                <select class="form-control" name="skills" id="skills" multiple="multiple">
                                    @forelse($skills as $skill) 
                                        <option value="{{$skill->id}}"  > {{ $skill->description}} </option>
                                    @empty
                                        <option value="-1">No Skills Available</option>
                                    @endforelse 
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Resume</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group resume-upload">
                                @if($employee)
                                    @if($employee->resume)
                                        <span> Resume - </span>
                                        <a href="{{ asset('storage/files/resumes/'. $employee->resume) }}" target="_new">{{ $employee->resume }} </a>
                                        <br><br>
                                        <input type="file" id="file-upload" name="file-resume"/>
                                        <label for="file-upload" class="file-upload mb-0">Upload New Resume</label>

                                    @else
                                        <input type="file" id="file-upload" name="file-resume"/>
                                        <label for="file-upload" class="file-upload mb-0">Upload Resume</label>
                                    @endif    
                                    <div id="file-upload-filename"></div>
                                @else
                                        <input type="file" id="file-upload" name="file-resume"/>
                                        <label for="file-upload" class="file-upload mb-0">Upload Resume</label>
                                        <div id="file-upload-filename"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="float-right mb-4 mb-lg-0">
                        <button class="btn btn-success w-150" type="submit">Update </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script src="{{ asset('js/employee/profile.js') }}"></script>
<script>
    $(function () {
        $('#skills').multipleSelect({
            multiple: true,
            multipleWidth: 60
        });
      })


</script>

@endsection
