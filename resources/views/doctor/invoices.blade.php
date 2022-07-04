@include('doctor.navbar')
<title>Invoices</title>
			<!-- /Header -->
			<!-- Datatables CSS -->
			<link rel="stylesheet" href="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.css">
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
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
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
								
									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Invoice No</th>
													<th>Patient</th>
													<th>Amount</th>
													<th>Paid On</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($invoices as $invoice)
												<tr>
													<td>
														<a href="{{url('/')}}/doctor/invoice/{{$invoice->id}}" target="_blank">#INV-{{$invoice->id}}</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$invoice->patients->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt="">
															</a>
															<a href="#">{{$invoice->patients->firstname." ".$invoice->patients->lastname}} </a>
														</h2>
													</td>
													<td>${{$invoice->amountpaid}}</td>
													<td>{{date("d M,Y , h:i a",strtotime($invoice->created_at))}}</td>
													<td class="text-right">
														<div class="table-action">
															<a href="{{url('/')}}/doctor/invoice/{{$invoice->id}}" 
																class="btn btn-sm bg-info-light" target="_blank">
																<i class="far fa-eye"></i> View
															</a>
															{{-- <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a> --}}
														</div>
													</td>
												</tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
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
	  
		<!-- jQuery -->
		<script src="{{url('/')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('/')}}/assets/js/popper.min.js"></script>
		<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>

		<!-- jQuery -->
        <script src="{{url('/')}}/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>
		
	</body>
</html>