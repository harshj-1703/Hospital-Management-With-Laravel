<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blogs</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">

    <!-- Theme CSS -->
    <link href="{{url('/')}}/assets/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('/')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' 
    rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">

    <style>
        .post-title{
            color: rgb(3, 13, 123);
        }
        .post-title:hover{
            color: rgb(15, 90, 220);
        }
    </style>
</head>

<body>

    @if(session()->has('adminid'))
    <!-- Header -->
    <div class="header">
			
        <!-- Logo -->
        <div class="header-left">
            <a href="#" class="logo">
                <img src="{{url('/')}}/admin/assets/img/logo.png" alt="Logo">
            </a>
        </div>
        <!-- /Logo -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">
            
            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="avatar-img rounded-circle" 
                        src="{{ asset('/storage').'/'.session('adminprofile')}}"  
                        onerror=this.src="{{url('/')}}/assets/img/default.png"
                        style="object-fit: cover; width:40px;height:40px" alt=""></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('/storage').'/'.session('adminprofile')}}" 
                            onerror=this.src="{{url('/')}}/assets/img/default.png"
                            style="object-fit: cover; width:40px;height:40px;" alt="" class="avatar-img rounded-circle">
                        </div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="user-text">
                            <h5>{{session('adminname')}}</h5>
                            <h6 style="font-weight: 100;">Administrator</h6>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{url('/')}}/admindashboard">Dashboard</a>
                    <a class="dropdown-item" href="{{url('/')}}/admin/profile">My Profile</a>
                    <a class="dropdown-item" href="{{url('/')}}/logout">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->
            
        </ul>
        <!-- /Header Right Menu -->
        
    </div>
    <!-- /Header -->
    @elseif(session()->has('drid'))
    <!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="#" class="navbar-brand logo">
							<img src="{{url('/')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="#" class="menu-logo">
								<img src="{{url('/')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
                        <ul class="main-nav">
							{{-- <li class="">
								<a href="{{url('/')}}/">Home</a>
							</li> --}}
							<li class="has-submenu">
								<a href="#" style="font-weight:900;">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="{{url('/')}}/doctor/dashboard">Doctor Dashboard</a></li>
									<li><a href="{{url('/')}}/doctor/appointments">Appointments</a></li>
									<li><a href="{{url('/')}}/doctor/timeschedules">Schedule Timing</a></li>
									<li><a href="{{url('/')}}/doctor/mypatients">Patients List</a></li>
									{{-- <li><a href="{{url('/')}}/doctor/timeschedules">Patients Profile</a></li> --}}
									{{-- <li><a href="chat-doctor.html">Chat</a></li> --}}
									<li><a href="{{url('/')}}/doctor/invoices">Invoices</a></li>
									<li><a href="{{url('/')}}/doctor/profilesetting">Profile Settings</a></li>
									<li><a href="{{url('/')}}/doctor/reviews">Reviews</a></li>
								</ul>
							</li>
							<li class="">
								<a href="{{url('/')}}/blogs" style="font-weight:900;">Blogs</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<h3 class="contact-header">Contact</h3>
								<h3 class="contact-info-header">+91 81282 03856</h3>
							</div>
						</li>
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{ asset('/storage').'/'.session('drprofileimage')}}"
									onerror=this.src="{{url('/')}}/assets/img/default.png" width="31" alt="{{session('drname')}}">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{ asset('/storage').'/'.session('drprofileimage')}}"
										onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{session('drname');}}</h6>
										<h4 class="text-muted mb-0">Doctor</h4>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('/')}}/doctor/dashboard">Dashboard</a>
								<a class="dropdown-item" href="{{url('/')}}/doctor/profilesetting">Profile Settings</a>
								<a class="dropdown-item" href="{{url('/')}}/logout">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
        @elseif(session()->has('patientid'))
        <!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="#" class="navbar-brand logo">
							<img src="{{url('/')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="#" class="menu-logo">
								<img src="{{url('/')}}/assets/img/logo.png"
								 class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="{{url('/')}}/" style="font-weight: bolder;">Home</a>
							</li>
							<li class="has-submenu">
								<a href="#" style="font-weight: bolder;">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									{{-- <li><a href="search.html">Search Doctor</a></li> --}}
									{{-- <li><a href="doctor-profile.html">Doctor Profile</a></li> --}}
									{{-- <li><a href="booking.html">Booking</a></li> --}}
									{{-- <li><a href="checkout.html">Checkout</a></li> --}}
									{{-- <li><a href="booking-success.html">Booking Success</a></li> --}}
									<li><a href="{{url('/')}}/patient/dashboard">Patient Dashboard</a></li>
									<li><a href="{{url('/')}}/patient/favourite">Favourites</a></li>
									{{-- <li><a href="chat.html">Chat</a></li> --}}
									<li><a href="{{url('/')}}/patient/profilesetting">Profile Settings</a></li>
									<li><a href="{{url('/')}}/patient/changepassword">Change Password</a></li>
								</ul>
							</li>
							<li class="">
								<a href="{{url('/')}}/blogs" style="font-weight: bolder;">Blogs</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<h3 class="contact-header">Contact</h3>
								<h3 class="contact-info-header">+91 8128203856</h3>
							</div>
						</li>
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img src="{{ asset('/storage').'/'.session('profileimage')}}"
									onerror=this.src="{{url('/')}}/assets/img/default.png"
									 width="31" alt="{{session('drname')}}" class="rounded-circle">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{ asset('/storage').'/'.session('profileimage')}}"
										 width="31" alt="{{session('drname')}}"
										 onerror=this.src="{{url('/')}}/assets/img/default.png" class="rounded-circle">
									</div>
									<div class="user-text">
										<h3>{{session('patientname');}}</h3>
										<h4 class="text-muted mb-0">Patient</h4>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('/')}}/patient/dashboard">Dashboard</a>
								<a class="dropdown-item" href="{{url('/')}}/patient/profilesetting">Profile Settings</a>
								<a class="dropdown-item" href="{{url('/')}}/logout">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->
        @else
        <!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="#" class="navbar-brand logo">
							<img src="{{url('/')}}/assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index-2.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="{{url('/')}}/" style="font-weight: bolder;">Home</a>
							</li>
							<li class="">
								<a href="{{url('/')}}/blogs" style="font-weight: bolder;">Blogs</a>
							</li>
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<h3 class="contact-header">Contact</h3>
								<h3 class="contact-info-header"> +91 81282 03856</h3>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="{{url('/')}}/login">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
        @endif

    <!-- Navigation -->
    {{-- <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(session()->has('drid'))
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('/')}}/doctor/dashboard" style="font-size: 25px;">
                                <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                    </ul>
                @elseif(session()->has('adminid'))
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('/')}}/admindashboard" style="font-size: 25px;">
                                <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('/')}}" style="font-size: 25px;">
                                <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                    </ul>
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> --}}

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <div class="intro-header" style="background-image: url('/assets/img/1.jpg');height:200px;
    line-height: 1.5;position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin: auto;position: absolute;top: -30%;">
                    <div class="site-heading" style="text-align: center;">
                        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blogs</h2>
                        <hr class="">
                        <span class="subheading">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Doctor And Admin Blogs For All</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container" style="width: 1400px;">
        <div class="row">
            <div class="col-md-8 col-sm-8" style="border: 5px solid rgb(230, 226, 226);overflow-y:scroll; height:700px;">
                @if($blogs != null)
                @foreach ($blogs as $blog)
                <div class="post-preview">
                    <a href="{{url('/')}}/blog/detail/{{$blog->id}}">
                        <h4 class="post-title" style="font-size: 30px;">
                            {{$blog->title}}
                        </h4>
                        {{-- <h3 class="post-subtitle" style="white-space: pre-wrap;">{{$blog->detail}}
                        </h3> --}}
                    </a>
                        @if(session()->has('adminid'))
                        <a href="{{url('/')}}/deleteblog/{{$blog->id}}" style="margin-left: 75%;color:red;">
                            <i class="fa fa-times"></i> DELETE BLOG
                        </a>
                        @elseif(session()->has('drid') && session('drid') == $blog->dr_id)
                        <a href="{{url('/')}}/deleteblogdr/{{$blog->id}}" style="margin-left: 75%;color:red;">
                            <i class="fa fa-times"></i> DELETE BLOG
                        </a>
                        @endif
                        <br>
                        @if(session()->has('adminid') && session('adminid') == $blog->admin_id)
                        <a href="{{url('/')}}/updateblog/{{$blog->id}}" style="margin-left: 75%;color:rgb(0, 255, 8);">
                            <i class="fa fa-edit"></i> UPDATE BLOG
                        </a>
                        @elseif(session()->has('drid') && session('drid') == $blog->dr_id)
                        <a href="{{url('/')}}/updateblogdr/{{$blog->id}}" style="margin-left: 75%;color:rgb(0, 255, 55);">
                            <i class="fa fa-edit"></i> UPDATE BLOG
                        </a>
                        @endif
                    @if($blog->dr_id != null)
                    <p class="post-meta">Posted by 
                        <a href="{{url('/')}}/doctor/profile/{{$blog->doctors->id}}" target="_blank">
                        Dr. {{$blog->doctors->firstname." ".$blog->doctors->lastname}}</a> on 
                        {{date('d M,Y',strtotime($blog->created_at))}}</p>
                    @endif
                    @if($blog->admin_id != null)
                    <p class="post-meta">Posted by <a href="#">
                        Admin. {{$blog->admins->firstname." ".$blog->admins->lastname}}</a> on 
                        {{date('d M,Y',strtotime($blog->created_at))}}</p>
                    @endif
                </div>
                <hr>
                @endforeach
                @endif
                
                <!-- Pager -->
                {{-- <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul> --}}
            </div>
            <div class="col-md-4" style="text-align:right;">
                <h2>Recent Blogs</h2>
                <hr>
                @if($rblog != null)
                @foreach($rblog as $rblog)
                    <a href="{{url('/')}}/blog/detail/{{$rblog->id}}" style="font-family: 'Times New Roman', Times, serif;
                        font-size:20px;">
                            {{$rblog->title}}
                    </a>
                    @if($rblog->dr_id != null)
                    <p style="font-family: 'Times New Roman', Times, serif;
                    font-size:12px;">Posted by 
                        <a href="{{url('/')}}/doctor/profile/{{$rblog->doctors->id}}" target="_blank">
                        Dr. {{$rblog->doctors->firstname." ".$rblog->doctors->lastname}}</a><br> on 
                        {{date('d M,Y',strtotime($rblog->created_at))}}</p>
                    @endif
                    @if($rblog->admin_id != null)
                    <p style="font-family: 'Times New Roman', Times, serif;
                    font-size:12px;">Posted by <a href="#">
                        Admin. {{$rblog->admins->firstname." ".$rblog->admins->lastname}}</a><br> on 
                        {{date('d M,Y',strtotime($rblog->created_at))}}</p>
                    @endif
                    <hr>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <hr>
    <!--Blog Write Form-->
    <div style="margin-left:10%;">
        @if(session()->has('drid'))
        <h1>Add Your Blog</h1>
            <form action="{{url('/')}}/blogs" method="POST">
                @csrf
                <div><span class="text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </span></div>
                <div class="form-group" style="width:500px;">
                    <label>Title of your blog</label><br>
                    <input type="hidden" value="{{session('drid')}}" name="drid">
                    <input class="form-control" name="title" type="text" 
                    placeholder="Write your blog title here" maxlength="100">
                </div><br>
                <div><span class="text-danger">
                    @error('detail')
                    {{$message}}
                    @enderror
                </span></div>
                <div class="form-group" style="width:500px;">
                    <label>Your blog description</label><br>
                    <textarea maxlength="500" name="detail" class="form-control"></textarea>
                </div>
                <div class="submit-section" style="text-align: left;">
                    <button type="submit" class="btn btn-secondary submit-btn">Add Review</button>
                </div>
                <hr>
            </form>

        @elseif(session()->has('adminid'))
        <h1>Add Your Blog</h1>
            <form action="{{url('/')}}/blogs" method="POST">
                @csrf
                <div><span class="text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </span></div>
                <div class="form-group" style="width: 500px;">
                    <label>Title of your blog</label><br>
                    <input type="hidden" value="{{session('adminid')}}" name="adminid">
                    <input class="form-control" name="title" type="text" 
                    placeholder="Write your blog title here" maxlength="50">
                </div><br>
                <div><span class="text-danger">
                    @error('detail')
                    {{$message}}
                    @enderror
                </span></div>
                <div class="form-group" style="width: 500px;">
                    <label>Your blog description</label><br>
                    <textarea maxlength="2000" name="detail" class="form-control"></textarea>
                </div>
                <div class="submit-section" style="text-align: left;">
                    <button type="submit" class="btn btn-secondary submit-btn">Add Blog</button>
                </div>
                <hr>
            </form>
        @endif
        <br>
    </div>
    <!--Blog Write Form-->

    <!-- Footer -->
    {{-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; HJ TECHS 2022</p>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- Footer -->
<footer class="footer">
    
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{url('/')}}/assets/img/footer-logo.png" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <h4 style="color: white;font-weight:500;font-size:15px;">
                                We have many high professional educated doctors and services. </h4>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                    
                </div>
                
                <div class="col-lg-3 col-md-6">
                
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Patients</h2>
                        <ul>
                            <li><a href="{{url('/')}}"><i class="fas fa-angle-double-right"></i> Search for Doctors</a></li>
                            <li><a href="{{url('/')}}/login"><i class="fas fa-angle-double-right"></i> Login</a></li>
                            <li><a href="{{url('/')}}/patientregistration"><i class="fas fa-angle-double-right"></i> Register</a></li>
                            {{-- <li><a href="booking.html"><i class="fas fa-angle-double-right"></i> Booking</a></li> --}}
                            {{-- <li><a href="patient-dashboard.html"><i class="fas fa-angle-double-right"></i> Patient Dashboard</a></li> --}}
                        </ul>
                    </div>
                    <!-- /Footer Widget -->
                    
                </div>
                
                <div class="col-lg-3 col-md-6">
                
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Doctors</h2>
                        <ul>
                            {{-- <li><a href="appointments.html"><i class="fas fa-angle-double-right"></i> Appointments</a></li> --}}
                            {{-- <li><a href="chat.html"><i class="fas fa-angle-double-right"></i> Chat</a></li> --}}
                            <li><a href="{{url('/')}}/login"><i class="fas fa-angle-double-right"></i> Login</a></li>
                            <li><a href="{{url('/')}}/doctorregistration"><i class="fas fa-angle-double-right"></i> Register</a></li>
                            {{-- <li><a href="doctor-dashboard.html"><i class="fas fa-angle-double-right"></i> Doctor Dashboard</a></li> --}}
                        </ul>
                    </div>
                    <!-- /Footer Widget -->
                    
                </div> 
                <div class="col-lg-3 col-md-6">
                
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contact Us</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <h4 style="color: white;font-weight:500;font-size:15px;"> India,<br> Gujrat , Rajkot </h4>
                            </div>
                            <h4 style="color: white;font-weight:500;font-size:15px;">
                                <i class="fas fa-phone-alt"></i>
                                +91 8128203856
                            </h4>
                            <h4 style="color: white;font-weight:500;font-size:15px;">
                                <i class="fas fa-envelope"></i>
                                harshj@gmail.com
                            </h4>
                        </div>
                    </div>
                    <!-- /Footer Widget -->
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Footer Top -->
    
    <!-- Footer Bottom -->
    {{-- <div class="footer-bottom">
        <div class="container-fluid"> --}}
        
            <!-- Copyright -->
            {{-- <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6"> --}}
                        {{-- <div class="copyright-text">
                            <p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
                        </div> --}}
                    {{-- </div>
                    <div class="col-md-6 col-lg-6"> --}}
                    
                        <!-- Copyright Menu -->
                        {{-- <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="https://www.hospitalmanagement.net/terms-and-conditions/">
                                    Terms and Conditions</a></li>
                                <li><a href="https://www.narayanahealth.org/privacy-policy">Policy</a></li>
                            </ul>
                        </div> --}}
                        <!-- /Copyright Menu -->
                        
                    {{-- </div>
                </div>
            </div> --}}
            <!-- /Copyright -->
            
        {{-- </div>
    </div> --}}
    <!-- /Footer Bottom -->
    
</footer>

    <!-- jQuery -->
    <script src="{{url('/')}}/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{url('/')}}/assets/js/jqBootstrapValidation.js"></script>
    <script src="{{url('/')}}/assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="{{url('/')}}/assets/js/clean-blog.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{url('/')}}/admin/assets/js/popper.min.js"></script>
    <script src="{{url('/')}}/admin/assets/js/bootstrap.min.js"></script>

</body>

</html>
