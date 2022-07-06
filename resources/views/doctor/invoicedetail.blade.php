@include('doctor.navbar')
<title>Invoice Detail</title>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice View</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoice View</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="{{url('/')}}/assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>Order:</strong> #HJ-{{$app->id}} <br>
												<strong>Invoice Issued:</strong> {{date("d M,Y",strtotime($app->created_at))}} <br>
                                                <strong>Appointment Date:</strong> {{date("d M,Y",strtotime($app->bookingdate))}} <br>
                                                <strong>Appointment Time:</strong> {{date("h:i a",strtotime($app->bookingtime))." ".date("h:i a",strtotime($app->bookingendtime))}} <br>
                                            </p>
										</div>
									</div>
								</div>
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Invoice From</strong>
												<p class="invoice-details invoice-details-two">
													Dr. {{$doctor->firstname." ".$doctor->lastname}} <br>
													{{strtoupper($doctor->address1)}}<br>
                                                    @if($doctor->city != null)
													{{strtoupper($doctor->city.",".$doctor->state.",".$doctor->country)}}<br>
                                                    @endif
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Invoice To</strong>
												<p class="invoice-details">
													{{$patient->firstname." ".$patient->lastname}} <br>
													{{strtoupper($patient->address)}} <br>
                                                    @if($patient->city != null)
													{{strtoupper($patient->city.",".$patient->state.",".$patient->country)}} <br>
                                                    @endif
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-info">
												<strong class="customer-text">Payment Method</strong>
												@if($app->razorpayid != null)
													<p class="invoice-details invoice-details-two">
														RazorPay <br>
													</p>
												@else
													<p class="invoice-details invoice-details-two">
														Cash <br>
													</p>
												@endif
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
															<th colspan="2">Description</th>
															{{-- <th class="text-center">Quantity</th> --}}
															{{-- <th class="text-center">VAT</th> --}}
															<th class="text-right">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td colspan="2">General Consultation</td>
															{{-- <td class="text-center">1</td> --}}
															{{-- <td class="text-center">$0</td> --}}
															<td class="text-right">${{$app->amountpaid}}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
													{{-- <tr>
														<th>Subtotal:</th>
														<td><span>$350</span></td>
													</tr>
													<tr>
														<th>Discount:</th>
														<td><span>-10%</span></td>
													</tr> --}}
													<tr>
														<th>Total Amount:</th>
														<td><span>${{$app->amountpaid}}</span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Other information</h4>
									<p class="text-muted mb-0">
										This is digital invoice generated by website.
									</p>
								</div>
								<!-- /Invoice Information -->
								
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
		
		<!-- Custom JS -->
		<script src="{{url('/')}}/assets/js/script.js"></script>
		
	</body>

<!-- doccure/invoice-view.html  30 Nov 2019 04:12:20 GMT -->
</html>