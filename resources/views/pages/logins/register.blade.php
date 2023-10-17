@extends('layouts.app')
@section('pageTitle', 'Register :: EzBook')

@section('content')
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

                <div id="app" class="message">
                    {{-- @include('flash-message') --}}
                    <x-layouts.message />
                    {{-- @yield('content') --}}
                    {{-- @dd($errors->all() ) --}}
                </div>


            <!--begin::Form-->
            {{-- <x-forms.form action="{{ url('signup')}}"> --}}
            <x-forms.form action="{{ route('register.store')}}">
                <div class="form-group row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <x-forms.input design="4" name="Name" label="Organization Name" class="rounded-lg border-1 l-input">
                            <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Organization Name</x-slot:label>
                        </x-forms.input>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <x-forms.input design="4" name="firstName" label="First Name" class="rounded-lg border-1 l-input">
                            <x-slot:label class="font-size-h6 font-weight-bolder text-dark">First Name</x-slot:label>
                        </x-forms.input>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <x-forms.input design="4" name="lastName" label="Last Name" class="rounded-lg border-1 l-input">
                            <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Last Name</x-slot:label>
                        </x-forms.input>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <x-forms.input design="4" name="emailAddress" label="Your Email" class="rounded-lg border-1 l-input">
                            <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Your Email</x-slot:label>
                        </x-forms.input>
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
                    <button type="submit" id="" class="btn btn-outline-primary font-weight-bolder font-size-h6  my-3 mr-3">Submit</button>

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


