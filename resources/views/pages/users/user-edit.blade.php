@php
    extract($data);
    $adminLevel = array_combine(array_column($UserTypes, 'id'), array_column($UserTypes, 'userType'));
    $groups = array_combine(array_column($UserGroups, 'id'), array_column($UserGroups, 'Name'));
    $user = collect($data)->get('users')->first();
    // dd($data);
    // $groupIds = (gettype($user->UsersInGroups->GroupID) == "integer" ) ? [$user->UsersInGroups->GroupID] : $user->UsersInGroups->GroupID;
    $groupIds = collect($user->UsersInGroups->toArray())->pluck('GroupID')->all();
    // dd($data, $users, $user, $user->UsersInGroups->toArray(), $groupIds);
@endphp
@extends('layouts.app')
@section('pageTitle', 'Edit User :: EzBook')

@section('content')
<x-layouts.page-form heading="User">
        {{-- <x-layouts.message /> --}}
        <x-forms.form class="form" method="PUT" action="{{ route('user.update', ['user' => $user->id]) }}">
            <x-forms.input value="{{ $user->id ?? '' }}" name="id" type="hidden" />
            {{-- <x-forms.input value="{{ old( 'id', $id??'' ) }}" name="id" type="hidden" /> --}}

            <!--begin::Form Wizard-->
            <!--begin::Step 1-->
            <div class="pb-5">
                <div class="mb-10 ">
                    <ul class="nav nav-pills" id="myTab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#general">
                                <span class="nav-text">General Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#permissions">
                                <span class="nav-text">Permissions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#group-member">
                                <span class="nav-text">Group Membership</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row" id="general">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mb-5">
                            <h6 class="mb-0"><strong>General Details</strong></h6>
                        </div>
                        <x-forms.input value="{{ $user->Name ?? '' }}" design="1" name="Name" label="User Name"
                            desc="Enter the full name of user here." />

                        <x-forms.input value="{{ $user->LoginName ?? '' }}" design="1" name="LoginName"
                            label="Logon Name"
                            desc="This Logon Name uniquely identifies users when they log on to your system.<span style='color:red'>( Up to 20 Characters)</span>" />

                        <x-forms.input value="" design="1" type="password" name="Password"
                            label="Logon Password"
                            desc="<span style='color:red'>(optional, 20 character limit)</span> if entered here the user will be required to supply this password to gain access
                            when logging on to system, Passwords are restricted to 10 alphabetic characters and/or numerals and are case-senstive." />

                        <x-forms.input value="{{ $user->EmailAddress ?? '' }}" design="1" name="EmailAddress"
                            label="e-Mail Address"
                            desc="<span style='color:red'>(optional)</span> Supply user's email address here if they are to be able to receive system or user messages." />

                        <x-forms.input value="{{ $user->PhoneNumbers ?? '' }}" design="1" name="PhoneNumbers"
                            label="Phone Number(s)"
                            desc="<span style='color:red'>(optional)</span> Enter contact phone or extension numbers here." />

                        <x-forms.textarea value="{{ $user->Description ?? '' }}" design="1" name="Description"
                            label="Supplementary Info"
                            desc="<span style='color:red'>(optional)</span> Enter any user notes here.</span>" />
                    </div>
                </div>
                <div class="row" id="permissions">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Permissions</h6>
                        </div>
                        {{-- @dd($UserTypes) --}}
                        <x-forms.select selected="{{ $user->AdminLevel ?? '' }}" design="1" name="AdminLevel"
                            label="Admin Level" :options="$adminLevel"
                            desc="You may choose to grant the user any management
                            rights that you have been granted, A 'Administrator' has all of the rights mentioned
                            below. Assign rights individually to 'General Users'." />


                        <h6>This User May:</h6>
                        <x-forms.checkbox checked="{{ $user->ManageUsers ?? '' }}" design="1" name="ManageUsers"
                            value="1" label="Manage Users"
                            desc="This option allows the user to:
                            <ul>
                                <li>Create new user accounts</li>
                                <li>Delete existing users</li>
                                <li>Change user details</li>
                            </ul>" />

                        <x-forms.checkbox checked="{{ $user->ManageFacilities ?? '' }}" design="1" name="ManageFacilities"
                            value="1" label="Manage Facilities"
                            desc="This option allows the user to:
                            <ul>
                                <li>Create new facilties to be booked</li>
                                <li>Delete existing facilties </li>
                                <li>Update configuration and other details for existing facilties </li>
                            </ul>" />

                        <x-forms.checkbox checked="{{ $user->ManageSysSettings ?? '' }}" design="1" name="ManageSysSettings"
                            value="1" label="Manage Sysytem Setting"
                            desc="This option allows the user to update the system preference and settings." />

                        <x-forms.checkbox checked="{{ $user->CancelBookings ?? '' }}" design="1" name="CancelBookings"
                            value="1" label="Cancel Bookings"
                            desc="This option allows the user to cancel booking made by others." />

                        <x-forms.checkbox checked="{{ $user->CollectiveBookings ?? '' }}" design="1"
                            name="CollectiveBookings" value="1" label="Make all Collective Bookings"
                            desc="This option allows the user to
                                book ALL the sub-resources of a COLLECTIVE resource type simultaneously.
                                <span style='color:red'>
                                    Please Note: Bookings made using this feature will automatically delete any
                                    booking made for the indiviual sub-resource at the same time.
                                </span>" />

                    </div>
                </div>
                <div class="row" id="group-member">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Group Membership (optional) </strong> </h6>
                        </div>
                        <div class="form-group row">
                            <p class="form-text text-muted">A user can belong to one or more User Groups. This section
                                below enables yout to assign users to their groups.</p>
                            <p class="form-text text-muted">From the "Available" list, select the user Group(s) to
                                which the user shuold belong. Move each selected group across to the "Member of" list
                                using the right arrow button or by double-clicking.</p>
                        </div>
                        <x-forms.select class="multiple-select2" multiple="multiple" :selected="$groupIds" design="1" name="GroupID[]"
                            label="Additional Group" :options="$groups" />


                    </div>
                </div>
            </div>
            <!--end::Step 1-->
            <!--begin::Actions-->
            <div class="d-flex justify-content-end border-top mt-5 pt-10">
                <div>
                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-exit font-weight-bolder text-uppercase px-9 py-4">Back</button>
                    <button type="submit" class="btn btn-save font-weight-bolder text-uppercase px-9 py-4">Save</button>
                </div>
            </div>
            <!--end::Actions-->
            <!--end::Form Wizard-->

        </x-forms.form>
    </x-layouts.page-form>

@endsection

@pushOnce('scripts')
    {{-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
    <script>
        // Your custom JavaScript...
        $(document).ready(function() {

            $(".multiple-select2").select2();

            // END::DOCUMENT READY
        });
    </script>
@endPushOnce
