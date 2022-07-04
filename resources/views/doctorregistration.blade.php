@include('layout.navbar')
<title>Doctor Registration</title>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{url('/')}}/assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="{{url('/')}}/patientregistration">Not a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="{{url('/')}}/doctorregistration" method="POST">
                                            @csrf
                                            <div><span class="text-danger">
                                                @error('username')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group form-focus">
												<input type="text" name="username" class="form-control floating" value="{{old('username')}}">
												<label class="focus-label">User Name</label>
											</div>
                                            <div><span class="text-danger">
                                                @error('phoneno')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group form-focus">
												<input type="text" name="phoneno" class="form-control floating" maxlength="10" value="{{old('phoneno')}}">
												<label class="focus-label">Mobile Number</label>
											</div>
                                            <div><span class="text-danger">
                                                @error('email')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating" value="{{old('email')}}">
												<label class="focus-label">Email</label>
											</div>
                                            <div><span class="text-danger">
                                                @error('password')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating">
												<label class="focus-label">Create Password</label>
											</div>
                                            <div><span class="text-danger">
                                                @error('confirmpassword')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
                                            <div class="form-group form-focus">
												<input type="password" name="confirmpassword" class="form-control floating">
												<label class="focus-label">Confirm Password</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{url('/')}}/login">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">Signup</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div><br><br>
			<!-- /Page Content -->
   
			@include('doctor.footer')
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-register.html  30 Nov 2019 04:12:16 GMT -->
</html>