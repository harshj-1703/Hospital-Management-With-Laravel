<?php date_default_timezone_set("Asia/Calcutta");?>
@if(session()->has('patientid'))
@include('patient.navbar')
@else
@include('layout.navbar')
@endif
<title>Hospital Management</title>
<!-- /Header -->

			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
						</div>
                         
						<!-- Search -->
						<div class="search-box">
							<form action="{{url('/')}}/patient/search" method="post">
								@csrf
								<div class="form-group search-location">
									<input type="text" class="form-control" name="locationsearch" placeholder="Search Address,City,State">
									<span class="form-text">Based on your Location</span>
								</div>
								<div class="form-group search-info">
									<input type="text" class="form-control" name="drsearch" placeholder="Search Doctors, Clinics, Diseases Etc">
									<span class="form-text">Ex : Dental or Heart etc</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->
					</div>
				</div>
			</section>
			<!--Home Banner-->
			  
			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Clinic and Specialities</h2>
						<p class="sub-title">We have many high professional educated doctors and services.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{url('/')}}/assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Urology</p>
								</div>	
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{url('/')}}/assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Neurology</p>
								</div>							
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{url('/')}}/assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Orthopedic</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{url('/')}}/assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Cardiologist</p>
								</div>						
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{url('/')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Dentist</p>
								</div>
								<!-- /Slider Item -->
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
		  
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header">
								<h2>Book Our Doctor</h2>
								<p>Book our highly professional doctors. </p>
							</div>
							<div class="about-content">
								<p>Our Doctors are very highly professional and educated, book our doctor for appointment.</p>
								<p>Our Doctor has a lowest price and along with many cities in india.</p>					
								{{-- <a href="javascript:;">Read More..</a> --}}
							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
							
								<!-- Doctor Widget -->
								@if($doctor->count() > 0)
								@foreach($doctor as $doctor)
								<div class="profile-widget">
									<div class="doc-img">
											<a href="{{url('/')}}/doctor/profile/{{$doctor->id}}">
												<img class="img-fluid" style="object-fit: cover; width:230px; height:230px;" alt=""
												onerror=this.src="{{url('/')}}/assets/img/default.png" 
												src="{{ asset('/storage').'/'.$doctor->profileimage}}">
											</a>
										@if(session()->has('patientid'))
											@if(App\Models\Favourite::where('dr_id','=',$doctor->id)->where('patient_id','=',session('patientid'))
											->where('status','=','1')->count() > 0)
											<a href="{{url('/')}}/patient/favourite/{{$doctor->id}}" class="fav-btn">
												<i class="fas fa-bookmark"></i>
											</a>
											@else
											<a href="{{url('/')}}/patient/favourite/{{$doctor->id}}" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
											@endif
										@endif
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="{{url('/')}}/doctor/profile/{{$doctor->id}}">Dr. {{$doctor->firstname." ".$doctor->lastname}}</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{$doctor->specialization}}</p>
										<div class="rating">
											<?php $avgstar = App\Models\Review::where('dr_id','=',$doctor->id)->avg('star'); ?>
											@if($avgstar <= "1")
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											@elseif($avgstar <="2" && $avgstar >= "1")
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											@elseif($avgstar <="3" && $avgstar >= "2")
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											@elseif($avgstar <="4" && $avgstar >= "3")
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											@else
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											@endif
											<?php $totalcomments = App\Models\Review::where('dr_id','=',$doctor->id)->count(); ?>
											<span class="d-inline-block average-rating">({{$totalcomments}})</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>{{$doctor->address1}}
											</li>
											<li>
												<i class="far fa-clock"></i>
												{{-- {{\Carbon\Carbon::tomorrow()->format('l');}} --}}
												@if(($doctor->sunday->count() > 0) && ($doctor->monday->count() > 0) && ($doctor->tuesday->count() > 0)
												&& ($doctor->wednesday->count() > 0) && ($doctor->thursday->count() > 0) && ($doctor->friday->count() > 0)
												&& ($doctor->saturday->count() > 0))
												Everyday
												@else
														@if($doctor->sunday->count() > 0)
															Sunday,
														@endif
														@if($doctor->monday->count() > 0)
															Monday,
														@endif
														@if($doctor->tuesday->count() > 0)
															Tuesday,
														@endif
														@if($doctor->wednesday->count() > 0)
															Wednesday,
														@endif
														@if($doctor->thursday->count() > 0)
															Thursday,
														@endif
														@if($doctor->friday->count() > 0)
															Friday,
														@endif
														@if($doctor->saturday->count() > 0)
															Saturday
														@endif
												@endif
														{{-- {{$day = date('w');}} --}}
														{{-- {{$week_start = date('m-d-Y', strtotime('-'.$day.' days'));}} --}}
														{{-- {{$week_end = date('m-d-Y', strtotime('+'.(6-$day).' days'));}} --}}
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> {{$doctor->videocallprice."-".$doctor->general_cons_price}} 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="VIDEOCALL PRICE - GENERAL PRICE"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{url('/')}}/doctor/profile/{{$doctor->id}}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{url('/')}}/doctor/booking/{{$doctor->id}}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
								@endforeach
								@endif
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->
		   
		   <!-- Availabe Features -->
		   <section class="section section-features">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-md-5 features-img">
							<img src="{{url('/')}}/assets/img/features/feature.png" class="img-fluid" alt="Feature">
						</div>
						<div class="col-md-7">
							<div class="section-header">	
								<h2 class="mt-2">Availabe Features in Our Clinic</h2>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
							</div>	
							<div class="features-slider slider">
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
									<p>Patient Ward</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
									<p>Test Room</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
									<p>ICU</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
									<p>Laboratory</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
									<p>Operation</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="{{url('/')}}/assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
									<p>Medical</p>
								</div>
								<!-- /Slider Item -->
							</div>
						</div>
				   </div>
				</div>
			</section>		
			<!-- Availabe Features -->
			
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
		
		<!-- Slick JS -->
		<script src="{{url('/')}}/assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

</html>