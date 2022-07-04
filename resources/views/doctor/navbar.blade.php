<!DOCTYPE html> 
<html lang="en">
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	
	<!-- Favicons -->
	<link href="{{url('/')}}/assets/img/favicon.png" rel="icon">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">
	
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/select2/css/select2.min.css">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="{{url('/')}}/assets/plugins/dropzone/dropzone.min.css">
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
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
								<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
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
								<a href="{{url('/')}}/blogs">Blogs</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header">+91 81282 03856</p>
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
										<p class="text-muted mb-0">Doctor</p>
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