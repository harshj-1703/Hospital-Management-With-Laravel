@include('admin.navbar')
<title>ADMIN DASHBOARD</title>
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
        @include('admin.slidebar')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
                                            <?php $totaldr = App\Models\Doctor::count(); ?>
                                            <?php $totaldr1 = App\Models\Doctor::where('status','=','1')->count(); ?>
											<h3>{{$totaldr}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Doctors</h6>
										<div class="progress progress-sm">
                                            @if($totaldr1 != '0')
                                                @if(($totaldr1/$totaldr)*100 < 25)
											    <div class="progress-bar bg-primary w-0"></div>
                                                @elseif(($totaldr1/$totaldr)*100 >= 25 && ($totaldr1/$totaldr)*100 < 50)
                                                <div class="progress-bar bg-primary w-25"></div>
                                                @elseif(($totaldr1/$totaldr)*100 >= 50 && ($totaldr1/$totaldr)*100 < 75)
                                                <div class="progress-bar bg-primary w-50"></div>
                                                @elseif(($totaldr1/$totaldr)*100 >= 75 && ($totaldr1/$totaldr)*100 < 90)
                                                <div class="progress-bar bg-primary w-75"></div>
                                                @else
                                                <div class="progress-bar bg-primary w-100"></div>
                                                @endif
                                            @endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<?php $totalpatient = App\Models\Patient::count(); ?>
                                            <?php $totalpatient1 = App\Models\Patient::where('status','=','1')->count(); ?>
											<h3>{{$totalpatient}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Patients</h6>
										<div class="progress progress-sm">
                                            @if($totalpatient1 != '0')
                                                @if(($totalpatient1/$totalpatient)*100 < 25)
                                                <div class="progress-bar bg-success w-0"></div>
                                                @elseif(($totalpatient1/$totalpatient)*100 >= 25 && ($totalpatient1/$totalpatient)*100 < 50)
                                                <div class="progress-bar bg-success w-25"></div>
                                                @elseif(($totalpatient1/$totalpatient)*100 >= 50 && ($totalpatient1/$totalpatient)*100 < 75)
                                                <div class="progress-bar bg-success w-50"></div>
                                                @elseif(($totalpatient1/$totalpatient)*100 >= 75 && ($totalpatient1/$totalpatient)*100 < 90)
                                                <div class="progress-bar bg-success w-75"></div>
                                                @else
                                                <div class="progress-bar bg-success w-100"></div>
                                                @endif
                                            @endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<?php $totalapp = App\Models\Appointment::count(); ?>
                                            <?php $totalapp1 = App\Models\Appointment::where('status','=','1')->count(); ?>
											<h3>{{$totalapp}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
										<div class="progress progress-sm">
                                            @if($totalapp1 != '0')
                                                @if(($totalapp1/$totalapp)*100 < 25)
                                                <div class="progress-bar bg-danger w-0"></div>
                                                @elseif(($totalapp1/$totalapp)*100 >= 25 && ($totalapp1/$totalapp)*100 < 50)
                                                <div class="progress-bar bg-danger w-25"></div>
                                                @elseif(($totalapp1/$totalapp)*100 >= 50 && ($totalapp1/$totalapp)*100 < 75)
                                                <div class="progress-bar bg-danger w-50"></div>
                                                @elseif(($totalapp1/$totalapp)*100 >= 75 && ($totalapp1/$totalapp)*100 < 90)
                                                <div class="progress-bar bg-danger w-75"></div>
                                                @else
                                                <div class="progress-bar bg-danger w-100"></div>
                                                @endif
                                            @endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
                                            <?php $totalrenue = App\Models\Appointment::count(); ?>
                                            <?php $totalrenue1 = App\Models\Appointment::where('status','=','1')->count(); ?>
                                            <?php $totalrenuesum = App\Models\Appointment::sum('amountpaid'); ?>
											<h3>$ {{$totalrenuesum}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											@if($totalrenue1 != '0')
                                                @if(($totalrenue1/$totalrenue)*100 < 25)
                                                <div class="progress-bar bg-warning w-0"></div>
                                                @elseif(($totalrenue1/$totalrenue)*100 >= 25 && ($totalrenue1/$totalrenue)*100 < 50)
                                                <div class="progress-bar bg-warning w-25"></div>
                                                @elseif(($totalrenue1/$totalrenue)*100 >= 50 && ($totalrenue1/$totalrenue)*100 < 75)
                                                <div class="progress-bar bg-warning w-50"></div>
                                                @elseif(($totalrenue1/$totalrenue)*100 >= 75 && ($totalrenue1/$totalrenue)*100 < 90)
                                                <div class="progress-bar bg-warning w-75"></div>
                                                @else
                                                <div class="progress-bar bg-warning w-100"></div>
                                                @endif
                                            @endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Doctors List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Earned</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($doctor as $dr)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="{{url('/')}}/doctor-a/profile/{{$dr->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$dr->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="{{url('/')}}/doctor-a/profile/{{$dr->id}}">Dr. {{$dr->firstname." ".$dr->lastname}}</a>
														</h2>
													</td>
													<td>{{$dr->specialization}}</td>
                                                    <?php $amount = App\Models\Appointment::where('dr_id','=',$dr->id)->where('status','=','1')->sum('amountpaid'); ?>
													<td>${{$amount}}</td>
                                                    <?php $rating = App\Models\Review::where('dr_id','=',$dr->id)->where('status','=','1')->avg('star'); ?>
                                                    @if(App\Models\Review::where('dr_id','=',$dr->id)->where('status','=','1')->count() > 0)
                                                        @if($rating <= '1')
                                                        <td>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                        </td>
                                                        @elseif($rating > 1 && $rating <=2)
                                                        <td>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                        </td>
                                                        @elseif($rating > 2 && $rating <=3)
                                                        <td>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                        </td>
                                                        @elseif($rating > 3 && $rating <=4)
                                                        <td>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star-o text-secondary"></i>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                            <i class="fe fe-star text-warning"></i>
                                                        </td>
                                                        @endif
                                                    @else
                                                    <td>No Reviews</td>
                                                    @endif
												</tr>
                                                @endforeach 
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th>Paid</th>													
												</tr>
											</thead>
											<tbody>
                                                @foreach($patient as $patient)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$patient->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$patient->firstname." ".$patient->lastname}} </a>
														</h2>
													</td>
													<td>{{$patient->phoneno}}</td>
                                                    <?php $lastvisit = App\Models\Appointment::where('patient_id','=',$patient->id)->where('status','=','1')->orderby('id','DESC')->first(); ?>
                                                    @if($lastvisit != null)
													<td>{{date("d M,Y",strtotime($lastvisit->created_at));}}</td>
                                                    @else
                                                    <td>Not Visited</td>
                                                    @endif
                                                    <?php $totalamount = App\Models\Appointment::where('patient_id','=',$patient->id)->where('status','=','1')->sum('amountpaid'); ?>
                                                    @if($totalamount !=  null)
													<td class="text">${{$totalamount}}</td>
                                                    @else
                                                    <td class="text">Not Visited</td>
                                                    @endif
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Appointment List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($app as $app)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="{{url('/')}}/doctor-a/profile/{{$app->doctors->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$app->doctors->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="{{url('/')}}/doctor-a/profile/{{$app->doctors->id}}">Dr. {{$app->doctors->firstname." ".$app->doctors->lastname}}</a>
														</h2>
													</td>
													<td>{{$app->doctors->specialization}}</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$app->patients->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$app->patients->firstname." ".$app->patients->lastname}} </a>
														</h2>
													</td>
													<td>{{date("d M,Y",strtotime($app->bookingdate))}} <span class="text-primary d-block">
                                                        {{date("h:i A",strtotime($app->bookingtime))}} - {{date("h:i A",strtotime($app->bookingendtime))}}</span></td>
													<td>
														<div class="status-toggle">
                                                            @if($app->status == "1")
															<input type="checkbox" id="status_{{$app->id}}" class="check" 
															onchange="window.location.href='{{url('/')}}/admin/doapp/{{$app->id}}'" checked>
															<label for="status_{{$app->id}}" class="checktoggle">checkbox</label>
                                                            @elseif($app->status == "2")
                                                            Not Answered
                                                            @else
                                                            <input type="checkbox" id="status_{{$app->id}}" class="check"
															onchange="window.location.href='{{url('/')}}/admin/doapp/{{$app->id}}'">
															<label for="status_{{$app->id}}" class="checktoggle">checkbox</label>
                                                            @endif
														</div>
													</td>
													<td class="text-right">
														${{$app->amountpaid}}
													</td>
												</tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		

		<!-- jQuery -->
        <script src="{{url('/')}}/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{url('/')}}/admin/assets/js/popper.min.js"></script>
        <script src="{{url('/')}}/admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{url('/')}}/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<script src="{{url('/')}}/admin/assets/plugins/raphael/raphael.min.js"></script>    
		<script src="{{url('/')}}/admin/assets/plugins/morris/morris.min.js"></script>  
		{{-- <script src="{{url('/')}}/admin/assets/js/chart.morris.js"></script> --}}
		<script>
			$(function(){
					{{$jan = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',1)->sum('amountpaid');}}
					{{$feb = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',2)->sum('amountpaid');}}
					{{$mar = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',3)->sum('amountpaid');}}
					{{$apr = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',4)->sum('amountpaid');}}
					{{$may = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',5)->sum('amountpaid');}}
					{{$june = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',6)->sum('amountpaid');}}
					{{$july = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',7)->sum('amountpaid');}}
					{{$aug = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',8)->sum('amountpaid');}}
					{{$sep = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',9)->sum('amountpaid');}}
					{{$oct = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',10)->sum('amountpaid');}}
					{{$nov = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',11)->sum('amountpaid');}}
					{{$dec = App\Models\Appointment::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',12)->sum('amountpaid');}}
				
				/* Morris Area Chart */

				window.mA = Morris.Area({
				element: 'morrisArea',
				data: [
				{ y: new Date().getFullYear().toString()+'-01', a: {{$jan}}},
				{ y: new Date().getFullYear().toString()+'-02', a: {{$feb}}},
				{ y: new Date().getFullYear().toString()+'-03', a: {{$mar}}},
				{ y: new Date().getFullYear().toString()+'-04', a: {{$apr}}},
				{ y: new Date().getFullYear().toString()+'-05', a: {{$may}}},
				{ y: new Date().getFullYear().toString()+'-06', a: {{$june}}},
				{ y: new Date().getFullYear().toString()+'-07', a: {{$july}}},
				{ y: new Date().getFullYear().toString()+'-08', a: {{$aug}}},
				{ y: new Date().getFullYear().toString()+'-09', a: {{$sep}}},
				{ y: new Date().getFullYear().toString()+'-10', a: {{$oct}}},
				{ y: new Date().getFullYear().toString()+'-11', a: {{$nov}}},
				{ y: new Date().getFullYear().toString()+'-12', a: {{$dec}}},
				
				],
				xkey: 'y',
				ykeys: ['a'],
				labels: ['Revenue'],
				lineColors: ['#1b5a90'],
				lineWidth: 2,

				fillOpacity: 0.5,
				gridTextSize: 10,
				hideHover: 'auto',
				resize: true,
				redraw: true
				});
					//doctors
					{{$jan1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',1)->count();}}
					{{$feb1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',2)->count();}}
					{{$mar1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',3)->count();}}
					{{$apr1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',4)->count();}}
					{{$may1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',5)->count();}}
					{{$june1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',6)->count();}}
					{{$july1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',7)->count();}}
					{{$aug1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',8)->count();}}
					{{$sep1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',9)->count();}}
					{{$oct1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',10)->count();}}
					{{$nov1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',11)->count();}}
					{{$dec1 = App\Models\Doctor::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',12)->count();}}
					//patients
					{{$jan2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',1)->count();}}
					{{$feb2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',2)->count();}}
					{{$mar2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',3)->count();}}
					{{$apr2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',4)->count();}}
					{{$may2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',5)->count();}}
					{{$june2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',6)->count();}}
					{{$july2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',7)->count();}}
					{{$aug2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',8)->count();}}
					{{$sep2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',9)->count();}}
					{{$oct2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',10)->count();}}
					{{$nov2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',11)->count();}}
					{{$dec2 = App\Models\Patient::whereYear('created_at','=',date('Y'))
					->whereMonth('created_at','=',12)->count();}}

				/* Morris Line Chart */

				window.mL = Morris.Line({
				element: 'morrisLine',
				data: [
				{ y: new Date().getFullYear().toString()+'-01', a: {{$jan1}},  b: {{$jan2}}},
				{ y: new Date().getFullYear().toString()+'-02', a: {{$feb1}},  b: {{$feb2}}},
				{ y: new Date().getFullYear().toString()+'-03', a: {{$mar1}},  b: {{$mar2}}},
				{ y: new Date().getFullYear().toString()+'-04', a: {{$apr1}},  b: {{$apr2}}},
				{ y: new Date().getFullYear().toString()+'-05', a: {{$may1}},  b: {{$may2}}},
				{ y: new Date().getFullYear().toString()+'-06', a: {{$june1}}, b: {{$june2}}},
				{ y: new Date().getFullYear().toString()+'-07', a: {{$july1}}, b: {{$july2}}},
				{ y: new Date().getFullYear().toString()+'-08', a: {{$aug1}},  b: {{$aug2}}},
				{ y: new Date().getFullYear().toString()+'-09', a: {{$sep1}},  b: {{$sep2}}},
				{ y: new Date().getFullYear().toString()+'-10', a: {{$oct1}},  b: {{$oct2}}},
				{ y: new Date().getFullYear().toString()+'-11', a: {{$nov1}},  b: {{$nov2}}},
				{ y: new Date().getFullYear().toString()+'-12', a: {{$dec1}},  b: {{$dec2}}},
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Doctors', 'Patients'],
				lineColors: ['#1b5a90','#ff9d00'],
				lineWidth: 1,
				gridTextSize: 10,
				hideHover: 'auto',
				resize: true,
				redraw: true
				});
				$(window).on("resize", function(){
				mA.redraw();
				mL.redraw();
				});

				});
		</script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>

		<!-- Datatables JS -->
		<script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script>

		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>
		
    </body>

</html>