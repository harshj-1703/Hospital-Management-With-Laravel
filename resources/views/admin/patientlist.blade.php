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
		{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css"> --}}
		{{-- <link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}

		<meta name="csrf-token" content="{{ csrf_token() }}">
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
		{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		
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
										{{-- <table class="datatable table table-hover table-center mb-0"> --}}
											<table class="table table-bordered data-table" style="width: 100%">
											<thead>
												<tr>
													<th>Patient ID</th>
													<th>Patient Name</th>
													<th>Age</th>
													<th>Address</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th>Paid</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                {{-- @foreach($patient as $patient)
												<tr>
													<td>#PT{{$patient->id}}</td>
													<td>
														<h5 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$patient->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$patient->firstname." ".$patient->lastname}} </a>
														</h5>
													</td>
                                                    <?php
                                                        //$today = date("Y-m-d");
                                                        //$diff = date_diff(date_create($patient->dob), date_create($today));
                                                    ?>
													<td>{{$diff->format('%y');}}</td>
													<td>{{$patient->address." , ".$patient->city." , ".$patient->state." , ".$patient->country}}</td>
													<td>{{$patient->phoneno}}</td>
													<?php //$lastvisit = App\Models\Appointment::where('patient_id','=',$patient->id)->where('status','=','1')->orderby('id','DESC')->first(); ?>
                                                    @if($lastvisit != null)
													<td>{{date("d M,Y",strtotime($lastvisit->created_at));}}</td>
                                                    @else
                                                    <td>Not Visited</td>
                                                    @endif
                                                    <?php //$totalamount = App\Models\Appointment::where('patient_id','=',$patient->id)->where('status','=','1')->sum('amountpaid'); ?>
                                                    @if($totalamount !=  null)
													<td class="text">${{$totalamount}}</td>
                                                    @else
                                                    <td class="text">Not Visited</td>
                                                    @endif
												</tr>
                                                @endforeach --}}
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
		{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

		<script type="text/javascript">
			$(function () {
			  var table = $('.data-table').DataTable({
				  processing: true,
				  serverSide: true,
				  ajax: "{{ \URL::to('admin/patientlist') }}",
				  columns: [
					  {data: 'id', name: 'id'},
					  {data: 'pfirstname', name: 'pfirstname'},
					  {data: 'age', name: 'age'},
					  {data: 'address', name: 'address'},
					  {data: 'phoneno', name: 'phoneno'},
					  {data: 'bookingdate', name: 'bookingdate'},
					  {data: 'amount', name: 'amount'},
					  {data: 'action', name: 'action'},
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