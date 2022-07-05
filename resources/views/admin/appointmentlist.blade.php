<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Appointment List Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/admin/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css"> --}}
		<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
		{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}

		<meta name="csrf-token" content="{{ csrf_token() }}">
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
		{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{url('/')}}/admin/assets/css/style.css">
@include('admin.navbar')
	<!-- /Header -->
			
@include('admin.slidebar')
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										{{-- <table class="datatable table table-hover table-center mb-0"> --}}
											<table class="table table-bordered data-table" style="width: 100%">
											<thead>
												<tr>
													<th>Id</th>
													<th>Doctor Name</th>
													<th>Purpose</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													<th style="text-align: center;">Amount</th>
												</tr>
											</thead>
											<tbody>
                                                {{-- @foreach($app as $app)
												<tr>
													<td>
														<h5 class="table-avatar">
															<a href="{{url('/')}}/doctor-a/profile/{{$app->doctors->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$app->doctors->profileimage}}" 
																onerror=this.src="{{url('/')}}/assets/img/default.png"alt="User Image"></a>
															<a href="{{url('/')}}/doctor-a/profile/{{$app->doctors->id}}">Dr. {{$app->doctors->firstname." ".$app->doctors->lastname}}</a>
														</h5>
													</td>
													<td>{{$app->doctors->specialization}}</td>
													<td>
														<h5 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" 
                                                                src="{{ asset('/storage').'/'.$app->patients->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image"></a>
															<a href="#">{{$app->patients->firstname." ".$app->patients->lastname}} </a>
														</h5>
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
                                                @endforeach --}}
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
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>

		<script type="text/javascript">
			$(function () {
			  var table = $('.data-table').DataTable({
				  processing: true,
				  serverSide: true,
				  ajax: "{{ \URL::to('admin/appointmentlist') }}",
				  columns: [
					{data: 'id', name: 'id'},
					{data: 'drfirstname', name: 'drfirstname'},
					{data: 'purpose', name: 'purpose'},
					{data: 'patientfirstname', name: 'patientfirstname'},
					{data: 'bookingtime', name: 'bookingtime'},
					{data: 'status', name: 'status'},
					{data: 'amountpaid', name: 'amountpaid'},
				  ]
			  });
			});
		</script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>

		{{-- <script>
			$(document).ready(function () {
			$('#example').DataTable({
				initComplete: function () {
					this.api()
						.columns()
						.every(function () {
							var column = this;
							var select = $('<select><option value=""></option></select>')
								.appendTo($(column.footer()).empty())
								.on('change', function () {
									var val = $.fn.dataTable.util.escapeRegex($(this).val());
		
									column.search(val ? '^' + val + '$' : '', true, false).draw();
								});
		
							column
								.data()
								.unique()
								.sort()
								.each(function (d, j) {
									select.append('<option value="' + d + '">' + d + '</option>');
								});
						});
				},
			});
		});
		</script> --}}
		
    </body>

</html>