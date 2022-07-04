@include('patient.navbar')
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/patient/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Favourites</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Favourites</h2>
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
							<div class="row row-grid">

                                @foreach($fav as $fav)
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="{{url('/')}}/doctor/profile/{{$fav->doctors->id}}">
												<img class="img-fluid" alt="" style="object-fit: cover; width:230px; height:230px;"
                                                src="{{ asset('/storage').'/'.$fav->doctors->profileimage}}"
												onerror=this.src="{{url('/')}}/assets/img/default.png">
											</a>
											<a href="{{url('/')}}/patient/favourite/{{$fav->doctors->id}}" class="fav-btn">
												<i class="fas fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="{{url('/')}}/doctor/profile/{{$fav->doctors->id}}">Dr. {{$fav->doctors->firstname." ".$fav->doctors->lastname}}</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">{{$fav->doctors->specialization}}</p>
											<div class="rating">
												<?php $avgstar = App\Models\Review::where('dr_id','=',$fav->doctors->id)->avg('star'); ?>
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
												<?php $totalcomments = App\Models\Review::where('dr_id','=',$fav->doctors->id)->count(); ?>
												<span class="d-inline-block average-rating">({{$totalcomments}})</span>
											</div>
											<ul class="available-info">
                                                @if($fav->doctors->city != null)
												<li>
													<i class="fas fa-map-marker-alt"></i> {{$fav->doctors->city.",".$fav->doctors->state.",".$fav->doctors->country}}
												</li>
                                                @endif
												<li>
													<i class="far fa-clock"></i> Available on @if(($fav->doctors->sunday->count() > 0) && ($fav->doctors->monday->count() > 0) && ($fav->doctors->tuesday->count() > 0)
                                                    && ($fav->doctors->wednesday->count() > 0) && ($fav->doctors->thursday->count() > 0) && ($fav->doctors->friday->count() > 0)
                                                    && ($fav->doctors->saturday->count() > 0))
                                                    Everyday
                                                    @else
                                                            @if($fav->doctors->sunday->count() > 0)
                                                                Sunday,
                                                            @endif
                                                            @if($fav->doctors->monday->count() > 0)
                                                                Monday,
                                                            @endif
                                                            @if($fav->doctors->tuesday->count() > 0)
                                                                Tuesday,
                                                            @endif
                                                            @if($fav->doctors->wednesday->count() > 0)
                                                                Wednesday,
                                                            @endif
                                                            @if($fav->doctors->thursday->count() > 0)
                                                                Thursday,
                                                            @endif
                                                            @if($fav->doctors->friday->count() > 0)
                                                                Friday,
                                                            @endif
                                                            @if($fav->doctors->saturday->count() > 0)
                                                                Saturday
                                                            @endif
                                                    @endif
												</li>
												<li>
                                                    <i class="far fa-money-bill-alt"></i> {{$fav->doctors->videocallprice."-".$fav->doctors->general_cons_price}} 
                                                    <i class="fas fa-info-circle" data-toggle="tooltip" title="VIDEOCALL PRICE - GENERAL PRICE"></i>
                                                </li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="{{url('/')}}/doctor/profile/{{$fav->doctors->id}}" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="{{url('/')}}/doctor/booking/{{$fav->doctors->id}}" class="btn book-btn">Book Now</a>
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

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->
</html>