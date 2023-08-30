@extends('layouts.app')
@section('pageTitle', 'Update Resource :: EzBook')

@section('content')

    <x-layouts.page-form heading="New Resources">
        @php
            // dd($data);
            extract($data);
            $items = [
                '#general' => 'General Details',
                '#booking-rights' => 'Booking Rights',
                '#viewing-rights' => 'Viewing Rights',
                '#booking-moderate' => 'Booking Moderate',
                '#operation-time' => 'Operation Hours & Time Slots',
                '#custom-rights' => 'Custom Attribuet',
            ];
            $BookingRightsUsersSelected = array_column($BookingRightsUsers, 'UserID');
            $BookingRightsUserGroupsSelected = array_column($BookingRightsUserGroups, 'GroupID');

            $ViewingRightsUsersSelected = array_column($ViewingRightsUsers, 'UserID');
            $ViewingRightsUserGroupsSelected = array_column($ViewingRightsUserGroups, 'GroupID');

            $RequestRightsUsersSelected = array_column($RequestRightsUsers, 'UserID');
            $RequestRightsUserGroupsSelected = array_column($RequestRightsUserGroups, 'GroupID');

            $ModRightsUsersSelected = array_column($ModRightsUsers, 'UserID');
            $ModRightsUserGroupsSelected = array_column($ModRightsUserGroups, 'GroupID');
            // ViewingRightsUserGroupsSelected

            // dd($resourceTypes, $resourceTypesDataConfigurationType);
            $resourceTypesDataConfigType = ['0' => '0'] + array_combine(array_column($resourceTypes, 'id'), array_column($resourceTypes, 'configurationType'));
            $resourceTypes = ['0' => 'Select'] + array_combine(array_column($resourceTypes, 'id'), array_column($resourceTypes, 'Name'));
            $resourceLocations = ['0' => 'Select'] + array_combine(array_column($resourceLocations, 'id'), array_column($resourceLocations, 'Name'));
            $BookingRight = $BookingRightOptions = ['0' => 'All User', '1' => 'Specific Users/Groups'];
            $ViewingRight = $ViewingRightOptions = ['0' => 'All User', '2' => 'Specific Users/Groups'];
            $RequestRightOptions = ['0' => 'All User', '3' => 'Specific Users/Groups'];
            $ModeratorRightOptions = ['0' => 'All User', '4' => 'Specific Users/Groups'];
            $users = array_combine(array_column($users, 'id'), array_column($users, 'Name'));
            $usersGroups = array_combine(array_column($usersGroups, 'id'), array_column($usersGroups, 'Name'));
            // $SlotLength = [
            //     '0' => 'Select','5' => '5 minutes','6' => '6 minutes','10' => '10 minutes','15' => '15 minutes',
            //     '20' => '20 minutes','30' => '30 minutes','60' => '1 hour','120' => '2 hours','180' => '3 hours',
            //     '240' => '4 hours','360' => '6 hours','720' => '12 hours','1440' => '1 day',
            //     ];
            $SlotLengths = ['Select', '5 minutes', '6 minutes', '10 minutes', '15 minutes', '20 minutes', '30 minutes', '1 hour', '2 hours', '3 hours', '4 hours', '6 hours', '12 hours', '1 day'];
        @endphp

        <div class="mb-10 "><x-layouts.menu-horizontal :items="$items" /></div>
        <x-forms.form method="put" action="{{ route('resource.update', ['resource' => $ID]) }}">

            <!--begin::Step 1-->
            <div class="pb-5">
                <!--begin::general-->
                <div class="row" id="#general">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mb-5">
                            <h6 class="mb-0"><strong>General Details</strong></h6>
                        </div>
                        <x-forms.input value="{{ $Name }}" design="1" name="Name" label="Resource Name"
                            desc="Enter a name or title for your resource here." />

                        <x-forms.textarea value="{{ $Description }}" design="1" name="Description" label="Description"
                            desc="Enter a descriptive paragraph about your resource here.
                            This will be seen as its tooltip where the resource is listed." />

                        <x-forms.select :data="$resourceTypesDataConfigType" selected="{{ $resourceType }}" design="1" name="resourceType"
                            label="Resource Type" :options="$resourceTypes"
                            desc="From the list, selecr the type of resource this is. You may
                            also define your own Types if none of these seem applicable." />

                        <div id="id-resourceType-SubResources" class="mb-10" style="display: none">
                            <div class="ml-10 border border-2 border-light border-top-0">
                                <div class="bg-light p-2 w-100 mt-5 mb-5">
                                    <h6 class="mb-0"><strong>Individual Sub Resources <i class="small">(collective resource)</i></strong>
                                        <button type="button" id="id-button-SubResources"
                                    class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase ">Add</button>
                                    </h6>
                                </div>
                                <div class="mx-5">
                                    <p class="form-text text-muted">Since this is a collective resource, it should consist of multiple sub-resources.
                                        <br />To add a new sub-resource, type a unique name for it and click the Add button below.</p>
                                        <table id="id-table-SubResources"
                                        class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr class="text-left text-uppercase">
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($SubResources)
                                                @foreach ($SubResources as $k => $SubResource)
                                                    <tr>
                                                        <td><x-forms.input value="{{ $SubResource['Name'] }}"
                                                                class="form-control form-control-sm" name="SubResourcesName[]" /></td>

                                                        <td><x-forms.button design="2" :removeclass="true"
                                                                class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete" value="delete" /></td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <x-forms.select selected="{{ $resourceLocation }}" design="1" name="resourceLocation"
                            label="Resource Gruop (Location)" :options="$resourceLocations"
                            desc="Choose the TITLE to which thia resource shuld belong." />

                        <x-forms.input value="{{ $FacURL }}" design="1" name="FacURL" label="Image URL"
                            desc="Enter the URL of a .htm, .gif or .jpg file here." />

                        <x-forms.checkbox checked="{{ $PublicView }}" design="1" name="PublicView" value="1"
                            label="Public View"
                            desc="Visible on a public calendar. Copy the following to embed this calendar." />

                    </div>
                </div>
                <!-- end::general -->
                <div class="row" id="booking-additional-info">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Booking Additional Info</strong>
                            </h6>
                        </div>
                        <x-forms.checkbox checked="{{ $BookingAdditionalInfo }}" design="1" name="BookingAdditionalInfo"
                            value="1" label="Make Mandatory"
                            desc="Specify, if you would like the moderator feature enabled." />
                    </div>
                </div>
                <!-- start::booking-rights -->
                <div class="row" id="booking-rights">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Booking Rights</strong>
                            </h6>
                        </div>
                        {{-- @dd($BookingRightsUsersSelected) --}}

                        <x-forms.select selected="{{ $BookingRights }}" design="1" class="userAndGroup"
                            name="BookingRights" label="Who can Book the Resource?" :options="$BookingRightOptions"
                            desc="Select the users and/or user group who allowed to book this resource." />
                        <div id="id-BookingRights-userAndGroup" style="display: none">
                            <x-forms.select :selected="$BookingRightsUsersSelected" multiple design="1" name="BookingRightsUser[]"
                                label="Users" class="multiple-select2" :options="$users"
                                desc="Select the users and/or user group who allowed to book this resource." />

                            <x-forms.select :selected="$BookingRightsUserGroupsSelected" multiple design="1" name="BookingRightsUserGroup[]"
                                label="User Groups" :options="$usersGroups" class="multiple-select2"
                                desc="Select the users and/or user group who allowed to book this resource." />
                        </div>

                    </div>
                </div>
                <!-- end::booking-rights -->
                <!-- start::viewing-rights -->
                <div class="row" id="viewing-rights">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Viewing Rights</strong>
                            </h6>
                        </div>

                        <x-forms.select selected="{{ $ViewingRights }}" design="1" class="userAndGroup"
                            name="ViewingRights" label="Who can view the Schedules?" :options="$ViewingRightOptions"
                            desc="Select the users and/or user group who allowed to book this resource." />
                        {{-- @dd($ViewingRightsUsersSelected, $ViewingRightsUserGroupsSelected) --}}
                        <div id="id-ViewingRights-userAndGroup" style="display: none">
                            <x-forms.select :selected="$ViewingRightsUsersSelected" multiple design="1" name="ViewingRightsUser[]"
                                label="Users" :options="$users" class="multiple-select2"
                                desc="Select the users and/or user group who allowed to book this resource." />

                            <x-forms.select :selected="$ViewingRightsUserGroupsSelected" multiple design="1" name="ViewingRightsUserGroup[]"
                                label="User Groups" :options="$usersGroups" class="multiple-select2"
                                desc="Select the users and/or user group who allowed to book this resource." />
                        </div>
                    </div>
                </div>
                <!-- end::viewing-rights -->
                <!-- start::booking-moderate -->

                <div class="row" id="booking-moderate">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Booking Moderate</strong>
                            </h6>
                        </div>
                        <x-forms.checkbox checked="{{ $ModRights }}" design="1" name="ModFeatureEnabled" value="1"
                            id="id-Booking-moderate" label="Moderator Feature Enabled"
                            desc="Specify, if you would like the moderator feature enabled." />

                        <!-- start::Booking Moderate-->
                        <div id="id-Booking-moderate-rights" class="" style="display: none">
                            <div class="ml-10 border border-2 border-light border-top-0">
                                <div class="bg-light p-2 w-100 mt-5 mb-5">
                                    <h6 class="mb-0"><strong>Request Rights</strong>
                                    </h6>
                                </div>
                                <div class="mx-5">
                                    <x-forms.select selected="{{ $RequestRights }}" design="1" class="userAndGroup"
                                        name="RequestRights" label="Who can request bookings for the resource?"
                                        :options="$RequestRightOptions"
                                        desc="Select the users and/or user group who allowed to book this resource." />
                                    {{-- @dd($RequestRightsUsersSelected, $RequestRightsUserGroupsSelected) --}}
                                    <div id="id-RequestRights-userAndGroup" style="display: none">
                                        <x-forms.select :selected="$RequestRightsUsersSelected" multiple design="1"
                                            name="RequestRightsUser[]" label="Users" :options="$users"
                                            class="multiple-select2"
                                            desc="Select the users and/or user group who allowed to book this resource." />

                                        <x-forms.select :selected="$RequestRightsUserGroupsSelected" multiple design="1"
                                            name="RequestRightsUserGroup[]" label="User Groups" :options="$usersGroups"
                                            class="multiple-select2"
                                            desc="Select the users and/or user group who allowed to book this resource." />
                                    </div>
                                </div>
                            </div>

                            <div class="ml-10 border border-2 border-light border-top-0">
                                <div class="bg-light p-2 w-100 mt-5 mb-5">
                                    <h6 class="mb-0"><strong>Moderator Rights</strong>
                                    </h6>
                                </div>
                                <div class="mx-5">
                                    <x-forms.select selected="{{ $ModRights }}" design="1" class="userAndGroup"
                                        name="ModRights" label="Who can Accept or Reject bookings for the resource?"
                                        :options="$ModeratorRightOptions"
                                        desc="Select the users and/or user group who allowed to book this resource." />
                                    {{-- @dd($ModRightsUsersSelected, $ModRightsUserGroupsSelected) --}}
                                    <div id="id-ModRights-userAndGroup" style="display: none">
                                        <x-forms.select :selected="$ModRightsUsersSelected" multiple design="1"
                                            name="ModRightsUser[]" label="Users" :options="$users"
                                            class="multiple-select2"
                                            desc="Select the users and/or user group who allowed to book this resource." />

                                        <x-forms.select :selected="$ModRightsUserGroupsSelected" multiple design="1"
                                            name="ModRightsUserGroup[]" label="User Groups" :options="$usersGroups"
                                            class="multiple-select2"
                                            desc="Select the users and/or user group who allowed to book this resource." />
                                    </div>
                                </div>
                            </div>

                            <div class="ml-10 border border-2 border-light border-top-0">
                                <div class="bg-light p-2 w-100 mt-5 mb-5">
                                    <h6 class="mb-0"><strong>Moderator Notification Emails</strong></h6>
                                </div>
                                <div class="mx-5">
                                    <p class="form-text text-muted">Email addresses specified here will receive a
                                        notification whenever a booking request is made for this resource.</p>
                                    <x-forms.input value="{{ $ModEmailRecipients }}" design="1"
                                        name="ModEmailRecipients" label="Auto Email Receipients"
                                        desc="Please enter valid email address(es), Seprate multiple addresses with a comma." />
                                </div>
                            </div>

                        </div>
                        <!-- end::Booking Moderate-->
                    </div>
                </div>
                <!-- end::booking-moderate -->
                <div class="row" id="operation-time">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Operation Hours & Time
                                    Slots</strong> </h6>
                        </div>
                        <x-forms.select selected="{{ $SlotLength }}" design="1" name="SlotLength"
                            label="Slot Length" :options="$SlotLengths" desc="Select the length of booking slot." />

                        <x-layouts.timeslot :data="$operationhours" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Auto Email
                                    Receipients</strong></h6>
                        </div>
                        <p class="form-text text-muted pl-5">Email address
                            specified here will receive a notification whenever a
                            booking for this resource is created, updated or
                            deleted.</p>
                        <x-forms.input value="{{ $EmailRecipients }}" design="1" name="EmailRecipients"
                            label="Auto Email Receipients"
                            desc="Please enter valid email address(es), Seprate multiple addresses with a comma" />
                    </div>
                </div>


                <div class="row" id="custom-rights">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Custom Booking Info</strong>
                                <button type="button" id="id-button-booking-info"
                                    class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase ">Add</button>
                            </h6>
                        </div>
                        <div class="form-group row">
                            <p class="form-text text-muted pl-5">This feature allow
                                you to specify information fields that should be
                                entered when making a booking for this resource.
                                Click on Add button above to specify a new field. TO
                                change the name or description of an existing
                                Booking Field, click on its Name.</p>


                            <table id="id-table-booking-info"
                                class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Mandatory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($custombookinginfos)
                                        @foreach ($custombookinginfos as $k => $custombookinginfo)
                                            <tr>
                                                <td><x-forms.input value="{{ $custombookinginfo['Name'] }}"
                                                        class="form-control form-control-sm" name="infoName[]" /></td>
                                                <td><x-forms.select selected="{{ $custombookinginfo['FieldType'] }}"
                                                        class="form-control form-control-sm" name="infoFieldType[]"
                                                        :options="[
                                                            '1' => 'Text',
                                                            '2' => 'Text (Multi-Line)',
                                                            '3' => 'Numeric',
                                                            '4' => 'Yes/No',
                                                        ]" /></td>
                                                <td><x-forms.textarea value="{{ $custombookinginfo['Description'] }}"
                                                        class="form-control form-control-sm" name="infoDescription[]" /></td>
                                                <td><x-forms.checkbox checked="{{ $custombookinginfo['Require'] }}"
                                                        name="infoRequire[]" value="1" /></td>
                                                <td><x-forms.button design="2" :removeclass="true"
                                                        class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete"
                                                        name="Require" value="delete" /></td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
            {{-- </div> --}}
            <!--end::Step 1-->
            <!--begin::Actions-->
            <div class="d-flex justify-content-end border-top mt-5 pt-10">
                <div>
                    <x-forms.button design="1" value="Back" class="btn-exit" />
                    <x-forms.button design="1" type="submit" value="Save" class="btn-save" />
                </div>
            </div>
            <!--end::Actions-->

        </x-forms.form>
    </x-layouts.page-form>
    <table id="id-info" style="display: none">
        <tr>
            <td><x-forms.input class="form-control form-control-sm" name="infoName[]" /></td>
            <td><x-forms.select class="form-control form-control-sm" name="infoFieldType[]" :options="['1' => 'Text', '2' => 'Text (Multi-Line)', '3' => 'Numeric', '4' => 'Yes/No']" /></td>
            <td><x-forms.textarea class="form-control form-control-sm" name="infoDescription[]" /></td>
            <td><x-forms.checkbox name="infoRequire[]" value="1" /></td>
            <td><x-forms.button design="2" :removeclass="true"
                    class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete" name="Require"
                    value="delete" /></td>
        </tr>
    </table>
    <table id="id-table-SubResources-none" style="display: none">
        <tr>
            <td><x-forms.input class="form-control form-control-sm" name="SubResourcesName[]" /></td>
            <td><x-forms.button design="2" :removeclass="true"
                    class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete" value="delete" /></td>
        </tr>
    </table>


