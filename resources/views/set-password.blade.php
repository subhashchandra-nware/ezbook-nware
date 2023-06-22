<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <base>
    <meta charset="utf-8" />
    <title>Signup | EZ-Book</title>
    <meta name="description" content="Singin page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.cchem/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
  </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 pr-5 ">
							<span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
							<a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get Help</a>
						</div>
			<a href="#" class="login-logo text-center mb-4 mt-4">
							<img src="{{ asset('media/logos/logo.png') }}" class="max-h-50px" alt="" />
						</a>
			<!--begin::Login-->
			<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				
				<!--begin::Content-->
				<div class="login-content flex-column-fluid d-flex flex-column p-10">
					
					<!--begin::Wrapper-->
					<div class="d-flex flex-row-fluid flex-center">
						<!--begin::Forgot-->
						<div class="login-form">
							<!--begin::Form-->
							@if($pass == 'set')
							<form class="form" id="" action="{{ url('password-already-set')}}" method="post">
							@else
							<form class="form" id="" action="{{ url('set-password')}}" method="post">
							@endif
                            @csrf
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									@if($pass == 'set')
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Verify your Site.</h3>
									@else
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Set Password and Verify your Site.</h3>
									@endif
									
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								@if($pass != 'set')
								<div class="form-group">
									<input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="password" placeholder="Enter Password" name="password" autocomplete="off" />
                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
								</div>

                                <div class="form-group">
									<input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="password" placeholder="Enter Confirm Password" name="password_confirmation" autocomplete="off" />
                                    <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
								</div>
								@endif
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap">
									<button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
									<a href="{{ url('/session-expire') }}" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Forgot-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
	<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/custom/login/login-3.js') }}"></script>
    <!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>