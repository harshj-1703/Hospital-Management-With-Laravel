@include('doctor.navbar')
<title>Change Password</title>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						@include('doctor.profileslidebar')
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
										@if(session()->has('message'))
											<div class="alert alert-success">
											{{ session()->get('message') }}
											</div>
										@endif
											<!-- Change Password Form -->
											<form method="POST" action="{{url('/')}}/doctor/changepassword">
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
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
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
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
</html>