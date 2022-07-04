<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Profile</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css">
    </head>
    <body>
	        @include('admin.navbar')
			<!-- /Header -->

			<!-- Sidebar -->
            @include('admin.slidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" style="object-fit: cover; width:120px; height:120px;" alt=""
											 src="{{ asset('/storage').'/'.session('adminprofile')}}"
											 onerror=this.src="{{url('/')}}/assets/img/default.png">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$admin->firstname." ".$admin->lastname}}</h4>
										<h6 class="text-muted">{{$admin->email}}</h6>
										@if($admin->country != null && $admin->state != null && $admin->city != null)
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{$admin->city}}, {{$admin->state}} , {{$admin->country}}</div>
										@endif
										<div class="about-text">This is an Admin account.</div>
									</div>
									<div class="col-auto profile-btn">
										
										<a href="#edit_personal_details" data-toggle="modal" class="btn btn-primary">
											Edit
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												@if(session()->has('message'))
												<div class="alert alert-success">
												{{ session()->get('message') }}
												</div>
												@endif
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10">{{$admin->firstname." ".$admin->lastname}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">{{date("d M,Y",strtotime($admin->dob))}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10">{{$admin->email}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10">+91 {{$admin->phoneno}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0">{{$admin->address}},<br>
														{{$admin->city}},<br>
														{{$admin->state}},<br>
														{{$admin->country}}.</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="{{url('/')}}/admin/profile/update" method="POST"
															 enctype="multipart/form-data" accept=".jpg, .jpeg, .png">
																@csrf
																<div class="row form-row">
																	<div class="col-12">
																		<span class="text-danger">
																			@error('file')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>Upload Profile Photo</label>
																			<div class="">
																				<input type="file" name="file" class="form-control">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('firstname')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" name="firstname" class="form-control" value="{{$admin->firstname}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('lastname')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text" name="lastname" class="form-control" value="{{$admin->lastname}}">
																		</div>
																	</div>
																	<div class="col-12">
																		<span class="text-danger">
																			@error('dob')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="">
																				<input type="date" name="dob" class="form-control" value="{{$admin->dob}}">
																			</div>
																		</div>
																	</div>
																	{{-- <div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" name="email" class="form-control" value="{{$admin->email}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" name="phoneno" value="+91 {{$admin->phoneno}}" class="form-control">
																		</div>
																	</div> --}}
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<span class="text-danger">
																			@error('address')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" name="address" class="form-control" value="{{$admin->address}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('city')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" name="city" class="form-control" value="{{$admin->city}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('state')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" name="state" class="form-control" value="{{$admin->state}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('pincode')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="number" name="pincode" class="form-control" value="{{$admin->pincode}}">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<span class="text-danger">
																			@error('country')
																			  {{$message}}
																			@enderror
																		</span>
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" name="country" class="form-control" value="{{$admin->country}}">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											@if(session()->has('pmessage'))
												<div class="alert alert-success">
												{{ session()->get('pmessage') }}
												</div>
											@endif
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="{{url('/')}}/admin/profile/password/update" method="POST">
														@csrf
														<span class="text-danger">
															@error('oldpassword')
															  {{$message}}
															@enderror
														</span>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="oldpassword" class="form-control">
														</div>
														<span class="text-danger">
															@error('newpassword')
															  {{$message}}
															@enderror
														</span>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="newpassword" class="form-control">
														</div>
														<span class="text-danger">
															@error('confirmpassword')
															  {{$message}}
															@enderror
														</span>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="confirmpassword" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{url('/')}}/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{url('/')}}/admin/assets/js/popper.min.js"></script>
        <script src="{{url('/')}}/admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('/')}}/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>
		
    </body>

</html>