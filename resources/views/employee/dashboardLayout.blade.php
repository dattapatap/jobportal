<div class="col-xl-3 col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Dashboard</h3>
        </div>
        <div class="card-body text-center item-user border-bottom">
            <div class="profile-pic">
                <div class="profile-pic-img">
                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
                    @if( Auth::user()->avatar)
                        <img src="{{ asset('storage/images/profiles/'. Auth::user()->avatar) }}" class="brround"
                                alt="user">
                    @else
                        <img src="{{ asset('assets/images/users/male/25.jpg') }}" class="brround"
                            alt="user">
                    @endif
                </div>
                <a href="userprofile.html" class="text-dark">
                    <h4 class="mt-3 mb-0 font-weight-semibold">{{ Auth::user()->name }}</h4>
                </a>
            </div>
        </div>
        <div class="item1-links  mb-0">
            <a href="{{ route('employee.dashboard') }}" class="active d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-user fs-20"></i></span> Dashboard
            </a>
            <a href="{{ route('employee.profile') }}" class="d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-edit fs-20"></i></span> Profile
            </a>
            <a href="{{ route('employee.profile') }}" class=" d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> My Jobs
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex">
                <span class="icon1 mr-2"><i class="typcn typcn-power-outline fs-20"></i></span> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <div class="card my-select">
        <div class="card-header">
            <h3 class="card-title">Search Sutaible Jobs</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select name="country" id="select-countries" class="form-control custom-select select2-show-search"
                    style="width:100%">
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
