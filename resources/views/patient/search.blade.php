<?php date_default_timezone_set("Asia/Calcutta");?>
@if(session()->has('patientid'))
@include('patient.navbar')
@else
@include('layout.navbar')
@endif
<title>Search</title>

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap-datetimepicker.min.css">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/select2/css/select2.min.css">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fancybox/jquery.fancybox.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
<!-- /Header -->

<style>
	.img-fluid:hover{
		transform: scale(1.2);
	}
</style>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select id='sort' class="select">
										<option value="all">All</option>
										<option value="rating">Rating</option>
										<option value="latest">Latest</option>
										<option value="price-lowtohigh">Price:Low To High</option>
										<option value="price-hightolow">Price:High To Low</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<form action="{{url('/')}}/patient/search" method="get" id="search-results">
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<h4>Search by Name</h4>
									<div>
										<input type="text" class="form-control" id="name" placeholder="Search By FirstName" name="name">
									</div><br>
									<div>
										<input type="text" class="form-control" id="lastname" placeholder="Search By LastName" name="lastname">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Search by Area</h4>
									<div>
										<input type="text" class="form-control" id="area" placeholder="Search By Address" name="area">
									</div><br>
									<div>
										<input type="text" class="form-control" id="city" placeholder="Search By City" name="city">
									</div>
								</div>
								<div class="filter-widget">
									<h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="radio" class="gender" id="gender" name="gender" value="M">
											<span class="checkmark"></span> Male Doctor
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="radio" class="gender" id="gender" name="gender" value="F">
											<span class="checkmark"></span> Female Doctor
										</label>
									</div>
								</div>
								<div><a href="{{url('/')}}/patient/search">
									<input type="button" class="form-control btn-outline-info" value="RESET">
								</a></div>
								</div>
							</div>
						</form>
							<!-- /Search Filter -->
						</div>

						<div class="col-md-12 col-lg-8 col-xl-9" id="search">
							@foreach($doctor as $dr)
								<div class="card">
									<div class="card-body">
										<div class="doctor-widget">
											<div class="doc-info-left">
												<div class="doctor-img" style="overflow: hidden; border-radius:5px;">
													<a href="{{url('/')}}/doctor/profile/{{$dr->id}}">
														<img src="{{ asset('/storage').'/'.$dr->profileimage}}"
														onerror=this.src="{{url('/')}}/assets/img/default.png"
														style="object-fit: cover; width:100%; height:100%;
														transition: 0.5s all ease-in-out;" class="img-fluid" alt="">
													</a>
												</div>
												<div class="doc-info-cont">
													<h4 class="doc-name"><a href="{{url('/')}}/doctor/profile/{{$dr->id}}">Dr. 
														{{$dr->firstname." ".$dr->lastname}}</a></h4>
													<p class="doc-speciality">{{$dr->services}}</p>
													<h5 class="doc-department">
														{{-- <img src="{{url('/')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality"> --}}
														{{$dr->specialization}}</h5>
													<div class="rating">
														<?php $avgstar = App\Models\Review::where('dr_id','=',$dr->id)->avg('star'); ?>
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
														<?php $totalcomments = App\Models\Review::where('dr_id','=',$dr->id)->count(); ?>
														<?php $totalrecommend = App\Models\Review::where('dr_id','=',$dr->id)
														->where('recommended','!=','2')->count(); ?>
														<?php $totalrecommendyes = App\Models\Review::where('dr_id','=',$dr->id)
														->where('recommended','=','1')->count(); ?>
														<span class="d-inline-block average-rating">({{$totalcomments}})</span>
													</div>
													<div class="clinic-details">
														@if(\App\Models\Clinic::where('dr_id','=',$dr->id)->count() > 0)
														<?php $drclinic = \App\Models\Clinic::where('dr_id','=',$dr->id)->first(); ?>
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$drclinic->clinicaddress}}</p>
														<ul class="clinic-gallery">
															@if(\App\Models\Clinicimage::where('clinic_id','=',$drclinic->id)->where('status','=','1')->count() > 0)
															<?php $drclinicimg = \App\Models\Clinicimage::where('clinic_id','=',$drclinic->id)->where('status','=','1')->get(); ?>
															@foreach($drclinicimg as $drclinicimg)
															<li>
																<a href="{{ asset('/storage').'/'.$drclinicimg->clinicimages}}" data-fancybox="gallery">
																	<img src="{{ asset('/storage').'/'.$drclinicimg->clinicimages}}" alt="Feature">
																</a>
															</li>
															@endforeach
															@endif
														</ul>
														@endif
													</div>
													<div class="clinic-services">
														@foreach(explode(',', $dr->specialization) as $spe)
														<span>{{ $spe }}</span>
														@endforeach
													</div>
												</div>
											</div>
											<div class="doc-info-right">
												<div class="clini-infos">
													<ul>
														@if($totalrecommendyes != '0')
														<li><i class="far fa-thumbs-up"></i> {{($totalrecommendyes / $totalrecommend)*100}}%</li>
														@else
														<li><i class="far fa-thumbs-up"></i> Not Reviewed</li>
														@endif
														<li><i class="far fa-comment"></i> {{$totalcomments}} Feedback</li>
														<li><i class="fas fa-map-marker-alt"></i> {{$dr->city.",".$dr->state.",".$dr->country}}</li>
														<li><i class="far fa-money-bill-alt"></i> ${{$dr->general_cons_price}} - ${{$dr->videocallprice}} 
															<i class="fas fa-info-circle" data-toggle="tooltip" title="GENERAL PRICE-VIDEO CALL PRICE"></i></li>
													</ul>
												</div>
												<div class="clinic-booking">
													<a class="view-pro-btn" href="{{url('/')}}/doctor/profile/{{$dr->id}}">View Profile</a>
													<a class="apt-btn" href="{{url('/')}}/doctor/booking/{{$dr->id}}">Book Appointment</a>
												</div>
											</div>
										</div>
									</div>
								</div>
                            @endforeach
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
		
		<!-- Select2 JS -->
		<script src="{{url('/')}}/assets/plugins/select2/js/select2.min.js"></script>

		<!-- Datetimepicker JS -->
		<script src="{{url('/')}}/assets/js/moment.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Fancybox JS -->
		<script src="{{url('/')}}/assets/plugins/fancybox/jquery.fancybox.min.js"></script>

		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>

		<script>

			// getSearchRecord();
			$('#sort').change(function () {
				let sort_val = $(this).val();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $('#area').val();
				let sort_val4 = $('#city').val();
				let sort_val5 = $('#name').val();
				let sort_val6 = $('#lastname').val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5,sort_val6);
			});

			$('#area').on('keyup',function() {
				// alert(sort_val3);
				let sort_val = $('#sort option:selected').val();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $(this).val();
				let sort_val4 = $('#city').val();
				let sort_val5 = $('#name').val();
				let sort_val6 = $('#lastname').val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5,sort_val6);
			});

			$('#city').on('keyup',function() {
				// alert(sort_val3);
				let sort_val = $('#sort option:selected').val();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $('#area').val();
				let sort_val4 = $(this).val();
				let sort_val5 = $('#name').val();
				let sort_val6 = $('#lastname').val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5,sort_val6);
			});

			$('#name').on('keyup',function() {
				// alert(sort_val3);
				let sort_val = $('#sort option:selected').val();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $('#area').val();
				let sort_val4 = $('#city').val();
				let sort_val5 = $(this).val();
				let sort_val6 = $('#lastname').val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5,sort_val6);
			});

			$('#lastname').on('keyup',function() {
				// alert(sort_val3);
				let sort_val = $('#sort option:selected').val();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $('#area').val();
				let sort_val4 = $('#city').val();
				let sort_val5 = $('#name').val();
				let sort_val6 = $(this).val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5);
			});

			$('.gender').click(function () {
				let sort_val = $('#sort option:selected').val();
				// let sort_val2 = $('.gender:checked').map(function(){
				// 	return $(this).val();
				// 	}).get();
				let sort_val2 = $('.gender:checked').val();
				let sort_val3 = $('#area').val();
				let sort_val4 = $('#city').val();
				let sort_val5 = $('#name').val();
				let sort_val6 = $('#lastname').val();
				getSearchRecord(sort_val,sort_val2,sort_val3,sort_val4,sort_val5,sort_val6);
			});

		</script>
	</body>
</html>