@include('doctor.navbar')
			<!-- /Header -->
			<!-- Datatables CSS -->
			<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
			<title>Appointments</title>
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
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
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
						<div class="card">
						{{-- <div class="col-md-7 col-lg-8 col-xl-9"> --}}
							<div style="width: 1100px;padding:30px;">
                                <table class="datatable table table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Patient Profile</th>
											<th>Patient Details</th>
											<th style="text-align: right;">Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($drapp as $app)
										<tr>
								<!-- Appointment List -->
								{{-- <div class="appointment-list"> --}}
									{{-- <div class="profile-info-widget"> --}}
										<td>
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('/storage').'/'.$app->patients->profileimage}}"
											onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""
											 style="height: 120px;width:120px;border-radius:10px;">
										</a></td>
										<td style="width:600px;">
										<div class="profile-det-info">
											<h3><a href="#"> {{$app->patients->firstname." ".$app->patients->lastname}}</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> {{date("d M,Y",strtotime($app->bookingdate))}}, {{date("h:i a",strtotime($app->bookingtime))}}</h5>
                                                @if($app->patients->city != null)
												<h5><i class="fas fa-map-marker-alt"></i> {{$app->patients->city.",".$app->patients->state.",".$app->patients->country}}</h5>
                                                @else
                                                <h5><i class="fas fa-map-marker-alt"></i> Not Defined</h5>
                                                @endif
												<h5><i class="fas fa-envelope"></i> {{$app->patients->email}}</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> +91 {{$app->patients->phoneno}}</h5>
											</div>
										</div></td>
									{{-- </div> --}}
									<td style="text-align: right;">
									<div class="appointment-action">
                                        @if($app->status == "2")
                                            <a href="#" class="btn btn-sm bg-info-light" id="{{$app->id}}" data-toggle="modal" data-target="#appt_details{{$app->id}}">
                                                <i class="far fa-eye"></i> View
                                            </a>
                                            <a href="{{url('/')}}/doctor/dashboard/scheduleconfirm/{{$app->id}}" class="btn btn-sm bg-success-light">
                                                <i class="fas fa-check"></i> Accept
                                            </a>
                                            <a href="{{url('/')}}/doctor/dashboard/schedulecancled/{{$app->id}}" class="btn btn-sm bg-danger-light">
                                                <i class="fas fa-times"></i> Cancel
                                            </a>
                                        @elseif($app->status == "1")
                                            <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details{{$app->id}}">
                                                <i class="far fa-eye"></i> View
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                <i class="fas fa-check"></i> Confirmed
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details{{$app->id}}">
                                                <i class="far fa-eye"></i> View
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                <i class="fas fa-times"></i> Canceled
                                            </a>
                                        @endif
									</div></td>
								{{-- </div> --}}
								<!-- /Appointment List -->
							</tr>
                                @endforeach
									</tbody>
								</table>
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
		<!-- /Main Wrapper -->
        
        @foreach($drapp as $popapp)
		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details{{$popapp->id}}">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT_{{$popapp->id}}</span>
                                            <span class="text">{{$popapp->patients->firstname." ".$popapp->patients->lastname}}</span>
											{{-- <span class="text">{{date("d M,Y",strtotime($popapp->bookingdate))}}, {{date("h:i a",strtotime($popapp->bookingtime))}}</span> --}}
										</div>
										<div class="col-md-6">
                                            @if($popapp->status == "1")
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
												<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$popapp->id}}" class="btn btn-sm bg-warning-light">
													<i class="fas fa-times"></i> Reset
												</a>
											</div>
                                            @elseif($popapp->status == "2")
                                            <div class="text-right">
												<button type="button" class="btn bg-warning-light btn-sm" id="topup_status">Pending</button>
											</div>
                                            @else
                                            <div class="text-right">
												<button type="button" class="btn bg-danger-light btn-sm" id="topup_status">Cancled</button>
												<a href="{{url('/')}}/doctor/dashboard/schedulereset/{{$popapp->id}}" class="btn btn-sm bg-warning-light">
													<i class="fas fa-times"></i> Reset
												</a>
											</div>
                                            @endif
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
                                @if($popapp->status == "1")
								<span class="text">Completed</span>
                                @elseif($popapp->status == "2")
                                <span class="text">Pending</span>
                                @else
                                <span class="text">Cancled</span>
                                @endif
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">{{date("d M,Y",strtotime($popapp->bookingdate))}}, {{date("h:i a",strtotime($popapp->bookingtime))}}</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">${{$popapp->amountpaid}}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        @endforeach
		<!-- /Appointment Details Modal -->
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Datatables JS -->
		<script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>
		
	</body>

</html>