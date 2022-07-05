<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Doctor List Page</title>
		
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
								<h3 class="page-title">List of Doctors</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Doctor</li>
								</ul>
								<div style="text-align:right;">
									<a href="#add_doctor" data-toggle="modal" class="btn btn-primary">
										<i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Doctor</a></div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						@if(session()->has('message'))
						<div class="alert alert-success">
						{{ session()->get('message') }}
						</div>
						@endif
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										{{-- <div class="container"> --}}
										{{-- <table id="example" class="display" style="width:100%"> --}}
											<table class="table table-bordered data-table" style="width: 100%">
											<thead>
												<tr>
													<th>Id</th>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Member Since</th>
													<th>Earned</th>
													<th>Action</th>
												</tr>
											</thead>
											{{-- <tbody>
                                                @foreach($doctor as $doctor)
												<tr>
													<td>
														<h5 class="table-avatar">
															<a href="{{url('/')}}/doctor-a/profile/{{$doctor->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$doctor->profileimage}}" 
																alt="" onerror=this.src="{{url('/')}}/assets/img/default.png"></a>
															<a href="{{url('/')}}/doctor-a/profile/{{$doctor->id}}">Dr. {{$doctor->firstname." ".$doctor->lastname}}</a>
														</h5>
													</td>
													<td>{{$doctor->specialization}}</td>
													
													<td>{{date("d M,Y",strtotime($doctor->created_at))}} <br>
                                                        <small>{{date("h:i A",strtotime($doctor->created_at))}}</small></td>
													
                                                    <?php //$totalamount = App\Models\Appointment::where('dr_id','=',$doctor->id)
                                                    //->where('status','=','1')->sum('amountpaid'); ?>
													<td>${{$totalamount}}</td>
													
													<td>
														<div class="status-toggle">
                                                            @if($doctor->status == "1")
                                                            <input type="checkbox" id="status_{{$doctor->id}}" class="check" 
                                                            onchange="window.location.href='{{url('/')}}/admin/doctorstatus/{{$doctor->id}}'" checked>
                                                            <label for="status_{{$doctor->id}}" class="checktoggle">checkbox</label>
                                                            @else
                                                            <input type="checkbox" id="status_{{$doctor->id}}" class="check"
                                                            onchange="window.location.href='{{url('/')}}/admin/doctorstatus/{{$doctor->id}}'">
                                                            <label for="status_{{$doctor->id}}" class="checktoggle">checkbox</label>
                                                            @endif
                                                        </div>
													</td>
												</tr>
                                                @endforeach
											</tbody> --}}
											<tbody>

											</tbody>
										</table>
									{{-- </div> --}}
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

		<div class="modal fade" id="add_doctor" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Doctor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('/')}}/admin/adddoctor" method="POST">
							@csrf
							<div class="row form-row">
							<div class="col-12 col-sm-6">
								<span class="text-danger">
									@error('email')
									  {{$message}}
									@enderror
								</span>
								<div class="form-group">
									<label>Email ID</label>
									<input type="email" name="email" class="form-control" value="">
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<span class="text-danger">
									@error('username')
									  {{$message}}
									@enderror
								</span>
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="username" value="" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<span class="text-danger">
									@error('phoneno')
									  {{$message}}
									@enderror
								</span>
								<div class="form-group">
									<label>Mobile</label>
									<input type="text" name="phoneno" maxlength="10" class="form-control">
								</div>
							</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('firstname')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="firstname" class="form-control" value="">
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
										<input type="text" name="lastname" class="form-control" value="">
									</div>
								</div>
								<div class="col-12">
									<span class="text-danger">
										@error('dob')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Date of Birth</label>
										<div class="">
											<input type="date" name="dob" class="form-control" value="">
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('password')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('confirmpassword')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="confirmpassword" class="form-control">
									</div>
								</div>
								{{-- <div class="col-12">
									<h5 class="form-title"><span>Address</span></h5>
								</div>
								<div class="col-12">
									<span class="text-danger">
										@error('address')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
									<label>Address</label>
										<input type="text" name="address" class="form-control" value="">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('city')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>City</label>
										<input type="text" name="city" class="form-control" value="">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('state')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>State</label>
										<input type="text" name="state" class="form-control" value="">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('pincode')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Zip Code</label>
										<input type="number" name="pincode" class="form-control" value="">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<span class="text-danger">
										@error('country')
										  {{$message}}
										@enderror
									</span>
									<div class="form-group">
										<label>Country</label>
										<input type="text" name="country" class="form-control" value="">
									</div>
								</div> --}}
							</div>
							<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
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
				  ajax: "{{ \URL::to('admin/doctorlist') }}",
				  columns: [
					  {data: 'id', name: 'id'},
					  {data: 'drfirstname', name: 'drfirstname'},
					  {data: 'specialization', name: 'specialization'},
					  {data: 'created_at', name: 'created_at'},
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