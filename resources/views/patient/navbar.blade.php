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
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
		<meta name="_token" content="{{csrf_token()}}" />
		
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
								<img src="{{url('/')}}/assets/img/logo.png"
								 class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="">
								<a href="{{url('/')}}/">Home</a>
							</li>
							<li class="has-submenu">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
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
								<p class="contact-info-header">+91 8128203856</p>
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
										<h6>{{session('patientname');}}</h6>
										<p class="text-muted mb-0">Patient</p>
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