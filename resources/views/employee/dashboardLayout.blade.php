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
        <div class="item1-links empdashboard mb-0">
            <a href="{{ route('employee.dashboard') }}" class="d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-user fs-20"></i></span> Dashboard
            </a>
            <a href="{{ route('employee.profile') }}" class="d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-edit fs-20"></i></span> Profile
            </a>
            <a href="{{ route('employee.savedjobs') }}" class=" d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> My Jobs
            </a>
            <a href="{{ url('employee/assessment') }}" class=" d-flex border-bottom">
                <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> Take Test
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
</div>
