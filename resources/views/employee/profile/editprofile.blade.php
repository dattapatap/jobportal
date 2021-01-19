@extends('website.layout')
@section('content')
<section class="sptb">
    <div class="container">
        <div class="row ">
            <div class="col-xl-3 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Dashboard</h3>
                    </div>
                    <div class="card-body text-center item-user border-bottom">
                        <div class="profile-pic">
                            <div class="profile-pic-img">
                                <span class="bg-success dots" data-toggle="tooltip" data-placement="top"
                                    title="online"></span>
                                <img src="{{ asset('assets/images/users/male/25.jpg') }}"
                                    class="brround" alt="user">
                            </div>
                            <a href="userprofile.html" class="text-dark">
                                <h4 class="mt-3 mb-0 font-weight-semibold">{{ Auth::user()->name }}</h4>
                            </a>
                        </div>
                    </div>
                    <div class="item1-links  mb-0">
                        <a href="mydash.html" class="active d-flex border-bottom">
                            <span class="icon1 mr-2"><i class="typcn typcn-edit fs-20"></i></span> Edit Profile
                        </a>
                        <a href="myjobs.html" class=" d-flex border-bottom">
                            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> My Jobs
                        </a>
                        <a href="myfavorite.html" class="d-flex border-bottom">
                            <span class="icon1 mr-2"><i class="typcn typcn-heart-outline fs-20"></i></span> My Favorite
                        </a>
                        <a href="manged.html" class="d-flex  border-bottom">
                            <span class="icon1 mr-2"><i class="typcn typcn-folder fs-20"></i></span> Managed Jobs
                        </a>
                        <a href="login.html" class="d-flex">
                            <span class="icon1 mr-2"><i class="typcn typcn-power-outline fs-20"></i></span> Logout
                        </a>
                    </div>
                </div>
                <div class="card my-select">
                    <div class="card-header">
                        <h3 class="card-title">Search Sutaible Jobs</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select name="country" id="select-countries"
                                class="form-control custom-select select2-show-search">
                                <option value="1" selected="">All Categories</option>
                                <option value="2">Web Security</option>
                                <option value="3">Offline</option>
                                <option value="4">Business</option>
                                <option value="5">Online</option>
                                <option value="6">Data Science</option>
                                <option value="7">Driving</option>
                                <option value="8">Education</option>
                                <option value="9">Electronics</option>
                                <option value="10">Pets &amp; Offline</option>
                                <option value="11">Computer</option>
                                <option value="12">Mobile</option>
                                <option value="13">Events</option>
                                <option value="14">Python</option>
                                <option value="15">Security Hacking</option>
                            </select>
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-block btn-primary">Search</a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-9 col-md-12 col-md-12">

                <!-- Personal Details -->
                <div class="card dropify-image-avatar">
                    <div class="card-header ">
                        <h3 class="card-title">Personal Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 mb-4 mb-lg-0">
                                <input type="file" class="dropify"
                                    data-default-file="{{ asset('assets/images/users/avatar.png') }}"
                                    data-height="180" />
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name</label>
                                            <input type="text" class="form-control" placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Job Profession</label>
                                            <input type="text" class="form-control" placeholder="Job Profession"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Email</label>
                                            <input type="email" class="form-control" placeholder="Email" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label text-dark">Current CTC</label>
                                            <input type="text" class="form-control" placeholder="Your Number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Location Prefered</label>
                                            <input type="text" class="form-control" placeholder="Your Number" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Last Name</label>
                                            <input type="text" class="form-control" placeholder="last Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Experience</label>
                                            <div class="row gutters-xs">
                                                <div class="col-6">
                                                    <select class="form-control custom-select select2-show-search"
                                                        data-placeholder="Choose one (with searchbox)">
                                                        <option value="0">Year</option>
                                                        <option value="1">0</option>
                                                        <option value="2">1</option>
                                                        <option value="3">2</option>
                                                        <option value="4">3</option>
                                                        <option value="5">4</option>
                                                        <option value="6">5</option>
                                                        <option value="7">6</option>
                                                        <option value="8">7</option>
                                                        <option value="9">8</option>
                                                        <option value="10">9</option>
                                                        <option value="11">10</option>
                                                        <option value="12">11</option>
                                                        <option value="12">12</option>
                                                        <option value="12">13</option>
                                                        <option value="12">14</option>
                                                        <option value="12">15</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <select class="form-control custom-select select2-show-search"
                                                        data-placeholder="Choose one (with searchbox)">
                                                        <option value="0">Month</option>
                                                        <option value="1">0</option>
                                                        <option value="2">1</option>
                                                        <option value="3">2</option>
                                                        <option value="4">3</option>
                                                        <option value="5">4</option>
                                                        <option value="6">5</option>
                                                        <option value="7">6</option>
                                                        <option value="8">7</option>
                                                        <option value="9">8</option>
                                                        <option value="10">9</option>
                                                        <option value="11">10</option>
                                                        <option value="12">11</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Phone Number</label>
                                            <input type="text" class="form-control" placeholder="Your Number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Expected CTC</label>
                                            <input type="text" class="form-control" placeholder="Your Number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-dark">Notice Period</label>
                                            <input type="text" class="form-control" placeholder="Your Number" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Educations  -->
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Education</h3>
                        <div class="card-options">
                            <a class="btn btn-light btn-sm btn-addeducation" href="javascript(0);" ><i class="fa fa-plus"></i> Add Another</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label text-dark">School Name</label>
                                <input type="text" class="form-control" placeholder="School Name" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label text-dark">Qualification</label>
                                <input type="text" class="form-control" placeholder="Qualification" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark">Period</label>
                            <div class="row gutters-xs">
                                <div class="col-6">
                                    <select class="form-control custom-select select2-show-search"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option value="0">Since</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-control custom-select select2-show-search"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option value="0">Untill</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label text-dark">Board</label>
                                <select class="form-control custom-select select2-show-search"
                                    data-placeholder="Choose one (with searchbox)">
                                    <option value="0">University</option>
                                    <option value="0">Mitchel Knights University</option>
                                    <option value="0">Stephaine Dear University</option>
                                    <option value="0">Jasmin Garay University</option>
                                    <option value="0">Janetta Leister University</option>
                                    <option value="0">Alethia Barberio University</option>
                                    <option value="0">Basil Bard University</option>
                                    <option value="0">Ella Boeke University</option>
                                    <option value="0">Setsuko Speece University</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label text-dark">Total Percent</label>
                                <input type="number" id="percent" name="percent" class="form-control" step="0.01"
                                    pattern="[0-9]+([\.,][0-9]+)?">
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Work Experience -->
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Working Experience</h3>
                        <div class="card-options">
                            <a class="btn btn-light btn-sm" href="#"><i class="fa fa-plus"></i> Add Another</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label text-dark">School Name</label>
                                <input type="text" class="form-control" placeholder="School Name" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label text-dark">Qualification</label>
                                <input type="text" class="form-control" placeholder="Qualification" required>
                            </div>

                        </div>
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label class="form-label text-dark">Period</label>
                            <div class="row gutters-xs">
                                <div class="col-6 ">
                                    <select class="form-control custom-select select2-show-search"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option value="0">Since</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                </div>
                                <div class="col-6 ">
                                    <select class="form-control custom-select select2-show-search"
                                        data-placeholder="Choose one (with searchbox)">
                                        <option value="0">Untill</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills -->
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Expertise And Knowledge Details(Skills)</h3>
                        <div class="card-options">
                            <!-- <a class="btn btn-light btn-sm" href="#"><i class="fa fa-plus"></i> Add Another</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label class="form-label">Professional Skills</label>
                            <select class="form-control select2-no-search" data-placeholder="Choose Browser" multiple>
                                <option value="Java">Java</option>
                                <option value="C">C</option>
                                <option value="C++">C++</option>
                                <option value="Core Java">Core Java</option>
                                <option value="Advanced Java">Advanced Java</option>
                                <option value="Bootstrap">Bootstrap</option>
                                <option value="HTML" selected>HTML</option>
                                <option value="CSS">CSS</option>
                                <option value="Jquery">Jquery</option>
                                <option value="Angular">Angular</option>
                                <option value=".net">.net</option>
                                <option value="php">php</option>
                                <option value="phython">phython</option>
                                <option value="React js">React js</option>
                                <option value="Wordpress">Wordpress</option>
                                <option value="Angular js">Angular js</option>
                                <option value="Sap">Sap</option>
                                <option value="Java Script">Java Script</option>
                                <option value="HTML 5">HTML 5</option>
                                <option value="CSS 3">CSS 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Upload Resume</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group resume-upload">
                            <form class="d-flex">
                                <input type="file" id="file-upload" multiple required />
                                <label for="file-upload" class="file-upload mb-0">Upload Resume</label>
                                <div id="file-upload-filename"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="float-right mb-4 mb-lg-0">
                    <a class="btn btn-success w-150" href="#">Finish</a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/employee/profile.js') }}"></script>
@endsection