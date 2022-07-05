<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Transactions List Page</title>
		
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
								<h3 class="page-title">Transactions</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Transactions</li>
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
										{{-- <table class="datatable table table-hover table-center mb-0"> --}}
											<table class="table table-bordered data-table" style="width: 100%">
											<thead>
												<tr>
													<th>Invoice Number</th>
													<th>Patient ID</th>
													<th>Patient Name</th>
													<th>Transection Date</th>
													<th>Total Amount</th>
													<th class="text-center">Razorpayid</th>
													{{-- <th class="text-right">Actions</th> --}}
												</tr>
											</thead>
											<tbody>
                                                {{-- @foreach($app as $a)
												<tr>
													<td><a href="{{url('/')}}/admin/invoice/{{$a->id}}" target="_blank">#IN{{$a->id}}</td>
													<td>#PT{{$a->patients->id}}</td>
													<td>
														<h5 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('storage')."/".$a->patients->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$a->patients->firstname." ".$a->patients->lastname}} </a>
														</h5>
													</td>
													<td>${{$a->amountpaid}}</td>
													<td class="text-center"> --}}
														{{-- <span class="badge badge-pill bg-success inv-badge">Paid</span> --}}
                                                        {{-- {{$a->razorpayid}}
													</td>
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal{{$a->id}}">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
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
				  ajax: "{{ \URL::to('admin/transections') }}",
				  columns: [
					{data: 'id', name: 'id'},
					{data: 'patientid', name: 'patientid'},
					{data: 'patientfirstname', name: 'patientfirstname'},
					{data: 'created_at', name: 'created_at'},
					{data: 'amountpaid', name: 'amountpaid'},
					{data: 'razorpayid', name: 'razorpayid'},
				  ]
			  });
			});
		</script>

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