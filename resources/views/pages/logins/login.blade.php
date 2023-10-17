@extends('layouts.app')
@section('pageTitle', 'Login :: EzBook')

@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Aside header-->
        <a href="#" class="login-logo text-center mb-4 mt-50">
            <img src="{{ asset('media/logos/Logo.png') }}" class="max-h-50px" alt="" />
        </a>
        <!--begin::Login-->
        <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid ">
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="login-content col-md-6 d-flex flex-column p-10">

                <!--begin::Wrapper-->
                <div class="d-flex flex-row-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form lform-bg">
                        <!--begin::Form-->
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <div id="app">
                                {{-- @include('flash-message') --}}
                                <x-layouts.message />
                                {{-- @yield('content') --}}
                            </div>
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
                            <div class="text-muted font-weight-bold font-size-h4">New Here?
                                {{-- <a href="{{ url('/signup') }}" class="text-primary font-weight-bolder">Create Account</a> --}}
                                <a href="{{ route('register') }}" class="text-primary font-weight-bolder">Create Account</a>
                            </div>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->

                        {{-- <x-forms.form action="{{ url('sign-in')}}"> --}}
                        <x-forms.form action="{{ route('login.login')}}">
                            <x-forms.input design="4" name="EmailAddress" label="Your Email">
                                <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Your Email</x-slot:label>
                            </x-forms.input>
                            <x-forms.input design="4" name="Password" label="Your Password" type="password">
                                <x-slot:label class="font-size-h6 font-weight-bolder text-dark">Your Password</x-slot:label>
                            </x-forms.input>

                            <div class="d-flex justify-content-between">
                                <button type="submit" id="" class="btn btn-outline-primary font-weight-bolder font-size-h6  my-3 mr-3">Sign In</button>
                                <a href="forgot.html"
                                class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Forgot
                                Password ?</a>
                            </div>
                        </x-forms.form>


                        {{-- <form  action="{{ url('sign-in') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                                <input class="form-control l-input  rounded-lg border-1" type="text" name="EmailAddress"
                                    required autocomplete="off" value="{{ old('EmailAddress') }}" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Your Password</label>
                                    <a href="forgot.html"
                                        class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Forgot
                                        Password ?</a>
                                </div>
                                <input class="form-control l-input rounded-lg border-1" type="password" name="Password"
                                    required autocomplete="off" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id=""
                                    class="btn btn-outline-primary font-weight-bolder font-size-h6  my-3 mr-3">Sign
                                    In</button>

                            </div>
                            <!--end::Action-->
                        </form> --}}


                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <div class="ordiv">
                <h4>OR</h4>
            </div>
            <!--end::Content-->
            <div class="login-aside col-md-5 d-flex flex-column justify-content-center lbdr">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column pt-lg-10 align-items-center pt-15 pt-sm-0 pt-xs-0 sso">
                    <div class="col-md-12  "><a href="#" class="btn btn-primary btn-sso f-16"> Login with SSO</a>
                    </div>

                </div>
                <!--end::Aside Top-->

            </div>
            <!--begin::Aside-->

        </div>
        <!--end::Login-->
        <div class="text-center d-flex justify-content-center">
            <div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 ">
                <span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
                <a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get
                    Help</a>
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
