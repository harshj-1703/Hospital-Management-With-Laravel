@foreach($doctor as $dr)
    <div class="card">
        <div class="card-body">
            <div class="doctor-widget">
                <div class="doc-info-left">
                    <div class="doctor-img" style="overflow: hidden; border-radius:5px;">
                        <a href="{{url('/')}}/doctor/profile/{{$dr->id}}">
                            <img src="{{ asset('/storage').'/'.$dr->profileimage}}"
                            onerror=this.src="{{url('/')}}/assets/img/default.png"
                            style="object-fit: cover; width:100%; height:100%;
							transition: 0.5s all ease-in-out;" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="doc-info-cont">
                        <h4 class="doc-name"><a href="{{url('/')}}/doctor/profile/{{$dr->id}}">Dr. 
                            {{$dr->firstname." ".$dr->lastname}}</a></h4>
                        <p class="doc-speciality">{{$dr->services}}</p>
                        <h5 class="doc-department">
                            {{$dr->specialization}}</h5>
                        <div class="rating">
                            <?php $avgstar = App\Models\Review::where('dr_id','=',$dr->id)->avg('star'); ?>
                            @if($avgstar <= "1")
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($avgstar <="2" && $avgstar >= "1")
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($avgstar <="3" && $avgstar >= "2")
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($avgstar <="4" && $avgstar >= "3")
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            @else
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            @endif
                            <?php $totalcomments = App\Models\Review::where('dr_id','=',$dr->id)->count(); ?>
                            <?php $totalrecommend = App\Models\Review::where('dr_id','=',$dr->id)
                            ->where('recommended','!=','2')->count(); ?>
                            <?php $totalrecommendyes = App\Models\Review::where('dr_id','=',$dr->id)
                            ->where('recommended','=','1')->count(); ?>
                            <span class="d-inline-block average-rating">({{$totalcomments}})</span>
                        </div>
                        <div class="clinic-details">
                            @if(\App\Models\Clinic::where('dr_id','=',$dr->id)->count() > 0)
                            <?php $drclinic = \App\Models\Clinic::where('dr_id','=',$dr->id)->first(); ?>
                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$drclinic->clinicaddress}}</p>
                            <ul class="clinic-gallery">
                                @if(\App\Models\Clinicimage::where('clinic_id','=',$drclinic->id)->where('status','=','1')->count() > 0)
                                <?php $drclinicimg = \App\Models\Clinicimage::where('clinic_id','=',$drclinic->id)->where('status','=','1')->get(); ?>
                                @foreach($drclinicimg as $drclinicimg)
                                <li>
                                    <a href="{{ asset('/storage').'/'.$drclinicimg->clinicimages}}" data-fancybox="gallery">
                                        <img src="{{ asset('/storage').'/'.$drclinicimg->clinicimages}}" alt="Feature">
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            @endif
                        </div>
                        <div class="clinic-services">
                            @foreach(explode(',', $dr->specialization) as $spe)
                            <span>{{ $spe }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="doc-info-right">
                    <div class="clini-infos">
                        <ul>
                            @if($totalrecommendyes != '0')
                            <li><i class="far fa-thumbs-up"></i> {{($totalrecommendyes / $totalrecommend)*100}}%</li>
                            @else
                            <li><i class="far fa-thumbs-up"></i> Not Reviewed</li>
                            @endif
                            <li><i class="far fa-comment"></i> {{$totalcomments}} Feedback</li>
                            <li><i class="fas fa-map-marker-alt"></i> {{$dr->city.",".$dr->state.",".$dr->country}}</li>
                            <li><i class="far fa-money-bill-alt"></i> ${{$dr->general_cons_price}} - ${{$dr->videocallprice}} 
                                <i class="fas fa-info-circle" data-toggle="tooltip" title="GENERAL PRICE-VIDEO CALL PRICE"></i> </li>
                        </ul>
                    </div>
                    <div class="clinic-booking">
                        <a class="view-pro-btn" href="{{url('/')}}/doctor/profile/{{$dr->id}}">View Profile</a>
                        <a class="apt-btn" href="{{url('/')}}/doctor/booking/{{$dr->id}}">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach