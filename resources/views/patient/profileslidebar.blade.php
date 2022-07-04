<!-- Profile Sidebar -->
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ asset('/storage').'/'.session('profileimage')}}"
                    onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{session('patientname');}}</h3>
                    <div class="patient-details">
                        @if(session()->has('patientdob'))
                        <h5><i class="fas fa-birthday-cake"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d', session('patientdob'))->format('m-d-Y')}}</h5>
                        @endif
                        @if(session()->has('patientlocation'))
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{session('patientlocation');}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fas fa-columns"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    @if(Request::url() == 'http://127.0.0.1:8000/patient/dashboard')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('/')}}/patient/dashboard">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(Request::url() == 'http://127.0.0.1:8000/patient/favourite')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('/')}}/patient/favourite">
                            <i class="fas fa-bookmark"></i>
                            <span>Favourites</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="chat.html">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li> --}}
                    @if(Request::url() == 'http://127.0.0.1:8000/patient/profilesetting')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('/')}}/patient/profilesetting">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    @if(Request::url() == 'http://127.0.0.1:8000/patient/changepassword')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('/')}}/patient/changepassword">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/')}}/logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
<!-- / Profile Sidebar -->