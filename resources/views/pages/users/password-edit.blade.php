
@extends('layouts.app')
@section('pageTitle', 'Reset Password :: EzBook')

@section('content')
<x-layouts.page-default>
    {{-- <x-slot:heading>Site Setting</x-slot:heading> --}}
    @php
        // extract($data);
    @endphp
 <x-layouts.message />

<x-layouts.form heading="Reset Password">
    <x-forms.form method="put" action="{{ route('password.update') }}">
        <x-forms.input value="{{ session('loginUserId') }}" name="id" type="hidden" />
        {{-- <x-forms.input value="{{ old( 'IsBusinessProfileUpdated', $IsBusinessProfileUpdated??'' ) }}" name="IsBusinessProfileUpdated" type="hidden" /> --}}
        <x-forms.input design="1" type="password" value="{{ old( 'oldPassword', $oldPassword??'' ) }}" name="oldPassword" label="Old Password" />
        <x-forms.input design="1" type="password" value="{{ old( 'Password', $Password??'' ) }}" name="Password" label="New Password" />
        <x-forms.input design="1" type="password" value="{{ old( 'confirmPassword', $confirmPassword??'' ) }}" name="confirmPassword" label="Confirm Password" />

        <!--begin::Actions-->
        <div class="d-flex justify-content-end border-top mt-5 pt-10">
            <div>
              <x-forms.button design="1" value="Cancel" name="" class="btn-exit" />
              <x-forms.button design="1" value="Save" name="" type="submit" class="btn-save" />
            </div>
          </div>
          <!--end::Actions-->
    </x-forms.form>
</x-layouts.form>
</x-layouts.page-default>
@endsection
