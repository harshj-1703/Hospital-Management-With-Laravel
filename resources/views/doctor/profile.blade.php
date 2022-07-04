@if(session()->has('patientid'))
@include('patient.navbar')
@else
@include('layout.navbar')
@endif
<!-- Favicons -->
<title>Doctor Profile</title>
<link href="{{url('/')}}/assets/img/favicon.png" rel="icon">
		
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fontawesome/css/all.min.css">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/plugins/fancybox/jquery.fancybox.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">

<style>
	.img-fluid:hover{
		transform: scale(1.15);
	}
</style>

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img" style="overflow: hidden; border-radius:5px;">
										<img src="{{ asset('/storage').'/'.$doctor->profileimage}}"
										onerror=this.src="{{url('/')}}/assets/img/default.png"
										style="object-fit: cover; width:100%; height:100%; 
										transition:0.5s all ease-in-out" class="img-fluid" alt="">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">Dr. {{$doctor->firstname." ".$doctor->lastname}}</h4>
										<h7>{{$doctor->email}}</h7>
										<p class="doc-speciality">{{$doctor->services}}</p>
										<p class="doc-department">
                                            {{-- <img src="{{url('/')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality"> --}}
                                            {{$doctor->specialization}}</p>
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
											<?php $totalrecommend = App\Models\Review::where('dr_id','=',$doctor->id)
											->where('recommended','!=','2')->count(); ?>
											<?php $totalrecommendyes = App\Models\Review::where('dr_id','=',$doctor->id)
											->where('recommended','=','1')->count(); ?>
											<span class="d-inline-block average-rating">({{$totalcomments}})</span>
										</div>
										<div class="clinic-details">
											@if($doctor->city != null)
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> 
												{{$doctor->address1.",".$doctor->city.",".$doctor->state.",".$doctor->country}}
												<a href="https://www.google.com/maps/dir/?api=1&destination={{$doctor->address1.",".$doctor->city}}
													{{-- &zoom=15&basemap=satellite&layer=transit --}}
													" target="_blank">&nbsp;&nbsp;Get Directions</a></p>
											@endif
											<ul class="clinic-gallery">
												@if($clinic != null)
                                                @foreach($clinic as $clinics)
                                                @foreach($clinics->clinicimages as $clinicchunck)
												<li>
													<a href="{{ asset('/storage').'/'.$clinicchunck->clinicimages}}" data-fancybox="gallery">
														<img src="{{ asset('/storage').'/'.$clinicchunck->clinicimages}}" alt="Feature">
													</a>
												</li>
                                                @endforeach
                                                @endforeach 
												@endif
											</ul>
										</div>
										<div class="clinic-services">
                                            @foreach(explode(',', $doctor->specialization) as $spe)
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
											@if($doctor->city != null)
											<li><i class="fas fa-map-marker-alt"></i>{{$doctor->city.",".$doctor->state.",".$doctor->country}}</li>
											@endif
											<li><i class="far fa-money-bill-alt"></i>{{$doctor->general_cons_price}} per hour </li>
										</ul>
									</div>
									<div class="doctor-action">
										@if(App\Models\Favourite::where('dr_id','=',$doctor->id)->where('patient_id','=',session('patientid'))
											->where('status','=','1')->count() > 0)
										<a href="{{url('/')}}/patient/favourite/{{$doctor->id}}" class="btn btn-white fav-btn">
											<i class="fas fa-bookmark"></i>
										</a>
										@else
										<a href="{{url('/')}}/patient/favourite/{{$doctor->id}}" class="btn btn-white fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
										@endif
										<a href="javascript:void(0)" class="btn btn-white msg-btn">
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
											<i class="fas fa-video"></i>
										</a>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="{{url('/')}}/doctor/booking/{{$doctor->id}}">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p>{{$doctor->biography}}</p>
											</div>
											<!-- /About Details -->

											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach($doctor->educations as $edu)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{$edu->clg}}</a>
																	<div>{{$edu->degree}}</div>
																	<span class="time">{{$edu->yoc}}</span>
																</div>
															</div>
														</li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
									
											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach($doctor->experiences as $exp)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{$exp->hospital}}</a>
																	<span class="time">{{$exp->from." TO ".$exp->to}}</span>
																</div>
															</div>
														</li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->
								
											<!-- Awards Details -->
											<div class="widget awards-widget">
												<h4 class="widget-title">Awards</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach($doctor->awards as $awards)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year">{{$awards->year}}</p>
																	<h4 class="exp-title">{{$awards->awardname}}</h4>
																</div>
															</div>
														</li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Awards Details -->
											
											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
                                                    @foreach(explode(',', $doctor->services) as $spe)
                                                    <li>{{ strtoupper($spe) }}</li>
                                                    @endforeach
												</ul>
											</div>
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													@foreach(explode(',', $doctor->specialization) as $spe)
                                                    <li>{{ strtoupper($spe) }}</li>
                                                    @endforeach	
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
                                    
									@if($clinic->count() > 0)
									<!-- Location List -->
									<div class="location-list">
										<div class="row">
											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													{{-- @foreach($clinic as $clinics) --}}
													<h4 class="clinic-name"><a href="#">{{$clinics->clinicname}}</a></h4>
													{{-- @endforeach --}}
													<p class="doc-speciality">{{strtoupper($doctor->specialization)}}</p>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(4)</span>
													</div>
													{{-- @foreach($clinic as $clinics) --}}
													<div class="clinic-details mb-0">
														<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 
															{{$clinics->clinicaddress}}<br>
															<a href="https://www.google.com/maps/dir/?api=1&destination={{$clinics->clinicaddress.",".$doctor->city}}"
																target="_blank">Get Directions</a></h5>
														<ul>
                                                            @foreach($clinics->clinicimages as $clinicchunck2)
                                                            <li>
                                                                <a href="{{ asset('/storage').'/'.$clinicchunck2->clinicimages}}" data-fancybox="gallery">
                                                                    <img src="{{ asset('/storage').'/'.$clinicchunck2->clinicimages}}" alt="Feature">
                                                                </a>
                                                            </li>
                                                            @endforeach
														</ul>
													</div>
													{{-- @endforeach --}}
												</div>
											</div>
											<!-- /Clinic Content -->
											
											<!-- Clinic Timing -->
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Mon - Sat </span>
														</p>
														<p class="timings-times">
															<span>10:00 AM - 2:00 PM</span>
															<span>4:00 PM - 9:00 PM</span>
														</p>
													</div>
													<div>
													<p class="timings-days">
														<span>Sun</span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
													</p>
													</div>
												</div>
											</div>
											
											<!-- /Clinic Timing -->
											
											<div class="col-md-2">
												<div class="consult-price">
													${{$doctor->general_cons_price}}
												</div>
											</div>
										</div>
									</div>
									@endif
									<!-- /Location List -->

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">
											
											@foreach($review as $r)
											<!-- Comment List -->
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="" src="{{ asset('/storage').'/'.$r->patients->profileimage}}"
													onerror=this.src="{{url('/')}}/assets/img/default.png">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">{{$r->patients->firstname." ".$r->patients->lastname}}</span>
															<span class="comment-date">Reviewed {{$diff = now()->diffInDays(\Carbon\Carbon::parse($r->created_at));}} Days ago</span>
															@if($r->star == "1")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "2")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "3")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "4")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
															</div>
															@else
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
															</div>
															@endif
														</div>
														@if($r->recommended == "1")
														<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
														@elseif($r->recommended == "0")
														<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
														@else
														@endif
														<h5>
															{{$r->title}}
														</h5>
														<h5 style="font-size: 10px">
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</h5>
														<p class="comment-content">
															{{$r->detail}}
														</p>
														<div class="comment-reply">
															<a href="#" class="comment-btn" data-toggle="modal" data-target="#reply{{$r->id}}">
																<i class="fas fa-reply"></i> Reply
															</a>
															@if($r->recommended == "2" && $r->patient_id == session('patientid'))
														   <p class="recommend-btn">
															<span>Recommend?</span>
															<a href="{{url('/')}}/doctorprofileyes/{{$r->id}}" class="like-btn">
																<i class="far fa-thumbs-up"></i> Yes
															</a>
															<a href="{{url('/')}}/doctorprofileno/{{$r->id}}" class="dislike-btn">
																<i class="far fa-thumbs-down"></i> No
															</a>
															@endif
														</p>
														</div>
													</div>
												</div>
												
												@if(App\Models\Review::where('status','=','1')->where('parent_id','=',$r->id)->count() > 0)
												<!-- Comment Reply -->
												<?php $childr = App\Models\Review::where('status','=','1')->where('patient_id','!=',null)->
												where('parent_id','=',$r->id)->get(); ?>
												@foreach($childr as $childr)
												<ul class="comments-reply">
													<li>
														<div class="comment">
															<img class="avatar avatar-sm rounded-circle" alt="" 
															src="{{ asset('/storage').'/'.$childr->patients->profileimage}}"
															onerror=this.src="{{url('/')}}/assets/img/default.png">
															<div class="comment-body">
																<div class="meta-data">
																	<span class="comment-author">{{$childr->patients->firstname." ".$childr->patients->lastname}}</span>
																	<span class="comment-date">Replied {{$diff = now()->diffInDays(\Carbon\Carbon::parse($childr->created_at));}} Days ago</span>
																	@if($childr->star == "1")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "2")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "3")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "4")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@else
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																	</div>
																	@endif
																</div>
																	@if($childr->recommended == "1")
																	<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
																	@elseif($childr->recommended == "0")
																	<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
																	@else
																	@endif
																<h5>
																	{{$childr->title}}
																</h5>
																<h5 style="font-size: 10px">
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</h5>
																<p class="comment-content">
																	{{$childr->detail}}
																</p>
																<div class="comment-reply">
																	{{-- <a class="comment-btn" href="#" data-toggle="modal" data-target="#secondreply{{$childr->id}}">
																		<i class="fas fa-reply"></i> Reply
																	</a> --}}
																	@if($childr->recommended == "2" && $childr->patient_id == session('patientid'))
																   <p class="recommend-btn">
																	<span>Recommend?</span>
																	<a href="{{url('/')}}/doctorprofileyes/{{$childr->id}}" class="like-btn">
																		<i class="far fa-thumbs-up"></i> Yes
																	</a>
																	<a href="{{url('/')}}/doctorprofileno/{{$childr->id}}" class="dislike-btn">
																		<i class="far fa-thumbs-down"></i> No
																	</a>
																	@endif
																</p>
																</div>
															</div>
														</div>
													</li>
												</ul><br>
												<!-- /Comment Reply -->
												@endforeach
												@endif

												@if(App\Models\Review::where('status','=','1')->where('dr_id','=',$doctor->id)
                                                ->where('parent_id','=',$r->id)->count() > 0)
												<!-- Comment Reply -->
												<?php $childr2 = App\Models\Review::where('status','=','1')->where('dr_id','=',$doctor->id)
                                                ->where('patient_id','=',null)->where('parent_id','=',$r->id)->get(); ?>
												@foreach($childr2 as $childr)
												<ul class="comments-reply">
													<li>
														<div class="comment">
															<img class="avatar avatar-sm rounded-circle" alt=""
															 src="{{ asset('/storage').'/'.$childr->doctors->profileimage}}"
															 onerror=this.src="{{url('/')}}/assets/img/default.png">
															<div class="comment-body">
																<div class="meta-data">
																	<span class="comment-author">Dr. {{$childr->doctors->firstname." ".$childr->doctors->lastname}}</span>
																	<span class="comment-date">Replied {{$diff = now()->diffInDays(\Carbon\Carbon::parse($childr->created_at));}} Days ago</span>
																	{{-- @if($childr->star == "1")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "2")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "3")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "4")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@else
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																	</div>
																	@endif --}}
																</div>
																	{{-- @if($childr->recommended == "1")
																	<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
																	@elseif($childr->recommended == "0")
																	<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
																	@else
																	@endif --}}
																<h5>
																	{{$childr->title}}
																</h5>
																<h5 style="font-size: 10px">
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</h5>
																<p class="comment-content">
																	{{$childr->detail}}
																</p>
																<div class="comment-reply">
																	{{-- <a class="comment-btn" href="#" data-toggle="modal" data-target="#secondreply{{$childr->id}}">
																		<i class="fas fa-reply"></i> Reply
																	</a> --}}
																	{{-- @if($childr->recommended == "2")
																   <p class="recommend-btn">
																	<span>Recommend?</span>
																	<a href="{{url('/')}}/doctorprofileyes/{{$childr->id}}" class="like-btn">
																		<i class="far fa-thumbs-up"></i> Yes
																	</a>
																	<a href="{{url('/')}}/doctorprofileno/{{$childr->id}}" class="dislike-btn">
																		<i class="far fa-thumbs-down"></i> No
																	</a>
																	@endif --}}
																{{-- </p> --}}
																{{-- </div> --}}
															</div>
														</div>
													</li>
												</ul><br>
												<!-- /Comment Reply -->
												@endforeach
												@endif
												
											</li><hr>
											@endforeach
											<!-- /Comment List -->
																	
										</ul>
										
										<!-- Show All -->
										<div class="all-feedback text-center">
											<a href="#" class="btn btn-primary btn-sm">
												Show all feedback <strong>(167)</strong>
											</a>
										</div>
										<!-- /Show All -->
										
									</div>
									<!-- /Review Listing -->
								
									<!-- Write Review -->
									<div class="write-review">
										<h4>Write a review for <strong>Dr. {{$doctor->firstname." ".$doctor->lastname}}</strong></h4>
										
										<!-- Write Review Form -->
										<form action="{{url('/')}}/doctor/profile" method="POST">
											@csrf
											<div><span class="text-danger">
												@error('rating')
												  {{$message}}
												@enderror
											</span></div>
											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<input id="star-5" type="radio" name="rating" value="star-5">
													<label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-4" type="radio" name="rating" value="star-4">
													<label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-3" type="radio" name="rating" value="star-3">
													<label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-2" type="radio" name="rating" value="star-2">
													<label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-1" type="radio" name="rating" value="star-1">
													<label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
												</div>
											</div>
											<div><span class="text-danger">
                                                @error('title')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group">
												<label>Title of your review</label>
												<input class="form-control" name="title" type="text" placeholder="Write your review title here" maxlength="100">
											</div>
											<div><span class="text-danger">
                                                @error('detail')
                                                  {{$message}}
                                                @enderror
                                            </span></div>
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="200" name="detail" class="form-control"></textarea>
											  
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">200</span> characters remaining</small></div>
											</div>
											<hr>
											<input type="hidden" name="hidden" value="{{$doctor->id}}">
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Add Review</button>
											</div>
										</form>
										<!-- /Write Review Form -->
									
									</div>
									<!-- /Write Review -->
						
								</div>
								<!-- /Reviews Content -->

								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>{{date('d-m-Y')}}</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Friday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<div class="time-items">
                                                                <span class="time">07:00 AM - 09:00 PM</span>
																{{-- <span class="time"><span class="badge bg-danger-light">Closed</span></span> --}}
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			@include('doctor.footer')
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="" src="{{ asset('/storage').'/'.$doctor->profileimage}}"
										onerror=this.src="{{url('/')}}/assets/img/default.png" class="call-avatar">
										<h4>Dr. {{$doctor->firstname." ".$doctor->lastname}}</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" 
										data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="javascript:void(0);" class="btn call-item call-start">
											<i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="{{ asset('/storage').'/'.$doctor->profileimage}}"
										onerror=this.src="{{url('/')}}/assets/img/default.png" alt="">
										<h4>Dr. {{$doctor->firstname." ".$doctor->lastname}}</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" 
										aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="javascript:void(0);" class="btn call-item call-start">
											<i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->

								<!--Main Reply-->
								@foreach($review as $m)
								<div class="modal fade custom-modal" id="reply{{$m->id}}">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Comment Reply</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<ul class="info-details">
													<li>
														<div class="details-header">
																	<form action="{{url('/')}}/doctor/mainreply" method="POST">
																		@csrf
																		<div><span class="text-danger">
																			@error('mainreplyrating')
																			  {{$message}}
																			@enderror
																		</span></div>
																		<div class="form-group">
																			<label>Review</label>
																			<div class="star-rating">
																				<input id="star{{$m->id}}" type="radio" name="mainreplyrating" value="star5">
																				<label for="star{{$m->id}}" title="5 stars">
																					<i class="active fa fa-star"></i>
																				</label>
																				<input id="star{{($m->id)+1}}" type="radio" name="mainreplyrating" value="star4">
																				<label for="star{{($m->id)+1}}" title="4 stars">
																					<i class="active fa fa-star"></i>
																				</label>
																				<input id="star{{($m->id)+2}}" type="radio" name="mainreplyrating" value="star-3">
																				<label for="star{{($m->id)+2}}" title="3 stars">
																					<i class="active fa fa-star"></i>
																				</label>
																				<input id="star{{($m->id)+3}}" type="radio" name="mainreplyrating" value="star2">
																				<label for="star{{($m->id)+3}}" title="2 stars">
																					<i class="active fa fa-star"></i>
																				</label>
																				<input id="star{{($m->id)+4}}" type="radio" name="mainreplyrating" value="star1">
																				<label for="star{{($m->id)+4}}" title="1 star">
																					<i class="active fa fa-star"></i>
																				</label>
																			</div>
																		</div>
																		<div><span class="text-danger">
																			@error('mainreplytitle')
																			  {{$message}}
																			@enderror
																		</span></div>
																		<div class="form-group">
																			<label>Title of your review</label>
																			<input class="form-control" name="mainreplytitle" type="text" value="{{old('mainreplytitle')}}"
																			 placeholder="Write your review title here" maxlength="100">
																		</div>
																		<div><span class="text-danger">
																			@error('mainreplydetail')
																			  {{$message}}
																			@enderror
																		</span></div>
																		<div class="form-group">
																			<label>Your review</label>
																			<textarea id="review_desc" maxlength="200" name="mainreplydetail" class="form-control"></textarea>
																		</div>
																		<hr>
																		<div class="form-group">
																			<div class="terms-accept">
																				<div><span class="text-danger">
																					@error('mainreplycondition')
																					  {{$message}}
																					@enderror
																				</span></div>
																				<div class="custom-checkbox">
																				   <input type="checkbox" name="mainreplycondition" id="terms_accept">
																				   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
																				</div>
																			</div>
																		</div>
																		<input type="hidden" name="mainreplyhiddendrid" value="{{$doctor->id}}">
																		<input type="hidden" name="mainreplyhiddenparent" value="{{$m->id}}">
																		<div class="submit-section">
																			<button type="submit" class="btn btn-primary submit-btn">Reply</button>
																		</div>
																	</form>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
						@endforeach
					<!--/Main Reply-->

		
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="{{url('/')}}/assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>
</html>