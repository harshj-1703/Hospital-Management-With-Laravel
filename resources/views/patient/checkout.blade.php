@include('patient.navbar')
<title>Checkout</title>
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="{{url('/')}}/checkout" method="post">
                                        @csrf
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
                                                    <span class="text-danger">
                                                        @error('firstname')
                                                          {{$message}}
                                                        @enderror
                                                    </span>
													<div class="form-group card-label">
														<label>First Name</label>
														<input name="firstname" class="form-control" value="{{$patient->firstname}}" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
                                                    <span class="text-danger">
                                                        @error('lastname')
                                                          {{$message}}
                                                        @enderror
                                                    </span>
													<div class="form-group card-label">
														<label>Last Name</label>
														<input name="lastname" class="form-control" value="{{$patient->lastname}}" type="text">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<span class="text-danger">
														@error('email')
														  {{$message}}
														@enderror
													</span>
													<div class="form-group card-label">
														<label>Email</label>
														<input name="email" class="form-control" value="{{$patient->email}}" type="email">
                                                        {{-- <label class="form-control">{{$patient->email}}</label> --}}
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<span class="text-danger">
														@error('phoneno')
														  {{$message}}
														@enderror
													</span>
													<div class="form-group card-label">
														<label>Phone</label>
														<input name="phoneno" class="form-control" value="{{$patient->phoneno}}" type="text">
                                                        {{-- <label class="form-control">{{$patient->phoneno}}</label> --}}
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<span class="text-danger">
														@error('purpose')
														  {{$message}}
														@enderror
													</span>
													<div class="form-group card-label">
														<label>Purpose</label>
														<input name="purpose" class="form-control" value="" type="text">
                                                        {{-- <label class="form-control">{{$patient->phoneno}}</label> --}}
													</div>
												</div>
											</div>
											{{-- <div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div> --}}
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											{{-- <h4 class="card-title">Payment Method</h4> --}}
											
											{{-- <!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div>
											<!-- /Paypal Payment --> --}}
											
											<!-- Terms Accept -->
											{{-- <div class="terms-accept">
                                                <span class="text-danger">
                                                    @error('condition')
                                                      {{$message}}
                                                    @enderror
                                                </span>
												<div class="custom-checkbox">
												   <input type="checkbox" name="condition" id="terms_accept">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div> --}}
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="{{url('/')}}/doctor/profile/{{$doctor->id}}" class="booking-doc-img">
											<img src="{{ asset('/storage').'/'.$doctor->profileimage}}"
											onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="{{url('/')}}/doctor/profile/{{$doctor->id}}">Dr. {{$doctor->firstname." ".$doctor->lastname}}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->city.",".$doctor->state.",".$doctor->country}}</p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date <span>{{session('appdate');}}</span></li>
												<li>Time <span>{{date("g:i a",strtotime($ds->starttime))}}</span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>${{$doctor->general_cons_price}}</span></li>
												<li>Booking Fee <span>$10</span></li>
												{{-- <li>Video Call <span>$50</span></li> --}}
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">${{$doctor->general_cons_price + 10}}</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
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
		
	</body>

</html>