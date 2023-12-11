@extends('layouts.admin')
@section('pageTitle', 'Admin Reset Password :: EzBook')

@section('content')
<x-layouts.admin.page>
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark mb-2">Reset Password</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <x-layouts.message />

                    <x-forms.form method="put" action="{{ route('admin.password.update') }}">
                        <x-forms.input value="{{ $user->id }}" name="id" type="hidden" />
                        <x-forms.input value="{{ $token }}" name="token" type="hidden" />
                        <x-forms.input  design="1" type="email" value="{{ old( 'email', $user->email ?? '' ) }}" name="email" label="Email" />
                        {{-- <x-forms.input design="1" type="password" value="{{ old( 'oldPassword', '' ) }}" name="oldPassword" label="Old Password" required aria-autocomplete="off"/> --}}
                        <x-forms.input design="1" type="password" value="{{ old( 'password', '' ) }}" name="password" label="New Password" required autocomplete="new-password"/>
                        <x-forms.input design="1" type="password" value="{{ old( 'password_confirmation', '' ) }}" name="password_confirmation" label="Confirm Password" required autocomplete="new-password"/>

                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end border-top mt-5 pt-10">
                            <div>
                              <x-forms.button design="1" onclick="window.history.go(-1); return false;" value="Cancel" name="" class="btn-exit" />
                              <x-forms.button design="1" value="Save" name="" type="submit" class="btn-save" />
                            </div>
                          </div>
                          <!--end::Actions-->
                    </x-forms.form>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</x-layouts.admin.page>
    <!--end::Main-->


@endsection



