@include('doctor.navbar')
<title>Reviews</title>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Reviews</h2>
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
							<div class="doc-review review-listing">
							
								<!-- Review Listing -->
								<ul class="comments-list">
								
									<!-- Comment List -->
									@foreach($review as $r)
											<!-- Comment List -->
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="" src="{{ asset('/storage').'/'.$r->patients->profileimage}}"
													onerror=this.src="{{url('/')}}/assets/img/default.png">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">{{$r->patients->firstname." ".$r->patients->lastname}}</span>
															<span class="comment-date">Reviewed {{$diff = now()->diffInDays(\Carbon\Carbon::parse($r->created_at));}} Days ago</span>
															@if($r->star == "1")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "2")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "3")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
															</div>
															@elseif($r->star == "4")
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
															</div>
															@else
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
															</div>
															@endif
														</div>
														@if($r->recommended == "1")
														<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
														@elseif($r->recommended == "0")
														<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
														@else
														@endif
														<h5>
															{{$r->title}}
														</h5>
														<h5 style="font-size: 10px">
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</h5>
														<p class="comment-content">
															{{$r->detail}}
														</p>
														<div class="comment-reply">
															<a href="#" class="comment-btn" data-toggle="modal" data-target="#reply{{$r->id}}">
																<i class="fas fa-reply"></i> Reply
															</a>
															{{-- @if($r->recommended == "2")
														   <p class="recommend-btn">
															<span>Recommend?</span>
															<a href="{{url('/')}}/doctorprofileyes/{{$r->id}}" class="like-btn">
																<i class="far fa-thumbs-up"></i> Yes
															</a>
															<a href="{{url('/')}}/doctorprofileno/{{$r->id}}" class="dislike-btn">
																<i class="far fa-thumbs-down"></i> No
															</a>
															@endif --}}
														</p>
														</div>
													</div>
												</div>
												
												@if(App\Models\Review::where('status','=','1')->where('parent_id','=',$r->id)->count() > 0)
												<!-- Comment Reply -->
												<?php $childr = App\Models\Review::where('status','=','1')->where('parent_id','=',$r->id)
                                                ->where('patient_id','!=',null)->get(); ?>
												@foreach($childr as $childr)
												<ul class="comments-reply">
													<li>
														<div class="comment">
															<img class="avatar avatar-sm rounded-circle" alt="" src="{{ asset('/storage').'/'.$childr->patients->profileimage}}"
															onerror=this.src="{{url('/')}}/assets/img/default.png">
															<div class="comment-body">
																<div class="meta-data">
																	<span class="comment-author">{{$childr->patients->firstname." ".$childr->patients->lastname}}</span>
																	<span class="comment-date">Replied {{$diff = now()->diffInDays(\Carbon\Carbon::parse($childr->created_at));}} Days ago</span>
																	@if($childr->star == "1")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "2")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "3")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "4")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@else
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																	</div>
																	@endif
																</div>
																	@if($childr->recommended == "1")
																	<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
																	@elseif($childr->recommended == "0")
																	<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
																	@else
																	@endif
																<h5>
																	{{$childr->title}}
																</h5>
																<h5 style="font-size: 10px">
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</h5>
																<p class="comment-content">
																	{{$childr->detail}}
																</p>
																<div class="comment-reply">
																	{{-- <a class="comment-btn" href="#" data-toggle="modal" data-target="#secondreply{{$childr->id}}">
																		<i class="fas fa-reply"></i> Reply
																	</a> --}}
																	{{-- @if($childr->recommended == "2")
																   <p class="recommend-btn">
																	<span>Recommend?</span>
																	<a href="{{url('/')}}/doctorprofileyes/{{$childr->id}}" class="like-btn">
																		<i class="far fa-thumbs-up"></i> Yes
																	</a>
																	<a href="{{url('/')}}/doctorprofileno/{{$childr->id}}" class="dislike-btn">
																		<i class="far fa-thumbs-down"></i> No
																	</a>
																	@endif --}}
																</p>
																</div>
															</div>
														</div>
													</li>
												</ul>
												<!-- /Comment Reply -->
												@endforeach
												@endif

                                                @if(App\Models\Review::where('status','=','1')->where('dr_id','=',session('drid'))
                                                ->where('parent_id','=',$r->id)->count() > 0)
												<!-- Comment Reply -->
												<?php $childr2 = App\Models\Review::where('status','=','1')->where('dr_id','=',session('drid'))
                                                ->where('patient_id','=',null)->where('parent_id','=',$r->id)->get(); ?>
												@foreach($childr2 as $childr)
												<ul class="comments-reply">
													<li>
														<div class="comment">
															<img class="avatar avatar-sm rounded-circle" alt="" src="{{ asset('/storage').'/'.$childr->doctors->profileimage}}"
															onerror=this.src="{{url('/')}}/assets/img/default.png">
															<div class="comment-body">
																<div class="meta-data">
																	<span class="comment-author">Dr. {{$childr->doctors->firstname." ".$childr->doctors->lastname}}</span>
																	<span class="comment-date">Replied {{$diff = now()->diffInDays(\Carbon\Carbon::parse($childr->created_at));}} Days ago</span>
																	{{-- @if($childr->star == "1")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "2")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "3")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@elseif($childr->star == "4")
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star"></i>
																	</div>
																	@else
																	<div class="review-count rating">
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																		<i class="fas fa-star filled"></i>
																	</div>
																	@endif --}}
																</div>
																	{{-- @if($childr->recommended == "1")
																	<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
																	@elseif($childr->recommended == "0")
																	<p class="danger"><i class="far fa-thumbs-down"></i> I don't recommend the doctor</p>
																	@else
																	@endif --}}
																<h5>
																	{{$childr->title}}
																</h5>
																<h5 style="font-size: 10px">
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</h5>
																<p class="comment-content">
																	{{$childr->detail}}
																</p>
																<div class="comment-reply">
																	{{-- <a class="comment-btn" href="#" data-toggle="modal" data-target="#secondreply{{$childr->id}}">
																		<i class="fas fa-reply"></i> Reply
																	</a> --}}
																	{{-- @if($childr->recommended == "2")
																   <p class="recommend-btn">
																	<span>Recommend?</span>
																	<a href="{{url('/')}}/doctorprofileyes/{{$childr->id}}" class="like-btn">
																		<i class="far fa-thumbs-up"></i> Yes
																	</a>
																	<a href="{{url('/')}}/doctorprofileno/{{$childr->id}}" class="dislike-btn">
																		<i class="far fa-thumbs-down"></i> No
																	</a>
																	@endif --}}
																</p>
																</div>
															</div>
														</div>
													</li>
												</ul>
												<!-- /Comment Reply -->
												@endforeach
												@endif
												
											</li>
											@endforeach
											<!-- /Comment List -->
																	
										</ul>
								<!-- /Comment List -->
								
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

        <!--Main Reply-->
                    @foreach($review as $m)
                    <div class="modal fade custom-modal" id="reply{{$m->id}}">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Comment Reply</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="info-details">
                                        <li>
                                            <div class="details-header">
                                                        <form action="{{url('/')}}/doctor/doctorreply" method="POST">
                                                            @csrf
                                                            {{-- <div><span class="text-danger">
                                                                @error('mainreplyrating')
                                                                    {{$message}}
                                                                @enderror
                                                            </span></div>
                                                            <div class="form-group">
                                                                <label>Review</label>
                                                                <div class="star-rating">
                                                                    <input id="star{{$m->id}}" type="radio" name="mainreplyrating" value="star5">
                                                                    <label for="star{{$m->id}}" title="5 stars">
                                                                        <i class="active fa fa-star"></i>
                                                                    </label>
                                                                    <input id="star{{($m->id)+1}}" type="radio" name="mainreplyrating" value="star4">
                                                                    <label for="star{{($m->id)+1}}" title="4 stars">
                                                                        <i class="active fa fa-star"></i>
                                                                    </label>
                                                                    <input id="star{{($m->id)+2}}" type="radio" name="mainreplyrating" value="star-3">
                                                                    <label for="star{{($m->id)+2}}" title="3 stars">
                                                                        <i class="active fa fa-star"></i>
                                                                    </label>
                                                                    <input id="star{{($m->id)+3}}" type="radio" name="mainreplyrating" value="star2">
                                                                    <label for="star{{($m->id)+3}}" title="2 stars">
                                                                        <i class="active fa fa-star"></i>
                                                                    </label>
                                                                    <input id="star{{($m->id)+4}}" type="radio" name="mainreplyrating" value="star1">
                                                                    <label for="star{{($m->id)+4}}" title="1 star">
                                                                        <i class="active fa fa-star"></i>
                                                                    </label>
                                                                </div>
                                                            </div> --}}
                                                            <div><span class="text-danger">
                                                                @error('mainreplytitle')
                                                                    {{$message}}
                                                                @enderror
                                                            </span></div>
                                                            <div class="form-group">
                                                                <label>Title of your review</label>
                                                                <input class="form-control" name="mainreplytitle" type="text" value="{{old('mainreplytitle')}}"
                                                                    placeholder="Write your review title here" maxlength="100">
                                                            </div>
                                                            <div><span class="text-danger">
                                                                @error('mainreplydetail')
                                                                    {{$message}}
                                                                @enderror
                                                            </span></div>
                                                            <div class="form-group">
                                                                <label>Your review</label>
                                                                <textarea id="review_desc" maxlength="200" name="mainreplydetail" class="form-control"></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <div class="terms-accept">
                                                                    <div><span class="text-danger">
                                                                        @error('mainreplycondition')
                                                                            {{$message}}
                                                                        @enderror
                                                                    </span></div>
                                                                    <div class="custom-checkbox">
                                                                        <input type="checkbox" name="mainreplycondition" id="terms_accept">
                                                                        <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="mainreplyhiddendrid" value="{{session('drid')}}">
                                                            <input type="hidden" name="mainreplyhiddenparent" value="{{$m->id}}">
                                                            <div class="submit-section">
                                                                <button type="submit" class="btn btn-primary submit-btn">Reply</button>
                                                            </div>
                                                        </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        <!--/Main Reply-->
		
	  
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

<!-- doccure/reviews.html  30 Nov 2019 04:12:15 GMT -->
</html>