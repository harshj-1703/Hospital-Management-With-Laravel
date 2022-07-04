<!DOCTYPE html> 
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link type="image/x-icon" href="{{url('/')}}/assets/img/favicon.png" rel="icon">
		<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
		<meta name="_token" content="{{csrf_token()}}" />
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
							<a href="index-2.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="{{url('/')}}/">Home</a>
							</li>
							<li class="">
								<a href="{{url('/')}}/blogs">Blogs</a>
							</li>
							{{-- <li class="has-submenu">
								<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									<li><a href="appointments.html">Appointments</a></li>
									<li><a href="schedule-timings.html">Schedule Timing</a></li>
									<li><a href="my-patients.html">Patients List</a></li>
									<li><a href="patient-profile.html">Patients Profile</a></li>
									<li><a href="chat-doctor.html">Chat</a></li>
									<li><a href="invoices.html">Invoices</a></li>
									<li><a href="doctor-profile-settings.html">Profile Settings</a></li>
									<li><a href="reviews.html">Reviews</a></li>
								</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="search.html">Search Doctor</a></li>
									<li><a href="doctor-profile.html">Doctor Profile</a></li>
									<li><a href="booking.html">Booking</a></li>
									<li><a href="checkout.html">Checkout</a></li>
									<li><a href="booking-success.html">Booking Success</a></li>
									<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									<li><a href="favourites.html">Favourites</a></li>
									<li><a href="chat.html">Chat</a></li>
									<li><a href="profile-settings.html">Profile Settings</a></li>
									<li><a href="change-password.html">Change Password</a></li>
								</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="voice-call.html">Voice Call</a></li>
									<li><a href="video-call.html">Video Call</a></li>
									<li><a href="search.html">Search Doctors</a></li>
									<li><a href="calendar.html">Calendar</a></li>
									<li><a href="components.html">Components</a></li>
									<li class="has-submenu">
										<a href="invoices.html">Invoices</a>
										<ul class="submenu">
											<li><a href="invoices.html">Invoices</a></li>
											<li><a href="invoice-view.html">Invoice View</a></li>
										</ul>
									</li>
									<li><a href="blank-page.html">Starter Page</a></li>
									{{-- <li><a href="login.html">Login</a></li> --}}
									{{-- <li><a href="register.html">Register</a></li> --}}
									{{--<li><a href="forgot-password.html">Forgot Password</a></li>
								</ul>
							</li>
							<li>
								<a href="{{url('/')}}/adminview/" target="_blank">Admin</a>
							</li> --}}
							{{-- <li>
								<a href="{{url('/')}}/login">Login</a>
							</li> --}}
							{{-- <li class="login-link">
								<a href="login.html">Login / Signup</a>
							</li> --}}
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +91 81282 03856</p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="{{url('/')}}/login">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
        </div>
		<script>
			function getSearchRecord(param1='', param2='', param3='', param4='', param5='', param6=''){
				$('#search').empty();
				$.ajax({
					type: "POST",
					url: "{{ \URL::to('patient/searchAjax') }}",
					data:{param1:param1,param2:param2,param3:param3,param4:param4,param5:param5,param6:param6},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					},
					success: function(html){
						$("#search").append(html);
					}
				});
			}
		</script>
    </body>
</html>