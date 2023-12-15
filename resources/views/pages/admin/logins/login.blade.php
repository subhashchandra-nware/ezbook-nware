@extends('layouts.admin')
@section('pageTitle', 'Admin Login :: EzBook')

@section('content')
<!--begin::Main-->
<div class="d-flex flex-column flex-root">

    <!--begin::Aside header-->
    <a href="#" class="login-logo text-center mb-4 mt-50">
    <img src="{{ asset('media/logos/Logo.png') }}" class="max-h-50px" alt="" />
    </a>
    <div class=" text-center">
      <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg mt-5" >Super Admin</h3>
      {{-- <div class="text-muted font-weight-bold font-size-h4 ">Already have an Account?
        <a href="{{ url('/')}}" class="text-primary font-weight-bolder">Signin</a>
      </div> --}}
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

                <div id="app" class="message">
                    <x-layouts.message />
                </div>


            <!--begin::Form-->
                <x-forms.form action="{{ route('admin.login')}}">
                    <x-forms.input design="4" name="email" label="Your Email" aria-autocomplete="off" required autocomplete="new-email">
                        <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Your Email</x-slot:label>
                    </x-forms.input>
                    <x-forms.input design="4" name="password" label="Your Password" type="password" aria-autocomplete="off" required>
                        <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Your Password</x-slot:label>
                    </x-forms.input>

                    <div class="d-flex justify-content-between">
                        <button type="submit" id="" class="btn btn-outline-primary font-weight-bolder font-size-h6  my-3 mr-3">Sign In</button>
                        <a href="forgot.html"
                        class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Forgot
                        Password ?</a>
                    </div>
                </x-forms.form>


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
@endsection

@pushOnce('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
@endpushOnce

@pushOnce('scripts')
<script src="{{ asset('js/pages/custom/login/login-3.js') }}"></script>
@endpushOnce


