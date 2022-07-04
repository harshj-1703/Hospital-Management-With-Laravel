@include('doctor.navbar')
<title>Timeing Schedules</title>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Schedule Timings</h2>
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
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
                                                @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                                </div>
                                                @endif
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select class="select form-control">
																<option>-</option>
																<option>15 mins</option>
																<option>30 mins</option>  
																<option>45 mins</option>
																<option>1 Hour</option>
															</select>
														</div>
													</div>
												</div>     
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link active" data-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont">
															
																<!-- Sunday Slot -->
																<div id="slot_sunday" class="tab-pane fade show active">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->sunday == null || $userinfo->sunday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_sunday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_sunday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->sunday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->sunday == null || $userinfo->sunday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->monday == null || $userinfo->monday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_monday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_monday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->monday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->monday == null || $userinfo->monday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->tuesday == null || $userinfo->tuesday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_tuesday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_tuesday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->tuesday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->tuesday == null || $userinfo->tuesday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->wednesday == null || $userinfo->wednesday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_wednesday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_wednesday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->wednesday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->wednesday == null || $userinfo->wednesday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->thursday == null || $userinfo->thursday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_thursday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_thursday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->thursday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->thursday == null || $userinfo->thursday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->friday == null || $userinfo->friday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_friday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_friday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->friday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->friday == null || $userinfo->friday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span>
                                                                        @if($userinfo->saturday == null || $userinfo->saturday == '[]')
																		    <a class="edit-link" data-toggle="modal" href="#add_time_slot_saturday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                                        @else
                                                                            <a class="edit-link" data-toggle="modal" href="#edit_time_slot_saturday"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                                        @endif
																	</h4>
                                                                    <div class="doc-times">
                                                                        @foreach($userinfo->saturday as $sunday)
                                                                        <div class="doc-slot-list">
                                                                            {{date("g:i a",strtotime($sunday->starttime))."-".date("g:i a",strtotime($sunday->endtime))}}
                                                                            <a href="{{url('/')}}/doctor/timeschedules/delete/{{$sunday->id}}" class="delete_schedule">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        @endforeach    
																	</div>
                                                                    @if($userinfo->saturday == null || $userinfo->saturday == '[]')
																	    <p class="text-muted mb-0">Not Available</p>
                                                                    @endif
																</div>
																<!-- /Saturday Slot -->

															</div>
															<!-- /Schedule Content -->
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
        @include('doctor.footer')
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Add Time Slot Modal sunday-->
		<div class="modal fade custom-modal" id="add_time_slot_sunday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addsunday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal sunday-->
		

		<!-- Edit Time Slot Modal Sunday-->
		<div class="modal fade custom-modal" id="edit_time_slot_sunday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editsunday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->sunday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal sunday-->

        <!-- Add Time Slot Modal monday-->
		<div class="modal fade custom-modal" id="add_time_slot_monday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addmonday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal sunday-->
		

		<!-- Edit Time Slot Modal monday-->
		<div class="modal fade custom-modal" id="edit_time_slot_monday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editmonday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->monday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal monday-->


        <!-- Add Time Slot Modal tuesday-->
		<div class="modal fade custom-modal" id="add_time_slot_tuesday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addtuesday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal tuesday-->
		

		<!-- Edit Time Slot Modal tuesday-->
		<div class="modal fade custom-modal" id="edit_time_slot_tuesday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/edittuesday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->tuesday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal tuesday-->


        <!-- Add Time Slot Modal wednesday-->
		<div class="modal fade custom-modal" id="add_time_slot_wednesday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addwednesday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal wednesday-->
		

		<!-- Edit Time Slot Modal wednesday-->
		<div class="modal fade custom-modal" id="edit_time_slot_wednesday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editwednesday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->wednesday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal wednesday-->


        <!-- Add Time Slot Modal thursday-->
		<div class="modal fade custom-modal" id="add_time_slot_thursday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addthursday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal thursday-->
		

		<!-- Edit Time Slot Modal thursday-->
		<div class="modal fade custom-modal" id="edit_time_slot_thursday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editthursday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->thursday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal thursday-->

        <!-- Add Time Slot Modal friday-->
		<div class="modal fade custom-modal" id="add_time_slot_friday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addfriday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal friday-->
		

		<!-- Edit Time Slot Modal friday-->
		<div class="modal fade custom-modal" id="edit_time_slot_friday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editfriday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->friday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal friday-->

        <!-- Add Time Slot Modal saturday-->
		<div class="modal fade custom-modal" id="add_time_slot_saturday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/addsaturday" method="post">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" class="form-control">
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal saturday-->
		

		<!-- Edit Time Slot Modal saturday-->
		<div class="modal fade custom-modal" id="edit_time_slot_saturday">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/doctor/timeschedules/editsaturday" method="POST">
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
                                        @foreach($userinfo->saturday as $sunday)
										<div class="row form-row">
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('starttime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>Start Time</label>
                                                    <input type="time" name="starttime[]" value="{{$sunday->starttime}}" class="form-control">
												</div> 
											</div>
											<div class="col-12 col-md-6">
                                                <span class="text-danger">
                                                    @error('endtime.*')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="form-group">
													<label>End Time</label>
                                                    <input type="time" name="endtime[]" value="{{$sunday->endtime}}" class="form-control">
												</div> 
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal saturday-->
	  
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
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

<!-- doccure/schedule-timings.html  30 Nov 2019 04:12:09 GMT -->
</html>