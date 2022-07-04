@include('patient.navbar')
<title>Doctor Booking</title>
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
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="{{url('/')}}/doctor/profile/{{$doctor->id}}" class="booking-doc-img" 
											style=" overflow:hidden; border-radius:5px;">
											<img src="{{ asset('/storage').'/'.$doctor->profileimage}}" class="img-fluid"
											alt="User Image" onerror=this.src="{{url('/')}}/assets/img/default.png"
											style="transition: 0.5s all ease-in-out;">
										</a>
										<div class="booking-info">
											<h4><a href="{{url('/')}}/doctor/profile/{{$doctor->id}}">Dr. {{$doctor->firstname." ".$doctor->lastname}}</a></h4>
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
											@if($doctor->city != null)
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$doctor->city.",".$doctor->state.",".$doctor->country}}</p>
											@endif
										</div>
									</div>
								</div>
							</div>
							
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row" style="margin: auto;">
										<div class="col-md-12">
											<?php //$date = date("d M Y"); ?>
											{{-- {{dd($date);}} --}}
												{{-- @for($i=0;$i<7;$i++)
													{{$date[$i] = date("d M Y",strtotime('+{{$i}} day'));}}
												@endfor --}}
												<div class="day-slot">
												<ul>
													<?php $i = 0; ?>
													@foreach(range(date('d'), date('d')+6) as $d)
														<?php $time= $i++.' day' ?>
														@if(date('l') == date('l',strtotime($time)))
															<li class="badge badge-success">
																<span class="badge">{{date('l',strtotime($time))}}</span>
																<span class="slot-date">{{date('d M Y',strtotime($time))}}</span>
															</li>
														@else
															<li class="badge">
															<span class="badge">{{date('l',strtotime($time))}}</span>
																<span class="slot-date">{{date('d M Y',strtotime($time))}}</span>
															</li>
														@endif
													@endforeach
												</ul>
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">

										{{-- Tuesday --}}
										@if(date('l') == "Tuesday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>
														&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														{{-- <a class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})"> --}}
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>
														&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														{{-- <a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})"> --}}
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>
														&nbsp;
														@foreach($doctor->thursday as $thursday)
														{{-- <a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})"> --}}
															<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>
														&nbsp;
														@foreach($doctor->friday as $friday)
														{{-- <a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})"> --}}
															<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>
														&nbsp;
														@foreach($doctor->saturday as $saturday)
														{{-- <a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})"> --}}
															<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>
														&nbsp;
														@foreach($doctor->sunday as $sunday)
														{{-- <a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})"> --}}
															<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
                                                        {{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
														<a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif

										{{-- Wednesday --}}
										@if(date('l') == "Wednesday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif
										
										{{-- Thursday --}}
										@if(date('l') == "Thursday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif

										{{-- Friday --}}
										@if(date('l') == "Friday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif

										{{-- Saturday --}}
										@if(date('l') == "Saturday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif

										{{-- Sunday --}}
										@if(date('l') == "Sunday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif

										{{-- Monday --}}
										@if(date('l') == "Monday")
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>&nbsp;
                                                        @foreach($doctor->monday as $monday)
														{{-- <a class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#"> --}}
                                                        <a href="#" class="timing" id="{{$monday->id}}" onclick="clicktime({{$monday->id}})" href="#">
															<span>{{date("g:i a",strtotime($monday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->tuesday as $tuesday)
														<a href="#" class="timing" id="{{$tuesday->id}}" onclick="clicktime({{$tuesday->id}})">
															<span>{{date("g:i a",strtotime($tuesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
                                                        @foreach($doctor->wednesday as $wednesday)
														<a href="#" class="timing" id="{{$wednesday->id}}" onclick="clicktime({{$wednesday->id}})">
															<span>{{date("g:i a",strtotime($wednesday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->thursday as $thursday)
														<a href="#" class="timing" id="{{$thursday->id}}" onclick="clicktime({{$thursday->id}})">
															<span>{{date("g:i a",strtotime($thursday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->friday as $friday)
														<a href="#" class="timing" id="{{$friday->id}}" onclick="clicktime({{$friday->id}})">
															<span>{{date("g:i a",strtotime($friday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->saturday as $saturday)
														<a href="#" class="timing" id="{{$saturday->id}}" onclick="clicktime({{$saturday->id}})">
															<span>{{date("g:i a",strtotime($saturday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
													<li>&nbsp;
														@foreach($doctor->sunday as $sunday)
														<a href="#" class="timing" id="{{$sunday->id}}" onclick="clicktime({{$sunday->id}})">
															<span>{{date("g:i a",strtotime($sunday->starttime))}}</span>
														</a>
                                                        @endforeach
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
										@endif
										
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
						</div>
						<!-- Submit Section -->
						<div class="submit-section proceed-btn text-right">
							<a href="#" onclick="submit()" class="btn btn-primary submit-btn">Proceed to Pay</a>
						</div>
						<!-- /Submit Section -->
					</div>
							
				</div>

			</div>		
			<!-- /Page Content -->
   
			@include('doctor.footer')
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>

        <script>
            function clicktime(id)
            {
				$("a").removeClass("timing selected");
				$("a").toggleClass("timing");
				document.getElementById(id).className = "timing selected";
            }
			function submit()
			{	
				var elements = document.getElementsByClassName('timing selected');
				var requiredElement = elements[0];
				var id = requiredElement.id;
				// var link = document.getElementById(id).getAttribute("href");
				// window.alert(link);
				// location.href=this.href+id;
				window.location.href = 'http://127.0.0.1:8000/fixschedule/'+id;
				// window.alert(id);
			}
        </script>
		
	</body>

<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
</html>