@endsection
@pushOnce('scripts')
    <script>
        // Your custom JavaScript...
        $(document).ready(function() {

            $("#id-resourceType").on('change', function () {
                var $this = $(this);
                id = $this.attr('id');
               let data = $( "option:selected", this ).attr('data');
               if ( data == 2 ) {
                $('#' + id + "-SubResources").show();
                // $("#id-resourceTypes-SubResources").hide();
                // alert(data + id);
            }else{
                $('#' + id + "-SubResources").hide();
               }
               console.log();
            });
            $("#id-resourceType").trigger("change");

            $("#id-button-SubResources").on("click", function() {
                var $html = $("#id-table-SubResources-none tbody").html();
                $("#id-table-SubResources tbody").append($html);
                // alert('hi'+ $html);
                // console.log();
            });






            if ($("#id-Booking-moderate").is(':checked')) {
                $('#id-Booking-moderate-rights').show();
            }
            $("#id-Booking-moderate").click(function() {
                var cls = $(this).attr('id');
                // alert(cls);
                if ($(this).is(':checked')) {
                    $('#' + cls + '-rights').show();
                    $('#' + cls + '-rights select, #' + cls + '-rights input').prop('disabled', false);
                } else {
                    $('#' + cls + '-rights').hide();
                    $('#' + cls + '-rights select, #' + cls + '-rights input').prop('disabled', true);
                }
                // console.log();
            });
            // $( "#id-Booking-moderate" ).trigger( "click" );

            $(".day").click(function() {
                var cls = $(this).attr('id');
                if ($(this).is(':checked')) {
                    $('.' + cls).prop('disabled', false);
                } else {
                    $('.' + cls).prop('disabled', true);
                }
                // console.log();
            });


            $(".all-day").click(function() {
                $(".day").each(function() {
                    if (!$(this).is(':checked')) {
                        $(this).trigger("click");
                    }
                });
            });
            $(".all-hour").click(function() {
                var $from = $('.Sunday-time-from').val();
                var $to = $('.Sunday-time-to').val();
                $(".day").each(function() {
                    $('.time-from').val($from);
                    $('.time-to').val($to);
                });
            });


            $("#id-button-booking-info").on("click", function() {
                var $html = $("#id-info tbody").html();
                $("#id-table-booking-info tbody").append($html);
                // alert('hi'+ $html);
                // console.log();
            });

            $(document).on("click", '.tr-delete', function(event) {
                $(this).parent().parent("tr").remove();
                // alert("new link clicked!");
            });

            $('.multiple-select2').select2();

            $("select.userAndGroup").on("change", function() {
                var $this = $(this);
                var val = $this.val();
                var id = $this.attr('id');
                var userAndGroup = "#" + id + "-userAndGroup"
                if (val == 0) {
                    $(userAndGroup + " option:selected").prop("selected", false);
                    $(userAndGroup).hide();
                } else {
                    $(userAndGroup).show();
                    $('.multiple-select2').select2();
                }
                // console.log();
            });
            $("select.userAndGroup").trigger("change");
            // $( ".day" ).trigger( "click" );





            // END::DOCUMENT READY
        });
    </script>
@endPushOnce
