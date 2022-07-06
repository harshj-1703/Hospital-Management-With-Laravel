@include('patient.navbar')
<title>Profile Setting</title>
			<!-- Favicons -->
		<link href="{{url('/')}}/assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/plugins/select2/css/select2.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/patient/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						@include('patient.profileslidebar')
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									@if(session()->has('message'))
									<div class="alert alert-success">
									{{ session()->get('message') }}
									</div>
									@endif
									
									<!-- Profile Settings Form -->
									<form action="{{url('/')}}/patient/profilesetting" enctype="multipart/form-data" method="POST">
										@csrf
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{ asset('/storage').'/'.$userinfo->profileimage}}"
															onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="profileimage" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('firstname')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="firstname" class="form-control" value="{{$userinfo->firstname}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('lastname')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="lastname" class="form-control" value="{{$userinfo->lastname}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('dob')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="form-group">
														<input type="date" name="dob" class="form-control" value="{{$userinfo->dob}}">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<span class="text-danger">
													@error('gender')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control select" name="gender">
														<option>Select</option>
														<option value="M"
														@if($userinfo->gender == 'M')
														selected='selected'
														@endif
														>Male</option>
														<option value="F"
														@if($userinfo->gender == 'F')
														selected='selected'
														@endif
														>Female</option>
														<option value="O"
														@if($userinfo->gender == 'O')
														selected='selected'
														@endif
														>Other</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('groupofblood')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select" name="groupofblood">
														<option>Select</option>
														<option value="A-"
														@if($userinfo->groupofblood == 'A-')
														selected='selected'
														@endif
														>A-</option>
														<option value="A+"
														@if($userinfo->groupofblood == 'A+')
														selected='selected'
														@endif
														>A+</option>
														<option value="B-"
														@if($userinfo->groupofblood == 'B-')
														selected='selected'
														@endif
														>B-</option>
														<option value="B+"
														@if($userinfo->groupofblood == 'B+')
														selected='selected'
														@endif
														>B+</option>
														<option value="AB-"
														@if($userinfo->groupofblood == 'AB-')
														selected='selected'
														@endif
														>AB-</option>
														<option value="AB+"
														@if($userinfo->groupofblood == 'AB+')
														selected='selected'
														@endif
														>AB+</option>
														<option value="O-"
														@if($userinfo->groupofblood == 'O-')
														selected='selected'
														@endif
														>O-</option>
														<option value="O+"
														@if($userinfo->groupofblood == 'O+')
														selected='selected'
														@endif
														>O+</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<label class="form-control" style="background-color:rgba(198, 201, 203, 0.463)">{{$userinfo->email}}</label>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<label class="form-control" style="background-color:rgba(198, 201, 203, 0.463)">{{$userinfo->phoneno}}</label>
												</div>
											</div>
											<div class="col-12">
												<span class="text-danger">
													@error('address')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
												<label>Address</label>
													<input type="text" name="address" class="form-control" value="{{$userinfo->address}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('city')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" class="form-control" value="{{$userinfo->city}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('state')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>State</label>
													<input type="text" name="state" class="form-control" value="{{$userinfo->state}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('pincode')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" name="pincode" class="form-control" value="{{$userinfo->pincode}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<span class="text-danger">
													@error('country')
													  {{$message}}
													@enderror
												</span>
												<div class="form-group">
													<label>Country</label>
													<input type="text" name="country" class="form-control" value="{{$userinfo->country}}">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
			@include('doctor.footer')
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="{{url('/')}}/assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{url('/')}}/assets/js/moment.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>
</html>