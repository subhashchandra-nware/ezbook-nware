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
		<div class="d-flex flex-column flex-root bg-white">
			<!--begin::Login-->
			<div class="login login-3  d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="container">
					<div class="row justify-content-center mt-lg-155 verify text-center">
						<h2 class="verify-head">Verify Your Email</h2>
						<h3 class="flex verify-text">We have sent an email to <strong>{{ $user['emailAddress'] }}</strong><br/></h3>
<!-- <a href="{{ url('/set-password')}}" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Skip For Now</a> -->
<p>Did’t receive an email?<a href="#">Resend</a></p>

<div class=" d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center " style="background-position-y: calc(100% + 0rem); background-image: url(assets/media/verify-bg.png); background-size: contain; width: 100%; z-index: 99; min-height: 500px; max-height: 700px; height: 100%;"></div>
					</div>

				</div>
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