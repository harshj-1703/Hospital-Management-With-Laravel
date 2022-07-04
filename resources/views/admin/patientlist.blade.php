<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Patient List Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css">
		
		@include('admin.navbar')
			<!-- /Header -->
			
			<!-- Sidebar -->
          @include('admin.slidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Patient</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Patient ID</th>
													<th>Patient Name</th>
													<th>Age</th>
													<th>Address</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th class="text-right">Paid</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($patient as $patient)
												<tr>
													<td>#PT{{$patient->id}}</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$patient->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$patient->firstname." ".$patient->lastname}} </a>
														</h2>
													</td>
                                                    <?php
                                                        $today = date("Y-m-d");
                                                        $diff = date_diff(date_create($patient->dob), date_create($today));
                                                    ?>
													<td>{{$diff->format('%y');}}</td>
													<td>{{$patient->address." , ".$patient->city." , ".$patient->state." , ".$patient->country}}</td>
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
							</div>
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
		
		<!-- Datatables JS -->
		<script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>
		
    </body>

</html>