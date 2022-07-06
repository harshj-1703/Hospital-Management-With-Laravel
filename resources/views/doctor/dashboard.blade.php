@include('doctor.navbar')
<title>Dashboard</title>
<!-- Favicon -->
{{-- <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/assets/img/favicon.png"> --}}
		
<!-- Bootstrap CSS -->
{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css"> --}}

<!-- Fontawesome CSS -->
{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/font-awesome.min.css"> --}}

<!-- Feathericon CSS -->
{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/feathericon.min.css"> --}}

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">

<style>
	#container1{
	display: flex;                  
	flex-direction: row;            
	flex-wrap: nowrap;              
	justify-content: space-between; 
	}
</style>

<!-- Main CSS -->
{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css"> --}}
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											@if(session()->has('message'))
											<div class="alert alert-success">
											{{ session()->get('message') }}
											</div>
											@endif
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															@isset($totalpatientbar)
															<div class="circle-graph1" data-percent="{{$totalpatientbar}}">
																<img src="{{url('/')}}/assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
															@endisset
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>{{$totalpatient}}</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															@isset($totalpatientbartoday)
															<div class="circle-graph2" data-percent="{{$totalpatientbartoday}}">
																<img src="{{url('/')}}/assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
															@endisset
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3>{{$totalpatienttoday}}</h3>
															<p class="text-muted">{{date("d M,Y");}}</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															@isset($totalappointmentsbar)
															<div class="circle-graph3" data-percent="{{$totalappointmentsbar}}">
																<img src="{{url('/')}}/assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
															@endisset
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>{{$totalappointments}}</h3>
															<p class="text-muted">{{date("d M,Y");}}</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div id="container1">
										<div>
										<a class="mb-4" style="font-size: 20px;font-weight:500;line-height: 40px;">
											Patient Appoinments</a>
										</div>
										<div>
											<a href="#app_add" data-toggle="modal" class="btn btn-primary">
												<i class="fas fa-plus"></i> Add Appointment
											</a>
										</div>
									</div>
									<br>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
											<li class="nav-item">
												<a class="nav-link" href="#payment-status" data-toggle="tab">Payment Status</a>
											</li>
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="datatable table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	@foreach($drapp as $app)
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" 
																					onerror=this.src="{{url('/')}}/assets/img/default.png" src="{{ asset('/storage').'/'.$app->patients->profileimage}}" alt=""></a>
																				<a href="#">{{$app->patients->firstname." ".$app->patients->lastname}} </a>
																			</h2>
																		</td>
																		<td>{{date("d M,Y",strtotime($app->bookingdate))}}<span class="d-block text-info">{{date("h:i a",strtotime($app->bookingtime))}}</span></td>
																		<td>{{$app->purpose}}</td>
																		@if(App\Models\Appointment::where('patient_id','=',$app->patient_id)->where('dr_id','=',session('drid'))->where('status','=','1')->count()>=2)
																		<td>Old Patient</td>
																		@else
																		<td>New Patient</td>
																		@endif
																		<td class="text-center">${{$app->amountpaid}}</td>
																		<td class="text-right">
																			<div class="table-action">
																				{{-- <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a> --}}
																				@if($app->status == "2")
																				<a href="{{url('/')}}/doctor/dashboard/scheduleconfirm/{{$app->id}}" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulecancled/{{$app->id}}" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																				@elseif($app->status == "0")
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Canceled
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$app->id}}" class="btn btn-sm bg-warning-light">
																					<i class="fas fa-times"></i> Reset
																				</a>
																				@else
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Confirmed
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$app->id}}" class="btn btn-sm bg-warning-light">
																					<i class="fas fa-times"></i> Reset
																				</a>
																				@endif
																			</div>
																		</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="datatable table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	@foreach($drapptoday as $app)
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
																					onerror=this.src="{{url('/')}}/assets/img/default.png" src="{{ asset('/storage').'/'.$app->patients->profileimage}}" alt=""></a>
																				<a href="#">{{$app->patients->firstname." ".$app->patients->lastname}} </a>
																			</h2>
																		</td>
																		<td>{{date("d M,Y",strtotime($app->bookingdate))}}<span class="d-block text-info">{{date("h:i a",strtotime($app->bookingtime))}}</span></td>
																		<td>{{$app->purpose}}</td>
																		@if(App\Models\Appointment::where('patient_id','=',$app->patient_id)->where('dr_id','=',session('drid'))->where('status','=','1')->count()>=1)
																		<td>Old Patient</td>
																		@else
																		<td>New Patient</td>
																		@endif
																		<td class="text-center">${{$app->amountpaid}}</td>
																		<td class="text-right" style="width: 100px;">
																			<div class="table-action">
																				{{-- <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a> --}}
																				@if($app->status == "2")
																				<a href="{{url('/')}}/doctor/dashboard/scheduleconfirm/{{$app->id}}" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulecancled/{{$app->id}}" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																				@elseif($app->status == "0")
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Canceled
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$app->id}}" class="btn btn-sm bg-warning-light">
																					<i class="fas fa-times"></i> Reset
																				</a>
																				@else
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Confirmed
																				</a>
																				<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$app->id}}" class="btn btn-sm bg-warning-light">
																					<i class="fas fa-times"></i> Reset
																				</a>
																				@endif
																			</div>
																		</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->

											<!-- Payment Status Tab -->
											<div class="tab-pane" id="payment-status">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="datatable table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Appt Id</th>
																		<th>Appt Date</th>
																		<th>Patient Name</th>
																		<th class="text-center">Purpose</th>
																		<th class="text-center">Amount</th>
																		<th class="text-center">Amount Status</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach($pstatus as $app)
																	<tr>
																		<td>{{$app->id}}</td>
																		<td>{{date("d M,Y",strtotime($app->bookingdate))}}<span class="d-block text-info">
																			{{date("h:i a",strtotime($app->bookingtime))}}</span></td>
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
																					onerror=this.src="{{url('/')}}/assets/img/default.png" src="{{ asset('/storage').'/'.$app->patients->profileimage}}" alt=""></a>
																				<a href="#">{{$app->patients->firstname." ".$app->patients->lastname}} </a>
																			</h2>
																		</td>
																		<td class="text-center">{{$app->purpose}}</td>
																		<td class="text-center">${{$app->amountpaid}}</td>
																		<td class="text-center" style="width: 100px;">
																			<div class="table-action">
																				@if($app->paymentstatus == "0")
																				<a href="{{url('/')}}/doctor/dashboard/paymentconfirm/{{$app->id}}" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-check"></i> Not Done
																				</a>
																				@else
																				<a href="{{url('/')}}/doctor/dashboard/paymentconfirm/{{$app->id}}" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Done
																				</a>
																				@endif
																			</div>
																		</td>
																	</tr>
																	@endforeach
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Payment Status Tab -->
											
										</div>
									</div>
								</div>
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

		<!-- Appointment Add Modal -->
		<div class="modal fade" id="app_add" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Personal Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/addappointment" method="POST">
							@csrf
							<div class="row form-row">
								{{-- <div class="col-12">
									<span class="text-danger">
										@error('email')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control" value="{{old('email')}}">
									</div>
								</div>
								<div class="col-12">
									<span class="text-danger">
										@error('password')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" value="" minlength="8" maxlength="20">
									</div>
								</div> --}}
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('firstname')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="firstname" class="form-control" value="{{old('firstname')}}">
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
										<input type="text" name="lastname" class="form-control" value="{{old('lastname')}}">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('bookingdate')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Appointment Date</label>
										<div class="">
											<input type="date" name="bookingdate" class="form-control" 
											value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('bookingtime')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Appointment Time</label>
										<div class="">
											<input type="time" name="bookingtime" class="form-control"
											 value="{{Carbon\Carbon::now()->format('H:i')}}">
										</div>
									</div>
								</div>
								{{-- <div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('bookingendtime')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Appointment Time</label>
										<div class="">
											<input type="time" name="bookingendtime" class="form-control" value="{{old('bookingendtime')}}">
										</div>
									</div>
								</div> --}}
								<div class="col-12">
									<span class="text-danger">
										@error('purpose')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Purpose</label>
										<div class="">
											<input type="text" name="purpose" class="form-control" value="{{old('purpose')}}">
										</div>
									</div>
								</div>
								<input type="hidden" name="drid" value="{{session('drid')}}">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Book Appointment</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Add Modal -->

		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- jQuery -->
        {{-- <script src="{{url('/')}}/admin/assets/js/jquery-3.2.1.min.js"></script> --}}
		
		<!-- Datatables JS -->
		<script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>

		<!-- Circle Progress JS -->
		<script src="{{url('/')}}/assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

</html>