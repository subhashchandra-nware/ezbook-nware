@extends('layouts.app')
@section('pageTitle', 'Resource Type Update :: EzBook')

@section('content')

    <x-layouts.page-form heading="Add Resource Type">
        <!--begin::Form Wizard-->
        <x-forms.form class="form" id="addResourceTypeForm" method="post" action="">

            <div class="pb-5">
                {{-- <h3 class="font-weight-bold text-dark pb-5">Add Resource Type</h3> --}}
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
                            <label class="col-xl-3 col-lg-3 col-form-label"> Name</label>
                            <div class="col-lg-9 col-xl-9">
                                <input type="hidden" name="ProviderID" value = "{{ $ProviderID }}" />
                                <input class="form-control form-control-lg form-control-solid" name="Name" type="text"
                                    value="" required />
                                <span class="form-text text-muted">The name of Resource Type Goes here.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Configuration Type</label>
                            <div class="col-lg-9 col-xl-9">
                                <select class="form-control " id="show" name="configurationType">
                                    @foreach ($configTypes as $type)
                                        <option value= "{{ $type['id'] }}">{{ $type['configuration_type'] }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">"Collective" Configurations imply that each resource of
                                    this type will comprise of a collection of identical sub-resources (e.g. parking garages
                                    comprising bays). The "Stand-alone" configuration caters for resources that are booked
                                    on an indiviual basis.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                            <div class="col-lg-9 col-xl-9">
                                <textarea class="form-control form-control-lg form-control-solid" name="Description"></textarea>
                                <span class="form-text text-muted pl-5">Enter a description explaning your Resource Type in
                                    this box.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="custom-attribute">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Custom Attribute</strong> <button type="button"
                                    class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase "
                                    data-toggle="modal" data-target="#addcustom">Add</button></h6>
                        </div>
                        <div class="form-group row">
                            <p class="form-text text-muted pl-5">Custom attributes allow you to specify information fields
                                that should entered when createg a new resource of this type. Click the Add Button above to
                                specify a new Attribute. To Change the name or description of an existing Custom Attribute,
                                Click on its Name.</p>
                            <!-- <div class="col-lg-3 col-xl-3">
                              <input class="form-control form-control-lg form-control-solid" name="" type="text" placeholder="name"  />
                            </div>
                            <div class="col-lg-3 col-xl-3">
                              <input class="form-control form-control-lg form-control-solid" name="" type="text" placeholder="type"  />
                            </div>
                            <div class="col-lg-4 col-xl-5">
                              <textarea class="form-control form-control-lg form-control-solid" name="" placeholder="description"></textarea>
                            </div> -->
                            <!-- <button type="button" class="btn btn-delete btn-exit font-weight-bolder text-uppercase " >Delete</button> -->
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
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
                                    <!-- <tr>
                        <td>1</td>
                        <td>numerice</td>
                        <td>1</td>
                        <td>numerice</td>
                        <td class="pr-0">
                          <a href="#" onclick="deleteResourceType()" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a>
                        </td>
                      </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" id="resource-limit">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Resource Type limit</strong> <button type="button"
                                    class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase ">Add</button></h6>
                        </div>
                        <div class="form-group row">
                            <p class="form-text text-muted pl-5">Resource type limit allow you to place restriction on the
                                number of resources that can be booked, as well asd the total amount of time and days in
                                advance that a Resource Type can be booked. Click the Add Button above to specify a new
                                Limit. To Change the value of an existing Limit, Click on its limit on the list below.</p>
                            <div class="col-lg-3 col-xl-3">
                                <input class="form-control form-control-lg form-control-solid" name="" type="text"
                                    placeholder="Limit Type" />
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <input class="form-control form-control-lg form-control-solid" name=""
                                    type="text" placeholder="Limit Amount" />
                            </div>
                            <div class="col-lg-4 col-xl-5">
                                <input class="form-control form-control-lg form-control-solid" name=""
                                    type="text" placeholder="Applies to" />
                            </div>
                            <button type="button"
                                class="btn btn-delete btn-exit font-weight-bolder text-uppercase ">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>List Of Resources</strong> </h6>
                        </div>
                        <div class="form-group row">
                            <p class="form-text text-muted w-100 pl-5 ">Below is a list of Existing Resources that are of
                                this type.</p>
                            <div class="col-lg-6 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" name=""
                                    type="text" placeholder="Limit Type" />
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" name=""
                                    type="text" placeholder="Limit Amount" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bg-light p-4 w-100 mt-5 mb-5">
                            <h6 class="mb-0"><strong>Addional Option</strong> </h6>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email Additinal Text</label>
                            <div class="col-lg-9 col-xl-9">
                                <textarea class="form-control form-control-lg form-control-solid" name="AdditionalEmailText" placeholder=""></textarea>
                                <span class="form-text text-muted">This text will be displayed in every booking additional
                                    info field for all bookings made for facilities belonging to this facility type.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Additinal Info Default Text</label>
                            <div class="col-lg-9 col-xl-9">
                                <textarea class="form-control form-control-lg form-control-solid" name="AdditionalInfoDefaultText" placeholder=""></textarea>
                                <span class="form-text text-muted">This text will be displayed in every booking
                                    confirmation mail. It will show below the addional info and above the custom
                                    fields.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Step 1-->
            <!--begin::Actions-->
            <div class="d-flex justify-content-end border-top mt-5 pt-10">
                <div>
                    <x-forms.button design="1" onclick="window.history.go(-1); return false;" value="Back" class="btn-exit" />
                    {{-- <button type="button" class="btn btn-exit font-weight-bolder text-uppercase px-9 py-4">Back</button> --}}
                    <button type="submit" class="btn btn-save font-weight-bolder text-uppercase px-9 py-4">Save</button>
                </div>
            </div>
            <!--end::Actions-->
        </x-forms.form>
        <!--end::Form Wizard-->
    </x-layouts.page-form>
    <!-- begin::User Panel-->

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
    <!--end::Demo Panel-->
@endsection
@pushOnce('scripts')
    <script>
        let customAttributeData = [];
        $("#customAttributeForm").submit(function(event) {
            event.preventDefault();
            var data = $('#customAttributeForm').serializeArray().reduce(function(obj, item) {
                console.log("data =" + item.name + "=" + item.value);
                obj[item.name] = item.value;
                return obj;
            }, {});
            //console.log(data);

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

        function modalClose() {
            $("#customAttributeName").val("");
            $("#customAttributeDescription").val("");
            $('#customAttributeCheckBox').prop('checked', false);
            $('#addcustom').modal('hide');
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

        function convertFormToJSON(form) {
            const array = $(form).serializeArray(); // Encodes the set of form elements as an array of names and values.
            const json = {};
            $.each(array, function() {
                json[this.name] = this.value || "";
            });
            return json;
        }

        $("#addResourceTypeForm").submit(function(e) {
            e.preventDefault();
            let form = $(e.target);
            let sendData = convertFormToJSON(form);
            sendData.customAttributeData = customAttributeData;
            $.ajax({
                url: "{{ url('api/add-new-resource-type') }}",
                data: sendData,
                type: 'post',
                success: function(result) {
                    console.log(result);
                    var status = result['status'];
                    if (status == 'success') {
                        window.location.href = "{{ url('resource-type') }}";
                    }
                }
            });
        });
    </script>
@endPushOnce
