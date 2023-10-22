@php
    extract($data);
    $CustomAttributesFieldTypes = array_combine(array_column($CustomAttributesFieldTypes, 'ID'), array_column($CustomAttributesFieldTypes, 'Name'));
    $ResourceTypeLimitFields = array_combine(array_column($ResourceTypeLimitFields, 'id'), array_column($ResourceTypeLimitFields, 'Name'));
    $UserGroups = array_combine(array_column($UserGroups, 'id'), array_column($UserGroups, 'Name'));
    // $custom_attributes_fields = collect($ResourceType)->get('custom_attributes_fields');
    // dd($data, $ResourceType->CustomAttributesFields->count());
@endphp

@include('header')

<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{ asset('media/logos/logo-1.png') }}" class="max-h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                @include('top-menu')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                            </div>
                            <div class="card card-custom">
                                <div class="card-body p-0">
                                    <!--begin::Wizard Body-->
                                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                        <div class="col-xl-12">
                                            <!--begin::Form Wizard-->
                                            <x-forms.form class="form" method="post" action="{{ route('ResourceType.update', ['ResourceType' => $ResourceType->id]) }}">
                                            {{-- <form class="form" id="addResourceTypeForm" method="post" action="">
                                                @csrf --}}

                                                <div class="pb-5">
                                                    <h3 class="font-weight-bold text-dark pb-5">Add Resource Type</h3>
                                                    <div class="mb-10 ">
                                                        <ul class="nav nav-pills" id="myTab1" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" href="#general">
                                                                    <span class="nav-text">General Details</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#custom-attribute">
                                                                    <span class="nav-text">Custom Attributes</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#resource-limit">
                                                                    <span class="nav-text">Resource Type Limit</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="row" id="general">
                                                        <div class="col-xl-12">
                                                            <div class="bg-light p-4 w-100 mb-5">
                                                                <h6 class="mb-0"><strong>General Details</strong></h6>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    Name</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input type="hidden" name="ProviderID"
                                                                        value = "{{ $ProviderID }}" />
                                                                    <input type="hidden" name="id"
                                                                        value = "{{ $ResourceType->id }}" />
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="Name" type="text"
                                                                        value="{{ $ResourceType->Name }}" required />
                                                                    <span class="form-text text-muted">The name of
                                                                        Resource Type Goes here.</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Configuration
                                                                    Type</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select class="form-control " id="show"
                                                                        name="configurationType">
                                                                        @foreach ($configTypes as $type)
                                                                            <option @selected($type['id'] == $ResourceType->configurationType)
                                                                                value= "{{ $type['id'] }}">
                                                                                {{ $type['configuration_type'] }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="form-text text-muted">"Collective"
                                                                        Configurations imply that each resource of this
                                                                        type will comprise of a collection of identical
                                                                        sub-resources (e.g. parking garages comprising
                                                                        bays). The "Stand-alone" configuration caters
                                                                        for resources that are booked on an indiviual
                                                                        basis.</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <textarea class="form-control form-control-lg form-control-solid" name="Description">{{ $ResourceType->Description }}</textarea>
                                                                    <span class="form-text text-muted pl-5">Enter a
                                                                        description explaning your Resource Type in this
                                                                        box.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="custom-attribute">
                                                        <div class="col-xl-12">
                                                            <div class="bg-light p-4 w-100 mt-5 mb-5">
                                                                <h6 class="mb-0"><strong>Custom Attribute</strong>
                                                                    {{-- <button type="button" class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase " data-toggle="modal" data-target="#addcustom">Add</button> --}}
                                                                    <button type="button" id="Custom-Attribute"
                                                                        class="tr-append btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase ">Add</button>
                                                                </h6>
                                                            </div>
                                                            <div class="form-group row">
                                                                <p class="form-text text-muted pl-5">Custom attributes
                                                                    allow you to specify information fields that should
                                                                    entered when createg a new resource of this type.
                                                                    Click the Add Button above to specify a new
                                                                    Attribute. To Change the name or description of an
                                                                    existing Custom Attribute, Click on its Name.</p>
                                                                <table id="destination-Custom-Attribute"
                                                                    class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                                                    <thead>
                                                                        <tr class="text-left text-uppercase">
                                                                            <th>Name</th>
                                                                            <th>Type</th>
                                                                            <th>Description</th>
                                                                            <th>Required</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="customAttributTable">
                                                                        @if ($ResourceType->CustomAttributesFields->count())
                                                                            @foreach ($ResourceType->CustomAttributesFields as $CustomAttributesField)
                                                                                {{-- <tr>
                                <td>{{ $CustomAttributesField->Name }}</td><td> {{$CustomAttributesField->CustomAttributesFieldTypes->Name }} </td><td>{{ $CustomAttributesField->Description }}</td><td> {{ ($CustomAttributesField->Require) ? "Required" : "Not Required" }} </td><td class="pr-0"><a href="#" onclick="editCustomAttribute({{$loop->iteration-1}})" style="margin-right:10px;" class="btn btn-light-danger font-weight-bolder font-size-sm">Edit </a><a href="#" onclick="deleteCustomAttribute({{$loop->iteration-1}})" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a></td>
                            </tr> --}}
                                                                                <tr>
                                                                                    <td><x-forms.input
                                                                                            value="{{ $CustomAttributesField->Name }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="customAttributeName[]" />
                                                                                    </td>
                                                                                    <td><x-forms.select
                                                                                            selected="{{ $CustomAttributesField->FieldType }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="customAttributeFieldType[]"
                                                                                            :options="$CustomAttributesFieldTypes" /></td>
                                                                                    <td><x-forms.textarea
                                                                                            value="{{ $CustomAttributesField->Description }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="customAttributeDescription[]" />
                                                                                    </td>
                                                                                    <td><x-forms.checkbox
                                                                                            checked="{{ $CustomAttributesField->Require }}"
                                                                                            name="customAttributeRequire[]"
                                                                                            value="1" /></td>
                                                                                    <td><x-forms.button design="2"
                                                                                            :removeclass="true"
                                                                                            class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete"
                                                                                            name="Require"
                                                                                            value="delete" /></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="resource-limit">
                                                        <div class="col-xl-12">
                                                            <div class="bg-light p-4 w-100 mt-5 mb-5">
                                                                <h6 class="mb-0"><strong>Resource Type limit</strong>
                                                                    {{-- <button type="button"
                                                                        class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase"
                                                                        data-toggle="modal"
                                                                        data-target="#resourceTypeLimitModal">Add</button> --}}
                                                                    <button type="button" id="Resource-Type-limit"
                                                                        class="tr-append btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase ">Add</button>
                                                                </h6>
                                                            </div>
                                                            <div class="form-group row">
                                                                <table id="destination-Resource-Type-limit"
                                                                    class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                                                    <thead>
                                                                        <tr class="text-left text-uppercase">
                                                                            <th>Limit Type</th>
                                                                            <th>Limit</th>
                                                                            <th>Applies to</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="resourceTypeLimitTable">
                                                                        @if ($ResourceType->ResourceTypeLimits->count())
                                                                            @foreach ($ResourceType->ResourceTypeLimits as $ResourceTypeLimit)
                                                                                {{-- <tr>
                                <td>{{ $CustomAttributesField->Name }}</td><td> {{$CustomAttributesField->CustomAttributesFieldTypes->Name }} </td><td>{{ $CustomAttributesField->Description }}</td><td> {{ ($CustomAttributesField->Require) ? "Required" : "Not Required" }} </td><td class="pr-0"><a href="#" onclick="editCustomAttribute({{$loop->iteration-1}})" style="margin-right:10px;" class="btn btn-light-danger font-weight-bolder font-size-sm">Edit </a><a href="#" onclick="deleteCustomAttribute({{$loop->iteration-1}})" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a></td>
                            </tr> --}}
                                                                                <tr>

                                                                                    <td><x-forms.select
                                                                                            selected="{{ $ResourceTypeLimit->LimitType }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="resourceTypeLimitLimitType[]"
                                                                                            :options="$ResourceTypeLimitFields" /></td>
                                                                                    <td><x-forms.input
                                                                                            value="{{ $ResourceTypeLimit->Limit }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="resourceTypeLimitLimit[]" />
                                                                                    </td>
                                                                                    <td><x-forms.select
                                                                                            selected="{{ $ResourceTypeLimit->GroupAppliedTo }}"
                                                                                            class="form-control form-control-sm"
                                                                                            name="resourceTypeLimitGroupAppliedTo[]"
                                                                                            :options="$UserGroups" /></td>

                                                                                    <td><x-forms.button design="2"
                                                                                            :removeclass="true"
                                                                                            class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete"
                                                                                            name="Require"
                                                                                            value="delete" /></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="bg-light p-4 w-100 mt-5 mb-5">
                                                                <h6 class="mb-0"><strong>List Of Resources</strong>
                                                                </h6>
                                                            </div>
                                                            <div class="form-group row">
                                                                <p class="form-text text-muted w-100 pl-5 ">Below is a
                                                                    list of Existing Resources that are of this type.
                                                                </p>
                                                                <div class="col-lg-6 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="" type="text"
                                                                        placeholder="Limit Type" />
                                                                </div>
                                                                <div class="col-lg-6 col-xl-6">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="" type="text"
                                                                        placeholder="Limit Amount" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="bg-light p-4 w-100 mt-5 mb-5">
                                                                <h6 class="mb-0"><strong>Addional Option</strong>
                                                                </h6>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Email
                                                                    Additinal Text</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <textarea class="form-control form-control-lg form-control-solid" name="AdditionalEmailText" placeholder="">{{ $ResourceType->AdditionalEmailText }}</textarea>
                                                                    <span class="form-text text-muted">This text will
                                                                        be displayed in every booking additional info
                                                                        field for all bookings made for facilities
                                                                        belonging to this facility type.</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Additinal
                                                                    Info Default Text</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <textarea class="form-control form-control-lg form-control-solid" name="AdditionalInfoDefaultText" placeholder="">{{ $ResourceType->AdditionalInfoDefaultText }}</textarea>
                                                                    <span class="form-text text-muted">This text will
                                                                        be displayed in every booking confirmation mail.
                                                                        It will show below the addional info and above
                                                                        the custom fields.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <!--end::Step 1-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end border-top mt-5 pt-10">
                                            <div>
                                                <button type="button" onclick="window.history.go(-1); return false;"
                                                    class="btn btn-exit font-weight-bolder text-uppercase px-9 py-4">Back</button>
                                                <button type="submit"
                                                    class="btn btn-save font-weight-bolder text-uppercase px-9 py-4">Save</button>
                                            </div>
                                        </div>
                                        <!--end::Actions-->
                                        {{-- </form> --}}
                                    </x-forms.form>

                                        <!--end::Form Wizard-->
                                    </div>
                                </div>
                                <!--end::Wizard Body-->
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class=" font-weight-bold mr-2">©</span>
                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Rucir Canada Ltd.</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Nav-->
                <div class="nav nav-dark order-1 order-md-2">
                    <a href="#" target="_blank" class="nav-link pr-3 pl-0">Legal</a>
                    <a href="#" target="_blank" class="nav-link px-3">Privacy</a>
                    <a href="#" target="_blank" class="nav-link pl-3 pr-0">Terms</a>
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    @include('sidebar')
    <div class="modal fade" id="addcustom" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add A Custom Attribute</h4>
                    <button type="button" class="close" onclick="modalClose();">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form" id="customAttributeForm">
                        <h5 class="mb-3">General Details</h5>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" id="editCustomIndex" value="" name="editCustomIndex" />
                            <input type="text" class="form-control form-control-lg" placeholder="" required
                                name="customAttributeName" id="customAttributeName" />
                        </div>
                        <div class="form-group">
                            <label>Type Of Data</label>
                            <select class="form-control" name="customAttributeType" id="customAttributeType">
                                @foreach ($fieldType as $field)
                                    <option value= "{{ $field['ID'] }}">{{ $field['Name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control form-control-lg form-control" name="customAttributeDescription"
                                id="customAttributeDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Required</label>
                            <input type="checkbox" class="form-control form-control-lg form-control"
                                name="customAttributeCheckBox" id="customAttributeCheckBox"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">Submit </button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel </button> -->
                    <input type="submit" class="btn btn-success" value="Submit">
                    <button type="button" class="btn btn-dark" onclick="modalClose();">Cancel </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="resourceTypeLimitModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Resource Limits</h4>
                    <button type="button" class="close" onclick="limitModalClose();">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form" id="resourceLimitForm">
                        <h5 class="mb-3">General Details</h5>

                        <div class="form-group">
                            <label>Limit Type</label>
                            <select class="form-control" name="LimitType" id="LimitType"
                                onchange="handleSelectChange(event)">
                                @foreach ($resourceTypeLimitedField as $val)
                                    <option value= "{{ $val['id'] }}">{{ $val['Name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="limitValueLabel"># of Resources</label>
                            <input type="hidden" id="editResourceIndex" value="" name="editResourceIndex" />
                            <input type="text" class="form-control form-control-lg" placeholder="" required
                                name="Limit" id="Limit" />
                        </div>

                        <div class="form-group">
                            <label>Apply To</label>
                            <select class="form-control" name="GroupAppliedTo" id="GroupAppliedTo">
                                @foreach ($fieldType as $field)
                                    <option value= "{{ $field['ID'] }}">{{ $field['Name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">Submit </button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel </button> -->
                    <input type="submit" class="btn btn-success" value="Submit">
                    <button type="button" class="btn btn-dark" onclick="limitModalClose();">Cancel </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Demo Panel-->

    <table id="source-Custom-Attribute" style="display: none">
        <tr>
            <td><x-forms.input class="form-control form-control-sm" name="customAttributeName[]" /></td>
            <td><x-forms.select class="form-control form-control-sm" name="customAttributeFieldType[]"
                    :options="$CustomAttributesFieldTypes" /></td>
            <td><x-forms.textarea class="form-control form-control-sm" name="customAttributeDescription[]" /></td>
            <td><x-forms.checkbox name="customAttributeRequire[]" value="1" /></td>
            <td><x-forms.button design="2" :removeclass="true"
                    class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete" name="Require"
                    value="delete" /></td>
        </tr>
    </table>
    <table id="source-Resource-Type-limit" style="display: none">
        <tr>

            <td><x-forms.select  class="form-control form-control-sm"
                    name="resourceTypeLimitFieldType[]" :options="$ResourceTypeLimitFields" /></td>
            <td><x-forms.input class="form-control form-control-sm"
                    name="resourceTypeLimitName[]" />
            </td>
            <td><x-forms.select class="form-control form-control-sm" name="resourceTypeLimitFieldType[]" :options="$UserGroups" /></td>

            <td><x-forms.button design="2" :removeclass="true"
                    class="btn btn-sm btn-save font-weight-bolder text-uppercase tr-delete" name="Require"
                    value="delete" /></td>
        </tr>
    </table>


    @include('footer')
    <!--end::Page Scripts-->
    <script>
        $(document).ready(function() {
            $(document).on("click", '.tr-append', function(event) {
                var $this = $(this);
                let id = $this.attr('id');
                var $html = $("#source-" + id + " tbody").html();
                $("#destination-" + id + " tbody").append($html);
            });

            $(document).on("click", '.tr-delete', function(event) {
                $(this).parent().parent("tr").remove();
                // alert("new link clicked!");
            });


            /* END::DOCUMENT::READY */
        });











        let customAttributeData = [];
        let resourceLimitData = [];
        $("#customAttributeForm").submit(function(event) {
            event.preventDefault();
            var data = $('#customAttributeForm').serializeArray().reduce(function(obj, item) {
                console.log("data =" + item.name + "=" + item.value);
                obj[item.name] = item.value;
                return obj;
            }, {});
            console.log(data);

            if (data.editCustomIndex) {
                var keyValue = customAttributeData[data.editCustomIndex];
                keyValue.customAttributeName = data.customAttributeName;
                keyValue.customAttributeType = data.customAttributeType;
                keyValue.customAttributeDescription = data.customAttributeDescription;
                if (data.customAttributeCheckBox) {
                    keyValue.customAttributeCheckBox = data.customAttributeCheckBox;
                } else {
                    keyValue.customAttributeCheckBox = "";
                }
            } else {
                customAttributeData.push(data);
            }

            customAttributeHtml(data);
        });

        $("#resourceLimitForm").submit(function(event) {
            event.preventDefault();
            var limitFormData = $('#resourceLimitForm').serializeArray().reduce(function(obj, item) {
                console.log("data =" + item.name + "=" + item.value);
                obj[item.name] = item.value;
                return obj;
            }, {});
            console.log(limitFormData);

            if (limitFormData.editResourceIndex) {
                var keyValue = resourceLimitData[limitFormData.editResourceIndex];
                keyValue.LimitType = limitFormData.LimitType;
                keyValue.Limit = limitFormData.Limit;
                keyValue.GroupAppliedTo = limitFormData.GroupAppliedTo;
            } else {
                resourceLimitData.push(limitFormData);
            }
            resourceLimitHtml(limitFormData);
        });

        function modalClose() {
            $("#customAttributeName").val("");
            $("#customAttributeDescription").val("");
            $('#customAttributeCheckBox').prop('checked', false);
            $('#addcustom').modal('hide');
        }

        function limitModalClose() {
            $("#Limit").val("");
            $('#resourceTypeLimitModal').modal('hide');
        }

        function deleteCustomAttribute(index) {
            let spliced = customAttributeData.splice(index, 1);
            //console.log("Remaining elements: " + JSON.stringify(customAttributeData));
            customAttributeHtml(customAttributeData);
        }

        function customAttributeHtml(data) {
            if (data) {
                modalClose();
                var html = "";
                // console.log(customAttributeData);
                $.each(customAttributeData, function(i) {
                    html += '<tr>';
                    html += '<td>' + customAttributeData[i].customAttributeName + '</td>';

                    if (customAttributeData[i].customAttributeType == "1") {
                        html += '<td> Text </td>';
                    } else if (customAttributeData[i].customAttributeType == "2") {
                        html += '<td> Numeric </td>';
                    } else if (customAttributeData[i].customAttributeType == "3") {
                        html += '<td> Yes/No </td>';
                    }

                    html += '<td>' + customAttributeData[i].customAttributeDescription + '</td>';
                    if (customAttributeData[i].customAttributeCheckBox) {
                        html += '<td> Required </td>';
                    } else {
                        html += '<td> Not Required </td>';
                    }

                    html += '<td class="pr-0">';
                    html += '<a href="#" onclick="editCustomAttribute(' + i +
                        ')" style="margin-right:10px;" class="btn btn-light-danger font-weight-bolder font-size-sm">Edit </a>';
                    html += '<a href="#" onclick="deleteCustomAttribute(' + i +
                        ')" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a>';
                    html += '</td>';
                    html += '</tr>';
                });
                $("#customAttributTable").html(html);
            }
        }

        function deleteResourceLimit(index) {
            let spliced = resourceLimitData.splice(index, 1);
            //console.log("Remaining elements: " + JSON.stringify(customAttributeData));
            resourceLimitHtml(resourceLimitData);
        }

        function resourceLimitHtml(data) {
            if (data) {
                limitModalClose();
                var html = "";
                // console.log(customAttributeData);
                $.each(resourceLimitData, function(i) {
                    html += '<tr>';
                    // html += '<td>'+ resourceLimitData[i].LimitType +'</td>';

                    if (resourceLimitData[i].LimitType == "1") {
                        html += '<td> Resource Limit </td>';
                    } else if (resourceLimitData[i].LimitType == "2") {
                        html += '<td> Time Limit </td>';
                    } else if (resourceLimitData[i].LimitType == "3") {
                        html += '<td> Advance Limit </td>';
                    } else if (resourceLimitData[i].LimitType == "4") {
                        html += '<td> Booking Limit </td>';
                    } else if (resourceLimitData[i].LimitType == "5") {
                        html += '<td> Booking CutOff Time </td>';
                    } else if (resourceLimitData[i].LimitType == "6") {
                        html += '<td> Update and Cancellation CutOff Time </td>';
                    }

                    html += '<td>' + resourceLimitData[i].Limit + '</td>';
                    html += '<td>' + resourceLimitData[i].GroupAppliedTo + '</td>';

                    html += '<td class="pr-0">';
                    html += '<a href="#" onclick="editLimit(' + i +
                        ')" style="margin-right:10px;" class="btn btn-light-danger font-weight-bolder font-size-sm">Edit </a>';
                    html += '<a href="#" onclick="deleteResourceLimit(' + i +
                        ')" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a>';
                    html += '</td>';
                    html += '</tr>';
                });
                $("#resourceTypeLimitTable").html(html);
            }
        }

        function editCustomAttribute(index) {
            $("#editCustomIndex").val(index);
            var keyValue = customAttributeData[index];
            $("#customAttributeName").val(keyValue.customAttributeName);
            $("#customAttributeDescription").val(keyValue.customAttributeDescription);
            if (keyValue.customAttributeCheckBox) {
                $('#customAttributeCheckBox').prop('checked', true);
            } else {
                $('#customAttributeCheckBox').prop('checked', false);
            }
            $("#customAttributeType").val(keyValue.customAttributeType).change();
            $('#addcustom').modal('show');
        }

        function editLimit(index) {
            $("#editResourceIndex").val(index);
            var keyValue = resourceLimitData[index];
            $("#LimitType").val(keyValue.LimitType);
            $("#Limit").val(keyValue.Limit);
            $("#GroupAppliedTo").val(keyValue.GroupAppliedTo);
            $('#resourceTypeLimitModal').modal('show');
        }

        function convertFormToJSON(form) {
            const array = $(form).serializeArray(); // Encodes the set of form elements as an array of names and values.
            const json = {};
            $.each(array, function() {
                json[this.name] = this.value || "";
            });
            return json;
        }

        function handleSelectChange(event) {
            var selectElement = event.target;
            var value = selectElement.value;
            if (value == "1") {
                $("#limitValueLabel").text("# of Resources");
            } else if (value == "2") {
                $("#limitValueLabel").text("# of Hours");
            } else if (value == "3") {
                $("#limitValueLabel").text("# of Days");
            } else if (value == "4") {
                $("#limitValueLabel").text("# of Minutes");
            } else if (value == "5") {
                $("#limitValueLabel").text("# of Hours");
            } else if (value == "6") {
                $("#limitValueLabel").text("# of Minutes");
            }
        }

        $("#addResourceTypeForm").submit(function(e) {
            e.preventDefault();
            customAttributeHtml(customAttributeData);
            resourceLimitHtml(resourceLimitData);
            // $("#customAttributeForm").submit();
            // $("#resourceLimitForm").submit();
            // $(selector).submit();
            let form = $(e.target);
            let sendData = convertFormToJSON(form);
            sendData.customAttributeData = customAttributeData;
            sendData.resourceLimitData = resourceLimitData;
            // alert("error: " + JSON.stringify(sendData));
            $.ajax({
                // url : "{{ url('api/add-new-resource-type') }}",
                url: "{{ route('api.ResourceType.update', ['ResourceType' => $ResourceType->id]) }}",
                data: sendData,
                type: 'post',
                error: function(response) {
                    alert("error: " + JSON.stringify(response));
                    console.log(response);
                },
                success: function(result) {
                    console.log(result);
                    alert("success: " + JSON.stringify(result));
                    var status = result['status'];
                    if (status == 'success') {
                        window.location.href = "{{ url('resource-type') }}";
                    }
                },
                complete: function(response) {
                    alert("complete: " + JSON.stringify(response));
                }
            });
        });
    </script>
</body>
<!--end::Body-->

</html>
