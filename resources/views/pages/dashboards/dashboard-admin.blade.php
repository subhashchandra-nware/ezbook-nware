@extends('layouts.app')
@section('pageTitle', 'Admin Dashboard :: EzBook')

@section('content')
    @php
        extract($data);
        $Resources = ($ModeratorRequestedBookings) ? $ModeratorRequestedBookings->FacProviders->first()->Resources : [];
        // dd($data);
    @endphp
    <!--begin::Main-->
    <x-layouts.page-admin>
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->

            <!--begin::Row-->
            <div class="row">
                <div class="col-xl">
                    <!--begin::Base Table Widget 5-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Booking Summary</span>

                            </h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3 mb-9">
                            <div class="row m-0 mb-7">
                                <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                                    <h3 class="total-number">{{ $summaryBookings[0]->totalBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Total Sites</a>
                                </div>
                                <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                                    <h3 class="total-number">{{ $summaryBookings[0]->completedBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Active Sites</a>
                                </div>

                                <div class="col bg-light px-6 py-8 rounded-xl">
                                    <h3 class="total-number">{{ $summaryBookings[0]->upcomingBooking }}</h3>
                                    <a href="#" class="text-total font-weight-bold font-size-h6">Inactive Sites</a>
                                </div>

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Base Table Widget 5-->
                </div>
            </div>
            <!--end::Row-->






            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark mb-2">Last Login Details</span>

                    </h3>
                    <div id="mod-buttons" class="card-toolbar">
                        {{-- <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a> --}}
                        {{-- <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a> --}}
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table id="kt_datatable_mod"
                                class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>IP Address</th>
                                        <th>Date & Time</th>
                                        <th>Result</th>
                                        <th class="text-center">Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;

                                    @endphp

                                    @if (!empty($logs) && $logs->count())
                                        @foreach ($logs as $log)
                                            <tr>
                                                <th>{{ $i++ }}</th>
                                                <th>{{ $log->userName }}</th>
                                                <th>{{ $log->ip}}</th>
                                                <th>{{ $log->loginDateTime}}</th>
                                                <th>{{ $log->result}}</th>
                                                <th>{{ $log->country}}</th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div>


            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </x-layouts.page>
    <!--end::Main-->


    <!-- start::booking-update-modal -->

    @php
        $sub_resources = [];
    @endphp
    <div class="modal fade" id="booking-update-modal-dash" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <x-forms.form method="PUT" id="ajax-update-booking" action="">
                    <x-forms.input name="ID" type="hidden" value="" />
                    <x-forms.input name="ModeratedBy" type="hidden" value="" />
                    <x-forms.input name="ModeratedByName" type="hidden" value="" />
                    <div class="modal-header">
                        <h4 class="modal-title">New Booking for {{ $Name ?? '' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @if (count($sub_resources) > 0)
                            @php
                                $options = ['0' => 'All', '1' => 'Any'] + array_combine(array_column($sub_resources, 'ID'), array_column($sub_resources, 'Name'));
                            @endphp
                            <x-forms.select design="1" name="SubID" :options="$options" label="Sub Resource" />
                        @endif
                        <x-forms.input design="2" name="FromTime" type="datetime-local" label="From" />
                        <x-forms.input design="2" name="ToTime" type="datetime-local" label="To" />
                        <x-forms.input design="2" name="BookedFor" label="For" />
                        <x-forms.textarea design="1" name="Purpose" label="Additional Info" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Update</button>
                </x-forms.form>
                <x-forms.form method="DELETE" id="ajax-delete-booking" action="">
                    <x-forms.input id="id-delete" name="ID" type="hidden" value="" />
                    <button type="submit" class="Reject-book btn btn-default">Reject</button>
                </x-forms.form>
            </div>
        </div>

    </div>
    </div>
    <!-- end::booking-update-modal -->

@endsection

@pushOnce('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/pages/features/charts/apexcharts.js') }}"></script> --}}
    <script src="{{ asset('js/ajax-full-calendar.js') }}"></script>
    <script>
        $(document).ready(function() {

            let opt = {
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Export to Excel',
                    className: 'btn btn-success font-weight-bolder font-size-sm'
                }],
                lengthMenu: [
                    [ 10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            };
            // let datatable = $('#kt_datatable').DataTable(opt);
            // datatable.buttons().container().appendTo( $('#buttons') );
            let datatableMod = $('#kt_datatable_mod').DataTable(opt);
            datatableMod.buttons().container().appendTo( $('#mod-buttons') );


            const primary = '#6993FF';
            const apexChart = "#chart-Number-of-Bookings";
            var $data = {!! json_encode($numberBookings) !!};
            var options = {
                series: [{
                    name: "Number of Bookings",
                    data: {!! json_encode($numberBookings) !!}
                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 88, 334, 222]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                },
                colors: [primary]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();


            var element = document.getElementById("bar-chart-Duration-Breakdown");

            if (!element) {
                return;
            }
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var barChartOptions = {
                series: [{
                    name: 'Number of Bookings',
                    data: {!! json_encode($numberBookings) !!}
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['30%'],
                        // endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: months.slice(0, $data.length),

                    // labels: {
                    //     style: {
                    //         colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                    //         fontSize: '12px',
                    //         fontFamily: KTApp.getSettings()['font-family']
                    //     }
                    // }
                },
                colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()[
                    'colors']['gray']['gray-300']],
                grid: {
                    borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

            //         var chart = new ApexCharts(element, barChartOptions);
            // chart.render();

            new ApexCharts(element, barChartOptions).render();

            $('.View-JS-book').on('click', function() {
                var $th = $(this);
                let $id = $th.attr('id').replace('View-JS-book-', '');
                let $url = $th.attr('href');
                // alert(JSON.stringify($url));
                $("#booking-update-modal-dash").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                ajaxCall($url, {
                    error: function(response) {
                        Swal.fire('error');
                        alert(JSON.stringify(response));
                    },
                    success: function(response) {
                        var mod = {ModeratedBy: "{{$user->id}}", ModeratedByName: "{{$user->Name}}" };
                        response = {...response, ...mod};
                        // alert(JSON.stringify(response));
                        let $updateUrl = "{!! route('book.update', ':id') !!}";
                        $updateUrl = $updateUrl.replace(':id', $id);
                        $("#ajax-update-booking").attr("action", $updateUrl);

                        let $deleteUrl = "{!! route('book.destroy', ':id') !!}";
                        $deleteUrl = $deleteUrl.replace(':id', $id);
                        $("#ajax-delete-booking").attr("action", $deleteUrl);
                        $.each(response, function(indexInArray, valueOfElement) {
                            $("#ajax-update-booking input[name=" + indexInArray +
                                "]").val(valueOfElement);
                            $("#ajax-update-booking textarea[name=" + indexInArray +
                                "]").val(valueOfElement);
                            $("#ajax-update-booking select[name=" + indexInArray +
                                "]").val(valueOfElement);
                        });
                        console.log(response);
                        return response;
                    }
                });
            });

            $("#ajax-update-booking").submit(function(e) {
                e.preventDefault();
                $('button[type=submit], input[type=submit]').prop('disabled', true);

                var $form = $(this);
                var $actionUrl = $form.attr('action');
                var $type = $form.attr('method');
                var $data = $form.serialize();
                // alert("success: " + JSON.stringify($data));

                var $success = function(response) {
                    // alert("success: " + JSON.stringify(response));
                    $("#booking-update-modal-dash").modal('hide');
                    window.location.reload(true);
                };
                var $complete = function(response) {
                    // alert("complete:" + JSON.stringify(response));
                    // console.log(response);
                };
                ajaxCall($actionUrl, {
                    type: $type,
                    data: $data,
                    success: $success,
                    complete: $complete
                });
            });

            $('.Reject-book').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Do you want to reject booking ?',
                    showCancelButton: true,
                    denyButtonText: `Delete`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var $form = $(this).parent('form');

                        var $actionUrl = $form.attr('action');
                        var $type = $form.attr('method');
                        let $id = 0;
                        if( $(this).is($(this).attr('id')) ){
                            $id = $(this).attr('id').replace('Reject-book-', '');
                        }
                        // var $formData = $form.serialize();
                        var $formData = $form.serializeArray().reduce(function(obj, item) {
                            obj[item.name] = item.value;
                            return obj;
                        }, {});
                        var $modData = {id: $id, ModeratedBy: "{{$user->id}}", ModeratedByName: "{{$user->Name}}" };
                        // var $data = $formData +'&' + $.param($modData);
                        var $data = {...$formData, ...$modData};

                        // alert(JSON.stringify($data));
                        var $success = function(response) {
                            // alert("success: " + JSON.stringify(response));
                            $("#booking-update-modal-dash").modal('hide');
                            window.location.reload(true);
                        };
                        var error = function(response) {
                            // Swal.fire('error');
                            alert("error: " + JSON.stringify(response));
                        };
                        ajaxCall($actionUrl, {
                            type: $type,
                            data: $data,
                            error: error,
                            success: $success
                            // complete: $complete
                        });
                        // alert("complete:" + JSON.stringify($form));
                    }
                });
            });

            $('.Accept-js-book').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Do you want to Accept booking ?',
                    showCancelButton: true,
                    denyButtonText: `Accept`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        let $this = $(this);
                        // alert(JSON.stringify($form));
                        var $actionUrl = $this.attr('href');
                        var $type = 'POST';
                        // var $data = $form.serialize();
                        var $data = {ModeratedBy: "{{$user->id}}", ModeratedByName: "{{$user->Name}}" };
                        var $success = function(response) {
                            // alert("success: " + JSON.stringify(response));
                            window.location.reload(true);
                        };
                        var error = function(response) {
                            // Swal.fire('error');
                            alert("error: " + JSON.stringify(response));
                        };
                        ajaxCall($actionUrl, {
                            type: $type,
                            data: $data,
                            error: error,
                            success: $success
                            // complete: $complete
                        });
                        // alert("complete:" + JSON.stringify($form));
                    }
                });
            });

            // END::DOCUMENT READY FUNCTION
        });
    </script>
@endpushOnce
