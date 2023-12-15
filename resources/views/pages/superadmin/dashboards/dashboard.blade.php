@extends('layouts.superadmin')
@section('pageTitle', 'Super Admin Dashboard :: EzBook')

@section('content')
    @php
        extract($data);
        // $Resources = ($ModeratorRequestedBookings) ? $ModeratorRequestedBookings->FacProviders->first()->Resources : [];
        // dd($data);
    @endphp
    <!--begin::Main-->
    <x-layouts.superadmin.page>
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
                                <span class="card-label font-weight-bolder text-dark">Site details</span>

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
    </x-layouts.superadmin.page>
    <!--end::Main-->




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


            // END::DOCUMENT READY FUNCTION
        });
    </script>
@endpushOnce
