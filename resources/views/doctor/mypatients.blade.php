@include('doctor.navbar')
<title>My Patients</title>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Patients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Patients</h2>
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
						
							<!-- Profile Sidebar -->
							@include('doctor.profileslidebar')
							<!-- /Profile Sidebar -->
							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="row row-grid">
                            
                                @foreach($patients as $app)
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="{{ asset('/storage').'/'.$app->patients->profileimage}}" alt="User Image"
														onerror=this.src="{{url('/')}}/assets/img/default.png">
													</a>
													<div class="profile-det-info">
														<h3><a href="#">{{$app->patients->firstname." ".$app->patients->lastname}}</a></h3>
														
														<div class="patient-details">
															{{-- <h5><b>Patient ID :</b> P0016</h5> --}}
                                                            @if($app->patients->city != null)
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$app->patients->city.",".$app->patients->state.",".$app->patients->country}}</h5>
                                                            @else
                                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Not defined</h5>
                                                            @endif
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+91 {{$app->patients->phoneno}}</span></li>
                                                    @if($app->patients->dob != null && $app->patients->dob != null)
													<li>Age <span>{{\Carbon\Carbon::parse($app->patients->dob)->diff(\Carbon\Carbon::now())->y}} Years, 
                                                        @if($app->patients->gender == "M")
                                                        MALE</span></li>
                                                        @elseif($app->patients->gender == "F")
                                                        FEMALE</span></li>
                                                        @else
                                                        OTHER</span></li>
                                                        @endif
                                                    @endif
                                                    @if($app->patients->groupofblood != null)
													<li>Blood Group <span>{{$app->patients->groupofblood}}</span></li>
                                                    @else
                                                    <li>Blood Group <span>Not Tested</span></li>
                                                    @endif
												</ul>
											</div>
										</div>
									</div>
								</div>
                                @endforeach
							</div>
						</div>

					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			@include('doctor.footer')
			<!-- /Footer -->
		   
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

<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
</html>