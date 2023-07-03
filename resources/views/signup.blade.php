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
      
      <!--begin::Aside header-->
      <a href="#" class="login-logo text-center mb-4 mt-50">
      <img src="{{ asset('media/logos/Logo.png') }}" class="max-h-50px" alt="" />
      </a>
      <div class=" text-center">
        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg mt-5" >Create Account</h3>
        <div class="text-muted font-weight-bold font-size-h4 ">Already have an Account?
          <a href="{{ url('/')}}" class="text-primary font-weight-bolder">Signin</a>
        </div>
      </div>
      <!--begin::Login-->
      <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column p-0">
          <!--begin::Wrapper-->
          <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form login-form-signup lform-bg">
              <!--begin::Form-->
              <form class="form" id="signupForm" action="{{ url('signup')}}" method="post">
              @csrf
              <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="font-size-h6 font-weight-bolder text-dark">Organization Name</label>
                      <input class="form-control rounded-lg border-1 l-input " type="text" name="Name" autocomplete="off" required value="{{ old('Name') }}"/>
                      <span class="text-danger">@error('Name') {{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="font-size-h6 font-weight-bolder text-dark">First Name</label>
                      <input class="form-control rounded-lg border-1 l-input" type="text" name="firstName" autocomplete="off" required value="{{ old('firstName') }}"/>
                      <span class="text-danger">@error('firstName') {{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="font-size-h6 font-weight-bolder text-dark">Last Name</label>
                      <input class="form-control rounded-lg border-1 l-input" type="text" name="lastName" autocomplete="off" value="{{ old('lastName') }}" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                      <input class="form-control rounded-lg border-1 l-input" type="text" name="emailAddress" autocomplete="off" required  value="{{ old('emailAddress') }}"/>
                      <span class="text-danger">@error('emailAddress') {{ $message }} @enderror</span>
                    </div>
                  </div>
                  <!--begin::Form group-->
                  <div class="form-group">
                    <div class=" col-form-label">
                      <div class="checkbox-inline">
                        <label class="checkbox checkbox-success">
                        <input type="checkbox" name="Checkboxes5" />
                        <span></span>
                        I have read and agree to the <a href="#" class="pl-1 font-weight-bold"> Terms and conditions.</a></label>
                      </div>
                    </div>
                  </div>
                  <!--end::Form group-->
                </div>
                <!--begin::Action-->
                <div class="pb-lg-0 pb-5">
                  <button type="submit" id="" class="btn btn-outline-primary  font-weight-bolder font-size-h6 my-3 mr-3">Submit</button>
                </div>
                <!--end::Action-->
              </form>
              <!--end::Form-->
            </div>
            <!--end::Signin-->
          </div>
          <!--end::Wrapper-->
        </div>
        <!--end::Content-->
      </div>
      <!--end::Login-->
      <div class="text-center d-flex justify-content-center">
        <div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 ">
          <span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
          <a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get Help</a>
        </div>
      </div>
      <!--begin::Footer-->
      <div class="footer d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center">
          <!--begin::Nav-->
          <div class="nav nav-dark font-16">
            <a href="#" target="_blank" class="nav-link pr-3 pl-0">Legal</a>
            <a href="#" target="_blank" class="nav-link px-3">Privacy</a>
            <a href="#" target="_blank" class="nav-link pl-3 pr-0">Terms</a>
          </div>
          <!--end::Nav-->
          <div class="text-dark text-center font-16 ">
            <span class=" font-weight-bold ml-4">©</span>
            <a href="https://ezbook.com/" target="_blank" class="text-dark-75 text-hover-primary">ezbook</a>
          </div>
        </div>
        <!--end::Container-->
      </div>
      <!--end::Footer-->
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