<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <base>
    <meta charset="utf-8" />
    <title>Welcome | EZ-Book</title>
    <meta name="description" content="Forgot password page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root bg-white">
      <!--begin::Login-->
      <div class="login login-3  d-flex flex-column flex-lg-row flex-column-fluid align-items-center">
        <div class="container">
          <div class="row justify-content-center  verify text-center">
            <a href="#" class="login-logo text-center mb-5">
            <img src="{{ asset('media/logos/logo.png')}}" class="max-h-50px" alt="" />
            </a>
            <h2 class="verify-head">Welcome to ezBook</h2>
            <h3 >Welcome and congrats on signing up to EZBook, where Booking is Made Easy!. Please click on the Start Now button below to setup your site and enjoy the benefits of EZBook. Welcome and congrats on signing up to EZBook, where Booking is Made Easy!. <br/>Please click on the Start Now button below to setup your site and enjoy the benefits of EZBook.  </h3>
            <h3>If you have questions, comments or concerns, don’t hesitate to reach out via email at <a href="mailto:support@ezbook.com">support@ezbook.com.</a></h3>
            <a href="{{ url('/site-settings') }}" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Start Now</a>
          </div>
        </div>
      </div>
      <!--end::Login-->
    </div>
  </body>
  <!--end::Body-->
</html>