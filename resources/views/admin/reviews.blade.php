<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Admin - Reviews Page</title>
		
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
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
		
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
								<h3 class="page-title">Reviews</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/admindashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Reviews</li>
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
											<table id="example" class="display" style="width:100%">
											<thead>
												<tr>
													<th>Patient Name</th>
													<th>Doctor Name</th>
													<th>Ratings</th>
													<th>Description</th>
													<th>Date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($review as $r)
												<tr>
													<td>
														<h5 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$r->patients->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="#">{{$r->patients->firstname." ".$r->patients->lastname}} </a>
														</h5>
													</td>
													<td>
														<h5 class="table-avatar">
															<a href="{{url('/')}}/doctor-a/profile/{{$r->doctors->id}}" class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img rounded-circle" src="{{ asset('/storage').'/'.$r->doctors->profileimage}}"
																onerror=this.src="{{url('/')}}/assets/img/default.png" alt=""></a>
															<a href="{{url('/')}}/doctor-a/profile/{{$r->doctors->id}}">Dr. {{$r->doctors->firstname." ".$r->doctors->lastname}}</a>
														</h5>
													</td>
													<td style="max-width: 50px;">
                                                        @if($r->star == "1")
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        @elseif($r->star == "2")
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        @elseif($r->star == "3")
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        @elseif($r->star == "4")
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        @else
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        @endif
													</td>
													
													<td>
                                                        @if(strlen($r->detail) <= '50')
                                                            {{$r->detail}}
                                                        @else
                                                        <?php $y=substr($r->detail,'0','50') . '...'; ?>
                                                        {{$y}}
                                                        @endif
													</td>
														<td>{{date("d M,Y",strtotime($r->created_at))}} <br>
                                                            <small>{{date("h:i A",strtotime($r->created_at))}}</small></td>
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal{{$r->id}}">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
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
			<!-- /Page Wrapper -->
			
            @foreach($review as $rdelete)
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal{{$rdelete->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<a href="{{url('/')}}/admin/deletereview/{{$rdelete->id}}"><button type="button" class="btn btn-primary">Save </button></a>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
            @endforeach
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
		{{-- <script src="{{url('/')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{url('/')}}/admin/assets/plugins/datatables/datatables.min.js"></script> --}}
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

		<!-- Custom JS -->
		<script  src="{{url('/')}}/admin/assets/js/script.js"></script>

		<script>
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
		</script>
		
    </body>

</html>