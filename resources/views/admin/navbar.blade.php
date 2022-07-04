<?php date_default_timezone_set("Asia/Calcutta");?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css">
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="#" class="logo">
						<img src="{{url('/')}}/admin/assets/img/logo.png" alt="Logo">
					</a>
					<a href="#" class="logo logo-small">
						<img src="{{url('/')}}/admin/assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->

				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<?php $count = App\Models\Notification::count(); ?>
							<i class="fe fe-bell"></i> <span class="badge badge-pill">{{$count}}</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="{{url('/')}}/admin/clearnotifications" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									@if($notification != null)
									@foreach($notification as $notification)
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
													onerror=this.src="{{url('/')}}/assets/img/default.png" 
													src="{{ asset('/storage').'/'.$notification->patients->profileimage}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{$notification->patients->firstname." ".$notification->patients->lastname}}</span> Scheduled 
														<span class="noti-title">appointment</span> with<span class="noti-title"> Dr. 
															{{$notification->doctors->firstname." ".$notification->doctors->lastname}}</span> Paided
														<span class="noti-title">${{$notification->paidamount}}</span></p>
													<p class="noti-time"><span class="notification-time">
														<?php $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
														$from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at); ?>
														{{$diff_in_minutes = $to->diffInMinutes($from);}}
														mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									@endforeach
									@endif
								</ul>
							</div>
							{{-- <div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div> --}}
						</div>
					</li>
					<!-- /Notifications -->
					
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
								<div class="user-text">
									<h6>{{session('adminname')}}</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="{{url('/')}}/admindashboard">Dashboard</a>
							<a class="dropdown-item" href="{{url('/')}}/admin/profile">My Profile</a>
							{{-- <a class="dropdown-item" href="settings.html">Settings</a> --}}
							<a class="dropdown-item" href="{{url('/')}}/logout">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->