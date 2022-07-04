@include('doctor.navbar')
<title>Social Media</title>
<form method="POST" action="{{url('/')}}/doctor/socialmedia">
    @csrf
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/doctor/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Social Media</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            
                @include('doctor.profileslidebar')
                
            </div>
            
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                            {{ session()->get('message') }}
                            </div>
                        @endif
                        @if($userinfo->socialmedias != null)
                        <!-- Social Form -->                                                                                         
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('fb')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Facebook URL</label>
                                        <input type="text" name="fb" value="{{$userinfo->socialmedias->fb}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('twitter')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Twitter URL</label>
                                        <input type="text" name="twitter" value="{{$userinfo->socialmedias->twitter}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('insta')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Instagram URL</label>
                                        <input type="text" name="insta" value="{{$userinfo->socialmedias->insta}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('pinterest')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Pinterest URL</label>
                                        <input type="text" name="pinterest" value="{{$userinfo->socialmedias->pinterest}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('linkedin')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Linkedin URL</label>
                                        <input type="text" name="linkedin" value="{{$userinfo->socialmedias->linkedin}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <span class="text-danger">
                                        @error('yt')
                                          {{$message}}
                                        @enderror
                                    </span>
                                    <div class="form-group">
                                        <label>Youtube URL</label>
                                        <input type="text" name="yt" value="{{$userinfo->socialmedias->yt}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-------------------->
                            @else
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Facebook URL</label>
                                            <input type="text" name="fb" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Twitter URL</label>
                                            <input type="text" name="twitter" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Instagram URL</label>
                                            <input type="text" name="insta" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Pinterest URL</label>
                                            <input type="text" name="pinterest" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Linkedin URL</label>
                                            <input type="text" name="linkedin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-8">
                                        <div class="form-group">
                                            <label>Youtube URL</label>
                                            <input type="text" name="yt" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-------------->
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                        <!-- /Social Form -->
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

</body>

<!-- doccure/social-media.html  30 Nov 2019 04:12:36 GMT -->
</html>