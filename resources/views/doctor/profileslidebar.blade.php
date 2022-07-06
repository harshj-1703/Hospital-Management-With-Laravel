<!-- Profile Sidebar -->
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{ asset('/storage').'/'.session('drprofileimage')}}" alt=""
                onerror=this.src="{{url('/')}}/assets/img/default.png">
            </a>
            <div class="profile-det-info">
                <h3>{{session('drname');}}</h3>
                
                <div class="patient-details">
                    <h5 class="mb-0">{{session('drspecialist');}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li>
                    <a href="{{url('/')}}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/dashboard')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/dashboard">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/appointments')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/appointments">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/lastappointments')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/lastappointments">
                        <i class="fas fa-calendar-check"></i>
                        <span>Last Appointments</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/mypatients')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/mypatients">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/timeschedules')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/timeschedules">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/invoices')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/invoices">
                        <i class="fas fa-file-invoice"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/reviews')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/reviews">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="chat-doctor.html">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li> --}}
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/profilesetting')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/profilesetting">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/socialmedia')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/socialmedia">
                        <i class="fas fa-share-alt"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                @if(Request::url() == 'http://127.0.0.1:8000/doctor/changepassword')
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('/')}}/doctor/changepassword">
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
<!-- /Profile Sidebar -->