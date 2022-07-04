@include('doctor.navbar')
<title>Profile Setting</title>
<form method="post" action="{{url('/')}}/doctor/profilesetting" enctype="multipart/form-data">
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile Settings</h2>
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
            
                @include('doctor.profileslidebar')
                
            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">
            
                <!-- Basic Information -->
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                            {{ session()->get('message') }}
                            </div>
                        @endif
                        <h4 class="card-title">Basic Information</h4>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="{{ asset('/storage').'/'.$userinfo->profileimage}}"
                                            onerror=this.src="{{url('/')}}/assets/img/default.png" alt="User Image">
                                        </div>
                                            @csrf
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" name="profileimage" class="upload">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <label class="form-control" style="background-color: rgba(240, 237, 237, 0.998)">{{$userinfo->username;}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <label class="form-control" style="background-color: rgba(240, 237, 237, 0.998)">{{$userinfo->email;}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('firstname')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" class="form-control" value="{{$userinfo->firstname;}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('lastname')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" class="form-control" value="{{$userinfo->lastname;}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('phoneno')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>Phone Number</label><span class="text-danger">*</span>
                                    <input type="text" name="phoneno" maxlength="10" class="form-control" value="{{$userinfo->phoneno;}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('gender')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>Gender</label><span class="text-danger">*</span>
                                    <select class="form-control select" name="gender">
                                        <option>Select</option>
                                        <option value="M"
                                        @if($userinfo->gender == 'M')
                                        selected='selected'
                                        @endif
                                        >Male</option>
                                        <option value="F"
                                        @if($userinfo->gender == 'F')
                                        selected='selected'
                                        @endif
                                        >Female</option>
                                        <option value="O"
                                        @if($userinfo->gender == 'O')
                                        selected='selected'
                                        @endif
                                        >Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('dob')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group mb-0">
                                    <label>Date of Birth</label><span class="text-danger">*</span>
                                    <input type="date" name="dob" class="form-control" value="{{$userinfo->dob}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Basic Information -->
                
                <!-- About Me -->
                <div class="card">
                    <span class="text-danger">
                        @error('biography')
                          {{$message}}
                        @enderror
                    </span>
                    <div class="card-body">
                        <h4 class="card-title">About Me</h4>
                        <div class="form-group mb-0">
                            <label>Biography</label>
                            <textarea class="form-control" rows="5" name="biography">{{$userinfo->biography}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /About Me -->
                
                <!-- Clinic Info -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Clinic Info</h4>
                        <div class="row form-row">
                            @if($userinfo->clinics->count() > 0)
                                @foreach($userinfo->clinics as $userclinic)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Name</label>
                                        <input type="text" name="clinicname" value="{{$userclinic->clinicname}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Address</label>
                                        <input type="text" name="clinicaddress" value="{{$userclinic->clinicaddress}}" class="form-control">
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic Name</label>
                                    <input type="text" name="clinicname" value="----" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Clinic Address</label>
                                    <input type="text" name="clinicaddress" value="----" class="form-control">
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clinic Images</label>
                                    {{-- <form action="#" class="dropzone"></form> --}}
                                </div>
                                <span class="text-danger">
                                    @error('clinicupload.*')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="upload-wrap">
                                    @if($userinfo->clinics->count() > 0)
                                        @if($userclinic->clinicimages->count() > 0)
                                        @foreach($userclinic->clinicimages as $userclinicimg)
                                        {{-- {{dd($userclinicimg);}} --}}
                                        <div class="upload-images">
                                            <img src="{{ asset('/storage').'/'.$userclinicimg->clinicimages}}" alt="Upload Image">
                                            <a href="{{url('/')}}/doctor/profilesetting/{{$userclinicimg->id}}" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                        @endif
                                    @endif
                                </div><br>
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Clinic Photos</span>
                                        <input type="file" name="clinicupload[]" multiple>
                                    </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Info -->

                <!-- Contact Details -->
                <div class="card contact-card">
                    <div class="card-body">
                        <h4 class="card-title">Contact Details</h4>
                        <div class="row form-row">
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('address1')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <input type="text" name="address1" class="form-control" value="{{$userinfo->address1}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('address2')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">Address Line 2</label>
                                    <input type="text" name="address2" class="form-control" value="{{$userinfo->address2}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('city')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">City</label>
                                    <input type="text" name="city" class="form-control" value="{{$userinfo->city}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('state')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">State / Province</label>
                                    <input type="text" name="state" class="form-control" value="{{$userinfo->state}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('country')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <input type="text" name="country" class="form-control" value="{{$userinfo->country}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('pincode')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">Postal Code</label>
                                    <input type="number" name="pincode" class="form-control" value="{{$userinfo->pincode}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Contact Details -->
                
                <!-- Pricing -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pricing</h4>
                        
                        <div class="row form-row">
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('general_cons_price')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label>GENERAL CONSTANT PRICE</label>
                                    <input type="number" name="general_cons_price" class="form-control" value="{{$userinfo->general_cons_price}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('videocallprice')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">VIDEO-CALL PRICE</label>
                                    <input type="number" name="videocallprice" class="form-control" value="{{$userinfo->videocallprice}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">
                                    @error('voicecallprice')
                                      {{$message}}
                                    @enderror
                                </span>
                                <div class="form-group">
                                    <label class="control-label">VOICE-CALL PRICE</label>
                                    <input type="number" name="voicecallprice" class="form-control" value="{{$userinfo->voicecallprice}}">
                                </div>
                            </div>
                        
                    </div>
                </div>
                <!-- /Pricing -->
                
                <!-- Services and Specialization -->
                <div class="card services-card">
                    <div class="card-body">
                        <h4 class="card-title">Services and Specialization</h4>
                        <span class="text-danger">
                            @error('services')
                              {{$message}}
                            @enderror
                        </span>
                        <div class="form-group">
                            <label>Services</label>
                            {{-- <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="HI" id="services"> --}}
                            <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="{{$userinfo->services}}" id="services">
                            <small class="form-text text-muted">Note : Type & Press enter to add new services</small>
                        </div> 
                        <span class="text-danger">
                            @error('specialization')
                              {{$message}}
                            @enderror
                        </span>
                        <div class="form-group mb-0">
                            <label>Specialization </label>
                            <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialization" value="{{$userinfo->specialization}}" id="specialist">
                            <small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
                        </div> 
                    </div>              
                </div>
                <!-- /Services and Specialization -->
             
                <!-- Education -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Education</h4>
                        <div class="education-info">
                            <div class="row form-row education-cont">
                                {{-- {{dd($userinfo->educations)}} --}}
                                @foreach($userinfo->educations as $useredu)
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('degree.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>Degree</label>
                                                <input type="text" class="form-control" value="{{$useredu->degree}}" name="degree[]">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('clg.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>College/Institute</label>
                                                <input type="text" class="form-control" value="{{$useredu->clg}}" name="clg[]">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('yoc.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="number" class="form-control" value="{{$useredu->yoc}}" name="yoc[]">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <!-- /Education -->
            
                <!-- Experience -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Experience</h4>
                        <div class="experience-info">
                            <div class="row form-row experience-cont">
                                @foreach($userinfo->experiences as $userexp)
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('hospital.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>Hospital Name</label>
                                                <input type="text" class="form-control" value="{{$userexp->hospital}}" name="hospital[]">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('hospitalfrom.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="date" class="form-control" value="{{$userexp->from}}" name="hospitalfrom[]">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('hospitalto.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="date" value="{{$userexp->to}}" class="form-control" name="hospitalto[]">
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <span class="text-danger">
                                                @error('hospitaldest.*')
                                                  {{$message}}
                                                @enderror
                                            </span>
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" value="{{$userexp->desg}}" class="form-control" name="hospitaldest[]">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <!-- /Experience -->
                
                <!-- Awards -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Awards</h4>
                        <div class="awards-info">
                            <div class="row form-row awards-cont">
                                @foreach($userinfo->awards as $userawards)
                                <div class="col-12 col-md-5">
                                    <span class="text-danger">
                                        @error('award.*')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Awards</label>
                                        <input type="text" value="{{$userawards->awardname}}" class="form-control" name="award[]">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-5">
                                    <span class="text-danger">
                                        @error('awardyear.*')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="number" value="{{$userawards->year}}" class="form-control" name="awardyear[]">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <!-- /Awards -->
                
                <!-- Memberships -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Memberships</h4>
                        <div class="membership-info">
                            <div class="row form-row membership-cont">
                                @foreach($userinfo->memberships as $usermem)
                                <div class="col-12 col-md-10 col-lg-5">
                                    <span class="text-danger">
                                        @error('membership.*')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Memberships</label>
                                        <input type="text" value="{{$usermem->membership}}" class="form-control" name="membership[]">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <!-- /Memberships -->
                
                <!-- Registrations -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registrations</h4>
                        <div class="registrations-info">
                            <div class="row form-row reg-cont">
                                @foreach($userinfo->registrations as $userreg)
                                <div class="col-12 col-md-5">
                                    <span class="text-danger">
                                        @error('registration.*')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Registrations</label>
                                        <input type="text" value="{{$userreg->registration}}" class="form-control" name="registration[]">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-5">
                                    <span class="text-danger">
                                        @error('regyear.*')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="number" value="{{$userreg->year}}" class="form-control" name="regyear[]">
                                    </div> 
                                </div>
                                <div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="add-more">
                            <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <!-- /Registrations -->
                
                <div class="submit-section submit-btn-bottom" align="center">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </div>
        </div>
        
    </div>
</form>

</div>		
<!-- /Page Content -->
</div>

@include('doctor.footer')

<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{url('/')}}/assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{url('/')}}/assets/js/popper.min.js"></script>
<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="{{url('/')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Select2 JS -->
<script src="{{url('/')}}/assets/plugins/select2/js/select2.min.js"></script>

<!-- Dropzone JS -->
<script src="{{url('/')}}/assets/plugins/dropzone/dropzone.min.js"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{url('/')}}/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

<!-- Profile Settings JS -->
<script src="{{url('/')}}/assets/js/profile-settings.js"></script>

<!-- Custom JS -->
<script src="{{url('/')}}/assets/js/script.js"></script>


{{-- <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
<script src="/path/to/cdn/jquery.min.js"></script>
<script src="/path/to/cdn/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js" crossorigin="anonymous"></script><br type="_moz">
<link rel="stylesheet" href="./jquery.imagesloader.css" />
<script src="./jquery.imagesloader.js"></script> --}}


</body>

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:15 GMT -->
</html>